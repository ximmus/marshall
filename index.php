<?php get_header(); ?>

<section id="main" class="row">

<article id="main-content" class="twelve columns" role="main">

	<!--INSERT SLIDER -->
			<div class="row">
				<div class="twelve columns">
					<?php echo do_shortcode("[ufl_slider category='uncategorized' count='3' height='325px' time='5000']"); ?>
				</div>
			</div>
			
	<!--MIDDLE CONTENT AREA -->
			<div class="row">
				<div class="five columns">
					<?php dynamic_sidebar( 'front_column_one' ); ?>
				</div>
				<div class="four columns">
					<?php dynamic_sidebar( 'front_column_two' ); ?>
				</div>
				<div class="three columns">
					<?php dynamic_sidebar( 'upcoming_events' ); ?>
				</div>
			</div>

	<hr />	

	<!--SECONDARY CONTENT AREA -->
			<div class="row">
				<div class="six columns">
					<?php dynamic_sidebar( 'instagram_widget_area' ); ?>
				</div>
				<div class="six columns">
					<?php dynamic_sidebar( 'featured_program_front_widget' ); ?>	
				</div>
			</div>

</article><!-- end #main-content -->

</section><!-- END .main -->

<?php get_footer(); ?>