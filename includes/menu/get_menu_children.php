<?php
function ufl_get_menu_children( $top_level ){

  $include = ufl_loop_children( $top_level );   

  $args = array(
    'walker'   => new ufl_menu_walker(),
    'echo'     => 0,
    'title_li' => '', // hides default list heading
    'depth'    => 5,
    'include' =>  $include
  );
  
  $pages = wp_list_pages( $args );      
    
  return $pages;
}