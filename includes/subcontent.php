<?php

// Wrapper
function subcontent_wrapper( $atts, $content = null ) {
  extract( shortcode_atts(  array(
    'columns' => '',  
    ), $atts ) );

  $GLOBALS[ 'subcontent_columns' ] = $atts[ 'columns' ]; // define a global variable to pass to internal

  $output  = '<hr style="margin: 1em 0 0 0" />';
  $output .= '<div class="subcontent row">' . do_shortcode($content) . '</div>';

  return $output;
}

// Internal
function subcontent( $atts, $content = null ) {
  extract( shortcode_atts(  array(
    'title'   => '',
    'image'   => ''
    ), $atts ) );

  // variables
  $columns  = $GLOBALS[ 'subcontent_columns'  ]; // bring in variable from the wrapper

  // give each shortcode a sequential id
  static $id = 0;
  $id++;

  $output = '';

  // translate number of columns to proper span width class
  if ( $columns == '' || $columns == 1 ) {
    $output .= '<div id="sub-'. $id .'" class="columns twelve">';
  }

  elseif ( $columns == 2 ) {
    //$columns = "six";
    //if ($id%2 != 0){ $order = "alpha"; }
    // elseif ($id%2 == 0){$order = "omega";}
    if ( $id%2 != 0 ){
      $output .= '<div id="sub-'. $id .'" class="columns six alpha">';
    }
    else {
      $output .= '<div id="sub-'. $id .'" class="columns six">';
    }
  }

  elseif ( $columns == 3 ) {
    if ( $id%4 == 0 ){
      $output .= '<div id="sub-'. $id .'" class="columns four alpha">';
    }
    else {
      $output .= '<div id="sub-'. $id .'" class="columns four">';
    }
  }

  //make the output
  $output .= '<h3>'. $title .'</h3>';
  
  if ( $image != '' ){
    $output .= '<div class="image">'. $image .'</div>';
  }
  
  $output .= '<span class="content">'.$content.'</span>';
  $output .= '</div><!-- end #sub-'. $id .'-->';    

  return $output;
}

add_shortcode('subcontent_wrapper', 'subcontent_wrapper');
add_shortcode('subcontent', 'subcontent');