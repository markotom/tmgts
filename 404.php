<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php tmgts_current_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">

      <h1 class="page-title">Error 404. No se ha encontrado.</h1>

      <!-- .page-content -->
      <div class="page-content">
        <p>No se ha encontrado nada en en esta ubicación. Puedes intentar una búsqueda.</p>

        <?php get_search_form(); ?>
      </div><!-- /.page-content -->

    </div><!-- /.content -->

    <?php tmgts_main_sidebar(); ?>
    <?php tmgts_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
