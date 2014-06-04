<?php

$library_mb = new WPAlchemy_MetaBox( array
(
	'id'                   =>  '_library_meta',
	'title'                =>  'Library Hours',
	'include_template'     =>  'library-page.php', // added only for library main page
	'context'              =>  'normal', // same as above, defaults to "normal"
	'priority'             =>  'high', // same as above, defaults to "high"
	'template'             =>  plugin_dir_path( __FILE__ ) . 'library-meta.php'
));