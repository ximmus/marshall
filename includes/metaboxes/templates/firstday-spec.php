<?php

$courses_mb = new WPAlchemy_MetaBox( array
(
	'id'       => '_courses_meta',
	'title'    => 'Course Details',
	'types'    => array( 'courses' ), // added only for custom post type "courses"
	'context'  => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
  'hide_editor' => TRUE,
	'template' => plugin_dir_path( __FILE__ ) . 'courses-meta.php'
));