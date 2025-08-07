<?php

require_once "../server/autoload.php";

use classes\Logger;

// $logger = new Logger('webhook_logger.txt');
$logger = new Logger('wa_app_webhook.txt');


// $logger->logMessage(json_encode($_POST));
// $logger->logMessage(json_encode($_GET));

$json = file_get_contents('php://input');

$data = json_decode($json, true);

// if post request is recieved
// if(isset($_POST)) {
//     $stringify = json_encode($_POST);

//     $logger->logMessage($stringify);

// }

// if get request is recieved
if(isset($_GET)) {
    $stringify = json_encode($_GET);

    $challenge = $_GET['hub_challenge'];
    $mode = $_GET['hub_mode'];
    $token = $_GET['hub_verify_token'];

    if($token == "dinzin" && $mode == "subscribe") {
        http_response_code(200);
        header("HTTP/1.1 200 OK");
        header("Content-Length: " . strlen($challenge));
        echo "$challenge";

        $logger->logMessage("GET:");
        $logger->logMessage($stringify);
        exit;
    }
}

// if($data) {
    
//     http_response_code(200);
//     header("HTTP/1.1 200 OK");

//     $logger->logMessage("input:");
//     $logger->logMessage(count($data));
//     $logger->logMessage(json_encode(var_dump($data)));
//     // $logger->logMessage(json_encode(print_r(var_dump($json))));
//     $logger->logMessage(gettype($json));
//     $logger->logMessage(json_encode(var_dump($json)));
// }

// if(isset($_POST)) {
//     http_response_code(200);
//     header("HTTP/1.1 200 OK");

//     $logger->logMessage("POST:");
//     $logger->logMessage(json_encode($_POST));
// }

if (!empty($data['entry'])) {

    // foreach ($data['entry'] as $entry) {
    //     $changes = $entry['changes'];
    //     foreach ($changes as $change) {
    //         $field = $change['field'];
    //         $value = $change['value'];

    //         $logger->logMessage("Field: " . $field);
    //         $logger->logMessage("value: " . $value);
    //         $logger->logMessage(json_encode($value));
    //         // Handle the event based on the field and value
    //         // You can write your own logic here
    //     }
    // }

    $logger->logMessage("Entire data:");
    $logger->logMessage(json_encode($data));
}

// $logger->logMessage(json_encode($data));

http_response_code(200);

?>