<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!--[if lt IE 7]><html class="no-js ie6"><![endif]-->
    <!--[if IE 7]><html class="no-js ie7"><![endif]-->
    <!--[if IE 8]><html class="no-js ie8"><![endif]-->
    <!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
  </head>
<body>
	<div id="wrap">
		<header>
			<div class="color-bar">
				<nav class="row quick-menu">
					<ul class="twelve columns">
						<li class="logo-uf"><a href="http://www.ufl.edu/"><?php include( get_stylesheet_directory() . '/images/svg/uf_signature-top.svg'); ?></a></li>
						<li><a href="#"><em>for</em>Students</a></li>
						<li><a href="#"><em>for</em>Prospective Students</a></li>
						<li><a href="#"><em>for</em>Faculty &amp; Staff</a></li>
						<li><a href="#"><em>for</em>Alumni &amp; Friends</a></li>
					</ul>
				</nav>
			</div>
			<div class="row">
				<div class="six columns main-logo">
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php include( get_stylesheet_directory() . '/images/svg/uf_signature-header.svg' ); ?></a>
				</div>
				<div class="six columns search-social">
					<ul>
						<li class="searchform"><?php get_search_form(); ?></li>
						<li class="icon facebook"><a href="#"><?php include( get_stylesheet_directory() . '/images/svg/social_icon-facebook.svg' ); ?></a></li>
						<li class="icon twitter"><a href="#"><?php include( get_stylesheet_directory() . '/images/svg/social_icon-twitter.svg' ); ?></a></li>
						<li class="icon linkedin"><a href="#"><?php include( get_stylesheet_directory() . '/images/svg/social_icon-linkedin.svg' ); ?></a></li>
					</ul>
				</div>
			</div>
		</header>
		<div class="color-bar">
			<?php get_template_part( "menu" ); ?>
		</div>