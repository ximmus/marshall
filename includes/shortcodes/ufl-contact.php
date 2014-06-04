<?php
// Shortcode: [ufl_contact]

// Wrapper
function ufl_contact_wrapper($atts, $content = null) {
  extract( shortcode_atts(  array(
    'title' => '',
  ), $atts ) );

  $output = '<table class="ufl-contact">'; // Open the table.
  
  $output .= '<caption><h3>'. $title .'</h3></caption>'; // Title the table.

  $output .= do_shortcode( $content );

  $output .= '</table>'; // Close the table.

  return $output;
}

// Internal                                     
function ufl_contact($atts, $content = null) {
  extract( shortcode_atts(  array(
    'label'   => '',
    'data'  => '',
    'attn'    => '',
    'street'  => '',
    'city'    => '',
    'state'   => '',
    'zip'     => '',
  ), $atts ) );

  // Format Label
  $label_formated = ucwords( $label ) . ":";

  // Format Address
  $attn   = ucwords( $attn );
  $street = ucwords( $street );
  $csz    = ucwords( $city ) . ", " . strtoupper( $state ) . ", " . $zip;

  // Address
  if ( $label == 'address'){
    $output  = '<tr>';
    $output .= '<td class="label">' . $label_formated . '</td>';
    $output .= '</tr>';

    // Attention Line
    $output .= '<tr>';
    $output .= '<td colspan="2" class="attn">' . $attn . '</td>';
    $output .= '</tr>';

    // Street Line
    $output .= '<tr>';
    $output .= '<td colspan="2" class="street">' . $street . '</td>';
    $output .= '</tr>';

    // City, State, Zip
    $output .= '<tr>';
    $output .= '<td colspan="2" class="csz">' . $csz . '</td>';
    $output .= '</tr>';
  }

  // Email
  elseif ( $label == 'email'){
    $output  = '<tr>';
    $output .= '<td class="label">' . $label_formated . '</td>';
    $output .= '</tr>';
    $output .= '<tr>';
    $output .= '<td colspan="2" class="email"><a href="mailto:' . $data . '">' . $data . '</a></td>';
    $output .= '</tr>';
  }
  
  // Phone/Fax
  else {
    $output  = '<tr>';
    $output .= '<td class="label">' . $label_formated . '</td>';
    $output .= '<td class="data">' . $data . '</td>';
    $output .= '</tr>';
  }

  return $output;
}

add_shortcode("ufl_contact_wrapper", "ufl_contact_wrapper");
add_shortcode("ufl_contact", "ufl_contact");