<?php
/*
Template Name: Faculty Directory
---- #### ----

*/
?>
<?php // WPAlchemy global variables - UNCOMMENT TWO LINES OF CODE BELOW
	//global $simple_mb; 
	//$meta = $simple_mb->the_meta(); // get the meta data for the current post
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
<?php UFL_breadcrumbs( get_the_ID() ); ?>
  
	<section id="main" class="row">

		<?php get_sidebar(); ?>
      
		<article id="main-content" class="nine columns" role="main">
        
			<?php the_title( '<h1>', '</h1>' ); ?>
                
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
							 <?php } ?>
							 
							 <?php endforeach; ?>
					 </div>
					 <div class="clear"></div>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						  
					<?php $simple_mb->the_meta( get_the_ID() ); ?>
						<div class="faculty-post">
						<div class="photo-group left faculty-thumbnail"><?php the_post_thumbnail( array(80,110) ); ?></div>
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<?php echo $simple_mb->the_value('title'); ?><br />
						<a href="<?php the_permalink(); ?>">Faculty Page</a>
						</div><!-- closes .faculty-post -->
						<div class="clear"></div>
				

			<?php endwhile; endif; //main article loop ends?>
			

    <?php if ( is_user_logged_in() ) { ?>
      <p id="edit" class="clear" style="margin-top:20px;"><?php edit_post_link('Edit this article', '&nbsp; &raquo; ', ''); ?> | <a href="<?php echo wp_logout_url(); ?>" title="Log out of this account">Log out &raquo;</a></p>
    <?php } ?>
		
		</article><!-- end #main-content --> 

</section><!-- END .main -->

<?php get_footer(); ?>