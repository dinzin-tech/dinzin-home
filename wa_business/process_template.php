<?php
$phone_id = '256066430913089';
$whatsapp_business_id = '217432141458542';
$access_token = 'EAAEiZAzZCZCr7kBO9wc7zcn6ZBfXjXGZBsWx6jcvXWWSvVl0PVToZCj8EI7ESNfcAcXDV1YZBVur2VsNA9bvR5DkU0iheZCCd76cgWsNKdo2dkUEJKzyx33bMaPRGPfLW3DZAkUfkCCyiYPQtFpiRnDmAQN58sdcbX1BSG4ZBWC6bTMROAcwNqsGIvZAZAgFfSZBGvU5bUvaMmExUd2TnC7q703QZD'; // Replace this with your actual access token

 $url = "https://graph.facebook.com/v19.0/$whatsapp_business_id/message_templates";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define an array to store form data
    $data = array(
        'name' => $_POST['name'],
        'language' => $_POST['language'],
        'category' => $_POST['category'],
        'allow_category_change' => isset($_POST['allow_category_change']) ? true : false,
        'components' => array(
            array(
              /*  'type' => 'HEADER',
                'format' => $_POST['header_format'],
                'text' => ($_POST['header_format'] === 'MEDIA') ? $_POST['header_media'] : $_POST['header']  */
                "type" => "header",
                    "format" => "image",
                    "example" => array(
                        "header_handle" => array(
                            "id"=>"446350794765528"
                        )
                    )
                      

                
                      
            ),
            array(
                'type' => 'BODY',
                'text' => $_POST['body']
            ),
            array(
                'type' => 'FOOTER',
                'text' => $_POST['footer']
            ),
          /*  array(
                'type' => 'BUTTONS',
                'buttons' => array(
                    array(
                        'type' => 'visit website',
                        'text' => $_POST['button_text'],
                        'URL' => $_POST['url']
                    ),
                    array(
                        'type' => 'call to phone number',
                        'text' => $_POST['button_text_phone'],
                        'Phone number' => $_POST['phone_number']
                    )
                )
            )*/
            array(
                'type' => 'BUTTONS',
               'buttons' => generateButtonsArray(isset($_POST['button_types']) ? $_POST['button_types'] : array(), $_POST)
            )
        )
    );
    // Process $data as needed (e.g., save to database, send via email, etc.)
    // For this example, let's just display the data
   // Convert array to JSON
     $json_data = json_encode($data, JSON_PRETTY_PRINT);
     // Print JSON
     header('Content-Type: application/json');
    // echo $json_data;
     //exit();
     
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $access_token,
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_data))
    );
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    echo $response;

    // Optionally, redirect to another page after processing
    // header("Location: success.php");
    exit();
}

function generateButtonsArray($buttonTypes, $postData) {
    $buttonsArray = array();
    foreach ($buttonTypes as $buttonType) {
        switch ($buttonType) {
            case 'visit_website':
                $buttonData = array(
                    'type' => $buttonType,
                    'text' => $postData['button_text'],
                    'URL' => $postData['url']
                );
                break;
            case 'call_phone_number':
                $buttonData = array(
                    'type' => $buttonType,
                    'text' => $postData['button_text_phone'],
                    'phone_number' => $postData['phone_number']
                );
                break;
            // Add cases for other button types as needed
        }
        $buttonsArray[] = $buttonData;
    }
    return $buttonsArray;
}

?>
