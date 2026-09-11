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

        // Write atomically with exclusive lock to avoid corruption/race conditions
        $jsonPayload = json_encode($inquiries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $tmpFile = $storageFile . '.tmp';
        $saved = @file_put_contents($tmpFile, $jsonPayload, LOCK_EX);

        if ($saved !== false) {
            // Ensure permissions and then rename into place
            @chmod($tmpFile, 0644);
            if (@rename($tmpFile, $storageFile)) {
                echo "OK";
            } else {
                @unlink($tmpFile);
                echo "Failed to save inquiry locally. Please try again later.";
            }
        } else {
            // Generic error message for clients; avoid leaking internals
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
    // Bypass reCaptcha when running the PHP built-in server or from localhost
    // so the form can be tested locally without contacting Google's API.
    $remoteIp = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    if (PHP_SAPI === 'cli-server' || $remoteIp === '127.0.0.1' || $remoteIp === '::1') {
        return ['success' => true];
    }

    $secret = "6LfDEIgqAAAAALTiiVqtX4fHAZLSv7PXVmB_c5fh";
    $ip = $remoteIp;

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