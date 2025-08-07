<?php

require_once "../server/classes/Logger.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use classes\Logger;

$logger = new Logger("mail.log");

// echo "Assessment link has been sent already!";
// exit;

$students = [
    // ["name" => "Hema D", "email" => "hemagowda210502@gmail.com"],
    // ["name" => "Chithralekha DN", "email" => "chithraguru6@gmail.com"],
    // ["name" => "Kanchanagari Saritha", "email" => "reddysaritha183@gmail.com"],
    /*["name" => "Sourav kumar", "email" => "souravkumar07383@gmail.com"],
    ["name" => "Vaishnavi B A", "email" => "vaishnaviba993@gmail.com"],
    ["name" => "Spoorthi PS", "email" => "spoorthips346@gmail.com"],
    ["name" => "Shreyas C", "email" => "shreyasc84@gmail.com"],
    ["name" => "Sri H Balaji", "email" => "thirumalaramesha143@gmail.com"],
    ["name" => "Tharun M", "email" => "vijaytharun6905@gmail.com"],
    ["name" => "Giri Babu Burra", "email" => "giribyadav898@gmail.com"],
    ["name" => "Jai Prakash Rajashekar", "email" => "jaip72041@gmail.com"],
    ["name" => "ANUSHA M", "email" => "anushamathukumili@gmail.com"],
    ["name" => "SHRADHA", "email" => "shradhasanjukumar25@gmail.com"],
    ["name" => "SHRAVANI S RAJU", "email" => "shravanirajuuu@gmail.com"],
    ["name" => "Tanay Jagnani", "email" => "tanayjagnani@gmail.com"],
    ["name" => "VANSHI SINGH", "email" => "vanshisinghdev@gmail.com"],*/
];


// set up headers, subject, from etc to send email to each students
$subject = "Software Engineer Intern at DinZin - Assessment";
$bcc = "mallikarjun016.rymec@gmail.com";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8\r\n";
$headers .= "From: DinZin <hr@dinzin.in>\r\n";
$headers .= "Bcc: $bcc\r\n";

foreach($students as $student) {
    $to = $student['email'];

    ob_start();
    include "emailTpl.php";
    $message = ob_get_clean();
    echo "$message";//exit;
    
    // $emailSent = mail($to, $subject, $message, $headers);

    if(mail($to, $subject, $message, $headers)) {
        $logger->logMessage("Assessment link has been sent to {$student['name']} at {$student['email']}");
    }
}