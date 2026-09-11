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

        $subjectText = $subject;
        $fullSubject = "$subjectText - $name";

        $storageDir = __DIR__ . "/storage";
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0777, true);
        }

        $storageFile = $storageDir . "/inquiries.json";
        $inquiries = [];

        if (file_exists($storageFile) && filesize($storageFile) > 0) {
            $existingData = file_get_contents($storageFile);
            $decodedData = json_decode($existingData, true);

            if (is_array($decodedData)) {
                $inquiries = $decodedData;
            }
        }

        $inquiries[] = [
            'name' => $name,
            'email' => $email,
            'subject' => $subjectText,
            'full_subject' => $fullSubject,
            'message' => $messageContent,
            'submitted_at' => date('Y-m-d H:i:s'),
            'source' => 'contact_form'
        ];

        $saved = file_put_contents($storageFile, json_encode($inquiries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        if($saved !== false) {
            echo "OK";
        }
        else {
            echo "Failed to save inquiry locally. Please try again later.";
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