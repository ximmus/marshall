<?php
/*
Template Name: Library
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <?php UFL_breadcrumbs( get_the_ID() ); ?>
  
  <section id="main" class="row">

  <!--left sidebar start-->
    <?php

      // library hour meta **Uncomment when live**
      // global $library_mb;
      // $meta = get_post_meta(get_the_ID(), $library_mb->get_the_id(), TRUE);
      $date_span = "May 19 - 25"; // $meta['date-span'];
      $mon = "7:30am-10:00pm"; // $meta['day-monday'];
      $tue = "7:30am-10:00pm"; // $meta['day-tuesday'];
      $wed = "7:30am-10:00pm"; // $meta['day-wednesday'];
      $thu = "7:30am-10:00pm"; // $meta['day-thursday'];
      $fri = "7:30am-10:00pm"; // $meta['day-friday'];
      $sat = "7:30am-10:00pm"; // $meta['day-saturday'];
      $sun = "7:30am-10:00pm"; // $meta['day-sunday'];
    
    ?>
    
    <aside class="sidebar three columns">
    
      <?php get_sidebar(); ?>

      <div class="library-side">
        <h3>Library Hours:</h3>
        <strong><?php echo $date_span; ?></strong>
        
        <div id="days">
          <h5>Monday:</h5>
          <?php echo $mon; ?>
          <h5>Tuesday:</h5>
          <?php echo $tue; ?>
          <h5>Wednesday:</h5>
          <?php echo $wed; ?>
          <h5>Thursday:</h5>
          <?php echo $thu; ?>
          <h5>Friday:</h5>
          <?php echo $fri; ?>
          <h5>Saturday:</h5>
          <?php echo $sat; ?>
          <h5>Sunday:</h5>
          <?php echo $sun; ?>   
        </div>
        
        <?php echo do_shortcode("[ufl_button link='/library/contact/hours/' text=\"Library's Complete Schedule\" size='big']"); ?>          
        <?php echo do_shortcode("[ufl_button link='/library/contact/hours/reference-hours' text='Reference Hours' size='big']"); ?>

        <?php echo do_shortcode( "[ufl_social facebook='https://www.facebook.com/pages/UF-Law-Library/134489093262908' twitter='http://twitter.com/#!/uflawlibrary' vimeo='http://vimeo.com/uflic']" ); ?>

      </div><!-- END .library-side -->
    </aside><!-- END .sidebar -->

  <article id="main-content" class="nine columns" role="main">
        
    <?php the_title( '<h1>', '</h1>' ); ?>

    <?php echo do_shortcode( "[library_search]" ); ?>

    <?php echo do_shortcode("[ufl_slider category='uncategorized' count='3' height='325px' time='5000']"); ?>

    <div class="entrytext">
      <?php the_content('<p>Read the rest of this page »</p>'); ?>
    </div>

    <?php endwhile; endif; //main article loop ends?>

    <?php if ( is_user_logged_in() ) { ?>
      <p id="edit" class="clear" style="margin-top:20px;"><?php edit_post_link('Edit this article', '&nbsp; &raquo; ', ''); ?> | <a href="<?php echo wp_logout_url(); ?>" title="Log out of this account">Log out &raquo;</a></p>
    <?php } ?>

  </article><!-- end #main-content -->

</section><!-- END .main -->

<?php get_footer(); ?>