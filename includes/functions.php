<?php

/**
 * -----------------------------------------------------------------------------
 * Functions
 * -----------------------------------------------------------------------------
 *
 */

function tmgts_global_layout() {

  // Echo global layout
  $global_layout = tmgts_get_global_layout();
  echo $global_layout;

}

    function tmgts_get_global_layout() {

      // Get global layout
      $column_global_layout = ot_get_option( 'tmgts-layout-global' );
      return $column_global_layout;

    }

function tmgts_current_layout() {

  // Echo current layout
  $current_layout = tmgts_get_current_layout();
  echo $current_layout;

}

    function tmgts_get_current_layout() {

      wp_reset_query();

      if ( is_home() ) {

        // Set home layout name
        $layout_name = 'tmgts-layout-home';

      } elseif ( is_single() ) {

        // Set single layout name
        $layout_name = 'tmgts-layout-single';

      } elseif ( is_category() ) {

        // Set category layout name
        $layout_name = 'tmgts-layout-category';

      } elseif ( is_archive() ) {

        // Set archive layout name
        $layout_name = 'tmgts-layout-archive';

      } elseif ( is_search() ) {

        // Set search layout name
        $layout_name = 'tmgts-layout-search';

      } elseif ( is_page() ) {

        // Set page layout name
        $layout_name = 'tmgts-layout-page';

      } elseif ( is_404() ) {

        // Set error 404 layout name
        $layout_name = 'tmgts-layout-404';

      } else {

        // Set global layout name by default
        $layout_name = 'tmgts-layout-global';

      }

      // Get global layout
      $global_layout = tmgts_get_global_layout();

      // Set current layout
      $current_layout = ot_get_option( $layout_name );


      return  ! $current_layout || $current_layout === 'inherit'
              ? $global_layout
              : $current_layout;

    }

function tmgts_main_sidebar() {

  // Hide main sidebar if specified full column
  if (  tmgts_get_current_layout() != 'col-1-full' ) :

    // Get main sidebar
    get_sidebar();

  endif;

}

function tmgts_secondary_sidebar() {

  // Show secondary sidebar if specified three columns
  if (  tmgts_get_current_layout() === 'col-3-middle' ||
        tmgts_get_current_layout() === 'col-3-right' ||
        tmgts_get_current_layout() === 'col-3-left'   ) :

    // Get secondary sidebar
    get_sidebar( 'secondary' );

  endif;

}

function tmgts_pagination() {

  // You can use WP-PageNavi plugin
  // https://wordpress.org/plugins/wp-pagenavi
  if ( function_exists( 'wp_pagenavi' ) ) :

    wp_pagenavi();

  else:

    echo '<ul class="pager"><li class="previous">';

      previous_posts_link();

    echo '</li><li class="next right">';

      next_posts_link();

    echo '</li></ul>';

  endif;

}

function tmgts_post_thumbnail( $thumb_size = 'thumb-large' ) {

  $permalink = get_permalink();

  if ( has_post_thumbnail() ) :

    if ( is_singular() ) :

      echo '<div class="post-thumbnail">';
        the_post_thumbnail( $thumb_size, array( 'class' => 'img-responsive' ) );
      echo '</div>';

    else :

      echo '<a href="' . $permalink . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '" class="post-thumbnail" rel="bookmark">';
        the_post_thumbnail( $thumb_size, array( 'class' => 'img-responsive' ) );
      echo '</a>';

    endif;

  else :

    if ( ! is_singular() ) :

      echo '<a href="' . $permalink . '" class="post-thumbnail" rel="bookmark">';
        echo '<img src="'. get_stylesheet_directory_uri() .'/assets/images/no-photo.gif" alt="">';
      echo'</a>';

    endif;

  endif;

}

function the_breadcrumb() {
  global $post;

  if ( ! is_home() ) {
    echo '<ol class="breadcrumb">';
    echo '<li><a href="' . get_option( 'home' ) . '">';
    echo __( 'Home' );
    echo '</a></li>';

    if ( is_single () ) {

      echo '<li>';
        the_category(', ');
      echo '</li>';

      if ( is_single() ) {
        echo '<li>' . get_the_title() . '</li>';
      }

    } elseif ( is_category () ) {

      echo '<li>'; single_cat_title(); echo '</li>';

    } elseif ( is_page () && ! $post->post_parent && ( ! is_front_page () ) ) {

      echo '<li>' . get_the_title() . '</li>';

    } elseif ( is_page () && $post->post_parent && ( ! is_front_page () ) ) {

      $post_array = get_post_ancestors( $post );
      krsort( $post_array );

      foreach ( $post_array as $key=>$postid ) {
        $post_ids = get_post( $postid );
        echo '<li class="active">';
        echo '<a href="' . get_permalink( $post_ids ) . '">';
        echo $post_ids->post_title;
        echo '</a></li>';
      }

      echo '<li>' . get_the_title() . '</li>';

    } elseif ( is_tag() ) {

      echo '<li>';
      echo 'Etiqueta: ';
        single_tag_title();
      echo '</li>';

    } elseif ( is_day() ) {

      echo '<li>';
      printf( 'Archivo del día: %s', get_the_time( 'F j, Y' ) );
      echo '</li>';

    } elseif ( is_month() ) {

      echo '<li>';
      printf( 'Archivo del mes: %s', get_the_time( 'F, Y' ) );
      echo '</li>';

    } elseif ( is_year() ) {

      echo '<li>';
      printf( 'Archivo del año: %s', get_the_time( 'Y' ) );
      echo '</li>';

    } elseif ( is_author() ) {
      global $author;

      $user_info = get_userdata( $author );

      echo '<li>';
      printf( 'Publicado por %s', $user_info->display_name );
      echo '</li>';

    } elseif ( isset( $_GET[ 'paged' ] ) && ! empty( $_GET[ 'paged' ] ) ) {

      echo '<li>Archivo:</li>';

    } elseif ( is_search() ) {

      echo'<li>Resultados de búsqueda</li>';

    }

    echo '</ol>';
  }
}

// Get attachment id by url
// More info: http://frankiejarrett.com/get-an-attachment-id-by-url-in-wordpress
function wp_get_attachment_id_by_url( $url ) {

  $parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

  $this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
  $file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

  if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
    return;
  }

  global $wpdb;

  $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );

  return $attachment[0];

}

?>
