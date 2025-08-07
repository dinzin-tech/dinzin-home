<?php
// Configuration variables
$whatsapp_business_id = '217432141458542';
$access_token = 'EAAEiZAzZCZCr7kBO1eXywZBhe75IVC1CBTCFTw2jhctN5W3SDTkpymJfiDFYbiuzcrfLPTZBMBIwJBhwlHpXQvuZC9Ncy8a23AQwm1LCCmfic752M2UJZC9JePZAjMLN88NsjRcbWYQEInN7ZB70PEXag2pr0ZCnx2uUZCqzz3MMq2qjnF6io5ABRjjOSZAstAsWDJdyBosW0legvP4j56xfLmYZD'; // Replace this with your actual access token

$url = "https://graph.facebook.com/v19.0/$whatsapp_business_id/message_templates";

$data = array(
    "name" => "marketingshipping",
    "category" => "MARKETING",
    "language" => "en",
    "components" => array(
        array(
            "type" => "HEADER",
            "format" => "IMAGE",
            "example" => array(
                "header_handle" => "https://dinzin.in/wa_business/test.jpg"
            )
        ),
        array(
            "type" => "BODY",
            "text" => "Hi! Your discount code is {{1}}.",
            "example" => array(
                "body_text" => array("DISCOUNT2023")
            )
        ),
        array(
            "type" => "BUTTONS",
            "buttons" => array(
                array(
                    "type" => "URL",
                    "text" => "Click Here!",
                    "url" => "https://www.example.com/{{1}}",
                    "example" => array(
                        "https://www.example.com/ertyhgf456"
                    )
                )
            )
        )
    )
);

$json_data = json_encode($data, JSON_PRETTY_PRINT);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $access_token,
    'Content-Type: application/json'
));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>
