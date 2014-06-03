<?php
/*
Template Name: Admissions
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <?php UFL_breadcrumbs( get_the_ID() ); ?>
  
  <section id="main" class="row">

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

  <aside class="sidebar three columns">
    <?php get_sidebar(); ?>
  </aside><!-- END .sidebar -->
  
  <aside class="three columns">
  <?php
          //grab the custom field data
          $sideButton_top     = get_post_meta($post->ID, "sideButton_top", true);
          $sideButton_top_link  = get_post_meta($post->ID, "sideButton_top_link", true);
          $sideButton_bottom    = get_post_meta($post->ID, "sideButton_bottom", true);
          $sideButton_bottom_link = get_post_meta($post->ID, "sideButton_bottom_link", true);
          $prospectus_image   = get_post_meta($post->ID, "prospectus_image", true);
          $prospectus_link    = get_post_meta($post->ID, "prospectus_link", true);
          $prospectus_title   = get_post_meta($post->ID, "prospectus_title", true);

          //make some buttons
          echo do_shortcode("[ufl_button link='" . $sideButton_top_link . "' text='" . $sideButton_top . "' size='big' important='true']");          
          echo do_shortcode("[ufl_button link='" . $sideButton_bottom_link . "' text='" . $sideButton_bottom . "' size='big']");
          

          //prospectus
          echo $prospectus_image;
          echo "<br /><a href='".$prospectus_link."'>".$prospectus_title."</a>";
        ?>

        <?php echo do_shortcode( "
            [ufl_contact_wrapper title='Contact Admissions']
            [ufl_contact label='phone' data='(352) 273-0890']
            [ufl_contact label='toll-free' data='(877) 429-1297']
            [ufl_contact label='fax' data='(352) 392-4087']
            [ufl_contact label='email' data='admissions@law.ufl.edu']
            [/ufl_contact_wrapper]
        " ); ?>
        
        <?php echo do_shortcode( "[ufl_social facebook='http://www.facebook.com/uflaw' twitter='http://www.twitter.com/uflaw' linkedin='http://www.linkedin.com/groups/University-Florida-Levin-College-Law-136081/about']" ); ?>

      </div>
    </aside><!--end .three .columns-->

</section><!-- END .main -->

<?php get_footer(); ?>