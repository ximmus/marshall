<?php 
add_shortcode("staff_profile", "staff_profile");

function staff_profile($atts, $content = null) {
  extract( shortcode_atts(  
    array(
      'image' => '',
      'name'  => '',
      'title' => '',
      'email' => ''
      ), $atts) );

  $output   = '<div class="staff-profile">'; // Open the div
  $output  .= '<img title="'. $name .'" src="'. $image .'" alt="photo of '. $name .'" width="115" height="169" />';
  $output  .= '<h3>'. $name .'</h3>';
  $output  .= '<h4>'. $title .'</h4>';
  $output  .= '<a href="mailto:'. $email .'">'. $email .'</a>';
  $output  .= '</div>'; // close the div

  return $output;
}