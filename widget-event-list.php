<?php

  global $eo_event_loop, $eo_event_loop_args;

  // Date % time format for events
  $date_format = 'M j';
  $time_format = 'G:i';

  // The list ID / classes
  $id = $eo_event_loop_args[ 'id' ];
  $classes = $eo_event_loop_args[ 'class' ];

?>

<?php if( $eo_event_loop->have_posts() ): ?>

  <ul class="<?php echo esc_attr( $classes );?>" >

    <?php while( $eo_event_loop->have_posts() ): $eo_event_loop->the_post(); ?>

      <?php

        $eo_event_classes = eo_get_event_classes();
        $format = ( eo_is_all_day() ? $date_format : $date_format . ' \<\b\r\> ' . $time_format  );

      ?>

      <li class="<?php echo esc_attr( implode( ' ', $eo_event_classes ) ); ?>" >
        <div class="event-date">
          <span class="event-date-day"><?php echo eo_get_the_start( 'l' ); ?></span>
          <span class="event-date-format"><?php echo ucfirst(eo_get_the_start( $format )); ?></span>
        </div>

        <div class="event-title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </div>

        <div class="event-venue">
          <small><?php echo eo_get_venue_name(); ?></small>
        </div>
      </li>

    <?php endwhile; ?>

  </ul>

<?php elseif ( ! empty( $eo_event_loop_args[ 'no_events' ] ) ) : ?>

  <ul id="<?php echo esc_attr( $id );?>" class="<?php echo esc_attr( $classes );?>" >
    <li class="eo-no-events"> <?php echo $eo_event_loop_args[ 'no_events' ]; ?> </li>
  </ul>

<?php endif; ?>
