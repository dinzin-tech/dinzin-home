<?php
require_once "../server/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

use classes\Table;

$jobOpeningsTbl = new Table(Table::JOB_OPENINGS);
$jobOpenings = $jobOpeningsTbl->selectRecordsWhere(['is_active' => 1]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $positionRow = $jobOpeningsTbl->selectRecordWhere(['id' => $_POST["position"]]);

    $position = $positionRow['title'];
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $referedBy = $_POST["referedBy"];
    $yearPassing = $_POST["yearPassing"];
    $qualification = $_POST["qualification"];
    $file = $_FILES["resume"];
    $getParams = $_POST["getParams"];


    // check if applied already
    $jobApplicationsTable = new Table('job_applications');

    $applicant = $jobApplicationsTable->selectRecordsWhere(["email" => $email, "position" => $position]);

    if(!$applicant) {

        // upload the resume
        $uploadDirectory = 'uploads/';

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Generate a unique name for the file to avoid overwriting
        $uniqueFileName = $uploadDirectory . uniqid() . '_' . $file['name'];

        // Move the uploaded file to the destination
        if (move_uploaded_file($file['tmp_name'], $uniqueFileName)) {
            
        } else {
            
        }

        $insert = $jobApplicationsTable->insertRecord([
            "full_name" => $fullName,
            "email" => $email,
            "phone" => $phone,
            "refered_by" => $referedBy,
            "position" => $position,
            "year_passing" => $yearPassing,
            "qualification" => $qualification,
            "resume_url" => "https://dinzin.in/careers/".$uniqueFileName
        ]);
        
        $to = "hr@dinzin.in";
        $from = "noreply@dinzin.in";
        //$copyTo = "dinzinp@gmail.com,mallikarjun016.rymec@gmail.com";

        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html;charset=utf-8\r\n";
        $header .= "From: noreply <$from>\r\n";
        //$header .= "Bcc: $copyTo\r\n";
        $header .= "Reply-To: $email\r\n";

        $subject = "Job Application for $position from $fullName";

        $message = "<h1>Applicant's Details</h1>\n";
        $message .= "<p>Position: $position</p>";
        $message .= "<p>Fullname: $fullName</p>";
        $message .= "<p>Email: $email</p>";
        $message .= "<p>Phone: $phone</p>";
        $message .= "<p>Referred By: $referedBy</p>";
        $message .= "<p>Passing Year: $yearPassing</p>";
        $message .= "<p>Resume: <a href='https://dinzin.in/careers/{$uniqueFileName}'>Link to Resume</a></p>";
        $message .= "<br><p>$getParams</p>";

        // Respond with a success message
        if(mail($to, $subject, $message, $header)) {
            
            $resp = [
                "status" => true,
                "message" => "Application submitted successfully!"
            ];
            // echo "Application submitted successfully!";
            echo json_encode($resp);
            return;
        }
        else {
            $resp = [
                "status" => false,
                "message" => "Something went wrong!"
            ];
            // echo "Application submitted successfully!";
            echo json_encode($resp);
            return;
        }
    }
    else {
        $resp = [
            "status" => false,
            "message" => "You have applied to this position already!"
        ];
        
        echo json_encode($resp);
        return;
    }

    
    // echo "Something went wrong!";
    
    return;
} else {
    // If the form is not submitted via POST, handle accordingly
    // echo "Invalid request method!";
}

function getClientIpAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from proxy
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Direct IP address
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ip_address = getClientIpAddress();

