<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">
<head>    
    <meta property="og:title" content="Email template">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link Poppins font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    
    <!-- title of the page -->
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
		.msg-body {
			max-width:100%;
			width:auto;
			max-height:100%;
			height:auto;
			padding: 1% 0%;
            background: #f4f4f4;
		}
        .container-custom {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 20px;
			margin-bottom: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        .container-custom a {
            color: #413e66;
        }
        h1 {
            color: #413e66;
        }
        p {
            color: #555;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
        }
        .logo img {
            width: 200px;
            max-width: 100%;
            height: auto;
        }
        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
            text-align: center;
            color: #777;
            font-size: 12px;
        }
        .footer a {
            color: #413e66;
        }
    </style>
</head>
<body>
    <div class="msg-body">
        <div class="container-custom">
            <div class="logo">
                <img src="https://dinzin.in/img/logo.png" alt="DinZin Logo">
            </div>
            <p>Hi <?php echo ucwords(strtolower($client_name));?>,</p>

            <p>We have successfully received your payment for the Training cum Internship Program at Dinzin Technology Solutions Private Limited. Thank you for your prompt action and interest in this program!</p>

            <p><b>Next Steps:</b></p>
            <ul>
                <li>We will send you an email with further details about the program schedule and onboarding process shortly.</li>
                <li>Our team will also reach out to you to provide additional guidance and answer any questions.</li>
            </ul>
            
            <p>If you have any queries or need further assistance, please feel free to reach out to us. You can contact:</p>
            <p>
                <b>Contact Person:</b> Sanjeev Kumar<br>
                <b>Email:</b> sanjeev.kumar@dinzin.in
            </p>

            <p>We look forward to welcoming you to the program and helping you kickstart your career!</p>
    
            <p>Best regards,<br/>
            Team DinZin
            </p>
            
            <div class="footer">
                <p>This email was sent by:&nbsp;&nbsp; <a href="https://dinzin.in/">Dinzin Technology Solutions</a></p>
            </div>
        </div>
    </div>
</body>
</html>
