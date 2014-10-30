<!-- #post-? -->
<article id="post-<?php the_ID(); ?>" <?php post_class( eo_get_event_classes() ); ?>>

  <!-- .entry-wrapper -->
  <div class="entry-wrapper">

    <!-- .entry-header -->
    <header class="entry-header">
      <?php
        // Get venue map if is single
        if ( is_single() && eo_get_venue_map() ) {
          echo do_shortcode('[eo_venue_map]');
        }
      ?>

      <!-- .entry-meta.entry-meta-top -->
      <div class="entry-meta entry-meta-top">
        <span class="entry-meta-categories"><?php the_terms(get_the_ID(), 'event-category', null, ' ', null); ?></span>
      </div><!-- /.entry-meta.entry-meta-top -->

      <?php if ( is_single() ) : ?>
      <h1 class="h3 entry-title"><?php the_title(); ?></h1>
      <?php else : ?>
      <h1 class="h4 entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h1>
      <?php endif; ?>

      <?php
        $format = is_single() ? 'F j, Y \a \l\a\s H:i \h\r\s' : 'd-m-Y \a \l\a\s H:i \h\r\s';
        $start  = ucfirst( eo_get_the_start( $format ) );
        $end    = ucfirst( eo_get_the_end( $format ) );
      ?>
      <div class="well" style="position: relative">
        <?php if ( is_single() ) : ?>
        <div class="add-to-google" style="position: absolute; right: 20px">
          <a class="btn btn-sm btn-primary" href="<?php echo esc_url( eo_get_add_to_google_link() ); ?>" title="Añadir evento a Google Calendar">Añadir a Google</a>
        </div>
        <?php endif; ?>

        <small class="text-muted">
        <?php if( eo_is_all_day() ) : ?>
          <span class="text-primary">
            <span class="fa fa-clock-o"></span> <strong>Inicia:</strong>
          </span> <?php echo $start; ?> <strong>(todo el día)</strong>
        <?php else : ?>
          <span class="text-primary">
            <span class="fa fa-clock-o"></span> <strong>Inicia:</strong>
          </span> <?php echo $start; ?> <br>
          <span class="text-primary">
            <span class="fa fa-clock-o"></span> <strong>Finaliza:</strong>
          </span> <?php echo $end; ?>
        <?php endif; ?>
        <?php if ( eo_get_venue_name() ) : ?>
          <br>
          <span class="text-primary">
            <span class="fa fa-map-marker"></span> <strong>Lugar:</strong>
          </span> <?php echo eo_get_venue_name(); ?>
        <?php endif; ?>
        </small>
      </div>
    </header><!-- /.entry-header -->

    <?php if ( is_single() ) : ?>
    <!-- .entry-content -->
    <div class="entry-content">
      <?php the_content(); ?>
    </div><!-- /.entry-content -->
    <?php else : ?>
    <!-- .entry-summary -->
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- /.entry-summary -->
    <?php endif; ?>

  </div><!-- /.entry-wrapper -->

</article><!-- /#post-? -->
