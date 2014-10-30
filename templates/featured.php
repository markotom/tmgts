<?php $featured_contents = ot_get_option( 'tmgts_featured_content' ); ?>

<?php if ( is_array( $featured_contents ) && count( $featured_contents ) > 0 ) : ?>

<!-- .row -->
<div class="row">

<?php $i = -1; foreach ( $featured_contents as $featured_content ) : $i++; ?>

  <?php if ( $i > 0 && $i % 3 === 0 ) echo '</div><div class="row">'; ?>

  <!-- .col-sm-4 -->
  <div class="col-sm-4">
    <!-- .panel.panel-default -->
    <div class="panel panel-default">
      <?php if ( $featured_content[ 'title' ] ) : ?>
      <!-- .panel-heading -->
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $featured_content[ 'title' ] ?></h3>
      </div><!-- /.panel-heading -->
      <?php endif; ?>

      <!-- .panel-body -->
      <div class="panel-body">
        <p><?php echo $featured_content[ 'description' ] ?></p>
        <?php if ( $featured_content[ 'url' ] ) : ?>
        <a href="<?php echo $featured_content[ 'url' ] ?>" class="btn btn-sm btn-success">
         <?php if ( $featured_content[ 'text_link' ] ) : ?>
         <?php echo $featured_content[ 'text_link' ] ?>
         <?php else : ?>
          Leer más
         <?php endif; ?>
        </a>
        <?php endif; ?>
      </div><!-- /.panel-body -->
    </div><!-- /.panel.panel-default -->
  </div><!-- /.col-sm-4 -->

<?php endforeach; ?>

</div><!-- /.row -->

<?php endif; ?>
