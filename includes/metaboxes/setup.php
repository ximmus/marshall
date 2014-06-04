<?php

// WPAlchemy MetaBox Class
require_once( 'MetaBox.php' );

// WPAlchemy MediaAccess Class
require_once( 'MediaAccess.php' );

// Not sure what this does...
$wpalchemy_media_access = new WPAlchemy_MediaAccess();

// Admin Metabox Style
function meta_admin_style() {
  wp_enqueue_style('meta_admin_style', get_stylesheet_directory_uri() . '/includes/metaboxes/meta.css');
}
add_action('admin_enqueue_scripts', 'meta_admin_style');

// TEMPLATES //

// Courses
include_once 'templates/courses-spec.php';

// Faculty?
// include_once 'metaboxes/simple-spec.php';

// Library Hours
// include_once 'metaboxes/library-spec.php';

// Courses
// include_once 'metaboxes/courses-spec.php';

// Curriculum
// include_once 'metaboxes/curriculum-spec.php';

// Function for curriculum-template
// include_once 'curriculum-function.php';