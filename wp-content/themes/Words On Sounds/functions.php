<?php

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

add_action('wp_enqueue_scripts', 'main_load_scripts');
function main_load_scripts() {
	if ( !is_admin() ) wp_deregister_script('jquery');
	wp_enqueue_style('main', get_template_directory_uri() . '/dist/main.css?v=' . time());
	wp_enqueue_style('hamburger', get_template_directory_uri() . '/dist/hamburger.css?v=' . time());
	wp_enqueue_script('main', get_template_directory_uri() . '/dist/main-bundle.js', [], time());
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
	));
}

function create_post_types() {
    // register_post_type( 'Deals',
    //     array(
    //         'labels' => array(
    //           'name' => __( 'Deals' ),
    //           'singular_name' => __( 'Deal' )
    //         ),
    //         'supports' => array( 'title' ),
    //         'public' => true,
    //         'has_archive' => true,
    //         'rewrite' => array('slug' => 'deals'),
    //         'menu_icon' => 'dashicons-universal-access'
    //     )
    // );
}
// add_action( 'init', 'create_post_types' );

function insert_category() {
  wp_insert_category(
    array(
      'cat_name' => 'Music Reviews',
      'category_description'  => 'This is for a music review',
      'category_nicename'     => 'music-reviews',
      'taxonomy'        => 'category'
    )
  );
  wp_insert_category(
    array(
      'cat_name' => 'Podcasts',
      'category_description'  => 'This is for a podcast',
      'category_nicename'     => 'podcasts',
      'taxonomy'        => 'category'
    )
  );
  wp_insert_category(
    array(
      'cat_name' => 'Essays',
      'category_description'  => 'This is for an essay',
      'category_nicename'     => 'essays',
      'taxonomy'        => 'category'
    )
  );
  wp_insert_category(
    array(
      'cat_name' => 'Book Reviews',
      'category_description'  => 'This is for a book review',
      'category_nicename'     => 'book-reviews',
      'taxonomy'        => 'category'
    )
  );
  wp_insert_category(
    array(
      'cat_name' => 'News',
      'category_description'  => 'This is for news',
      'category_nicename'     => 'news',
      'taxonomy'        => 'category'
    )
  );
}
require_once( ABSPATH . '/wp-admin/includes/taxonomy.php');
add_action( 'init', 'insert_category' );

if ( !function_exists('write_log') ) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

if ( !function_exists('no_orphans') ) {
  function no_orphans($string) {
    $pos = strrpos($string, " ");
    return substr_replace($string, '&nbsp;', $pos, 1);
  }
}

/**
 * Remove the username tag from the Twitter card necessary for Slack
 * 
 * @param Array $tag_arr ( meta tag key value pairs )
 * 
 * @return Array $tag_arr
 */
function wpf13625975_yoast_remove_username_metatag( $tag_arr ) {
  
  if( isset( $tag_arr['Written by'] ) ) {
    unset( $tag_arr['Written by'] );
  }
  
  return $tag_arr;
  
}
add_filter( 'wpseo_enhanced_slack_data', 'wpf13625975_yoast_remove_username_metatag' );

// disable the gutenburg editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// excerpt more
function mytheme_custom_excerpt_length( $length ) {
    return 43;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

function new_excerpt_more($more) {
    return ' <a href="' . get_permalink() . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//

// function custom_pre_get_posts( $query ) {  
//   if( $query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {  
//       $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
//   }
// } 

// add_action('pre_get_posts','custom_pre_get_posts'); 

function custom_request($query_string ) { 
     if( isset( $query_string['page'] ) ) { 
         if( ''!=$query_string['page'] ) { 
             if( isset( $query_string['name'] ) ) { unset( $query_string['name'] ); } } } return $query_string; } 

add_filter('request', 'custom_request');

function custom_pre_get_posts($query) {
    if ($query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {
        $query->set('page_val', get_query_var('paged'));
        $query->set('paged', 0);
    }
}

add_action('pre_get_posts', 'custom_pre_get_posts');
