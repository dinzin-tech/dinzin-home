<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Learn at DinZin - Full Stack Development Course - Launching Soon</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="author" content="SoonLaunch">
		<link rel="shortcut icon" type="image/x-icon" href="https://dinzin.in/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- ========================= CSS here ========================= -->
		<link rel="stylesheet" href="assets/css/bootstrap-4.5.0.min.css">
        <link rel="stylesheet" href="assets/css/lineicons.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- ========================= main start ========================= -->
        <main class="main-03">
            <!-- shapes start  -->
            <div class="shape shape-1"></div>
            <img src="assets/img/shape-1.svg" alt="" class="shape shape-3">
            <img src="assets/img/shape-2.svg" alt="" class="shape shape-4">
            <img src="assets/img/shape-3.svg" alt="" class="shape shape-5">
            <img src="assets/img/shape-4.svg" alt="" class="shape shape-6">
            <img src="assets/img/shape-5.svg" alt="" class="shape shape-7">
            <img src="assets/img/shape-6.svg" alt="" class="shape shape-8">
            <img src="assets/img/shape-7.svg" alt="" class="shape shape-9">
            <img src="assets/img/shape-8.svg" alt="" class="shape shape-10">
            <img src="assets/img/shape-9.svg" alt="" class="shape shape-11">
            <img src="assets/img/shape-10.svg" alt="" class="shape shape-12">
            <img src="assets/img/shape-11.svg" alt="" class="shape shape-13">
            <!-- shapes end  -->
            <!-- header start  -->
            <div class="header header-03">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <a href="https://dinzin.in" class="logo"> <img src="https://dinzin.in/img/logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header end  -->
            <!-- ========================= main-wrapper start ========================= -->
            <div class="main-wrapper demo-03">
                <div class="shape shape-2"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <!-- content-wrapper start  -->
                            <div class="content-wrapper">
                                <h1 class="wow fadeInUp" data-wow-delay=".2s">We are <br> Launching soon . . .</h1>
                                <p class="wow fadeInLeft" data-wow-delay=".4s">
                                    <b>Unlock the Full Stack Web Development Course for Free!</b><br>
                                    Sign up with your email now to get early access to this limited-time offer!
                                </p>
        
                                <div class="wow fadeInRight" data-wow-delay=".6s" data-countdown="2024/08/08 15:30"></div>
                                <!-- countdown end  -->
                                <!-- subscribe-form start  -->
                                <form
                                    action=""
                                    method="post" name="subscribe-form"
                                    class="subscribe-form subscribe-form-1 validate wow fadeInUp" data-wow-delay=".7s"
                                    target="_blank" novalidate>
                                    <input type="hidden" name="source" value="course_launching_soon">
                                    <input type="email" placeholder="Enter you mail address " name="EMAIL"
                                        id="mce-EMAIL" class="required email">
                                    <i class="lni lni-envelope"></i>

                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input
                                            type="text" name="b_4dbefd9d3a1d6a570020b1e85_e16d098ae8" tabindex="-1"
                                            value=""></div>

                                    <button id="subscribe" class="sub_btn common-btn">Sign Up for Update</button>
                                    <a href="https://dinzin.in/">About Us <i class="lni lni-chevron-right"></i></a>
                                </form>
                                <!-- subscribe-form end  -->
                            </div>
                            <!-- content-wrapper end  -->
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <!-- img-wrapper start  -->
                            <div class="img-wrapper wow fadeInRight" data-wow-delay=".5s">
                                <img src="assets/img/img-1.png" alt="">
                            </div>
                            <!-- img-wrapper end  -->
                        </div>
                    </div> <!-- end row  -->
                </div> <!-- end container  -->
            </div>
            <!-- ========================= main-wrapper end ========================= -->
            <p class="text-center">Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</p>
        </main>
        <!-- ========================= main end ========================= -->
        
		<!-- ========================= JS here ========================= -->
		<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap-4.5.0.min.js"></script>
        <script src="assets/js/countdown.js"></script>
        <script src="assets/js/wow.min.js"></script>
		<script src="assets/js/main.js"></script>
        <script>
            $(document).ready(function() {

                let gotodashboard =  <?php  echo $dashboard; ?>;
                console.log(gotodashboard);
                if(gotodashboard) {
                    window.location.href = 'https://learn.dinzin.in/dashboard';
                }

                $('.subscribe-form').on('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    var formData = $(this).serialize(); // Serialize the form data

                    $.ajax({
                        type: 'POST',
                        url: 'subscribe.php',
                        data: formData,
                        dataType: 'json', // Expect a JSON response
                        success: function(response) {
                            if (response.success) {
                                // Hide the form if the response indicates success
                                $('.subscribe-form').hide();
                                // $('#mce-success-response').show().html('Subscription successful!');
                                alert("Thank you for signing up! You will receive an email soon!");
                            } else {
                                // Show the error message if the response indicates failure
                                $('#mce-error-response').show().html('Subscription failed. Please try again.');
                            }
                        },
                        error: function() {
                            // Show a generic error message if the AJAX request fails
                            $('#mce-error-response').show().html('An error occurred. Please try again.');
                        }
                    });
                });
            });

        </script>
    </body>
</html>
