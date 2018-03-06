<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="description" content="Antonio Navajas es un profesional con más de 11 años de experiencia en el mundo de la publicidad y el desarrollo web y de aplicaciones en dispositivos">
    <meta name="keywords" content="front-end, desarrollo, html5, css3, mobile first, responsive, angular, react" >
    <meta name="author" content="Antonio Navajas Ojeda - antonionavajas.es" >
    <meta property="og:title" content="Antonio Navajas Ojeda - antonionavajas.es">
    <meta property="og:image" content="./assets/img/logo.png">
    <meta property="og:url" content="www.antonionavajas.es">
    <meta property="og:site_name" content="Antonio Navajas">
    <meta property="og:description" content="Antonio Navajas es un profesional con más de 11 años de experiencia en el mundo de la publicidad y el desarrollo web y de aplicaciones en dispositivos">
    <meta name="twitter:title" content="Antonio Navajas Ojeda -  antonionavajas.es" >
    <meta name="twitter:image" content="./assets/img/logo.png" >
    <meta name="twitter:url" content="www.antonionavajas.es" >
    <meta name="twitter:card" content="Antonio Navajas es un profesional con más de 11 años de experiencia en el mundo de la publicidad y el desarrollo web y de aplicaciones en dispositivos" > -->
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <?php wp_head(); ?>
    <script>
      var templateUrl = '<?= get_bloginfo("template_url"); ?>';
    </script><!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114962651-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-114962651-1');
    </script>
  </head>
  <body>
    <div class="social">
      <a href='#' id="btnMenu" class="icon-burguer"></a>
      <a href='https://twitter.com/ajnavajas' target="_blank" class="icon-twitter"></a>
      <a href='https://www.linkedin.com/in/antonionavajas/' target="_blank" class="icon-linkedin"></a>
      <a href='https://github.com/antonionavajas' target="_blank" class="icon-github"></a>
    </div>
    <nav class="" id="navMenu">
      <div class="navContainer">
        <div class="overlay"></div>
        <video class="background-video" autoplay poster="" loop>
          <source src="<?php echo get_template_directory_uri(); ?>/assets/video/video.mp4" type="video/mp4">
        </video>
        <?php wp_nav_menu( array( 'theme_location' => 'navegation', 'container' => '' ) ); ?>
      </div>
    </nav>
