<?php

/**
 * -----------------------------------------------------------------------------
 * Navigation
 * -----------------------------------------------------------------------------
 *
 */

// After setup theme
add_action( 'after_setup_theme', 'tmgts_register_nav_menus' );

// Register Nav Menus
function tmgts_register_nav_menus() {

  // Register nav main menu
  register_nav_menu( 'main', __( 'Main menu', 'tmgts' ) );

  // Register nav footer menu
  register_nav_menu( 'footer', __( 'Footer menu', 'tmgts' ) );

}

// Remove menu item id
add_filter( 'nav_menu_item_id', '__return_null' );

/**
 * -----------------------------------------------------------------------------
 * Dropdown menus
 * -----------------------------------------------------------------------------
 *
 */

// Modify menu item with walker
add_filter( 'wp_nav_menu_args', 'tmgts_wp_nav_menu_args' );

function tmgts_wp_nav_menu_args( $args ) {

  // Add walker from Tmgts_Nav_Menu
  $args[ 'walker' ] = new Tmgts_Nav_Menu();

  return $args;

}

// Extends Walker_Nav_Menu to Tmgts_Nav_Menu
// http://codex.wordpress.org/Class_Reference/Walker_Nav_Menu
// http://wp.tutsplus.com/tutorials/creative-coding/understanding-the-walker-class/
class Tmgts_Nav_Menu extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ) {

    $output .= "\n<ul class=\"dropdown-menu\">\n";

  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

      $item_html = '';

      parent::start_el( $item_html, $item, $depth, $args );

      // Add classes and data attributes to support dropdown menus
      if ( $item->is_dropdown && $depth <= 1 ) {
        $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html );
        $item_html = str_replace( '</a>', ' <b class="caret"></b></a>', $item_html );
      }

      // Remove link if is specified the "divider" class
      if ( stristr( $item_html, 'li class="divider' ) ) {
        $item_html = preg_replace( '/<a[^>]*>.*?<\/a>/iU', '', $item_html );
      }

      $output .= $item_html;

    }

    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

      $element->is_dropdown = ! empty( $children_elements[ $element->ID ] );

      if ( $element->is_dropdown ) {
        if ( $depth === 0 ) {
          $element->classes[] = 'dropdown';
        } elseif ( $depth === 1 ) {
          $element->classes[] = 'dropdown-submenu';
        }
      }

      parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

    }

}

?>
