<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <!-- Wordpress titles -->
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <!-- Set encoding -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <!-- Pingback -->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!-- Wordpress head -->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <?php if ( has_nav_menu( 'main' ) ) : ?>
  <!-- #navbar-main.navbar.navbar-inverse -->
  <nav id="navbar-main" class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <!-- .container -->
    <div class="container">

      <?php

        // Shows main nav menu
        wp_nav_menu(
          array(
            'depth'           => 3,
            'theme_location'  => 'main',
            'menu_class'      => 'nav navbar-nav',
            'container'       => false
          )
        );

      ?>

      <?php if ( ot_get_option( 'tmgts_search_form' ) !== 'off' ) : ?>
      <div class="navbar-form navbar-right">
        <?php get_search_form(); ?>
      </div>
      <?php endif; ?>

    </div><!-- /.container -->

  </nav><!-- /#navbar-main.navbar.navbar-inverse -->
  <?php endif; ?>

  <?php
    $heading_image = ot_get_option( 'tmgts_heading_image' );
    $heading_image = $heading_image ? 'background-image: url(' . $heading_image . ');' : '';
  ?>

  <!-- #header -->
  <div id="header" style="<?php echo $heading_image ?>">

    <!-- .container -->
    <div class="container">

        <?php if ( ot_get_option( 'tmgts_heading' ) ) : ?>

        <!-- .site-name.text-heading -->
        <h1 class="site-name text-heading fadeInLeft animated">
          <a href="<?php echo home_url() ; ?>" rel="home">
            <?php echo ot_get_option( 'tmgts_heading' ) ?>
          </a>
        </h1><!-- /.site-name.text-heading -->

        <?php else : ?>

        <!-- .site-name -->
        <h1 class="site-name fadeInLeft animated">
          <a href="<?php echo home_url() ; ?>" rel="home">
            <?php bloginfo( 'sitename' ) ?>
          </a>
        </h1><!-- /.site-name -->

        <?php endif; ?>

        <?php if ( ot_get_option( 'tmgts_show_subheading' ) !== 'off' ) : ?>

          <?php if ( ot_get_option( 'tmgts_subheading' ) ) : ?>

          <!-- .text-subheading -->
          <h2 class="text-subheading fadeInLeft animated">
            <?php echo ot_get_option( 'tmgts_subheading' ) ?>
          </h2><!-- /.text-subheading -->

          <?php else : ?>

          <!-- .text-subheading -->
          <h2 class="text-subheading fadeInLeft animated">
            <?php bloginfo( 'description' ) ?>
          </h2><!-- /.text-subheading -->

          <?php endif; ?>

        <?php endif; ?>

        <?php

          $socials = array();

          if ( ot_get_option('tmgts_social_links_facebook') ) {
            $socials[] = array(
              'icon' => 'fa fa-facebook',
              'url' => ot_get_option('tmgts_social_links_facebook'),
              'class' => 'facebook'
            );
          }

          if ( ot_get_option('tmgts_social_links_twitter') ) {
            $socials[] = array(
              'icon' => 'fa fa-twitter',
              'url' => ot_get_option('tmgts_social_links_twitter'),
              'class' => 'twitter'
            );
          }

          if ( ot_get_option('tmgts_social_links_google') ) {
            $socials[] = array(
              'icon' => 'fa fa-google-plus',
              'url' => ot_get_option('tmgts_social_links_google'),
              'class' => 'google'
            );
          }

          if ( ot_get_option('tmgts_social_links_youtube') ) {
            $socials[] = array(
              'icon' => 'fa fa-youtube',
              'url' => ot_get_option('tmgts_social_links_youtube'),
              'class' => 'youtube'
            );
          }

        ?>

        <?php if ( count( $socials ) > 0 ) : ?>
        <ul class="socials">
          <?php foreach ( $socials as $social ) : ?>
            <li class="<?php echo $social[ 'class' ]; ?>">
              <a href="<?php echo $social[ 'url' ]; ?>">
                <span class="<?php echo $social[ 'icon' ] ?>"></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>

    </div><!-- /.container -->

  </div><!-- /#header -->

  <?php if ( ! is_home() ) : ?>

  <!-- #breadcrumb -->
  <div id="breadcrumb">

    <!-- .container -->
    <div class="container">

      <?php if ( ot_get_option( 'tmgts_subheading' ) ) : ?>
        <h2 class="breadcrumb-title text-muted">
          <?php echo ot_get_option( 'tmgts_subheading' ) ?>
        </h2>
      <?php endif; ?>

      <?php the_breadcrumb(); ?>

    </div><!-- /.container -->

  </div><!-- /#breadcrumb -->

  <?php endif; ?>

  <!-- #main -->
  <div id="main" class="fadeInUp animated">
