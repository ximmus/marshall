<?php

// SHORTCODE: [ufl_button]

function ufl_button($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'text'      => 'button',
      'link'      => '#',
      'size'      => 'small',
      'important' => 'false',
      ), $atts ) 
  );

  if ( $important == 'true' ){
    $output  = '<a class="ufl-button important '. $size .'" href="'. $link .'">';
  }
  else {
    $output  = '<a class="ufl-button '. $size .'" href="'. $link .'">';
  }

  $output .= '<span>' . $text . '</span>';

  $output .= '</a>'; 
  
  return $output;
}

add_shortcode("ufl_button", "ufl_button");