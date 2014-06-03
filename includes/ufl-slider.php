<?php function ufl_slider( $atts, $content = null ) {
  wp_enqueue_script ( 'ufl-slider' );
  extract( shortcode_atts(  array(
    'category' => '', // which post catagory to pull from
    'count'    => '', // how many post to pull
    'height'   => '', 
    'time'     => '1000' // one second default.
    ), $atts ) );
  
  // Args for the query.
  $args = array( 
    'category_name'  => $category,
    'posts_per_page' => $count,
    'order'          => 'ASC', // ASC = old first / DESC = new first
    'orderby'        => 'date' 
    );
  
  // The query.
  $post_slides = new WP_Query( $args );

  // Loop the query.
  if ( $post_slides->have_posts() ) : 
    while ( $post_slides->have_posts() ) : 
      $post_slides->the_post();
        
        // Grab the featured image's full size url of each post.
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
        $thumb = $thumb['0'];

        // Grab the title, experpt, link and featured image.
        $slide = array(
          "title"   => the_title( '', '', false ),
          "excerpt" => get_the_excerpt(),
          "link"    => get_permalink(),
          "image"   => $thumb,
        ); 

        // Add each slide to an array of slides.  
        $slides[] = $slide;

    endwhile;
  endif;
  
  wp_reset_postdata();
  
  // Create the wrapper.
  $output = '<div class="ufl-slider" style="height:' . $height . '" data-time="' . $time . '">';
  
  // Count slides and use for first and last
  $last = count( $slides );

  // Output each slide.
  foreach ( $slides as $slide ) {
    static $counter = 0;
    $counter++;

    if ( $counter == 1 ){
      $output .= '<a href="' . $slide[ 'link' ] . '" id="first" class="current" style="background-image:url(' . $slide[ 'image' ] . ');">';
    }
    elseif ( $counter == 2 ){
      $output .= '<a href="' . $slide[ 'link' ] . '" class="next" style="background-image:url(' . $slide[ 'image' ] . ');">';
    }
    elseif ( $counter == $last ){
      $output .= '<a href="' . $slide[ 'link' ] . '" id="last" class="prev" style="background-image:url(' . $slide[ 'image' ] . ');">';
    }
    else {
      $output .= '<a href="' . $slide[ 'link' ] . '" id="slide-' . $counter . '" class="hide" style="background-image:url(' . $slide[ 'image' ] . ');">';
    }
    $output .= '<div>';
    $output .= '<h3>' . $slide[ 'title' ] . '</h3>';
    $output .= '<span>' . $slide[ 'excerpt' ] . '</span>';
    $output .= '</div>';
    $output .= '</a>';
  }

  // Close the wrapper.
  $output .= '</div>';

  // Return the complete slider.
  return $output;
}

// Hook'em.
add_shortcode('ufl_slider', 'ufl_slider');