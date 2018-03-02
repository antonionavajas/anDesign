<?php

function anDesign_insertar_js(){
  wp_register_script('respond', get_template_directory_uri(). '/js/respond.min.js#asyncload', array(), '1', false );
  wp_register_script('theejs', get_template_directory_uri(). '/js/three.min.js', array(), '1', true );
  wp_register_script('collada', get_template_directory_uri(). '/js/ColladaLoader.js#asyncload', array(), '1', true );
  wp_register_script('aos', get_template_directory_uri(). '/js/aos.min.js#asyncload', array(), '1', true );
  wp_register_script('miscript', get_template_directory_uri(). '/js/app.js#asyncload', array(), '1', true );

  wp_enqueue_script('respond');
  wp_enqueue_script('theejs');
  wp_enqueue_script('collada');
  wp_enqueue_script('aos');
  wp_enqueue_script('miscript');
}

function anDesign_async_scripts($url) {
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async";
}

add_filter( 'clean_url', 'anDesign_async_scripts', 11, 1 );
add_action("wp_enqueue_scripts", "anDesign_insertar_js");

?>
