<?php
// Library Searchbox Shortcode

function library_search( $atts ) {
  wp_enqueue_script ( 'library-search' );

  $output = get_template_part( 'includes/content/library_search', 'content' );
  
  return $output;
}

add_shortcode( 'library_search' , 'library_search' );