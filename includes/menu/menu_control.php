<?php
// Register Menu
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'side-menu' => __( 'Sidebar Menu' )
    )
  );
}

add_action( 'init', 'register_my_menus' );

// include the custom functions
require_once( 'get_menu_list.php' );
require_once( 'menu_walker.php' );
require_once( 'get_menu_children.php' );
require_once( 'get_children.php' );
require_once( 'loop_children.php' );
require_once( 'menu_builder.php' );