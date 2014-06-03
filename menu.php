<nav id="top-menu" class="row">
  <div id="menu-icon"><?php include( get_stylesheet_directory() . '/images/svg/hamenu.svg' ); ?></div>
  <div class="menu-wrapper">
    <ul class="twelve columns">
      <li id="home">
        <a href="<?php bloginfo('url'); ?>" title="Return to UF Law Homepage">
          <?php include( get_stylesheet_directory() . '/images/svg/home-icon.svg' ); ?>
        </a>
      </li>
      <?php ufl_menu_builder( 'header-menu' ); ?>
    </ul>
  </div><!-- end .menu-wrapper -->
</nav>