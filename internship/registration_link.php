<?php

require_once "../server/autoload.php";

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

use classes\Table;
use classes\Logger;

// If Test set true
$test = true;

///////// VARIABLES --

$tblCondition = [
    'response' => 1,
    'email_sent' => 2,
    'is_test' => 1
];

$subject = "Program Enrollment Ending Soon - Training with Internship";

$emailTbpl = 'remind_enrollment.php';

$log_message = 'Reminder email sent ';

$update_email_sent = 4;

////////////////////////////

$applicTbl = new Table("job_applications");
$logger = new Logger('payment_invitation_sent.log');

// $applications = $applicTbl->selectRecordsWhere(['response' => 1]);

$applications = $applicTbl->selectRecordsWhere($tblCondition);



//print_r($applications);exit;

foreach($applications as $application) {


    $to = trim($application['email']);

    if($test) {
        $to = "mallikarjun016.rymec@gmail.com";
    }

    $from = "noreply@dinzin.in";

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/html;charset=utf-8\r\n";
    $header .= "From: DinZin <$from>\r\n";
    $header .= "Bcc: payments@dinzin.in\r\n";
    $header .= "Reply-To: sanjeev.kumar@dinzin.in \r\n";

    // $subject = "Program Details and Next Steps - Training with Internship at DinZin";

    ob_start();

    //include "program_email.php";

    include $emailTbpl;

    $message = ob_get_clean();


    if((mail($to, $subject, $message, $header))) {
        $email_sent++;

        $updated = $applicTbl->updateRecord([
            //"email_sent" => 3
            "email_sent" => $update_email_sent
            ], ["id" => $application["id"]]
        );

        $logger->logMessage($log_message."to ".$application["id"]);
    }

}

$logger->logMessage($email_sent." emails sent");
echo $email_sent." emails sent";


?>