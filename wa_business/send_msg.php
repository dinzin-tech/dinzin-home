<?php

// $whatsapp_business_account_id = "<WHATSAPP_BUSINESS_ACCOUNT_ID>";
$access_token = "EAAEiZAzZCZCr7kBO4cihZAvZBe3CZAQsaaNjIt5VRi3OSbcgld1vQbw0fboKjftq0bmjfvniiz03RKOCXNjwWt8qWagnnSJyyOxAKcqatW64z3nlHIDTYMPmhNH2BCdrZAZA9YaiXdT5fP1IlEQqbBqgbOto7tSFosKsTybauFCLg6DZAYvepkK6vaMZCo00U5J6BgxS5KXcZA2HWlr4TpPSyZCI";

// print_r($_POST);

// Read the raw input
$data = file_get_contents("php://input");

// Decode the JSON data
$form_data = json_decode($data, true);

// print_r($form_data);
// exit;


if($form_data) {
    $phone_number_id = $form_data['from'];
    $mobile_number = $form_data['to'];
    $template_name = $form_data['template']['name'];
    $template_language = $form_data['template']['language']['code'];
    

    // print_r($template_name);
    // exit;

    $url = 'https://graph.facebook.com/v18.0/' . $phone_number_id . '/messages';

    $data = [
        'messaging_product' => 'whatsapp',
        'to' => $mobile_number,
        'type' => 'template',
        'template' => [
            'name' => $template_name,
            'language' => [
                'code' => $template_language
            ]
        ]
    ];

    $data_json = json_encode($data);

    // echo $data_json;
    // exit;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $access_token,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        // Success, $response contains the data
        echo $response;
    } else {
        // Error handling
        echo "Error: HTTP status code $http_code";
    }
}

// echo "end";

?>
