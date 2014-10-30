<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php tmgts_current_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">
      <?php

        if ( is_home() ) :

          // Carousel
          get_template_part( 'templates/carousel' );

          // Featured content
          get_template_part( 'templates/featured' );

        endif;

        wp_reset_query();

        // Show posts if is not home or if 'tmgts_show_posts' is on
        if ( ! is_home() || ot_get_option( 'tmgts_show_posts' ) !== 'off' ) :

          if ( is_home() ) :

            // Show featured category
            if ( ot_get_option( 'tmgts_featured_category_show' ) !== 'off' ) :

              // Get featured category
              query_posts( 'cat=' . ot_get_option( 'tmgts_featured_category' ) );

            endif;

          endif;


          if ( have_posts() ) :

            echo '<div class="post-loop">';

            // Start the loop
            while ( have_posts() ) : the_post();

              // Get template content
              get_template_part( 'templates/content' );

            endwhile;

            echo '</div>';

            tmgts_pagination();

          else :

            // Get "No post found" template
            get_template_part( 'templates/content', 'none' );

          endif;

        endif;

      ?>
    </div><!-- /.content -->

    <?php tmgts_main_sidebar(); ?>
    <?php tmgts_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
