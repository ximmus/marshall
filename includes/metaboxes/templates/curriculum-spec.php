<?php

$curriculum_mb = new WPAlchemy_MetaBox( array
(
	'id'                   => '_curriculum_meta',
	'title'                => 'Curriculum Roadmap',
  'include_template'     => 'template-curriculum.php', // added only for curriculum roadmap pages
	'context'              => 'normal', 
	'priority'             => 'high', 
  'hide_editor'          => FALSE,
	'template'             => plugin_dir_path( __FILE__ ) . 'curriculum-meta.php'
));

// Drag and Drop Tut: http://www.farinspace.com/sorting-wordpress-meta-box-fields/