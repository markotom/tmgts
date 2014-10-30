<?php

  if ( ! defined( 'ABSPATH' ) ) exit();

  if ( ! defined( 'EVENT_ORGANISER_VER' ) && ! is_admin() ) {
    exit( 'Por favor, instala y activa el plugin "Event Organiser" para poder utilizar esta plantilla.' );
  }

  if ( ! isset( $content_width ) )
    $content_width = 1024;

  // Theme Options
  require get_template_directory() . '/includes/theme-options.php';

  // Initialize
  require get_template_directory() . '/includes/configure.php';

  // Navigation
  require get_template_directory() . '/includes/navigation.php';

  // Sidebars
  require get_template_directory() . '/includes/sidebars.php';

  // Content
  require get_template_directory() . '/includes/content.php';

  // Functions
  require get_template_directory() . '/includes/functions.php';

?>
