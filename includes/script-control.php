<?php

// jQuery Manager
if ( !is_admin()) add_action( "wp_enqueue_scripts", "my_jquery_enqueue", 11 );
function my_jquery_enqueue() {

  // Remove the built-in one first.
  wp_deregister_script( 'jquery' );

  // Register jQuery
  wp_register_script( 'jquery' , "http" . ( $_SERVER[ 'SERVER_PORT' ] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null );
  
  // Register jQuery-UI
  wp_register_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array( 'jquery' ), '1.10.3', true );

  // Enqueue jQuery and jQuery-UI
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'jquery-ui' );
}

// Script Manager
function script_manager() {
  
  // Preprocessor Stylesheet 
  wp_register_style( 'prepro', get_template_directory_uri() . '/prepro.css', array(), '0.1.0', 'all' );
  wp_enqueue_style ( 'prepro' );

  // Modernizr
  wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', false, false, false);

  // SVG Injection
  wp_register_script('svg-inject', get_template_directory_uri() . '/js/svg-inject.js', false, false, true);

  // Mega Menu
  wp_register_script('mega-menu', get_template_directory_uri() . '/js/mega-menu.js', false, false, true);

  // Webfont Loader
  wp_register_script('webfont', '//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js', false, false, false); 
  wp_register_script('webfont-loader', get_template_directory_uri() . '/js/webfont-loader.js', array( 'webfont' ), false, false); 

  // UFL UI Shortcode
  wp_register_script('ufl-ui', get_template_directory_uri() . '/js/uflui.js', array( 'jquery', 'jquery-ui' ), '0.1.0', true);

  // UFL Slider
  wp_register_script('ufl-slider', get_template_directory_uri() . '/js/ufl-slider.js', array( 'jquery' ), '0.1.0', true);    

  // Library Search
  wp_register_script('library-search', get_template_directory_uri() . '/js/library-search.js', array( 'jquery', 'jquery-ui' ), '0.1.0', true);

  // Courses
  wp_register_script('ufl-courses', get_template_directory_uri() . '/js/courses.js', array( 'jquery' ), '0.1.0', true );

  // Enqueue: sitewide scripts enqueue here, shortcode scripts enqueue inside shortcode.
  wp_enqueue_script ( 'modernizr' );    
  wp_enqueue_script ( 'svg-inject' );    
  wp_enqueue_script ( 'mega-menu' );
  wp_enqueue_script ( 'webfont' );
  wp_enqueue_script ( 'webfont-loader' );

}

add_action('wp_enqueue_scripts', 'script_manager');