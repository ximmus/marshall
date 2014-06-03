<?php
// Faculty custom post type
        // Create our post type
    add_action( 'init', 'create_post_type' );
    function create_post_type() {
            $args = array(
            'labels' => post_type_labels( 'Faculty Post' ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'faculty'), 
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => 5, //goes below posts, 20 for below pages and 'null' for below comments
            'supports' => array('title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments'
            )
        );
     
            register_post_type( 'uflaw_faculty', $args );
			flush_rewrite_rules();
    }
     
    // A helper function for generating the labels
    function post_type_labels( $singular, $plural = '' )
    {
        if( $plural == '') $plural = $singular .'s';
       
        return array(
            'name' => _x( $plural, 'post type general name' ),
            'singular_name' => _x( $singular, 'post type singular name' ),
            'add_new' => __( 'Add New' ),
            'add_new_item' => __( 'Add New '. $singular ),
            'edit_item' => __( 'Edit '. $singular ),
            'new_item' => __( 'New '. $singular ),
            'view_item' => __( 'View '. $singular ),
            'search_items' => __( 'Search '. $plural ),
            'not_found' =>  __( 'No '. $plural .' found' ),
            'not_found_in_trash' => __( 'No '. $plural .' found in Trash' ),
            'parent_item_colon' => ''
        );
    }
     
    //add filter to ensure the text Faculty Post is displayed when user updates
    add_filter('post_updated_messages', 'post_type_updated_messages');
    function post_type_updated_messages( $messages ) {
            global $post, $post_ID;
     
            $messages['uflaw_faculty'] = array(
                    0 => '', // Unused. Messages start at index 1.
                    1 => sprintf( __('Faculty Post updated. <a href="%s">View Faculty Post</a>'), esc_url( get_permalink($post_ID) ) ),
                    2 => __('Custom field updated.'),
                    3 => __('Custom field deleted.'),
                    4 => __('Faculty Post updated.'),
                    /* translators: %s: date and time of the revision */
                    5 => isset($_GET['revision']) ? sprintf( __('Faculty Post restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
                    6 => sprintf( __('Faculty Post published. <a href="%s">View Faculty Post</a>'), esc_url( get_permalink($post_ID) ) ),
                    7 => __('Faculty Post saved.'),
                    8 => sprintf( __('Faculty Post submitted. <a target="_blank" href="%s">Preview Faculty Post</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
                    9 => sprintf( __('Faculty Post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Faculty Post</a>'),
                    // translators: Publish box date format, see php.net/date
                    date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
                    10 => sprintf( __('Faculty Post draft updated. <a target="_blank" href="%s">Preview Faculty Post</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
            );
     
            return $messages;
    }
// adds categories to faculty posts (faculty types)
function uflaw_faculty_types() {  
   register_taxonomy(  
    'uflaw_faculty_types',  
    'uflaw_faculty',  
    array(  
        'hierarchical' => true,  
        'label' => 'Faculty Types',  
        'query_var' => true,  
        //'rewrite' => array('slug' => 'faculty')  
    )  
);  
}  
add_action( 'init', 'uflaw_faculty_types' ); 

// adds categories (Areas of Expertise) to faculty posts
function uflaw_faculty_tags() {  
   register_taxonomy(  
    'uflaw_faculty_tags',  
    'uflaw_faculty',  
    array(  
        'hierarchical' => true,  
        'label' => 'Areas of Expertise',  
        'query_var' => true,  
        'rewrite' => array('slug' => 'experts-guide')  
    )  
);  
}  
add_action( 'init', 'uflaw_faculty_tags' );

 /*  Faculty Directory  */
 
// Add new taxonomy, NOT hierarchical, to be used to tag each post with the first letter of the last name 
function uflaw_faculty_directory() {
    register_taxonomy(
    'uflaw_faculty_directory',
    'uflaw_faculty',
	array(
		'hierarchical' => false,
		'label' => 'Directory',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'faculty-directory' ),
		'show_ui' => true
	)
);
}
 
add_action( 'init', 'uflaw_faculty_directory' );



// Updates faculty glossary transient every time a new faculty post is saved or updated
function kia_save_first_letter( $post_id ) {
	// verify if this is an auto save routine.
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;
	 
	//check location (only run for posts)
	$limitPostTypes = array('uflaw_faculty');
	if (!in_array($_POST['post_type'], $limitPostTypes)) return;
	 
	// Check permissions
	if ( !current_user_can( 'edit_post', $post_id ) )
	return;
	 
	// OK, we're authenticated: we need to find and save the data
	 $taxonomy = 'uflaw_faculty_directory';
	 
	//set term as first letter of post title, lower case
	// wp_set_post_terms( $post_id, strtolower(substr($_POST['post_title'], 0, 1)), $taxonomy );
	//delete the transient that is storing the alphabet letters
	delete_transient( 'kia_archive_alphabet');
}
add_action( 'save_post', 'kia_save_first_letter' );

// flush permalink structure so that custom taxonomies go to correct pages
add_action('init', 'custom_taxonomy_flush_rewrite');
function custom_taxonomy_flush_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
 