<?php

function UFL_breadcrumbs( $post ) {

  if ( is_page() && !is_front_page() ) {
    $breadcrumb = '<nav id="breadcrumb" class="row"><ul class="twelve columns">';
    $breadcrumb .= '<li class="content home"><a href="' . get_bloginfo( 'url' ) . '">Home</a></li><li class="arrow-right"></li>';
    $post_ancestors = get_post_ancestors( $post );
    $counter = 1;

    if ( $post_ancestors ) {
        $post_ancestors = array_reverse( $post_ancestors );
        
        foreach ( $post_ancestors as $crumb ) {
          // Grab the link.
          $link   = get_permalink( $crumb );

          // Grab the title.
          $title  = get_the_title( $crumb );

          // Limit the length of the title to prevent wrapping.
          if ( $counter >= 2 && strlen( $title ) >= 20 ){
            $title  = substr( $title, 0, 20 );
            $title .= '...';
          };

          // Spit it out.
          $breadcrumb .= '<li class="arrow-end"></li>';
          $breadcrumb .= '<li class="content"><a href="' . $link . '">' . $title . '</a></li>';
          $breadcrumb .= '<li class="arrow-right"></li>';
          $counter++;
        }
    }
    
    $breadcrumb .= '<li class="arrow-end"><li id="item-' . $counter . '" class="content"><strong>' . get_the_title() . '</strong></li><li class="arrow-right"></li>';
    
    $breadcrumb .= "</ul></nav>";

    echo $breadcrumb;
  }
}