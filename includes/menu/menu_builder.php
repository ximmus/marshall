<?php
function ufl_menu_builder( $menu ){

  // Grab the menu list from the admin menu creator
  $list = ufl_get_menu_list( $menu );

  $new_menu = '';

  // // Loop through each list item.
  foreach ( $list as $item ) {
    $new_menu .= ufl_get_menu_children( $item );
  }

  echo $new_menu;
}