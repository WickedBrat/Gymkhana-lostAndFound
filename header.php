<!doctype html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Lost and Found Portal | IIIT Allahabad</title>

<!--Style-->

  <!-- <link rel="stylesheet" href="css/reset.css"> -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style-responsive.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <style>
  .nav li {
    display: inline;
    padding-right: 20px;
    font-size: 20px;
  }
  a {
    color: black;
  }
  </style>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117554037-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117554037-1');
</script>

</head>

<body>

<!--Preloader-->

<div class="preloader" id="preloader">
    <div class="item">
      <div class="spinner">
      </div>
    </div>
</div>

  <!--Header-->
  <header id="fullscreen">
    
      <div class="logo" id="full" style="display:none;"><a class="ajax-link" href="index.html">Lost and Found</a></div>
      
        <div class="menu-index" style="display:none;" id="button">
        <i class="fa fa-bars"></i>
        </div>

  </header>


<!--Header-->
<header class="boxed" id="header-white">

  <div class="header-margin">
  
    <div class="logo"><a class="ajax-link" href="/">IIIT Allahabad</a></div>
    
    <ul class="social-icon">
    <div class="social-index" style="margin-top:60px;">
    
    <?php session_start(); if(isset($_SESSION['access_token'])) {
      
      echo '<li><a href="logout.php" style="color:white;">Logout</a></li>';
      }
      else {
        echo '<li><a href="login.php" style="color:white;">Login</a></li>';
      }
      ?>

      <li><a href="https://gymkhana.iiita.ac.in" style="color:white;">Gymkhana</a></li>
      </div>
    </ul>
    
  </div>

</header>

<div class="clear"></div>

<!--Content-->

<div class="content" id="ajax-content">


      <div class="text-intro" id="site-type">

        <h1>Lost and Found</h1>
