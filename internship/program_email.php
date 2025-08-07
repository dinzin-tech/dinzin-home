<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Team!</title>
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
            /* background-color: #2fb0d8; */
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
            <h1>Program Details and Next Steps</h1>
            <p>Dear <?=$application['full_name'];?>,</p>
            <p>We are delighted to see your interest in joining our team and look forward to embarking on this journey with you.</p>
            
            <h3>1. Program Overview</h3>
            <ul>
                <li>When you invest in learning, it becomes our responsibility to ensure you receive the best possible training and internship experience.</li>
                <li>A dedicated team member will be assigned to monitor your progress, assign tasks, and address your queries throughout the program.</li>
            </ul>

            <h3>2. Working and Internship Timings</h3>
            <ul>
                <li><b>Working Hours:</b> 18:00 hrs to 02:00 hrs.</li>
                <li><b>Internship Hours:</b>
                    <ul>
                        <li>Monday to Friday: 20:00 hrs to 12:00 hrs.</li>
                        <li>Saturday: Weekly off.</li>
                        <li>Sunday: 10:00 hrs to 18:00 hrs (as per project review and mentor's decision).</li>
                    </ul>
                </li>
            </ul>

            <h3>3. Technologies and Tools you will be learning</h3>
            <p>In our live projects, you will work with a variety of technologies, including:</p>
            <ul>
                <li><b>Front-End:</b> HTML, CSS, JavaScript, Bootstrap, jQuery.</li>
                <li><b>Back-End:</b> PHP, Symfony, Laravel.</li>
                <li><b>Concepts:</b> Basics of these technologies, MVC architecture, and Object-Oriented Programming (OOP).</li>
            </ul>

            <h3>4. Program Duration and Certification</h3>
            <ul>
                <li>The program will run for <b>45 days, starting from 14th December 2024</b>.</li>
                <li>Upon successful completion, you will receive:
                    <ul>
                        <li>A certificate recognizing your achievements.</li>
                        <li>An internship letter sent to both your email and physical address.</li>
                    </ul>
                </li>
            </ul>

            <h3>5. Enrollment Details</h3>
            <p>Seats are limited and offered on a first-come, first-served basis. Once the seats are full, the payment link will no longer be active.</p>
            <p>This is completely remote internship program</p>
            <p>You are required to be equipped with working internet and functional PC</p>
            <p>Upon completion of the payment your enrollment will be completed. A confirmation email will be recevied to the email you use at the time of payment.</p>

            <h3>Next Steps</h3>
            <p>If you have any questions or require clarifications, feel free to reach out:</p>
            <ul>
                <li><b>Mr. Sanjeev:</b> <a href="mailto:sanjeev.kumar@dinzin.in">sanjeev.kumar@dinzin.in</a></li>
            </ul>
            <p>If you accept the terms and conditions outlined above, please proceed with the payment to confirm your enrollment:</p>
            <a href="https://dinzin.in/internship/program.php" class="cta-button">Enroll Now</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2024 Dinzin Technology Solutions Private Limited. All rights reserved.
        </div>
    </div>
</body>
</html>
