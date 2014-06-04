<?php
//wrapper
function uflui_wrapper( $atts, $content ) {
  
  // Enqueue the js
  wp_enqueue_script ( 'ufl-ui' );

  // Grab the attributes
  extract(shortcode_atts (
    array(
      'type' => '',
      'custom' => '',
      ), $atts));

  //define global variables
  $GLOBALS['uflui_type'] = $type;
  $GLOBALS['tab_count'] = 0;

  if ($custom != ''){
    $output = '<div class="uflui '.$custom.' uflui-';
  }
  else {
    $output = '<div class="uflui uflui-';
  } 

  if ($type == 'accordion'){
    $output .= 'accordion"> ' . do_shortcode($content) . ' </div>';
  }

  elseif($type == 'tabs'){
    do_shortcode( $content );

    if( is_array( $GLOBALS['tabs'] ) ){
      foreach( $GLOBALS['tabs'] as $tab ){
        $tabs[] = '<li><a href="#tab-'.$tab['id'].'">'.$tab['title'].'</a></li>';
        $panes[] = '<div id="tab-'.$tab['id'].'"><h3>'.$tab['title'].'</h3>'.$tab['content'].'</div>';
      }

      $output .= 'tabs">';

      $output .= '<ul>'.implode( "\n", $tabs ).'</ul>';

      $output .='<div>'.implode( "\n", $panes ).'</div>';

      $output .='</div>';
    }
  }

  else{
    $output = '<div class="uflui-error"><h4>UFL-UI ERROR:</h4><p>Please specify either <strong>type="tabs"</strong> or <strong>type="accordion"</strong><br />Currently you have specified <strong>type="'.$type.'"</strong></p></div>';
  }

  return $output;
}

//internal
function uflui( $atts, $content ) {
  extract(shortcode_atts(array(
    'title' => 'Tab %d'
    ), $atts));

  //Bring in global variables
  $type = $GLOBALS['uflui_type'];
  
  if ($type == 'accordion'){
    $output = '<h3>'.$title.'</h3><div><p>' . do_shortcode($content) . '</p></div>';
    return $output;
  }

  elseif($type == 'tabs'){
    $x = $GLOBALS['tab_count'];

    $GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  do_shortcode( $content ), 'id' => $x );

    $GLOBALS['tab_count']++;
  }

  else{
    return '<div class="uflui-error"><h4>UFL-UI ERROR:</h4><p>Please specify either <strong>type="tabs"</strong> or <strong>type="accordion"</strong><br />Currently you have specified <strong>type="'.$type.'"</strong></p></div>';
  }
}

//Hook 'em
add_shortcode('uflui_wrapper', 'uflui_wrapper');
add_shortcode('uflui', 'uflui');