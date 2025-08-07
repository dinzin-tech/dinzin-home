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
    <title>Invitation for internship</title>
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
    <?php $googleForm = "https://docs.google.com/forms/d/e/1FAIpQLSd4S79ouvB4HTuRtnVX23Zbx1iJ8-H_ysFh7KM3casS09Pjxg/viewform?usp=sf_link"; ?>
    <div class="msg-body">
        <div class="container-custom">
            <div class="logo">
                <img src="https://dinzin.in/img/logo.png" alt="DinZin Logo">
            </div>
            <p>Hi <?php echo ucwords(strtolower($application['full_name']));?>,</p>

            <p>Thank you for applying for the <?=$application['position']?> position at Dinzin Technology Solutions Private Limited. We’re excited about your interest in joining us!</p>
            <p>To ensure that our internship program provides you with the best possible learning experience, we have designed it as a Training cum Internship opportunity. This program is unique in that it combines practical work on real-world projects with personalized training and mentorship from our experienced team.</p>
            <p>To cover the cost of the personalized training, access to resources, and mentorship provided during the program through a dedicated communication channel, a training fee of ₹3,000/- is required. This contribution allows us to maintain the quality of the program and ensures each intern receives focused support and hands-on learning opportunities.</p>
            
            <p><b>Here’s what you can expect:</b></p>
            <ol>
                <li><b>Personalized Mentorship:</b> A dedicated trainer will guide you throughout the program, ensuring you understand and complete tasks effectively.</li>
                <li><b>Real-World Experience:</b> Work on live projects that simulate actual industry scenarios, giving you invaluable hands-on experience.</li>
                <li><b>Career Development:</b> Gain the technical and professional skills needed to excel in competitive industry environments.</li>
            </ol>
            <p>
            This is not just an internship; it’s a stepping stone toward a successful career. We’re confident this program will equip you with the skills and experience to thrive in a competitive industry.
            </p>
            <p>If you’re ready to embark on this exciting journey, please let us know by clicking on Interested, and we’ll share the next steps.</p>
            
            <p style="display: flex;align-items: center;justify-content: space-evenly;flex-wrap: nowrap;">
            
                <a href="<?=$yes?>" style="text-decoration:none;">
                    <span class="btn btn-primary" style="margin-right: 20px; text-decoration:none; letter-spacing: 1px; text-transform: uppercase; font-family: 'Montserrat', sans-serif; background: #2fb0d8; color: #fff; width: 150px; height: auto; border-radius: 4px; border: 0px; font-size: 13px; font-weight: 600; padding: 10px; cursor: pointer;">
                        Interested
                    </span>
                </a>

                <a href="<?=$no?>" style="text-decoration:none;">
                    <span class="btn btn-primary" style="text-decoration:none; letter-spacing: 1px; text-transform: uppercase; font-family: 'Montserrat', sans-serif; background: #413E66; color: #fff; width: 150px; height: auto; border-radius: 4px; border: 0px; font-size: 13px; font-weight: 600; padding: 10px; cursor: pointer;">
                        Not Interested
                    </span>
                </a>
                
            </p>
    
            <p>Best regards,<br/>
            Team DinZin
            </p>
            
            
            <div class="footer">
                <p>The email was sent by:&nbsp;&nbsp; <a href="https://dinzin.in/">Dinzin</a></p>
            </div>
        </div>
    </div>
</body>
</html>
