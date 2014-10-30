<?php

/**
 * -----------------------------------------------------------------------------
 * Configure theme
 * -----------------------------------------------------------------------------
 *
 */

// After setup theme
add_action( 'after_setup_theme', 'tmgts_configure_theme', 9 );

// Configure theme
function tmgts_configure_theme() {

  // Theme support
  add_action( 'after_setup_theme', 'tmgts_theme_support' );

  // Head cleanup
  add_action( 'init', 'tmgts_head_cleanup' );

  // Enqueue assets
  add_action( 'wp_enqueue_scripts', 'tmgts_enqueue_assets' );

  // Image sizes
  add_action( 'init', 'tmgts_image_sizes' );

}

// Theme support
function tmgts_theme_support() {

  // Add menus support
  add_theme_support( 'menus' );

  // Add automatic feed links
  add_theme_support( 'automatic-feed-links' );

  // Add post thumbnails support
  add_theme_support( 'post-thumbnails' );

  // HTML5 support
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );

  // Using Event Organiser
  add_theme_support('event-organiser');

}

// Head cleanup
function tmgts_head_cleanup() {

  // Rsd link
  remove_action( 'wp_head', 'rsd_link' );

  // Windows live writer
  remove_action( 'wp_head', 'wlwmanifest_link' );

  // Index link
  remove_action( 'wp_head', 'index_rel_link' );

  // Previous link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

  // Start link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

  // Links for adjacent posts
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

  // WP version
  remove_action( 'wp_head', 'wp_generator' );

}

// Enqueue assets
function tmgts_enqueue_assets() {

  if ( ! is_admin () ) {

    // Asset path format
    $asset_path = get_stylesheet_directory_uri() . '/built/%2$s/%1$s.%2$s';

    // Register "Open Sans" webfont
    wp_register_style( 'tmgts_webfont', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,700,400,600' );
    // Register Font Awesome styles
    wp_register_style( 'tmgts_fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
    // Register main styles
    wp_register_style( 'tmgts_styles', sprintf( $asset_path, 'tmgts', 'css' ) );

    // Enqueue "Open Sans" webfont
    wp_enqueue_style( 'tmgts_webfont' );
    // Enqueue Font Awesome styles
    wp_enqueue_style( 'tmgts_fontawesome' );
    // Enqueue main styles
    wp_enqueue_style( 'tmgts_styles' );

    // Register tmgts scripts
    wp_register_script( 'tmgts_scripts', sprintf( $asset_path, 'tmgts.min', 'js' ), array( 'masonry', 'jquery' ) );

    // Enqueue jquery masonry
    wp_enqueue_script( 'jquery-masonry' );
    // Enqueue tmgts scripts
    wp_enqueue_script( 'tmgts_scripts' );
    // Enqueue comment scripts
    if ( is_singular() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }

}

// Images sizes
function tmgts_image_sizes() {

  // Add thumb-medium size
  add_image_size( 'thumb-medium', 780, 400, true );

  // Add thumb-large size
  add_image_size( 'thumb-large', 1024, 525, true );

}

?>
