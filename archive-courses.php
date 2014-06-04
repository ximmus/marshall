<?php
/*
Template Name: Courses Archive
*/
?>

<?php get_header(); ?>
  
<section id="main" class="row">

  <article id="main-content" class="nine columns" role="main">
  
  <?php if ( have_posts() ) : ?>
  
  <?php // Start the Loop.
    while ( have_posts() ) : the_post();

    /*
    * Include the post format-specific template for the content. If you want to
    * use this in a child theme, then include a file called called content-___.php
    * (where ___ is the post format) and that will be used instead.
    */
    
    //get_template_part( 'content', get_post_format() );

    global $courses_mb;
    $courses_mb->the_meta();

    $title       = get_the_title();
    $short       = $courses_mb->get_the_value( 'short-name' );
    $number      = $courses_mb->get_the_value( 'number' );
    $credits     = $courses_mb->get_the_value( 'credits' );
    $prereq      = $courses_mb->get_the_value( 'prerequisite' );
    $description = $courses_mb->get_the_value( 'description' );

    echo do_shortcode( '[courses nobox=1 title="' . $title . '" short="' . $short . '" number="' . $number . '" credits="' . $credits . '" prerequisite="' . $prereq . '"]' . $description . '[/courses]' );
  
    endwhile;
    endif;
  ?>

  </article><!-- end #main-content -->

</section><!-- END .main -->

<?php get_footer(); ?>