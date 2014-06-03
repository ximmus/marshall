<?php
function ufl_loop_children( $parent ){

  $pages = ufl_get_children( $parent );

  $children[] = $parent;

  // This could be done with a better loop, but I can't figure out how... ugh.
  
  foreach ( $pages as $page ) { // loop through each child page
    $children[]= $page; // add each child page id to the array
    $pages = ufl_get_children( $page ); // get next sub level
    
      foreach ( $pages as $page ) {
        $children[]= $page;
        $pages = ufl_get_children( $page );
        
          foreach ( $pages as $page ) {
            $children[]= $page;
            $pages = ufl_get_children( $page );
            
              foreach ( $pages as $page ) {
                $children[]= $page;
                $pages = ufl_get_children( $page );
              }
          }
      }
  }

  $children = implode( $children , "," );
  
  return $children;
}