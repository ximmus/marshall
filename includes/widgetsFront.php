<?php
function uflaw_widgets_init() {

//TOP COLUMN OF FRONT PAGE
		register_sidebar (array(
			'name' => 'Front Column One',
			'id' => 'front_column_one',
			'description' => 'Widgets in this area will be shown on the TOP LEFT of your HOME PAGE under the banner',
			'before_widget' => '<div class="front-widget-area">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
		
		register_sidebar (array(
			'name' => 'Front Column Two',
			'id' => 'front_column_two',
			'description' => 'Widgets in this area will be shown on the MIDDLE of your HOME PAGE under the banner',
			'before_widget' => '<div class="front-widget-area">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
		
		register_sidebar (array(
			'name' => 'Upcoming Events',
			'id' => 'upcoming_events',
			'description' => 'Widgets in this area will be shown on the TOP RIGHT of your HOME PAGE under the banner',
			'before_widget' => '<div class="front-widget-area upcoming-events-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
		
//SECONDARY AREA OF FRONT PAGE
		register_sidebar (array(
			'name' => 'Instragram Widget Area',
			'id' => 'instagram_widget_area',
			'description' => 'This Widget Area should pull in an Instagram feed or a photo-of-the-day feed',
			'before_widget' => '<div class="front-widget-area instagram-widget-area">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
		
		register_sidebar (array(
			'name' => 'Featured Program Area',
			'id' => 'featured_program_front_widget',
			'description' => 'Widgets in this area should promote a law school program',
			'before_widget' => '<div class="front-widget-area">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
}
add_action( 'widgets_init', 'uflaw_widgets_init' );