// fetch any get params
//$all_get_params = serialize($_GET);
$all_get_params = http_build_query($_GET);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers & Engineering Roles | Dinzin Technology Solutions</title>
    <meta name="keywords" content="AI Engineering Careers, Software Developer Jobs, Tech Jobs Dinzin, AI Solutions Careers, Custom Software Careers">
    <meta name="description" content="Build the future of AI engineering and enterprise digital transformation. Explore career opportunities and engineering roles at Dinzin Technology Solutions Pvt. Ltd.">
    <link rel="canonical" href="https://dinzin.in/careers/">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dinzin.in/careers/">
    <meta property="og:title" content="Careers & Engineering Opportunities | Dinzin Technology Solutions">
    <meta property="og:description" content="Join our engineering team. Explore open roles in AI engineering, custom software development, and digital transformation.">
    <meta property="og:image" content="https://dinzin.in/img/logo.png">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://dinzin.in/careers/">
    <meta name="twitter:title" content="Careers & Engineering Roles | Dinzin Technology Solutions">
    <meta name="twitter:description" content="Join our elite team of AI engineers and software architects at Dinzin Technology Solutions Pvt. Ltd.">
    <meta name="twitter:image" content="https://dinzin.in/img/logo.png">

    <!-- JSON-LD Schema Markup for Careers -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Dinzin Technology Solutions Pvt. Ltd.",
      "url": "https://dinzin.in/careers/",
      "logo": "https://dinzin.in/img/logo.png",
      "description": "Careers and engineering opportunities at Dinzin Technology Solutions Pvt. Ltd."
    }
    </script>

    <!-- Favicons -->
    <link href="../img/favicon.png" rel="icon">
    <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- foundation css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.8.1/dist/css/foundation.min.css">


    <style>
        body .mobile-nav-toggle {
            z-index: 1000 !important;
        }
    </style>

