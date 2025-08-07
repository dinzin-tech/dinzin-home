<?php

require_once("../../server/autoload.php");

$legalDocTable = new \classes\Table(\classes\Table::LEGAL);

$text = 'terms and conditions';
// $text = 'refund';

$legalDoc = $legalDocTable->selectByCustomQuery("SELECT * FROM {$legalDocTable->getTableName()} WHERE title like '%".$text."%'");

if($legalDoc) {
    $legalDoc = $legalDoc[0];
    $title = $legalDoc['title'];
}

if(!$title) {
    die("invalid address");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> | DinZin</title>
    <!-- Favicons -->
    <link href="../../img/favicon.png" rel="icon">
    <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- foundation css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.8.1/dist/css/foundation.min.css">


    <style>
        body .mobile-nav-toggle {
            z-index: 1000 !important;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }

        .logo img {
            padding: 0;
            margin: -20px 0;
            max-height: 74px;
        }

        #header1 {
            margin-top: 10px;
        }
    </style>

</head>
<body>
    <!--==========================
    Header
    ============================-->
    <header id="header1">

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
                <!-- Uncomment below if you prefer to use an image logo -->
                <h1 class="text-light">
                    <a href="https://dinzin.in">
                        <!-- <span>Rapid</span> -->
                        <img src="../../img/logo.png" alt="logo" srcset="">
                    </a>
                </h1>
                <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
            </div>
        </div>
    </header>

    <br>
    <br>
    <main id="main">
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-8">
                                <h2><?=$title?></h2>
                            </div>

                            <div class="col-lg-4">
                                <button class="btn btn-secondary float-right print-btn" onclick="printDocument()">Print</button>
                            </div>
                        </div>

                        <div class="content">
                            <?=$legalDoc['content']?>
                        </div>

                        <div>
                            <p><b>Last updated:</b> <?php $date = new DateTime($legalDoc['updated']); echo date("d F Y", strtotime($date->format("Y-m-d")))?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JavaScript Libraries -->
    <script src="../../lib/jquery/jquery.min.js"></script>
    <script src="../../lib/jquery/jquery-migrate.min.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/easing/easing.min.js"></script>
    <script src="../../lib/mobile-nav/mobile-nav.js"></script>
    <script src="../../lib/wow/wow.min.js"></script>
    <script src="../../lib/waypoints/waypoints.min.js"></script>
    <script src="../../lib/counterup/counterup.min.js"></script>
    <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../../lib/lightbox/js/lightbox.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="../../contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="../../js/main.js"></script>

    <!-- foundation js -->
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.8.1/dist/js/foundation.min.js"></script>

    <script>
      $(document).foundation();

      function printDocument() {
        window.print();
      }
    </script>
    
</body>
</html>