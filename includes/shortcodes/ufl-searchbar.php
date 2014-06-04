<?php // SHORTCODE: [ufl_searchbar]

function ufl_searchbar() {

  $output  = '<div class="searchbar">';
  $output .= '<form method="get" action="http://search.ufl.edu/search" role="search">';
  $output .= '<input type="hidden" name="source" id="source" value="web">';
  $output .= '<input type="hidden" name="site" id="site" value="www.law.ufl.edu">';
  $output .= '<input type="text" placeholder="Search Levin College of Law" name="query" />';
  $output .= '<button type="submit">';
  $output .= '<div class="svg-search" data-src="search-button"></div>';
  $output .= '</button>';
  $output .= '</form>';
  $output .= '</div>';
  
  return $output;
}

add_shortcode("ufl_searchbar", "ufl_searchbar");