</head>
<body>
    <!--==========================
    Header
    ============================-->
    <header id="header">

    <div id="topbar">
    <div class="container">
        <div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    </div>

    <div class="container">

    <div class="logo float-left">
        <h1 class="text-light">
        <a href="#intro" class="scrollto">
            <img src="../img/logo.png" alt="logo" srcset="">
        </a>
        </h1>
    </div>

    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
        <li><a href="https://dinzin.in/index.html#intro">Home</a></li>
        <li><a href="https://dinzin.in/index.html#about">About Us</a></li>
        <li><a href="https://dinzin.in/index.html#services">Services</a></li>
        <!-- <li><a href="https://dinzin.in/index.html#portfolio">Portfolio</a></li> -->
        <li><a href="https://dinzin.in/careers">Careers</a></li>

        <li><a href="https://dinzin.in/index.html#footer">Contact Us</a></li>
        </ul>
    </nav><!-- .main-nav -->

    </div>
    </header><!-- #header -->

    <section id="intro" class="clearfix">
        <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">


        <?php // if($ip_address != '27.59.42.75'){?>
                <!-- <div>
                    <h1> Under maintenance. Will be back soon. </h1>
                </div> -->
        <?php // exit;}?>


            <h2 style="font-size: xx-large;">Explore <span>Opportunities</span><br> with DinZin</h2>
            <h3>
            Start a <span>career journey</span> at DinZin, where we blend expertise and creativity to redefine the landscape of software solutions. Join us in shaping the future of technology.
            </h3>

            </div>

            <div class="col-md-6 intro-img order-md-last order-first">
            <img src="../img/intro-img.svg" alt="" class="img-fluid">
            </div>
        </div>

        </div>
    </section>

    <main id="main">
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2>Current Openings</h2>
                    </div>
                    

                    <?php foreach($jobOpenings as $job): ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="about-content" style="padding-top: 5px;">
                                <h3><?php echo $job['title']; ?></h3>
                                <h3 style="color: grey; font-size: smaller;"><i class="fa fa-map-marker" style="color: #FF5252;"></i> <?php echo $job['location']; ?></h3>
                                <p>
                                    <?php echo $job['description']; ?>
                                    <br>
                                    <button class="button" data-open="popupContainer" onclick="openPopup('<?php echo $job['id']; ?>')">Apply Now</button>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if(!count($jobOpenings)) { echo "<p>No Openings!</p>"; } ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Apply Now form -->
    <div class="small reveal" id="popupContainer" data-reveal style="z-index: 999;">
        <form id="applicationForm">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-10 cell">
                        <h1>Apply Now</h1>
                    </div>
                    <div class="medium-2 cell">
                        <button class="close-button" data-close aria-label="Close modal" onclick="closePopup()" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="medium-12 cell">
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <select class="" id="position" name="position" required>
                                <option value="">Select Position</option>
                                <?php foreach($jobOpenings as $job): ?>
                                    <option value="<?php echo $job['id']; ?>"><?php echo $job['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fullName">Full Name:</label>
                            <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Full Name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="name@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input class="form-control" class="input-feild" type="tel" id="phone" name="phone" placeholder="Phone number" required>
                        </div>

                        <div class="form-group">
                            <label for="referedBy">Refered By:</label>
                            <input class="form-control" class="input-feild" type="text" id="referedBy" name="referedBy" placeholder="e.g. Job portal name, Google search, etc" required>
                        </div>

                        <div class="form-group">
                            <label for="qualification">Highest Qualification:</label>
                            <input class="form-control" class="input-feild" type="text" id="qualification" name="qualification" placeholder="Your highest qualification" required>
                        </div>

                        <div class="form-group">
                            <label for="yearPassing">Year of Passing:</label>
                            <input class="form-control" class="input-feild" type="text" id="yearPassing" name="yearPassing" placeholder="Your course completion year" required>
                        </div>

                        <input type="hidden" id="get_params" name="get_params" value="'<?=$all_get_params;?>'">

                        <div class="form-group">
                            <label for="resume">Upload Resume:</label>
                            <input class="form-control" type="file" id="resume" name="resume" accept=".pdf, .doc, .docx" required><br>
                        </div>
                        <!-- <button id="applyNow" class="btn btn-primary" type="submit">Submit</button> -->
                        <input id="applyNow" class="button" type="submit" value="Submit" />
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- #end of apply now form -->

    <!-- JavaScript Libraries -->
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery/jquery-migrate.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/mobile-nav/mobile-nav.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../lib/lightbox/js/lightbox.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="../contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="../js/main.js"></script>

    <!-- foundation js -->
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.8.1/dist/js/foundation.min.js"></script>

    <script>
      $(document).foundation();
    </script>

    <script>
        function openPopup(position) {
            // document.getElementById('popupContainer').style.display = 'flex';
            document.getElementById('position').value = position;

        }

        function closePopup() {
            // document.getE0lementById('popupContainer').style.display = 'none';
            document.getElementById("applicationForm").reset();
            // document.getElementById('position').value = "";
        }

        $(document).ready(function () {
            $("#applyNow").click(function (e) {
                e.preventDefault();

                $("#applyNow").prop("disabled", true);
                if (!validateForm()) {
                    alert("Please fill in all fields");
                    $("#applyNow").prop("disabled", false);
                    return;
                }

                var getParams = "<?= htmlspecialchars($all_get_params, ENT_QUOTES, 'UTF-8'); ?>";

                var formData = new FormData(document.getElementById("applicationForm"));

                formData.append("getParams", getParams);

                $.ajax({
                    type: "POST",
                    url: "index.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        const data = JSON.parse(response);
                        //console.log(data);
                        //return;
                        if(data.status) {
                            // closePopup();
                            $(".close-button").click();
                            document.getElementById("applicationForm").reset();
                            alert(data.message);
                        } else {
                            alert(data.message);
                            $("#applyNow").prop("disabled", false);
                        }
                    },
                    error: function (error) {
                        // Handle errors
                        console.log("Error: " + JSON.stringify(error));
                        alert("Error: " + JSON.stringify(error));
                    }
                });
            });
        });

        function validateForm() {
            // Check if all required fields are filled
            var isValid = true;
            $("#applicationForm [required]").each(function () {
                if ($(this).val().trim() === "") {
                    isValid = false;
                    return false; // exit the loop if any required field is empty
                }
            });
            return isValid;
        }
    </script>
    
</body>
</html>
