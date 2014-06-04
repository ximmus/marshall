<?php 

// SHORTCODE: [ufl_social facebook="linkToFacebook" twitter="linkToTwiiter" linkedin="linkToLinkedin" vimeo="linkToVimeo" ]

function ufl_social( $atts, $content = null ) {
  extract( shortcode_atts(  array(
    'facebook' => '',
    'twitter'  => '',
    'linkedin' => '',
    'vimeo'    => '',  
  ), $atts ) );

  // Icons
  $icon_facebook = file_get_contents( get_stylesheet_directory() . '/images/svg/social_icon-facebook.svg');
  $icon_twitter  = file_get_contents( get_stylesheet_directory() . '/images/svg/social_icon-twitter.svg');
  $icon_linkedin = file_get_contents( get_stylesheet_directory() . '/images/svg/social_icon-linkedin.svg');
  $icon_vimeo    = file_get_contents( get_stylesheet_directory() . '/images/svg/social_icon-vimeo.svg');


  $output  = '<ul class="ufl-social">';

  if ( $facebook ){
    $output .= '<li class="icon facebook"><a href="' . $facebook . '" title="Follow us on FaceBook!">' . $icon_facebook . '</a></li>';
  }  
  if ( $twitter ){
    $output .= '<li class="icon twitter"><a href="' . $twitter . '" title="Follow us on Twitter!">' . $icon_twitter . '</a></li>';
  }  
  if ( $linkedin ){
    $output .= '<li class="icon linkedin"><a href="' . $linkedin . '" title="Link to us on Linkedin!">' . $icon_linkedin . '</a></li>';
  }  
  if ( $vimeo ){
    $output .= '<li class="icon vimeo"><a href="' . $vimeo . '" title="Follow us on Vimeo!">' . $icon_vimeo . '</a></li>';
  }

  $output .= '</ul>'; 
  
  return $output;
}

add_shortcode("ufl_social", "ufl_social");