<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= SITE_NAME ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?= base_url() ?>/assets/img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url() ?>/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url() ?>/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/lib/owlcarousel/assets/owl.carousel.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/lib/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->

  <style>
    .caption {
      position: absolute;
      /* font-size: 1.5em; */
      top: 0;
      /* left: 15px; */
      /* border: 1px solid; */
      color: #1900ff;
      text-shadow: 2px 2px 1px #000;
      padding-top: 40vh;
      padding-left: 10vh;
    }


  @media (max-width: 767px) {
  .caption {
    width: 100%;
    position: absolute;
      font-size: 11px;
      top: 0;
      /* left: 15px; */
      /* border: 1px solid; */
      color: #1900ff;
      text-shadow: 2px 2px 1px #000;
      padding-top: 20vh;
      padding-left: 2vh;
  }
  }
  </style>



</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="#intro" class="scrollto"><img src="<?= base_url() ?>/assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
