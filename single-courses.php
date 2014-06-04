<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
<section id="main" class="row">

  <article id="main-content" class="twelve columns" role="main">

      <?php 
        global $courses_mb; 
        $courses_mb->the_meta(); 

        $number      = $courses_mb->get_the_value( 'number' );
        $prereq      = $courses_mb->get_the_value( 'prereq' );
        $description = $courses_mb->get_the_value( 'description' );
        $credits     = $courses_mb->get_the_value( 'credits' );
      ?>

    <?php the_title( '<h1>', '</h1>' ); ?>
    
    <div class="entrytext single-course">
      <h4><?php echo $number; ?></h4>
      <?php if ( $prereq ) { echo '<h4>Prerequisites: ' . $prereq . '</h4>'; } ?>
      <div class="row">
        <span class="nine columns"><?php echo $description; ?></span>
        <div class="credits three columns">
          <h1><?php echo $credits; ?></h1>
          <span>Credits</span>
        </div>
      </div>
    </div>
      
			<?php endwhile; endif; //main article loop ends?>
      
  </article><!-- end #main-content -->

</section><!-- END .main -->

<?php get_footer(); ?>