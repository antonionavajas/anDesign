<!-- <footer>
   <small>Antonio Navajas © <?php echo date("Y") ?></small>
</footer> -->

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
<?php wp_footer(); ?>
</body>
</html>
