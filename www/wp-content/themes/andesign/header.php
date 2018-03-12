<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <style>
      body{color:#202020}
    </style>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <?php wp_head(); ?>
    <script>
      var templateUrl = '<?= get_bloginfo("template_url"); ?>';
    </script><!-- Global site tag (gtag.js) - Google Analytics -->
    <?php if (stripos($_SERVER['HTTP_USER_AGENT'],"Insights") === false) { ?>
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114962651-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-114962651-1');
      </script>
    <?php } ?>
  </head>
  <body>
