<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php tmgts_current_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">

      <?php if ( have_posts() ) : ?>

      <!-- .page-title -->
      <h1 class="page-title">
        <?php if ( is_day() ) : ?>
          <span class="fa fa-calendar"></span> Archivo del día: <?php echo get_the_time('F j, Y'); ?>
        <?php elseif ( is_month() ) : ?>
          <span class="fa fa-calendar"></span> Archivo del mes: <?php echo get_the_time('F Y'); ?>
        <?php elseif ( is_year() ) : ?>
          <span class="fa fa-calendar"></span> Archivo del año: <?php echo get_the_time('Y'); ?>
        <?php elseif ( is_category() ) : ?>
          Categoría: <?php single_cat_title(); ?>
        <?php elseif ( is_tag() ) : ?>
          <span class="fa fa-tag"></span> Etiqueta: <?php single_tag_title(); ?>
        <?php elseif ( is_author() ) : ?>
          <?php $author = get_userdata( get_query_var('author') );?>
          <span class="fa fa-user"></span> <?php _e( 'Author' ); ?>: <?php echo $author->display_name;?>
        <?php else : ?>
          <?php the_title(); ?>
        <?php endif; ?>
      </h1><!-- /.page-title -->

      <?php

          echo '<div class="post-loop">';

          // Start the loop
          while ( have_posts() ) : the_post();

            // Get template content
            get_template_part( 'templates/content', get_post_type() );

          endwhile;

          echo '</div>';

          tmgts_pagination();

        else :

          // Get "No post found" template
          get_template_part( 'content', 'none' );

        endif;
      ?>
    </div><!-- /.content -->

    <?php tmgts_main_sidebar(); ?>
    <?php tmgts_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
