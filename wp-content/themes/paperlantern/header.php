<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en" class="no-js"><!--<![endif]-->
  <head>
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui"/>

  <link rel="icon" href="assets/favicon.png">

  <link href='https://fonts.googleapis.com/css?family=Yantramanav:400,500' rel='stylesheet' type='text/css'>

  <!-- Social Tags -->
  <meta content="Paper Lantern" property="og:title"/>
  <meta content="SHARE_IMAGE_OF_THE_PAGE" property="og:image"/>
  <meta content="Paper Lantern" property="og:site_name"/>
  <meta content="http://drinkpaperlantern.com/" property="og:url"/>
  <meta content="Distilled from rice with ginger, galangal, lemongrass and makhwaen" property="og:description"/>

  <!-- Critical Css -->
  <style type="text/css">
  </style>

  <script type="text/javascript">
    var head_conf = {
    screens: [768, 992, 1200, 1380],
    screensCss: { "gt": false, "gte": true, "lt": true, "lte": false, "eq": false },
    browserCss: { "gt": true, "gte": false, "lt": false, "lte": false, "eq": false },
    html5     : true,
    };
  </script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/headjs/1.0.3/head.min.js"></script>
  

  <!-- <link rel="stylesheet" type="text/css" href="assets/less/style.css"> -->

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-669565-62', 'auto');
    ga('send', 'pageview');

  </script>

  <?php wp_head(); ?>


  </head>

  <body class="<?php echo basename(get_permalink()); ?>">

    <div id="page-wrapper">
      <div id="page-wrapper-content">

        <header>
          <div class="container-fluid">
            <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo IMG; ?>/logo.png" alt="logo"></a></div>
            <!-- <ul class="menu">
              <li><a href="#">About</a></li>
              <li><a href="#">Our Gin</a></li>
              <li><a href="#">Mixology</a></li>
              <li><a href="#">Shop</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Locate</a></li>
              <li><a href="#">Contact</a></li>
            </ul> -->
          </div>
        </header>