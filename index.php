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
  <title>Dinzin Technology Solutions | AI Engineering & Digital Transformation Company</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="AI Engineering Company, Digital Transformation Company, Custom Software Development, Business Automation, Enterprise Software Development, AI Solutions" name="keywords">
  <meta content="Dinzin Technology Solutions Pvt. Ltd. is an AI Engineering & Digital Transformation company. We build custom software, integrate enterprise AI solutions, and automate business processes for startups, SMEs, and global enterprises." name="description">
  <link rel="canonical" href="https://dinzin.in/">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://dinzin.in/">
  <meta property="og:title" content="Dinzin Technology Solutions | Enterprise AI Engineering & Digital Transformation">
  <meta property="og:description" content="Transform your enterprise with AI solutions, custom software engineering, and intelligent business process automation from Dinzin Technology Solutions Pvt. Ltd.">
  <meta property="og:image" content="https://dinzin.in/img/logo.png">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="https://dinzin.in/">
  <meta name="twitter:title" content="Dinzin Technology Solutions | AI Engineering & Digital Transformation">
  <meta name="twitter:description" content="Build intelligent software, automate business operations, and accelerate digital transformation with Dinzin Technology Solutions Pvt. Ltd.">
  <meta name="twitter:image" content="https://dinzin.in/img/logo.png">

  <!-- JSON-LD Structured Data Schema Markup -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Dinzin Technology Solutions Pvt. Ltd.",
    "url": "https://dinzin.in",
    "logo": "https://dinzin.in/img/logo.png",
    "description": "Dinzin Technology Solutions Pvt. Ltd. is an AI Engineering & Digital Transformation company that helps startups, SMEs, and enterprises build intelligent software, automate business operations, integrate AI, and create scalable digital products.",
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+91-8884427588",
      "contactType": "customer service",
      "email": "contact@dinzin.in",
      "areaServed": "IN",
      "availableLanguage": "English"
    },
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "C/o Shivaraju K N, 349, Lohith Nagara, Nelamangala",
      "addressLocality": "Nelamangala, Bangalore Rural",
      "addressRegion": "Karnataka",
      "postalCode": "562123",
      "addressCountry": "IN"
    },
    "sameAs": [
      "https://twitter.com/dinzintech",
      "https://facebook.com/dinzintech",
      "https://linkedin.com/company/dinzintech"
    ],
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "AI Engineering & Digital Transformation Services",
      "itemListElement": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "AI Solutions & Neural Automation",
            "description": "Custom AI assistants, intelligent automation, and AI-powered business workflows."
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Custom Software Development",
            "description": "Scalable web applications, enterprise software, ERP, CRM, and SaaS platforms."
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Business Automation",
            "description": "Automate repetitive processes to improve productivity and operational efficiency."
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Digital Transformation Advisory",
            "description": "Modernize business operations through intelligent digital solutions and enterprise integration."
          }
        }
      ]
    }
  }
  </script>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700&display=swap"
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
          <a href="#" class="twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
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
          <li class="active"><a href="./">Home</a></li>
          <li><a href="solutions/">Solutions</a></li>
          <li><a href="products/">Products</a></li>
          <li><a href="industries/">Industries</a></li>
          <li><a href="about/">About</a></li>
          <li><a href="insights/">Insights</a></li>
          <li><a href="contact/" class="nav-cta">Contact</a></li>
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
          <h2>We Build <span>AI-Powered Software</span> That Transforms Businesses</h2>
          <p style="color: #55518a; font-size: 16px; margin-bottom: 30px; line-height: 1.6;">We help startups, SMEs, and enterprises automate operations, build custom software, and accelerate digital transformation using AI and modern engineering.</p>
          <div>
            <a href="#footer" class="btn-get-started scrollto">Book a Strategy Call</a>
            <a href="#services" class="btn-services scrollto" style="margin-left: 10px; background: #fff; color: #1bb1dc; border: 2px solid #1bb1dc;">Explore Our Solutions</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="img/intro-img.svg" alt="Dinzin AI Engineering & Digital Transformation Solutions" class="img-fluid" loading="eager" decoding="async">
        </div>
      </div>

    </div>
  </section>

  <main id="main">
    <section id="about" style="padding: 70px 0;">

      <div class="container">

        <!-- About Intro Header -->
        <div class="row align-items-center" style="margin-bottom: 50px;">
          <div class="col-lg-6">
            <div class="about-img wow fadeInLeft">
              <img src="img/about-img.jpg" alt="Dinzin AI Engineering" class="img-fluid" style="border-radius: 16px; box-shadow: 0 15px 35px rgba(0,0,0,0.08);">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="about-content wow fadeInRight" style="padding-left: 15px;">
              <span style="background: rgba(27, 177, 220, 0.1); color: #1bb1dc; padding: 6px 16px; border-radius: 50px; font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; display: inline-block;">About Dinzin</span>
              <h2 style="font-size: 32px; font-weight: 700; color: #283d50; margin-bottom: 20px;">Architecting the Future of Enterprise AI & Software Systems</h2>
              <p style="font-size: 15px; color: #556877; line-height: 1.8; margin-bottom: 15px;">Dinzin Technology Solutions Pvt. Ltd. is a premier AI Engineering & Digital Transformation company. We empower startups, SMEs, and global enterprises to build intelligent software platforms, automate complex operations, and accelerate digital evolution.</p>
              <p style="font-size: 15px; color: #556877; line-height: 1.8; margin-bottom: 0;">We combine deep domain expertise with cutting-edge artificial intelligence to engineer mission-critical systems designed for high throughput, robust security, and long-term scalability.</p>
            </div>
          </div>
        </div>

        <!-- Mission & Vision Cards -->
        <div class="row" style="margin-bottom: 40px;">
          <div class="col-lg-6 wow fadeInUp" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div style="background: #f9fbfd; border-radius: 16px; padding: 35px; border: 1px solid #eef2f6; height: 100%;">
              <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(27, 177, 220, 0.15); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                <i class="fa fa-bullseye" style="color: #1bb1dc; font-size: 24px;"></i>
              </div>
              <h3 style="font-size: 22px; font-weight: 700; color: #283d50; margin-bottom: 12px;">Our Mission</h3>
              <p style="font-size: 14px; color: #556877; line-height: 1.7; margin-bottom: 0;">To empower organizations with transformational AI engineering, custom software platforms, and intelligent automation that drive operational efficiency, strategic agility, and sustainable enterprise value.</p>
            </div>
          </div>

          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div style="background: #f9fbfd; border-radius: 16px; padding: 35px; border: 1px solid #eef2f6; height: 100%;">
              <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(255, 183, 116, 0.2); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                <i class="fa fa-eye" style="color: #e98e06; font-size: 24px;"></i>
              </div>
              <h3 style="font-size: 22px; font-weight: 700; color: #283d50; margin-bottom: 12px;">Our Vision</h3>
              <p style="font-size: 14px; color: #556877; line-height: 1.7; margin-bottom: 0;">To be the global benchmark for enterprise AI integration and digital transformation, setting the standard for intelligent, resilient, and future-ready software architectures.</p>
            </div>
          </div>
        </div>

        <!-- Engineering Philosophy & Core Values Grid -->
        <div class="row">
          
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div style="background: #ffffff; border-radius: 16px; padding: 30px; border: 1px solid #f0f4f8; box-shadow: 0 10px 25px rgba(0,0,0,0.04); height: 100%;">
              <i class="fa fa-code" style="color: #1bb1dc; font-size: 28px; margin-bottom: 15px; display: block;"></i>
              <h4 style="font-size: 18px; font-weight: 700; color: #283d50; margin-bottom: 10px;">Engineering Philosophy</h4>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 0;">We build AI capabilities into software architectures from day one. Every system is modular, secure, and engineered for high availability and zero downtime.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div style="background: #ffffff; border-radius: 16px; padding: 30px; border: 1px solid #f0f4f8; box-shadow: 0 10px 25px rgba(0,0,0,0.04); height: 100%;">
              <i class="fa fa-lightbulb-o" style="color: #e98e06; font-size: 28px; margin-bottom: 15px; display: block;"></i>
              <h4 style="font-size: 18px; font-weight: 700; color: #283d50; margin-bottom: 10px;">Innovation Engine</h4>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 0;">Pioneering state-of-the-art machine learning pipelines, LLM agent workflows, and seamless system integrations that keep enterprise clients ahead of market shifts.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div style="background: #ffffff; border-radius: 16px; padding: 30px; border: 1px solid #f0f4f8; box-shadow: 0 10px 25px rgba(0,0,0,0.04); height: 100%;">
              <i class="fa fa-trophy" style="color: #41cf2e; font-size: 28px; margin-bottom: 15px; display: block;"></i>
              <h4 style="font-size: 18px; font-weight: 700; color: #283d50; margin-bottom: 10px;">Customer Success</h4>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 0;">We measure success by tangible business outcomes, operational performance gains, and long-term strategic technology partnership.</p>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div style="background: #ffffff; border-radius: 16px; padding: 30px; border: 1px solid #f0f4f8; box-shadow: 0 10px 25px rgba(0,0,0,0.04); height: 100%;">
              <i class="fa fa-diamond" style="color: #8a2be2; font-size: 28px; margin-bottom: 15px; display: block;"></i>
              <h4 style="font-size: 18px; font-weight: 700; color: #283d50; margin-bottom: 10px;">Core Values</h4>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 0;">Uncompromising integrity, technical mastery, enterprise security, and continuous value creation form the backbone of our organizational culture.</p>
            </div>
          </div>

          <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div style="background: #ffffff; border-radius: 16px; padding: 30px; border: 1px solid #f0f4f8; box-shadow: 0 10px 25px rgba(0,0,0,0.04); height: 100%;">
              <i class="fa fa-users" style="color: #ff689b; font-size: 28px; margin-bottom: 15px; display: block;"></i>
              <h4 style="font-size: 18px; font-weight: 700; color: #283d50; margin-bottom: 10px;">Technical Leadership</h4>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 0;">Led by senior software architects and AI engineering practitioners committed to guiding enterprises through end-to-end digital evolution.</p>
            </div>
          </div>

        </div>

      </div>

    </section>

    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Solutions We Engineer</h3>
          <p>Empowering enterprises with intelligent software, advanced AI integration, and end-to-end digital transformation.</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fceef3;">
                  <i class="fa fa-cogs" style="color: #ff689b; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">AI Solutions</a></h4>
              <p class="description">Custom AI assistants, intelligent automation, and AI-powered business workflows.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fff0da;">
                  <i class="fa fa-laptop" style="color: #e98e06; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Custom Software Development</a></h4>
              <p class="description">Scalable web applications, enterprise software, ERP, CRM, SaaS platforms.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;">
                  <i class="fa fa-retweet" style="color: #3fcdc7; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Business Automation</a></h4>
              <p class="description">Automate repetitive processes to improve productivity and operational efficiency.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #eafde7;">
                  <i class="fa fa-cloud" style="color: #41cf2e; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Cloud & System Integration</a></h4>
              <p class="description">Integrate ERP, CRM, Payment Systems, APIs, WhatsApp, and third-party platforms.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e1eeff;">
                  <i class="fa fa-rocket" style="color: #2282ff; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Digital Transformation</a></h4>
              <p class="description">Modernize business operations through intelligent digital solutions.</p>
            </div>
          </div>

        </div>

      </div>
      </div>
    </section>
    
    <section id="products" style="padding: 60px 0; background: #f5f8fd;">
      <div class="container">
        <header class="section-header">
          <h3>Products Built by Dinzin</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="product-card wow fadeInUp" style="background: #fff; border-radius: 24px; padding: 50px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); display: flex; align-items: center; border: 1px solid rgba(0,0,0,0.02); overflow: hidden; position: relative;">
              <!-- Decorative background element -->
              <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: linear-gradient(135deg, #1bb1dc 0%, #0a98c0 100%); border-radius: 50%; opacity: 0.05;"></div>
              
              <div class="product-content" style="flex: 1; position: relative; z-index: 2;">
                <span style="background: rgba(27, 177, 220, 0.1); color: #1bb1dc; padding: 6px 16px; border-radius: 50px; font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; display: inline-block;">AI WhatsApp CRM & Marketing Automation Platform</span>
                <div style="margin-bottom: 20px;">
                  <img src="img/whatypie-logo.png" alt="WhatyPie Logo" style="max-height: 55px; max-width: 220px; object-fit: contain; display: block;">
                </div>
                <p style="font-size: 16px; color: #556877; line-height: 1.8; margin-bottom: 35px; max-width: 500px;">Turn WhatsApp into your 24/7 sales and customer engagement platform with AI-powered automation, shared team inbox, chatbot builder, marketing campaigns, and CRM.</p>
                <a href="https://whatypie.in" target="_blank" class="btn-product-cta">Explore WhatyPie <i class="fa fa-arrow-right" style="margin-left: 5px;"></i></a>
              </div>
              
              <div class="product-visual d-none d-md-block" style="flex: 0.8; text-align: center; position: relative; z-index: 2;">
                <div style="background: linear-gradient(135deg, #075e54 0%, #128c7e 100%); border-radius: 24px; padding: 35px 30px; color: #fff; box-shadow: 0 15px 35px rgba(18, 140, 126, 0.25); text-align: left; transform: perspective(1000px) rotateY(-5deg);">
                  <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #25d366; margin-bottom: 10px;">
                    <i class="fa fa-whatsapp" style="font-size: 18px; margin-right: 8px;"></i> Enterprise Conversational AI
                  </div>
                  <div style="font-size: 17px; font-weight: 700; margin-bottom: 15px; line-height: 1.4;">24/7 AI Sales & Marketing Automation</div>
                  <div style="font-size: 13px; opacity: 0.95; line-height: 1.8;">
                    <i class="fa fa-check" style="color: #25d366; margin-right: 8px;"></i> Shared Team Inbox<br>
                    <i class="fa fa-check" style="color: #25d366; margin-right: 8px;"></i> No-Code Chatbot Builder<br>
                    <i class="fa fa-check" style="color: #25d366; margin-right: 8px;"></i> Broadcast Marketing Campaigns<br>
                    <i class="fa fa-check" style="color: #25d366; margin-right: 8px;"></i> Seamless CRM Integration
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section id="why-us" class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Why Businesses Choose Dinzin</h3>
          <p>We deliver mission-critical software built with forward-thinking AI capabilities and enterprise precision.</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-duration="1.4s">
            <div class="why-us-card">
              <div class="icon-box" style="background: rgba(27, 177, 220, 0.1);">
                <i class="fa fa-magic" style="color: #1bb1dc; font-size: 28px;"></i>
              </div>
              <h4>AI-First Engineering</h4>
              <p>Every solution is designed with AI capabilities from day one.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-duration="1.4s">
            <div class="why-us-card">
              <div class="icon-box" style="background: rgba(255, 183, 116, 0.15);">
                <i class="fa fa-cubes" style="color: #ffb774; font-size: 28px;"></i>
              </div>
              <h4>Custom Built</h4>
              <p>Every solution is engineered specifically for the business.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="why-us-card">
              <div class="icon-box" style="background: rgba(65, 207, 46, 0.15);">
                <i class="fa fa-server" style="color: #41cf2e; font-size: 28px;"></i>
              </div>
              <h4>Scalable Architecture</h4>
              <p>Built for long-term growth and enterprise reliability.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="why-us-card">
              <div class="icon-box" style="background: rgba(138, 43, 226, 0.15);">
                <i class="fa fa-handshake-o" style="color: #8a2be2; font-size: 28px;"></i>
              </div>
              <h4>Long-Term Technology Partner</h4>
              <p>From strategy to support, we work as your technology partner.</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!--==========================
      Industries Section
    ============================-->
    <section id="industries" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Industries We Transform</h3>
          <p>Delivering tailored AI solutions and digital transformation across high-growth enterprise verticals.</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fceef3;">
                <i class="fa fa-building-o" style="color: #ff689b; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Real Estate</a></h4>
              <p class="description">Automate lead qualification, property matching, virtual inquiries, and tenant management with AI-driven engagement platforms.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fff0da;">
                <i class="fa fa-heartbeat" style="color: #e98e06; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Healthcare</a></h4>
              <p class="description">Streamline patient scheduling, automated triage, secure patient communication channels, and AI-assisted clinical workflows.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;">
                <i class="fa fa-graduation-cap" style="color: #3fcdc7; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Education</a></h4>
              <p class="description">Deploy intelligent student admission bots, personalized learning engines, automated enrollment, and scalable EdTech portals.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #eafde7;">
                <i class="fa fa-industry" style="color: #41cf2e; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Manufacturing</a></h4>
              <p class="description">Optimize supply chain tracking, predictive maintenance alerts, inventory process automation, and smart ERP system integrations.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e1eeff;">
                <i class="fa fa-shopping-cart" style="color: #2282ff; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Retail & Ecommerce</a></h4>
              <p class="description">Drive conversational commerce, automated order tracking, personalized AI product recommendations, and omni-channel customer support.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #ece6ff;">
                <i class="fa fa-line-chart" style="color: #8a2be2; font-size: 32px; padding-top: 15px;"></i>
              </div>
              <h4 class="title"><a href="">Finance</a></h4>
              <p class="description">Automate loan qualification, risk assessment workflows, secure payment integrations, and intelligent fraud detection tools.</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!--==========================
      How We Work Section
    ============================-->
    <section id="how-we-work" style="padding: 70px 0; background: #ffffff;">
      <div class="container">

        <header class="section-header">
          <h3>How We Work</h3>
          <p>Our proven, end-to-end engineering process designed to deliver scalable digital solutions.</p>
        </header>

        <div class="row process-row justify-content-center">

          <div class="col-lg-2 col-md-4 col-sm-6 text-center process-step wow fadeInUp" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div class="step-card">
              <span class="step-num">01</span>
              <h4>Discover</h4>
              <p>Deep dive into your business requirements and technical goals.</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 text-center process-step wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div class="step-card">
              <span class="step-num">02</span>
              <h4>Strategize</h4>
              <p>Formulate a tailored AI and software architecture roadmap.</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 text-center process-step wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div class="step-card">
              <span class="step-num">03</span>
              <h4>Design</h4>
              <p>Architect scalable system blueprints and user experiences.</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 text-center process-step wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div class="step-card">
              <span class="step-num">04</span>
              <h4>Engineer</h4>
              <p>Develop robust, secure, AI-powered software solutions.</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 text-center process-step wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div class="step-card">
              <span class="step-num">05</span>
              <h4>Deploy</h4>
              <p>Seamless production deployment with zero system downtime.</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-6 text-center process-step wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.2s" style="margin-bottom: 20px;">
            <div class="step-card">
              <span class="step-num">06</span>
              <h4>Optimize</h4>
              <p>Monitor performance and continuously enhance functionality.</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            
              <h3 class="cta-title">Accelerate Your Digital Transformation with AI Engineering</h3>
              <p class="cta-text">Ready to build intelligent software and automate your core business operations? Partner with Dinzin Technology Solutions Pvt. Ltd. to engineer scalable digital products that drive measurable impact.</p>

          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle scrollto" href="#footer">Contact Us</a>
          </div>
        </div>

      </div>
    </section>

    <!--==========================
      Clients Section (Trusted By)
    ============================-->
    <section id="clients" class="wow fadeInUp" style="padding: 60px 0; background: #ffffff;">
      <div class="container">

        <header class="section-header">
          <h3>Trusted By Industry Leaders</h3>
          <p>Partnering with ambitious startups, SMEs, and enterprise leaders to deliver AI engineering and digital transformation.</p>
        </header>

        <div class="owl-carousel clients-carousel">
          <img src="img/clients/abhaya-logo.png" alt="Abhaya Group">
          <img src="img/clients/skybound-logo.png" alt="Skybound">
          <img src="img/clients/trilok-logo.jpg" alt="Trilok">
          <img src="img/clients/vishvam-logo.png" alt="Vishvam">
          <img src="img/clients/yadav-logo.png" alt="Yadav Enterprise">
        </div>

      </div>
    </section>

    <!--==========================
      Success Stories & Case Studies
    ============================ -->
    <section id="portfolio" class="section-bg" style="padding: 70px 0;">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Detailed Success Stories</h3>
          <p>Explore how our AI engineering and custom software architectures drive measurable operational impact and business growth.</p>
        </header>

        <div class="row">

          <!-- Case Study 1: WhatyPie -->
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div class="case-study-card">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <span class="case-badge" style="background: rgba(27, 177, 220, 0.1); color: #1bb1dc; margin-bottom: 0;">Conversational AI SaaS</span>
                <span style="font-size: 12px; font-weight: 700; color: #1bb1dc; background: rgba(27, 177, 220, 0.08); padding: 4px 10px; border-radius: 4px;">10x Conversion</span>
              </div>
              <h4 style="font-size: 22px; font-weight: 700; color: #283d50; margin-bottom: 6px;">WhatyPie Platform</h4>
              <span class="case-subtitle" style="font-size: 13px; font-weight: 600; color: #1bb1dc; margin-bottom: 15px; display: block;">AI WhatsApp CRM & Automation Engine</span>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 20px;">Engineered a multi-tenant SaaS platform enabling companies to transform WhatsApp into an automated sales and customer engagement engine with AI chatbots, shared team inboxes, and CRM sync.</p>
              
              <div style="border-top: 1px solid #f0f4f8; padding-top: 15px; margin-top: auto;">
                <div style="font-size: 13px; color: #283d50; font-weight: 600; margin-bottom: 12px;">
                  <i class="fa fa-check-circle" style="color: #1bb1dc; margin-right: 6px;"></i> 100k+ Automated Messages Handled Daily<br>
                  <i class="fa fa-check-circle" style="color: #1bb1dc; margin-right: 6px;"></i> Zero-Latency Chatbot Response Architecture
                </div>
                <a href="https://whatypie.in" target="_blank" class="btn-case-study">Explore WhatyPie <i class="fa fa-arrow-right" style="margin-left: 6px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Case Study 2: Abhaya Vastra -->
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div class="case-study-card">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <span class="case-badge" style="background: rgba(240, 88, 220, 0.15); color: #f058dc; margin-bottom: 0;">Retail & E-Commerce</span>
                <span style="font-size: 12px; font-weight: 700; color: #f058dc; background: rgba(240, 88, 220, 0.1); padding: 4px 10px; border-radius: 4px;">3.5x Sales Growth</span>
              </div>
              <h4 style="font-size: 22px; font-weight: 700; color: #283d50; margin-bottom: 6px;">Abhaya Vastra</h4>
              <span class="case-subtitle" style="font-size: 13px; font-weight: 600; color: #f058dc; margin-bottom: 15px; display: block;">AI Omni-Channel Retail & WhatsApp Sales Engine</span>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 20px;">Engineered an intelligent automated retail platform and WhatsApp AI sales agent for Abhaya Vastra, driving automated catalog discovery, real-time inventory sync, and instant customer order fulfillment.</p>
              
              <div style="border-top: 1px solid #f0f4f8; padding-top: 15px; margin-top: auto;">
                <div style="font-size: 13px; color: #283d50; font-weight: 600; margin-bottom: 12px;">
                  <i class="fa fa-check-circle" style="color: #f058dc; margin-right: 6px;"></i> Automated Product Catalog & Instant Ordering<br>
                  <i class="fa fa-check-circle" style="color: #f058dc; margin-right: 6px;"></i> Real-Time Inventory & WhatsApp Sync
                </div>
                <a href="insights/abhaya-vastra/" class="btn-case-study" style="border-color: #f058dc; color: #f058dc !important;">Read Case Details <i class="fa fa-arrow-right" style="margin-left: 6px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Case Study 3: Trilok Construction -->
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div class="case-study-card">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <span class="case-badge" style="background: rgba(255, 183, 116, 0.15); color: #e98e06; margin-bottom: 0;">Real Estate & Construction</span>
                <span style="font-size: 12px; font-weight: 700; color: #e98e06; background: rgba(255, 183, 116, 0.12); padding: 4px 10px; border-radius: 4px;">4x Faster Inquiry Triage</span>
              </div>
              <h4 style="font-size: 22px; font-weight: 700; color: #283d50; margin-bottom: 6px;">Trilok Construction</h4>
              <span class="case-subtitle" style="font-size: 13px; font-weight: 600; color: #e98e06; margin-bottom: 15px; display: block;">Lead Capture & Project Progress Automation</span>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 20px;">Implemented an automated lead capture, inquiry triage, and client communication platform for Trilok Construction, streamlining site-visit scheduling, inquiry routing, and client milestone updates.</p>
              
              <div style="border-top: 1px solid #f0f4f8; padding-top: 15px; margin-top: auto;">
                <div style="font-size: 13px; color: #283d50; font-weight: 600; margin-bottom: 12px;">
                  <i class="fa fa-check-circle" style="color: #e98e06; margin-right: 6px;"></i> Automated Site-Visit Scheduling & Lead Routing<br>
                  <i class="fa fa-check-circle" style="color: #e98e06; margin-right: 6px;"></i> Real-Time Milestone Notification System
                </div>
                <a href="insights/trilok-construction/" class="btn-case-study" style="border-color: #e98e06; color: #e98e06 !important;">Read Case Details <i class="fa fa-arrow-right" style="margin-left: 6px;"></i></a>
              </div>
            </div>
          </div>

          <!-- Case Study 4: Multi-System Integration Hub -->
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.2s" style="margin-bottom: 30px;">
            <div class="case-study-card">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <span class="case-badge" style="background: rgba(65, 207, 46, 0.15); color: #41cf2e; margin-bottom: 0;">Enterprise Solution</span>
                <span style="font-size: 12px; font-weight: 700; color: #41cf2e; background: rgba(65, 207, 46, 0.12); padding: 4px 10px; border-radius: 4px;">85% Faster Sync</span>
              </div>
              <h4 style="font-size: 22px; font-weight: 700; color: #283d50; margin-bottom: 6px;">Multi-System Integration Hub</h4>
              <span class="case-subtitle" style="font-size: 13px; font-weight: 600; color: #41cf2e; margin-bottom: 15px; display: block;">Custom Enterprise Architecture</span>
              <p style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 20px;">Architected an enterprise integration platform linking legacy ERP databases, cloud CRMs, payment gateways, and real-time operational analytics for multi-location enterprises.</p>
              
              <div style="border-top: 1px solid #f0f4f8; padding-top: 15px; margin-top: auto;">
                <div style="font-size: 13px; color: #283d50; font-weight: 600; margin-bottom: 12px;">
                  <i class="fa fa-check-circle" style="color: #41cf2e; margin-right: 6px;"></i> Unified Real-Time Operational Dashboard<br>
                  <i class="fa fa-check-circle" style="color: #41cf2e; margin-right: 6px;"></i> Enterprise End-to-End Encryption
                </div>
                <a href="insights/multi-system-integration/" class="btn-case-study" style="border-color: #41cf2e; color: #41cf2e !important;">Read Case Details <i class="fa fa-arrow-right" style="margin-left: 6px;"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
	

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top" style="padding-bottom: 30px;">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="footer-info" style="margin-bottom: 25px;">
              <h3 style="font-size: 24px; font-weight: 700; color: #283d50; margin-bottom: 15px;">Dinzin Technology Solutions</h3>
              <p style="font-size: 14px; color: #556877; line-height: 1.7; margin-bottom: 20px;">Dinzin Technology Solutions Pvt. Ltd. is an AI Engineering & Digital Transformation company helping startups, SMEs, and enterprises build intelligent software, automate business operations, integrate AI, and create scalable digital products.</p>
            </div>

            <div class="footer-contact" style="font-size: 14px; color: #556877; line-height: 1.6; margin-bottom: 25px;">
              <p>
                <strong>Registered Address:</strong><br>
                C/o Shivaraju K N, 349, Lohith Nagara, Nelamangala,<br>
                Bangalore Rural - 562123, Karnataka, India<br>
                <strong>Phone:</strong> <a href="tel:+918884427588" style="color: #1bb1dc;">+91 88844 27588</a><br>
                <strong>Email:</strong> <a href="mailto:contact@dinzin.in" style="color: #1bb1dc;">contact@dinzin.in</a>
              </p>
            </div>

            <div class="social-links" style="margin-bottom: 30px;">
              <a href="#" class="twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="linkedin" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-6">

            <div id="contact-form" class="form">

              <h4>Initiate an Enterprise Inquiry</h4>
              <p>Connect with our engineering leaders to discuss your AI integration, custom software, or digital transformation roadmap.</p>
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
                  <textarea class="form-control" name="message" rows="4" data-rule="required"
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

        <!-- 4-Column Footer Navigation -->
        <div class="row footer-links-row" style="margin-top: 40px; padding-top: 40px; border-top: 1px solid #eef2f6;">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 style="font-size: 16px; font-weight: 700; color: #283d50; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 18px;">Company</h4>
            <ul style="list-style: none; padding: 0; margin: 0;">
              <li style="padding: 6px 0;"><a href="about/" style="color: #556877; transition: 0.3s;">About</a></li>
              <li style="padding: 6px 0;"><a href="https://dinzin.in/careers" target="_blank" style="color: #556877; transition: 0.3s;">Careers</a></li>
              <li style="padding: 6px 0;"><a href="contact/" style="color: #556877; transition: 0.3s;">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 style="font-size: 16px; font-weight: 700; color: #283d50; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 18px;">Solutions</h4>
            <ul style="list-style: none; padding: 0; margin: 0;">
              <li style="padding: 6px 0;"><a href="solutions/" style="color: #556877; transition: 0.3s;">AI Solutions</a></li>
              <li style="padding: 6px 0;"><a href="solutions/" style="color: #556877; transition: 0.3s;">Custom Software</a></li>
              <li style="padding: 6px 0;"><a href="solutions/" style="color: #556877; transition: 0.3s;">Business Automation</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 style="font-size: 16px; font-weight: 700; color: #283d50; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 18px;">Products</h4>
            <ul style="list-style: none; padding: 0; margin: 0;">
              <li style="padding: 6px 0;"><a href="https://whatypie.in" target="_blank" style="color: #556877; transition: 0.3s;">WhatyPie</a></li>
              <li style="padding: 6px 0;"><a href="products/" style="color: #556877; transition: 0.3s;">Future Products</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 style="font-size: 16px; font-weight: 700; color: #283d50; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 18px;">Resources</h4>
            <ul style="list-style: none; padding: 0; margin: 0;">
              <li style="padding: 6px 0;"><a href="insights/" style="color: #556877; transition: 0.3s;">Insights</a></li>
              <li style="padding: 6px 0;"><a href="legal/privacy-policy/" style="color: #556877; transition: 0.3s;">Privacy Policy</a></li>
              <li style="padding: 6px 0;"><a href="legal/terms-and-conditions/" style="color: #556877; transition: 0.3s;">Terms</a></li>
            </ul>
          </div>

        </div>

      </div>
    </div>

    <div class="container text-center" style="padding: 25px 0; border-top: 1px solid #eef2f6;">
      <p style="margin-bottom: 8px; font-weight: 600; color: #1bb1dc; font-size: 14px;">Built by Dinzin Technology Solutions Pvt. Ltd.</p>
      <div class="copyright" style="font-size: 13px; color: #66788a;">
        Copyright &copy; 2026 <strong>DINZIN TECHNOLOGY SOLUTIONS PRIVATE LIMITED</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top" aria-label="Back to top"><i class="fa fa-chevron-up"></i></a>
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