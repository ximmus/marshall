<?php
// Wrapper
function ufl_row( $atts, $content = null ){
  extract( shortcode_atts(  array(
    'columns' => '',  
    ), $atts ) );

  // Define a global variable to pass to internal.
  $GLOBALS[ 'ufl_columns' ] = $columns;

  $output = '<div class="ufl_columns row">' . do_shortcode( $content ) . '</div>';

  return $output;
}

// Internal 
function ufl_column( $atts, $content = null ) {

  // Bring in global variable from the wrapper.
  $columns  = $GLOBALS[ 'ufl_columns' ];

  // Counter
  static $count = 0;
  $count++;

  // Translate number of columns to proper class and give the first of each row an alpha class.
  if ( $columns == '' || $columns == 1 ) {
    $columns = 'twelve';
  }

  elseif ( $columns == 2 ) {
    $columns = 'six';
  }

  elseif ( $columns == 3 ) {
    $columns = 'four';
  }

  elseif ( $columns == 'left' ) {
    if ( $count == 1 ){
      $columns = 'four';
    }
    else {
      $columns = 'eight';
    }
  }

  elseif ( $columns == 'right' ) {
    if ( $count == 1 ){
      $columns = 'eight';
    }
    else {
      $columns = 'four';
    }
  }

  $output = '<div class="columns ' . $columns . '">' . $content . '</div>';

  return $output;
}

// Hook'em
add_shortcode('ufl_row', 'ufl_row');
add_shortcode('ufl_column', 'ufl_column');