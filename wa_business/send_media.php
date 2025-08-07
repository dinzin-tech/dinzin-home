<?php
$phone_id = '256066430913089';
$whatsapp_business_id = '217432141458542';
$access_token = 'EAAEiZAzZCZCr7kBO9wc7zcn6ZBfXjXGZBsWx6jcvXWWSvVl0PVToZCj8EI7ESNfcAcXDV1YZBVur2VsNA9bvR5DkU0iheZCCd76cgWsNKdo2dkUEJKzyx33bMaPRGPfLW3DZAkUfkCCyiYPQtFpiRnDmAQN58sdcbX1BSG4ZBWC6bTMROAcwNqsGIvZAZAgFfSZBGvU5bUvaMmExUd2TnC7q703QZD'; // Replace this with your actual access token
$file_path = 'download.png';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v20.0/{$phone_id}/media");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array(
    'Authorization: Bearer ' . $access_token,
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$postFields = array(
    'file' => new CURLFile($file_path, 'image/png'),
    'type' => 'image/png',
    'messaging_product' => 'whatsapp'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

$response = curl_exec($ch);
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>
