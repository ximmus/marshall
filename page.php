<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <?php UFL_breadcrumbs( get_the_ID() ); ?>
  
  <section id="main" class="row">

  <aside class="sidebar three columns">
    <?php get_sidebar(); ?>
  </aside><!-- END .sidebar -->

  <article id="main-content" class="nine columns" role="main">
        
    <?php the_title( '<h1>', '</h1>' ); ?>

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