<?php

$courses_mb = new WPAlchemy_MetaBox( array
(
	'id'           => '_courses_meta',
	'title'        => 'Course Details',
	'types'        => array( 'courses' ), // added only for custom post type "courses"
	'context'      => 'normal', // same as above, defaults to "normal"
	'priority'     => 'high', // same as above, defaults to "high"
  'hide_editor'  => TRUE,
  'mode'         => WPALCHEMY_MODE_EXTRACT,
  'prefix'       => '_course_',
  'template'     => get_stylesheet_directory() . '/includes/metaboxes/templates/courses-meta.php'
));