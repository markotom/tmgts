<?php $slides = ot_get_option( 'tmgts_carousel_slides' ); ?>

<?php if ( is_array( $slides ) ) : ?>

<!-- .carousel-wrapper -->
<div class="carousel-wrapper">

  <!-- #carousel-home -->
  <div id="carousel-home" class="carousel carousel-home slide" data-ride="carousel">

    <?php if ( count( $slides ) > 1 ) : ?>
    <ol class="carousel-indicators">
      <?php $i = -1; foreach ( $slides as $slide ) : $i++; ?>
      <li data-target="#carousel-home" data-slide-to="<?php echo $i ?>"<?php echo $i === 0 ? ' class="active"' : '' ?>></li>
      <?php endforeach; ?>
    </ol>
    <?php endif; ?>

    <div class="carousel-inner">
      <?php $i = -1; foreach ( $slides as $slide ) : $i++; ?>
      <?php
        $image_id  = wp_get_attachment_id_by_url( $slide[ 'image' ] );
        $slide_image = wp_get_attachment_image_src( $image_id, 'thumb-large' );
        $image = ! $slide_image[0] ? $slide[ 'image' ] : $slide_image[0];
      ?>
      <div class="item<?php echo $i === 0 ? ' active' : '' ?>" style="background-image: url(<?php echo $image ?>)">
        <div class="carousel-caption">
          <?php if ( $slide[ 'title' ] ) : ?>
          <h4>
            <?php if ( $slide[ 'url' ] ) : ?>
            <a href="<?php echo $slide[ 'url' ] ?>">
              <?php echo $slide[ 'title' ] ?>
            </a>
            <?php else : ?>
            <?php echo $slide[ 'title' ] ?>
            <?php endif; ?>
          </h4>
          <?php endif; ?>

          <?php if ( $slide[ 'caption' ] ) : ?>
          <p><?php echo $slide[ 'caption' ] ?></p>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <?php if ( count( $slides ) > 1 ) : ?>
    <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
      <span class="fa fa-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
      <span class="fa fa-chevron-right"></span>
    </a>
    <?php endif; ?>

  </div><!-- /#carousel-home -->

</div><!-- /.carousel-wrapper -->

<?php endif; ?>
