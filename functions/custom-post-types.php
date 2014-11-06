<?php

add_action( 'init', 'register_post_types' );
/**
 * Register custom post types
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function register_post_types() {

  $type_labels = array(
    'name'               => 'Types',
    'singular_name'      => 'Type',
    'menu_name'          => 'Types',
    'name_admin_bar'     => 'Type',
    'add_new'            => 'New Type',
    'add_new_item'       => 'New Type',
    'new_item'           => 'New Type',
    'edit_item'          => 'edit Type',
    'view_item'          => 'view Type',
    'all_items'          => 'All Types',
    'search_items'       => 'search Type',
    'parent_item_colon'  => 'Parent:',
    'not_found'          => 'No Types found',
    'not_found_in_trash' => 'No Types found in Trash'
  );

  $type_args = array(
    'labels'             => $type_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor' )
  );

  //register_post_type( 'type', $type_args );

}