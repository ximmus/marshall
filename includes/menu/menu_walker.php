<?php
class ufl_menu_walker extends Walker {

  var $tree_type = 'page';
  var $db_fields = array ('parent' => 'post_parent', 'id' => 'ID');

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth); // adding tabs based on which level it's on
    
    // open .sub-menu
    if ( 0 == $depth ) {
      $output .= '<div class="sub-menu hide">';
    }

    $output .= "\n$indent<ul class='children'>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
    
    // close .sub-menu
    if ( 0 == $depth ) {
      $output .= "</div>";
    }
  }

  function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
    if ( $depth )
      $indent = str_repeat("\t", $depth);
    else
      $indent = '';

    extract($args, EXTR_SKIP);

    $css_class = array('page_item', 'page-item-'.$page->ID);

    if ( !empty($current_page) ) {
      $_current_page = get_post( $current_page );
      if ( in_array( $page->ID, $_current_page->ancestors ) )
        $css_class[] = 'current_page_ancestor';
      if ( $page->ID == $current_page )
        $css_class[] = 'current_page_item';
      elseif ( $_current_page && $page->ID == $_current_page->post_parent )
        $css_class[] = 'current_page_parent';
      } elseif ( $page->ID == get_option('page_for_posts') ) {
        $css_class[] = 'current_page_parent';
    }

    $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        'menu-item-depth-' . $depth
    );

    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    $svg_icon = '<div class="svg-default"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 16 16"><path class="cross" d="M7,2.91v1,3.09h-3.09-1v2h1,3.09v3.1,1h2v-1-3.1h3.1,1v-2h-1-3.1v-3.09-1h-2z"/></path></svg></div>';

    if ( 0 == $depth ) {
      $link_after = '<span class="arrow"> &#9662;</span>';
      $link_before = $svg_icon;
    }

    $output .= $indent . '<li class="' . $css_class . ' ' . $depth_class_names . '"><a href="' . get_permalink($page->ID) . '">' . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>' . $link_before;

  }

  function end_el( &$output, $page, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }

}