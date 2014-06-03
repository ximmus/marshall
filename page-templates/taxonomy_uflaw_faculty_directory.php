<?php
/*
Template Name: Faculty Directory
---- #### ----

*/
?>

<?php get_header(); ?>

<?php UFL_breadcrumbs( get_the_ID() ); ?>  
	<section id="main" class="row">

		<?php get_sidebar(); ?>
      
		<article id="main-content" class="nine columns" role="main">
			<?php the_title( '<h1>', '</h1>' ); ?>
<!--BEGIN CONTENT AREA -->
			<?php // sub nav for alphabetical listing
			$taxonomy = 'uflaw_faculty_directory';
					// save the terms that have posts in an array as a transient
					if ( false === ( $alphabet = get_transient( 'kia_archive_alphabet' ) ) ) {
						// It wasn't there, so regenerate the data and save the transient
						$terms = get_terms($taxonomy);
						$alphabet = array();
						if($terms){
							foreach ($terms as $term){
								$alphabet[] = $term->slug;
							}
						}
						 set_transient( 'kia_archive_alphabet', $alphabet );
					}
					?>
					
			<div id="archive-menu" class="menu">
				<?php foreach(range('a', 'z') as $i) : $current = ($i == get_query_var($taxonomy)) ? "current-menu-item" : "menu-item";             
					if (in_array( $i, $alphabet )){ ?>
						<ul>
							<li class="az-char <?php echo $current;?>">
								<?php printf('<a href="%s">%s</a>', get_term_link( $i, $taxonomy ), strtoupper($i) ) ?>
							</li>
						</ul>
					 <?php } 					 
					 else { ?>
						<ul>
							<li class="az-char <?php echo $current;?>">
								 <?php echo strtoupper($i); ?>
							</li>
						</ul>
					 <?php } 
					 endforeach; ?>
			 </div>
			 <div class="clear"></div>
<!--GENERATE COMPLETE LIST OF FACULTY -->
 
			<?php $args = array( 'post_type' => 'uflaw_faculty', 'posts_per_page' => 100 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

					
											<div class="faculty-post">
						<?php if (has_post_thumbnail() ) { the_post_thumbnail( array(80,110) ); } ?>
						
						<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
						<p><?php ?>Title/s</p>
						<p><a href="<?php the_permalink(); ?>">Link to Faculty Page</a></p>

						</div><!-- closes .faculty-post -->
						<div class="clear"></div> 
				<?php endwhile; 
				wp_reset_postdata();?>
			
<!--END CONTENT AREA -->		
		    <?php if ( is_user_logged_in() ) { ?>
			<p id="edit" class="clear" style="margin-top:20px;"><?php edit_post_link('Edit this article', '&nbsp; &raquo; ', ''); ?> | <a href="<?php echo wp_logout_url(); ?>" title="Log out of this account">Log out &raquo;</a></p>
			<?php } ?>
		
        
		</article><!-- end #main-content --> 

	</section><!-- END .main -->

<?php get_footer(); ?>