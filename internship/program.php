<?php

require_once "../server/autoload.php";

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

use classes\Table;
use classes\Logger;

$tranxLogTable = new Table('tranx_log');

$total_paid = $tranxLogTable->selectRecordsWhere([
    'order_status' => 'PAID',
    'order_amount' => '3000'
]);

$max_seats = 50;
$filled_seats = count($total_paid);

$remaining_seats = $max_seats - $filled_seats;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training with Internship Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            color: #2fb0d8;
        }
        .program-details, .requirement-details {
            margin-bottom: 20px;
        }
        ul {
            padding-left: 20px;
        }
        .btn {
            display: inline-block;
            background: #2fb0d8;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
        .btn:hover {
            background: #228bb3;
        }
        .start-date {
            font-size: 18px;
            color: #413E66;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            text-align: center;
            color: #777;
        }
        .notice {
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://dinzin.in/img/logo.png" alt="DinZin Logo">
        </div>

        <h1>Training with Internship Program</h1>
        <p>Welcome to Dinzin Technology Solutions' Training cum Internship Program! This unique program blends training and real-world project work to help you build in-demand skills and gain hands-on experience in the industry.</p>
        
        <div class="program-details">
            <h2>Program Highlights</h2>
            <ul>
                <li>Hands-on experience with technologies like <b>HTML, CSS, JavaScript, PHP and MySQL</b>, and frameworks such as <b>Symfony, Laravel, jQuery, Bootstrap</b>.</li>
                <li>Learn core concepts like <b>Object-Oriented Programming (OOP)</b> and <b>MVC Architecture</b>.</li>
                <li>Guidance from experienced mentors through a dedicated communication channel.</li>
                <li>Work on live projects to simulate real-world industry scenarios.</li>
                <li>Internship Certification upon successful completion of the program.</li>
            </ul>
        </div>

        <div class="requirement-details">
            <h2>Requirements</h2>
            <ul>
                <li>Participants must have a working internet connection.</li>
                <li>Participants must have access to a functional PC or laptop.</li>
            </ul>
        </div>

        <div class="program-start">
            <h2>Program Start Date</h2>
            <p class="start-date">December 14, 2024</p>            
        </div>

        <div class="enroll">
            <h2>How to Enroll</h2>

            <?php if ($remaining_seats > 0): ?>
                <p>The program fee is ₹3,000, which includes training, mentorship, and access to tools and resources.</p>
                <p>Note: Please use the same email while making payment.</p>
                <a href="https://payments.cashfree.com/forms/Dinzin" class="btn">Pay & Enroll Now</a>
            <?php else: ?>
                <p class="notice">All seats for this batch are currently filled. You will be notified if this program opens up again. Stay tuned for the next batch!</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer">
        © 2024 Dinzin Technology Solutions Private Limited. All rights reserved.
    </div>
</body>
</html>
