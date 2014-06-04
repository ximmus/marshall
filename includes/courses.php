<?php

  //////////////////////
 // CUSTOM POST TYPE //
//////////////////////

function create_courses_post() {
    $labels = array(
        'name'               =>  _x( 'Courses', 'post type general name' ),
        'singular_name'      =>  _x( 'Course', 'post type singular name' ),
        'add_new'            =>  _x( 'Add New', 'course'),
        'add_new_item'       =>  __( 'Add New Course' ),
        'edit_item'          =>  __( 'Edit Course' ),
        'new_item'           =>  __( 'New Course' ),
        'all_items'          =>  __( 'All Courses' ),
        'view_item'          =>  __( 'View Course' ),
        'search_items'       =>  __( 'Search Courses' ),
        'not_found'          =>  __( 'No Course Found' ),
        'not_found_in_trash' =>  __( 'No Course found in the Trash' ),
        'parent_item_colon'  =>  '',
        'menu_name'          =>  'Courses'
    );
    
    $args = array(
        'labels'             => $labels,
        'description'        => 'Holds all the courses',
        'public'             => true,
        'menue_position'     => 5,
        'supports'           => array('title'),
        'has_archive'        => true
        //'rewrite'          => array( 'slug' => 'ufl_courses' ) // Use to change catagory slug if conflics arise
    );
  
    register_post_type( 'courses' , $args );
  
    // Permalink Fix
    $set = get_option( 'post_type_rules_flased_courses' );

    if ( $set !== true ){
        flush_rewrite_rules( false );
        update_option( 'post_type_rules_flased_course' , true );
    }
}

add_action( 'init', 'create_courses_post' );

  ///////////////
 // SHORTCODE //
///////////////

function courses( $atts, $content = null ){
    
    wp_enqueue_script ( 'ufl-courses' );
    
    extract( shortcode_atts(  array(
        'title'         => '',
        'short'         => '',
        'number'        => '',
        'credits'       => '',
        'prereq'        => '',
        'description'   => '',
        'highlight'     => '0',
        'nobox'         => '0'
    ) , $atts ) );


    // check if the course should be highlighted
    if ( $highlight !='0' ){
        $output = '<div class="courses course-highlighted">';
    }

    // check if the course should be highlighted
    elseif ( $nobox !='0' ){
        $output =  '<div class="courses course-nobox">';
    }

    else {
        $output = '<div class="courses">';
    }

    // if we have a short title use it  
    if ( $short != '' ){
        $output .= '<span class="course-name">' . $short . '</span><br />';
    }
    
    else {
        $output .=  '<span class="course-name">'. $title .'</span><br />';
    }

    $output .= '<span class="course-number">'. $number .'</span>
                <div class="course-credit">
                    <span class="credit-number">'. $credits .'</span><br />
                    <span class="credit-label">credits</span>
                </div><!-- END .course-credit -->
                <div class="course-description">
                    <span class="close-button" title="close">&otimes;</span>
                    <h1>'. $title .'</h1>
                    <h3>'. $number .'</h3>';

    // if we have a prerequisites use it
    if (    $prereq != ''   ){
        $output .= '<h3>Prerequisites:</h3>
                    <p>'. $prereq .'</p>
                    <h3>Description:</h3>
                    <p>'. $content .'</p>
                    <h4 style="margin-bottom: 15px;">Credits: '. $credits .'</h4>
                    </div><!-- END .course-description -->
                    </div><!-- END .course -->';
    }
    else {
        $output .= '<h3>Description:</h3>
                    <p>'. $content .'</p>
                    <h4 style="margin-bottom: 15px;">Credits: '. $credits .'</h4>
                    </div><!-- END .course-description -->
                    </div><!-- END .course -->';
    }

    return $output;
}

add_shortcode( 'courses' , 'courses' );