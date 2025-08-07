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
    <title>Invitation for taking Assessment</title>
    <style>
        body {
            /* font-family: 'Arial', sans-serif; */
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            /*background-color: #f4f4f4;*/
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
            /*width: 100%;*/
            max-width: 600px;
            margin: 0 auto;
            margin-top: 20px;
			margin-bottom: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
			/*border: 1px solid #8BB514;*/
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
			/*box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.75);*/
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
        /* .btn {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            background-color: #8BB514;
            color: #ffffff;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #3e3e3e;
        }
		.btn a, .btn-cancel a {
			color: #ffffff;
		} */
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
    <?php $googleForm = "https://docs.google.com/forms/d/e/1FAIpQLSd4S79ouvB4HTuRtnVX23Zbx1iJ8-H_ysFh7KM3casS09Pjxg/viewform?usp=sf_link"; ?>
    <div class="msg-body">
        <div class="container-custom">
            <div class="logo">
                <img src="https://dinzin.in/img/logo.png" alt="DinZin Logo">
            </div>
            <!-- <h1>Invitation for taking Assessment</h1> -->
            <p>Hi <?php echo ucwords(strtolower($student['name']));?>,</p>
            <!-- <p>Thank you for showing interest for internship as Software Engineer Intern at DinZin.</p> -->
            <p>Thank you for showing interest for internship at DinZin.</p>
            <p>To start with the interview process, please complete the assignment from the following link: <a href="<?php echo $googleForm; ?>" target="_blank">Assessment</a> as soon as possible and reply to this email once completed.</p>
            <p>If you have any queries just email us at <a href="mailto:hr@dinzin.in">hr@dinzin.in</a> or simply reply to this email with your query.</p>
            <div class="footer">
                <p>The email was sent by:&nbsp;&nbsp; <a href="https://dinzin.in/">Dinzin</a></p>
            </div>
        </div>
    </div>
</body>
</html>
