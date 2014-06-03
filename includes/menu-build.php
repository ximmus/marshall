<?php
// Grab the menu list from the admin menu creator
$menuList = ufl_get_menu_list( 'header-menu' );

// Create and empty output container to hold the menu.
$newMenu = '';

// Loop through each list item.
foreach ( $menuList as $menuItem ) {
  // Get the children of the menu item.
  $menuItem = UFL_getMenuChildren( $menuItem );

  // Add each menu item to the menu
  $newMenu .= $menuItem;
}

echo $newMenu;