<?php
function ufl_get_children( $parent ){

  // Feed parent ID to find the children
  $query_args = array(
    'post_type'   => 'page',
    'post_parent' => $parent, // Get the children of the parent page.
    'fields'      => 'ids' // Only return the ids not the whole thing.
  );

  // Run the query to get the children
  $child_query = new WP_Query( $query_args );

  $children = $child_query->posts; // Get the id's of the children posts.

  return $children;
}