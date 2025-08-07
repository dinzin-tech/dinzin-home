<?php
$phone_id = '256066430913089';
$whatsapp_business_id = '217432141458542';
$access_token = 'EAAEiZAzZCZCr7kBO9wc7zcn6ZBfXjXGZBsWx6jcvXWWSvVl0PVToZCj8EI7ESNfcAcXDV1YZBVur2VsNA9bvR5DkU0iheZCCd76cgWsNKdo2dkUEJKzyx33bMaPRGPfLW3DZAkUfkCCyiYPQtFpiRnDmAQN58sdcbX1BSG4ZBWC6bTMROAcwNqsGIvZAZAgFfSZBGvU5bUvaMmExUd2TnC7q703QZD'; // Replace this with your actual access token
 $url = "https://graph.facebook.com/v19.0/$whatsapp_business_id/message_templates";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        'name' => $_POST['Name'],
        'language' => $_POST['language'],
        'category' => $_POST['category'],
        'allow_category_change' => isset($_POST['allow_category_change']) ? true : false,
        'components' => array(
            array(
                array(
                    'type' => 'HEADER',
                    'formate' =>'TEXT',
                    'text'=>$_POST[header] 
                ),
            ),
            array(
                'type' => 'BODY',
                'text' => $_POST['body']
            ),
            array(
                'type' => 'FOOTER',
                'text' => $_POST['footer']
            )
            )
        );
            if (isset($_POST['button_types']) && !empty($_POST['button_types'])) {
                $data['components'][] = array(
                    'type' => 'BUTTONS',
                    'buttons' => generateButtonsArray($_POST['button_types'], $_POST)
                );
            }   
     




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
                    'Phone number' => $postData['phone_number']
                );
                break;  
        }
        $buttonsArray[] = $buttonData;
    }
    return $buttonsArray;
}
function generateHeaderParams($headerFormat, $postData) {
    if ($headerFormat === "TEXT") {
        return array(
            "type" => "text",
            "text" => $postData['header']
        );
    } elseif ($headerFormat === "MEDIA") {
        $mediaType = $postData['media_type'];
        if ($mediaType === "image" ) {
            return array(
                "type" => $mediaType,
                "link" => $postData['image_url']
            );
        } elseif ($mediaType === "location") {
            return array(
                "type" => "location",
                "location" => array(
                    "latitude" => $_POST['latitude'],
                    "longitude" => $_POST['longitude'],
                    "name" => $postData['name'],
                    "address" => $_POST['Address']
                )
            );
        }
        elseif ( $mediaType === "video") {
            return array(
                "type" => $mediaType,
                "link" => $postData['video_url']
            );
        }
        elseif ( $mediaType === "document") {
            return array(
                "type" => $mediaType,
                "link" => $postData['document']
            );
        }
    }
}
?>