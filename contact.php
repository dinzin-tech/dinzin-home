<?php

$recaptha_errors = [
    'missing-input-response' => 'Please check the reCaptcha checkbox to confirm you are not a bot!',
    'invalid-input-response' => 'Please check the reCaptcha checkbox to confirm you are not a bot!',
];

if(isset($_POST['email'])) {
    
    $recaptcha = $_POST['g-recaptcha-response'];
    $res       = reCaptcha($recaptcha);

    if($res['success']){
        // Send email
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $messageContent = $_POST["message"];

        $to = "contact@dinzin.in";
        $from = "noreply@dinzin.in";
        $copyTo = "mallikarjun016.rymec@gmail.com";

        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html;charset=utf-8\r\n";
        $header .= "From: noreply <$from>\r\n";
        $header .= "Bcc: $copyTo\r\n";

        $subject = "$subject - $name";

        $message = "<h1>Message Details</h1>\n";
        $message .= "<p>Name: $name</p>";
        $message .= "<p>Email: $email</p>";
        $message .= "<p>Subject: $subject</p>";
        $message .= "<p>Message:</p>";
        $message .= "<p>{$messageContent}</p>";

        $mailSent = mail($to, $subject, $message, $header);
        
        if($mailSent) {
            echo "OK";
        }
        else {
            echo "Failed to send! Please try again later.";
        }

    }else{
        // Error
        $error_message = '';
        foreach($res['error-codes'] as $error_code) {
            $error_message .= $recaptha_errors[$error_code];
        }

        if($error_message != '') {
            echo $error_message;
        }
        else {
            echo "Error in reCaptcha!";
        }

    }

    return;

}

function reCaptcha($recaptcha){
    $secret = "6LfDEIgqAAAAALTiiVqtX4fHAZLSv7PXVmB_c5fh";
    $ip = $_SERVER['REMOTE_ADDR'];

    $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);

    $url = "https://www.google.com/recaptcha/api/siteverify";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    $data = curl_exec($ch);
    curl_close($ch);

    return json_decode($data, true);
}

?>