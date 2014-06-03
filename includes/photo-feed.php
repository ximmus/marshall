<?php

function photo_feed( $atts ) {
  //wp_enqueue_script('my-script', plugins_url('js/shortcodes.js', __FILE__), array('jquery'), '1.0', true); /*<---This is the line that hooks the script*/
  return '<div class="photo-feed">Photo Feed!</div>';
}

add_shortcode('photo_feed', 'photo_feed');