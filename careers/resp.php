<?php

require_once "../server/autoload.php";


use classes\Table;

if(isset($_GET['k'])) {

    $applicTbl = new Table("job_applications");

    list($app_id, $resp, $token) = explode('_', trim($_GET['k']));

    if($token)
        $applicant = $applicTbl->selectRecordWhere(['id' => $app_id, 'token' => $token]);
    elseif($app_id <= 17)
        $applicant = $applicTbl->selectRecordWhere(['id' => $app_id]);

    if($applicant) {
        $update = $applicTbl->updateRecord(['response' => (int)$resp, 'resp_date' => date('y-m-d h:i:s')], ['id' => $app_id]);

        if($resp == 1) {

            $applicant['response'] = $resp;

            $to ="dinzinp@gmail.com";

            $from = trim($applicant['email']);
            $header = "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: text/html;charset=utf-8\r\n";
            $header .= "From: $from \r\n";
            $header .= "Reply-To: sanjeev.kumar@dinzin.in \r\n";

            $subject = "Interest received from ". $applicant['full_name'];
           
           $message = "<p>Interest received:</p>";

           foreach($applicant as $k => $v) {
            $message .= "<p>".$k.": ".$v."</p>";
           }

           mail($to, $subject, $message, $header);
        }
    }

}

ob_start();

include "response.php";

$message = ob_get_clean();

echo $message;


exit;
