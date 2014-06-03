
<?php
/*
Single UF Law Faculty Post Template

---- #### ----

*/
?>

<?php get_header(); ?>

<?php UFL_breadcrumbs( get_the_ID() ); ?>  
	<section id="main" class="row">

		<?php get_sidebar(); ?>
      
		<article id="main-content" class="nine columns" role="main">
		<p>IS IT LOADING??</p>

<!--BEGIN CONTENT AREA -->
       
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php // sets custom metaboxes and pulls data
					global $simple_mb; 
					$meta = $simple_mb->the_meta(); // get the meta data for the current post
					
					?>
                    
                    
				  <div id="faculty-header">
                  <div class="photo-group left faculty-single-thumbnail"><?php echo get_the_post_thumbnail( $post_id, 'full', array('class' => '') ); ?></div>
                  
                                    
                  <?php ufandshands_content_title(); //page title ?>             
                  
                  <p class="faculty-info">
                  
                  <?php 
				  $facultyTitle = $simple_mb->get_the_value('title');
				  if (!empty($facultyTitle)) {
					echo "<span class=\"faculty-title\">$facultyTitle</span><br />";
				  } 
                  
				  $boxNumber = $simple_mb->get_the_value('box-number');
				  if (!empty($boxNumber)) {
					echo "Mailing Address: <span class=\"info-grey\">Box #$boxNumber Gainesville, FL 32611</span><br />";
				  } 
                  
				  $email = $simple_mb->get_the_value('email');
				  if (!empty($email)) {
					echo "Email: <span class=\"info-grey\"><a href=\"mailto:$email\">$email</a></span><br />";
				  }
                  
				  $phone = $simple_mb->get_the_value('phone');
				  if (!empty($phone)) {
					echo "Phone: <span class=\"info-grey\">$phone</span><br />";
				  } 
                  
				  $fax = $simple_mb->get_the_value('fax');
				  if (!empty($fax)) {
					echo "Fax: <span class=\"info-grey\">$fax</span><br />";
				  }
                  
				  $ssrn = $simple_mb->get_the_value('ssrn');
				  if (!empty($ssrn)) {
					echo "<a target=\"_blank\" href=\"$ssrn\">SSRN</a> <i class=\"icon-share\"></i> &nbsp;";
				  }
                  
				  $vita = $simple_mb->get_the_value('vita');
				  if (!empty($vita)) {
					echo "<a target=\"_blank\" href=\"/_pdf/resumes/$vita\">Vita [PDF]</a><i class=\"icon-download-alt\"></i>";
				  } 
				  ?>
                  
                  </p>
                  </div><!-- closes #faculty-header -->
                  <div class="clear"></div>
                  
                  
                  
						    <ul class="nav nav-tabs">
                                <li class="active"><a href="#main" data-toggle="tab">Main</a></li>
                                <?php
								$courses = $simple_mb->get_the_value('courses'); 
								if (!empty($courses)) {
									echo "<li><a href=\"#courses\" data-toggle=\"tab\">Courses</a></li>";
								  }
								$publications = $simple_mb->get_the_value('publications'); 
								if (!empty($publications)) {
									echo "<li><a href=\"#publications\" data-toggle=\"tab\">Publications</a></li>";
								  }
								?>
                            </ul>
                            <div class="tab-content faculty-content">
                                <div class="tab-pane active" id="main">
									<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                                </div>
                                <div class="tab-pane" id="courses">
                                    <?php echo apply_filters('meta_content',html_entity_decode($simple_mb->get_the_value('courses'))); ?>
                                </div>
                                <div class="tab-pane" id="publications">
                                    <?php echo apply_filters('meta_content',html_entity_decode($simple_mb->get_the_value('publications'))); ?>
                                </div>
                            </div>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
				<div class="single-meta">
				  <?php the_tags('<p class="tag black-50">Tagged as: ', ', ','</p>'); ?>
				</div>

				<?php endwhile; endif; //main article loop ends?>

<!--END CONTENT AREA -->		
		    <?php if ( is_user_logged_in() ) { ?>
			<p id="edit" class="clear" style="margin-top:20px;"><?php edit_post_link('Edit this article', '&nbsp; &raquo; ', ''); ?> | <a href="<?php echo wp_logout_url(); ?>" title="Log out of this account">Log out &raquo;</a></p>
			<?php } ?>
		
        
		</article><!-- end #main-content --> 

	</section><!-- END .main -->

<?php get_footer(); ?>