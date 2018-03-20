<?php

function anDesign_insertar_js(){
  wp_register_script('respond', get_template_directory_uri(). '/js/respond.min.js#asyncload', array(), '1', false );
  wp_register_script('theejs', get_template_directory_uri(). '/js/three.min.js', array(), '1', true );
  wp_register_script('collada', get_template_directory_uri(). '/js/ColladaLoader.js#asyncload',  '1', true );
  wp_register_script('aos', get_template_directory_uri(). '/js/aos.min.js#asyncload', array(), '1', true );
  wp_register_script('miscript', get_template_directory_uri(). '/js/app.js#asyncload', array(), '1', true );
  //

  wp_enqueue_script('respond');
  wp_enqueue_script('theejs');
  wp_enqueue_script('collada');
  wp_enqueue_script('aos');
  wp_enqueue_script('miscript');

  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'wp_enqueue_scripts', 1);

  add_action('wp_footer', 'wp_print_scripts', 5);
  add_action('wp_footer', 'wp_enqueue_scripts', 5);
  add_action('wp_footer', 'wp_print_head_scripts', 5);
}

function anDesign_async_scripts($url) {
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async";
}

function anDesign_menus() {
  register_nav_menus(
    array(
      'navegation' => __( 'Menú de navegación' ),
    )
  );
}

function anDesign_excerpt_more( $more ) {
    return sprintf( ' [ ..... ] <hr> <p class="t-right"><a class="button" href="%1$s">%2$s</a></p>',
        get_permalink( get_the_ID() ),
        __( 'Leer completo <i class="icon-next"></i>', 'textdomain' )
    );
}

add_theme_support( 'post-thumbnails' );
add_action( 'init', 'anDesign_menus' );

add_filter( 'excerpt_more', 'anDesign_excerpt_more' );
add_filter( 'clean_url', 'anDesign_async_scripts', 11, 1 );

add_action( 'wp_enqueue_scripts', 'anDesign_insertar_js');
?>
