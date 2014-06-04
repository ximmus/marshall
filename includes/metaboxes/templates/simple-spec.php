<?php

// custom meta boxes for faculty posts
$custom_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_faculty',
	'title' => 'Faculty Content',
	'template' => get_stylesheet_directory() . '/metaboxes/faculty-meta.php',
	'types' => array('uflaw_faculty'),
	'mode' => WPALCHEMY_MODE_EXTRACT // can also be EXTRACT
));

/* eof */