<?php
function ufl_get_menu_list( $name ){
  // check if menu $name exist
  if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $name ] ) ) {
    
    // get the contents of the entire menu
    $menu = wp_get_nav_menu_object( $locations[ $name ] );

    // get each menu item
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    // create empty menu array to use in the foreach
    $list = array();

    // loop each menu item
    foreach ( (array) $menu_items as $key => $menu_item ) {
        
        // get the id of the menu
        $title  = $menu_item->object_id;

        // add the id to the list array
        $list[] = $title;
    }

  } else {
    // if no menu exist throw warning
    trigger_error("Menu not defined.", E_USER_ERROR);
  }
  return $list;
}