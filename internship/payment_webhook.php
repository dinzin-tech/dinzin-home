<?php

require_once "../server/autoload.php";

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

use classes\Table;
use classes\Logger;


$webhookData = file_get_contents('php://input');
$data = json_encode($_POST);
    

$logger = new Logger('payments_webhook.log');

// log raw data
$logger->logMessage("Raw webhook data:\n" . $webhookData);
$logger->logMessage("Raw webhook post data:\n" . $data);

// Parse the data if it's JSON
$parsedData = json_decode($webhookData, true);


// Log the raw data
if ($webhookData) {

    // if no data
    if ($parsedData === null && json_last_error() !== JSON_ERROR_NONE) {
        $logger->logMessage("Invalid JSON received: " . json_last_error_msg());
        http_response_code(400); // Bad request
        exit; // Stop further processing
    }

    // Log parsed data if it's valid JSON
    if ($parsedData) {

        $tranxLog = new Table('tranx_log');
        
        $order = $parsedData['data']['order'];
        $client_data = $order['customer_details'];

        $id = $tranxLog->insertRecord([
            'order_amount' => $order['order_amount'],
            'transaction_id' => $order['transaction_id'],
            'order_status' => $order['order_status'],
            'data' => $webhookData
        ]);

        if($id) {

            if($order['order_status'] == 'PAID') {

                $client_name = $client_data['customer_name'];
                $client_email = $client_data['customer_email'];

                $from = 'payments@dinzin.in';

                $header = "MIME-Version: 1.0\r\n";
                $header .= "Content-Type: text/html;charset=utf-8\r\n";
                $header .= "From: DinZin <$from>\r\n";
                $header .= "Reply-To: sanjeev.kumar@dinzin.in \r\n";

                $header .= "Bcc: mallikarjun@dinzin.in,dinzinp@gmail.com,sanjeev.kumar@dinzin.in \r\n";

                $subject = "Enrollment Successful for Training with Internship at DinZin";

                ob_start();

                include "payment_confirmed_email_template.php";

                $message = ob_get_clean();


                if((mail($client_email, $subject, $message, $header))) {

                    $logger->logMessage("Payment confirmed emailed to $client_email");
                }

            }
            else {
                
                $logger->logMessage("Payment not confirmed not communicated to client, transaction_id: ".$order['transaction_id']);
            }
        }
    }


    
}

// Optionally, send a response back to the webhook provider
http_response_code(200); // Set response code to 200 OK
//echo json_encode(['status' => 'success', 'message' => 'Webhook logged successfully']);

