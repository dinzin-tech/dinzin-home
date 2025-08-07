<?php

require_once "../server/autoload.php";

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

use classes\Table;
use classes\Logger;

$applicTbl = new Table("job_applications");
$logger = new Logger('program_invitation_sent.log');


$applications = $applicTbl->selectRecordsWhere(['email_sent' => 0]);

//$applications = $applicTbl->selectRecordsWhere(['email' => 'connect.charanbestha@gmail.com']);

// set max emails to send
$max_emails = 500;
$email_sent = 0;
$notify_count = 600;

$test = false;

$secretKey = 'dinzin';

foreach($applications as $application) {

    // Generate a unique token using the application ID and secret key
    $token = generateAlphabetToken($application['id'], $secretKey, 9);


    $yes = "https://dinzin.in/careers/resp.php?k=".$application['id']."_1_".$token;
    $no = "https://dinzin.in/careers/resp.php?k=".$application['id']."_2_".$token;

    $to = trim($application['email']);

    if($test) {
        $to = "mallikarjun016.rymec@gmail.com";
    }

    $from = "hr@dinzin.in";

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/html;charset=utf-8\r\n";
    $header .= "From: HR DinZin <$from>\r\n";
    $header .= "Reply-To: sanjeev.kumar@dinzin.in \r\n";

    if($email_sent > $notify_count) {
        $header .= "Bcc: mallikarjun016.rymec@gmail.com,dinzinp@gmail.com,sanjeev.kumar@dinzin.in \r\n";
    }

    $subject = "Internship Invitation for {$application['position']} from DinZin";

    ob_start();

    include "emailTpl1.php";

    $message = ob_get_clean();


    if((mail($to, $subject, $message, $header))) {
        $email_sent++;

        $updated = $applicTbl->updateRecord(["email_sent" => 1, 'token' => $token], ["id" => $application["id"]]);
        $logger->logMessage("Ivitation emailed to ".$application["id"]);
    }

    if($email_sent >= $max_emails) {
        break;
    }

}

$logger->logMessage($email_sent." emails sent");
echo $email_sent." emails sent";

// Function to generate an alphabet-only token
function generateAlphabetToken($id, $secretKey, $length = 16) {
    // Generate a hash
    $hash = hash_hmac('sha1', $id . time(), $secretKey, true);

    // Define a custom alphabet (A-Z and a-z)
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    // Convert the hash into a string using only the alphabet
    $token = '';
    for ($i = 0; $i < strlen($hash) && strlen($token) < $length; $i++) {
        // Map each byte of the hash to the alphabet
        $token .= $alphabet[ord($hash[$i]) % strlen($alphabet)];
    }

    return $token;
}


?>