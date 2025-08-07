<?php
require_once "./server/autoload.php";

use classes\Table;

$portfolioTbl = new Table('portfolio');

 $portfolios= $portfolioTbl->selectAllRecords();
 //print_r($portfolios);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Home | DinZin</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light">
          <a href="#intro" class="scrollto">
            <img src="./img/logo.png" alt="logo" srcset="">
          </a>
        </h1>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li> 
          <li><a href="https://dinzin.in/careers">Careers</a></li>

          <li><a href="#footer">Contact Us</a></li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h2>Rapid Solutions<br>for Your <span>Business!</span></h2>
          <div>
            <a href="#footer" class="btn-get-started scrollto">Contact Us</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="img/intro-img.svg" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section>

  <main id="main">
    <section id="about">

      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="img/about-img.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content">
              <h2>About Us</h2>
              <h3>Welcome to DinZin, where innovation meets excellence in software solutions!</h3>
              <p>Established with a vision to transform the digital landscape, we pride ourselves on delivering cutting-edge software solutions tailored to meet the unique needs of our clients.</p>
              <p>At DinZin, we understand that every business is unique. That's why we tailor our software solutions to meet your specific needs, ensuring seamless integration and optimal performance. Our dedicated team of experts will work closely with you to analyze your requirements, develop a comprehensive strategy, and deliver exceptional results.</p>
              <h2>What We Offer</h2>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Custom Software Development</li>
                <li><i class="ion-android-checkmark-circle"></i> Consultation and Strategy</li>
                <li><i class="ion-android-checkmark-circle"></i> Ongoing Support and Maintenance</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Services</h3>
          <p>Explore a world of tailored solutions designed to meet your unique needs. Let us elevate your business with innovative and reliable services that go beyond expectations.</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fceef3;">

                  <i class="ion-ios-color-filter-outline" style="color: #3fcdc7;"></i>
                </div>
              <!-- <h4 class="title"><a href="">Web Design @ ₹4,999</a></h4> -->
              <h4 class="title"><a href="">Web Design</a></h4>
              <p class="description">Enhance your brand identity with creative and modern web designs. Our design solutions focus on user experience and aesthetics, ensuring your website not only looks great but also offers intuitive navigation and functionality.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fff0da;">
                  <img src="./img/bot.png" alt="chat-bot" style="width: auto; margin-top: -12px; margin-left: -22.7px; height: 60px;">
                </div>
              <!--<h4 class="title"><a href="">Chat Bots @ ₹999</a></h4>-->
              <h4 class="title"><a href="">Chat Bots</a></h4>
              <p class="description">Engage with your customers 24/7 through intelligent chat bots. Our cutting-edge AI technology enables personalized interactions, automates repetitive tasks, and provides instant support, ensuring your business is always accessible and responsive.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;">
                  <img src="./img/dev-icon-15.jpg" alt="dev-icon" style="width: 60px; margin-top: -12px;">
                </div>
              <!--<h4 class="title"><a href="">Website Development @ ₹9,999</a></h4>-->
              <h4 class="title"><a href="">Website Development</a></h4>
              <p class="description">Create a strong online presence with our professional website development services. Our team of skilled designers and developers will bring your vision to life, crafting visually stunning and functional websites that captivate your audience and drive conversions.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    
    <section id="why-us" class="wow fadeIn">
      <div class="container-fluid">

        <header class="section-header">
          <h3>Why choose us?</h3>
          <p>Partner with us to harness the power of innovative software solutions that propel your business forward.</p>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <div class="why-us-img">
              <img src="img/why-us.jpg" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="why-us-content">
              <p>Our mission is clear: to empower businesses with transformative software solutions that elevate their operations, enhance efficiency, and unlock new possibilities. We believe in harnessing the power of technology to solve complex problems and pave the way for sustainable growth.</p>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-diamond" style="color: #f058dc;"></i>
                <h4>Innovation and Creativity</h4>
                <p>We take pride in our ability to think outside the box, fostering a culture of creativity that enables us to develop unique and inventive solutions for our clients.</p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-object-group" style="color: #ffb774;"></i>
                <h4>Client-Centric Approach</h4>
                <p>We believe in building strong, collaborative relationships to truly understand their needs and objectives. By aligning our goals with theirs, we ensure the success of every project and exceed expectations.</p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-language" style="color: #589af1;"></i>
                <h4>Quality Assurance</h4>
                <p>Quality is non-negotiable at DinZin. Our rigorous quality assurance processes guarantee that every line of code meets the highest standards. We strive for excellence in every aspect of our work, from initial concept to final implementation.</p>
              </div>

            </div>

          </div>

        </div>

      </div>

      <!--<div class="container">
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">4</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">4</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,056</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">3</span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>-->
      
    </section>

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            
              <h3 class="cta-title">Transform Your Ideas into Reality with Innovative Software Solutions</h3>
              <p class="cta-text">Are you ready to elevate your business to new heights? Our team at DinZin is here to turn your software dreams into reality. Let us be your technology partner, crafting cutting-edge solutions tailored to your unique needs.</p>

          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle scrollto" href="#footer">Contact Us</a>
          </div>
        </div>

      </div>
    </section>

    <!--==========================
      Portfolio Section
    ============================ -->
    <section id="portfolio" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Portfolio</h3>
        </header>

        <!-- <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->

        <div class="row portfolio-container">

          <?php foreach($portfolios as $p):?>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
              <div class="portfolio-wrap">
                <img src="admin/<?=$p['screenshot'];?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><a href="#"><?=$p['name'];?></a></h4>
                  <p><?=$p['description'];?></p>
                  <div>
                    <!-- <a hrefl="admin/<?=$p['screenshot'];?>" class="link-preview" data-lightbox="portfolio" data-title="Web 2"
                      title="Preview"><i class="ion ion-eye"></i></a> -->
                    <a href="<?=$p['url'];?>" target="_blank" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach;?>

        </div>

      </div>
    </section>
	

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

              <div class="col-sm-6">

                <div class="footer-info">
                  <h3>DinZin</h3>
                  <p>At DinZin, we understand that every business is unique. That's why we tailor our software solutions to meet your specific needs, ensuring seamless integration and optimal performance. Our dedicated team of experts will work closely with you to analyze your requirements, develop a comprehensive strategy, and deliver exceptional results.</p>
                </div>

                <!-- <div class="footer-newsletter">
                  <h4>Our Newsletter</h4>
                  <p>Stay in the loop with our latest updates, industry insights, and exclusive offers. Subscribe today and be a part of our growing community!</p>
                  <form action="" method="post">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                  </form>
                </div> -->

              </div>

              <div class="col-sm-6">
                <div class="footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="legal/terms-and-conditions/">Terms of service</a></li>
                    <li><a href="legal/privacy-policy/">Privacy policy</a></li>
                    <li><a href="legal/refund-policy/">Refund policy</a></li>
                  </ul>
                </div>

                <div class="footer-links">
                  <h4>Contact Us</h4>
                  <p>
                    C/o Shivaraju K N,<br>
                    349, Lohith Nagara,<br>
                    Nelamangala, Nelamangala,<br>
                    Bangalore Rural - 562123, Karnataka<br>
                    <!-- India<br> -->
                    <strong>Phone:</strong> <a href="tel:+918884427588">+91 88844 27588</a><br>
                    <strong>Email:</strong> <a href="mailto:contact@dinzin.in">contact@dinzin.in</a><br>
                  </p>
                </div>

                <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div id="contact-form" class="form">

              <h4>Send us a message</h4>
              <p>Whether you're looking for expert advice or interested in collaborating, we're ready to engage in meaningful conversations. Let's work together to turn your visions into reality!</p>
              <form action="contact.php" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                    data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                    data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required"
                    data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>

                <div class="g-recaptcha" data-sitekey="6LfDEIgqAAAAAGempYY3GqekWvjoz5a8AmacIWON" data-size="normal"></div>
                <br/>
                

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="text-center">
                  <button type="submit" title="Send Message" style="width: 100%;">Send Message</button>
                </div>
              </form>
            </div>

          </div>



        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <!-- Copyright &copy; 2024 <strong>DinZin Technology Solutions Pvt Ltd</strong>. All Rights Reserved -->
        Copyright &copy; 2024 <strong>DINZIN TECHNOLOGY SOLUTIONS PRIVATE LIMITED</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>