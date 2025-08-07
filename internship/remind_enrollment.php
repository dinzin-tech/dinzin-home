<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Closing Soon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            text-align: center;
            padding: 20px;
            //background-color: #2fb0d8;
        }
        .email-header img {
            max-width: 120px;
            height: auto;
        }
        .email-body {
            padding: 20px;
        }
        h1, h2, h3 {
            color: #2fb0d8;
        }
        h3 {
            margin-bottom: 10px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
        .cta-button {
            display: inline-block;
            background: #2fb0d8;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }
        .cta-button:hover {
            background: #228bb3;
        }
        .footer {
            padding: 10px;
            text-align: center;
            background-color: #f4f4f4;
            font-size: 12px;
            color: #777;
        }
        .notice {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with Logo -->
        <div class="email-header">
            <img src="https://dinzin.in/img/logo.png" alt="Dinzin Logo">
        </div>

        <!-- Email Body -->
        <div class="email-body">
            <h1>Enrollment Window Closing Soon!</h1>
            <p>Dear <?=$application['full_name'];?>,</p>
            <p>We hope this message finds you well. This is a friendly reminder that the enrollment window for our <b>Training with Internship Program</b> is closing soon!</p>

            <p class="notice">The last date to enroll is <b>8th December 2024</b>.</p>

            <h3>Why Join Now?</h3>
            <ul>
                <li>Secure your spot before seats are filled.</li>
                <li>Start building in-demand skills with hands-on projects.</li>
                <li>Gain industry experience and mentorship from experts.</li>
            </ul>

            <h3>Program Highlights</h3>
            <ul>
                <li>Technologies: HTML, CSS, JavaScript, PHP, Symfony, Laravel, and more.</li>
                <li>Practical live projects to enhance your portfolio.</li>
                <li>Certification and internship letter upon completion.</li>
            </ul>

            <p>Don’t miss this opportunity to kickstart your career in the tech industry. Click below to complete your enrollment before the deadline:</p>

            <!-- Enroll Now Button with Link -->
            <a href="https://payments.cashfree.com/forms/Dinzin" class="cta-button">Enroll Now</a>

            <p>If you have any questions, feel free to reach out to:</p>
            <ul>
                <!-- <li><b>Mr. Charan:</b> 123456789</li> --->
                <li><b>Mr. Sanjeev:</b> <a href="mailto:sanjeev.kumar@dinzin.in">sanjeev.kumar@dinzin.in</a> (8884427588)</li>
            </ul>

            <p>We look forward to having you on board!</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2024 Dinzin Technology Solutions Private Limited. All rights reserved.
        </div>
    </div>
</body>
</html>
