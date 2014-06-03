<?php
  // Get the current page ID
	$current = get_the_ID();
  
  // Get the current page's parent
  $parent = get_post_ancestors( $current );

  // if array is not empty ( is a subpage )
  if ( empty( $parent )) {
    // set top level to current page
    $toplevel = $current;

    // build menu
    $menu = ufl_get_menu_children( $toplevel );
  }

  else {
    // the top level parent is the last value in the array
    $toplevel = end( $parent );

    // build menu
    $menu = ufl_get_menu_children( $toplevel );
  }
  
  // output menu
  echo $menu;
?>