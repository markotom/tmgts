<?php

/**
 * -----------------------------------------------------------------------------
 * OptionTree Framework
 * -----------------------------------------------------------------------------
 *
 */

// Hide pages from admin menu
add_filter( 'ot_show_pages', '__return_false' );

// Avoid create a default layout
add_filter( 'ot_show_new_layout', '__return_false' );

// Turn on theme mode
add_filter( 'ot_theme_mode', '__return_true' );

// Load template
require get_template_directory() . '/option-tree/ot-loader.php';

/**
 * -----------------------------------------------------------------------------
 * Theme Options
 * -----------------------------------------------------------------------------
 *
 */

// Set custom theme options
add_action( 'admin_init', 'custom_theme_options', 1 );

function custom_theme_options() {

  // OptionTree is not loaded yet
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;

  // Get saved settings
  $saved_settings = get_option( ot_settings_id(), array() );

  // Column layouts
  $global_column_layouts = tmgts_get_column_layouts();
  array_shift( $global_column_layouts );

  $column_layouts = tmgts_get_column_layouts();

  // Set custom settings
  $custom_settings = array(

    // Contextual help
    'contextual_help' => array(
      'content' => array(
        array(
          'id' => 'information',
          'title' => 'Información',
          'content' => '
            <h1>Territorialidades múltiples</h1>
            <p>
              Tema de Wordpress creado para el proyecto de investigación
              <em>Territorialidades múltiples. La geografía en la teoría social</em>.
            </p>
            <hr>
            <p>
              Diseñado y desarrollado por
              <a href="http://about.me/markotom">Marco Godínez</a>
            </p>
          '
        )
      )
    ),

    // Sections
    'sections' => array(
      array(
        'id' => 'home',
        'title' => 'Portada'
      ),
      array(
        'id' => 'carousel',
        'title' => 'Carrusel'
      ),
      array(
        'id' => 'layout',
        'title' => 'Diseño'
      ),
      array(
        'id' => 'header',
        'title' => 'Encabezado'
      ),
      array(
        'id' => 'footer',
        'title' => 'Pie de página'
      ),
      array(
        'id' => 'social-links',
        'title' => 'Redes sociales'
      ),
      array(
        'id' => 'extras',
        'title' => 'Extras'
      )
    ),

    // Settings
    'settings' => array(

      // Excerpt Length
      array(
        'id' => 'tmgts_excerpt_length',
        'label' => 'Cantidad de palabras del resumen',
        'desc' => 'Establece la cantidad de palabras que se mostrarán en el resumen de cada publicación',
        'std' => '55',
        'type' => 'numeric-slider',
        'section' => 'extras',
        'min_max_step' => '0,100,1'
      ),

      // Show posts in home
      array(
        'id'          => 'tmgts_show_posts',
        'label'       => 'Mostrar entradas en la portada',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'home',
      ),

      // Show featured category
      array(
        'id'          => 'tmgts_featured_category_show',
        'label'       => 'Mostrar entradas de una categoría destacada',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'home',
      ),

      // Featured Category
      array(
        'id' => 'tmgts_featured_category',
        'label' => 'Categoría destacada',
        'desc' => 'Muestra entradas de la categoría destacada en vez de mostrar todas las entradas de todas las categorías',
        'type' => 'category-select',
        'section' => 'home',
      ),

      // Featured content
      array(
        'id'          => 'tmgts_featured_content',
        'label'       => 'Contenido destacado',
        'desc'        => 'Añadir bloques de contenido destacado que se mostrarán en la portada',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'home',
        'settings'    => array(
          array(
            'id'          => 'description',
            'label'       => 'Descripción',
            'std'         => '',
            'type'        => 'text'
          ),
          array(
            'id'          => 'url',
            'label'       => 'Enlace',
            'std'         => '',
            'type'        => 'text'
          ),
          array(
            'id'          => 'text_link',
            'label'       => 'Texto del enlace',
            'std'         => '',
            'type'        => 'text'
          )
        )
      ),

      // Global layout
      array(
        'id'          => 'tmgts-layout-global',
        'label'       => 'Diseño global',
        'desc'        => 'Diseño global. Otros diseños reemplazarán este diseño si están definidos.',
        'std'         => 'col-3-left',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $global_column_layouts
      ),

      // Home layout
      array(
        'id'          => 'tmgts-layout-home',
        'label'       => 'Diseño de portada',
        'desc'        => 'Diseño de portada. Si no está definido, heradará el diseño global.',
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      // Single layout
      array(
        'id'          => 'tmgts-layout-single',
        'label'       => 'Diseño de entrada',
        'desc'        => 'Diseño de entrada. Si no está definido, heradará el diseño global.',
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      // Page layout
      array(
        'id'          => 'tmgts-layout-page',
        'label'       => 'Diseño de página',
        'desc'        => 'Diseño de página. Si no está definido, heradará el diseño global.',
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      // Archive layout
      array(
        'id'          => 'tmgts-layout-archive',
        'label'       => 'Diseño de archivo',
        'desc'        => 'Diseño de archivo. Si no está definido, heradará el diseño global.',
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      // Category layout
      array(
        'id'          => 'tmgts-layout-category',
        'label'       => 'Diseño de categoría',
        'desc'        => 'Diseño de categoría. Si no está definido, heradará el diseño global.',
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      // Search layout
      array(
        'id'          => 'tmgts-layout-search',
        'label'       => 'Diseño de búsqueda',
        'desc'        => 'Diseño de búsqueda. Si no está definido, heradará el diseño global.',
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      // Error 404 layout
      array(
        'id'          => 'tmgts-layout-404',
        'label'       => 'Diseño de error 404',
        'desc'        => 'Diseño de error 404. Si no está definido, heradará el diseño global.',
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      // Carousel slides
      array(
        'id'          => 'tmgts_carousel_slides',
        'label'       => 'Imágenes',
        'desc'        => 'Añadir nueva imagen al carrusel',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'carousel',
        'settings'    => array(
          array(
            'id'          => 'caption',
            'label'       => 'Descripción',
            'std'         => '',
            'type'        => 'text'
          ),
          array(
            'id'          => 'image',
            'label'       => 'Imagen destacada',
            'std'         => '',
            'type'        => 'upload'
          ),
          array(
            'id'          => 'url',
            'label'       => 'Enlace',
            'std'         => '',
            'type'        => 'text'
          )
        )
      ),

      // Heading
      array(
        'id'          => 'tmgts_heading',
        'label'       => 'Texto de encabezado',
        'desc'        => 'Muestra el texto de encabezado en vez del nombre del sitio',
        'type'        => 'text',
        'section'     => 'header',
      ),

      // Heading image
      array(
        'id'          => 'tmgts_heading_image',
        'label'       => 'Imagen del encabezado',
        'desc'        => 'Añadir imagen del encabezado. Esta imagen es independiente del texto de encabezado.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header'
      ),

      // Subheading
      array(
        'id'          => 'tmgts_subheading',
        'label'       => 'Texto de subencabezado',
        'desc'        => 'Muestra el texto de subencabezado en vez de la descripción del sitio',
        'type'        => 'text',
        'section'     => 'header',
      ),

      // Show subheading
      array(
        'id'          => 'tmgts_show_subheading',
        'label'       => 'Mostrar texto de encabezado',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header',
      ),

      // Show search form
      array(
        'id'          => 'tmgts_search_form',
        'label'       => 'Mostrar formulario de búsqueda',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header',
      ),

      // Show footer text
      array(
        'id'          => 'tmgts_footer_text_show',
        'label'       => 'Mostrar texto de pie de página',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'footer',
      ),

      // Footer text
      array(
        'id' => 'tmgts_footer_text',
        'label' => 'Texto de pie de página',
        'desc' => 'Añadir texto de pie de página',
        'type' => 'textarea',
        'section' => 'footer'
      ),

      // Social Links (Facebook)
      array(
        'id' => 'tmgts_social_links_facebook',
        'label' => 'Facebook',
        'desc' => 'Escribe la dirección completa de tu Facebook',
        'std' => '',
        'type' => 'text',
        'section' => 'social-links'
      ),

      // Social Links (Twitter)
      array(
        'id' => 'tmgts_social_links_twitter',
        'label' => 'Twitter',
        'desc' => 'Escribe la dirección completa de tu Twitter',
        'std' => '',
        'type' => 'text',
        'section' => 'social-links'
      ),

      // Social Links (Google)
      array(
        'id' => 'tmgts_social_links_google',
        'label' => 'Google+',
        'desc' => 'Escribe la dirección completa de tu Google+',
        'std' => '',
        'type' => 'text',
        'section' => 'social-links'
      ),

      // Social Links (Youtube)
      array(
        'id' => 'tmgts_social_links_youtube',
        'label' => 'Youtube',
        'desc' => 'Escribe la dirección completa de tu canal de Youtube',
        'std' => '',
        'type' => 'text',
        'section' => 'social-links'
      )
    )

  );

  // Save custom settings if are not the same
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
  }

}

// To get column layouts
function tmgts_get_column_layouts() {

  return array(
    array(
      'value'     => 'inherit',
      'label'     => 'Heredar',
      'src'       => get_template_directory_uri() . '/assets/images/layouts/inherit.gif'
    ),
    array(
      'value'     => 'col-1-full',
      'label'     => '1 columna completa',
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-1-full.gif'
    ),
    array(
      'value'     => 'col-2-right',
      'label'     => '2 columnas, contenido a la derecha',
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-2-right.gif'
    ),
    array(
      'value'     => 'col-2-left',
      'label'     => '2 columnas, contenido a la izquierda',
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-2-left.gif'
    ),
    array(
      'value'     => 'col-3-middle',
      'label'     => '3 columnas, contenido en medio',
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-middle.gif'
    ),
    array(
      'value'     => 'col-3-right',
      'label'     => '3 columnas, contenido a la derecha',
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-right.gif'
    ),
    array(
      'value'     => 'col-3-left',
      'label'     => '3 columnas, contenido a la izquierda',
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-left.gif'
    )
  );

}

?>
