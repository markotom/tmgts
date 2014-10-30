<?php if ( post_password_required() ) return; ?>

<!-- #comments -->
<div id="comments">

  <?php if ( have_comments() ) : ?>
  <?php $comments_by_type = separate_comments( $comments ); ?>

    <!-- .nav.nav-tabs -->
    <ul class="nav nav-tabs">
      <!-- .comment-content -->
      <li class="comment-content active">
        <a href="#comment-content" role="tab" data-toggle="tab">
          <?php _e( 'Comments' ); ?>
          <span class="badge">
            <?php echo count( $comments_by_type[ 'comment' ] ); ?>
          </span>
        </a>
      </li><!-- /.comment-content -->

      <?php if ( ! empty( $comments_by_type[ 'pings' ] ) ) : ?>
      <!-- .pingback-content -->
      <li class="pingback-content">
        <a href="#pingback-content" role="tab" data-toggle="tab">
          <?php _e( 'Pingbacks' ); ?>
          <span class="badge">
            <?php echo count( $comments_by_type[ 'pings' ] ); ?>
          </span>
        </a>
      </li><!-- /.pingback-content -->
      <?php endif; ?>
    </ul><!-- /.nav.nav-tabs -->

    <!-- .tab-content -->
    <div class="tab-content">
      <!-- #comment-content -->
      <div id="comment-content" class="tab-pane fade in active">

        <!-- .comment-list -->
        <ol class="comment-list">
          <?php wp_list_comments( 'avatar_size=50&type=comment' ); ?>
        </ol><!-- /.comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="nav-comments" role="navigation">
          <div class="nav-previous"><?php previous_comments_link(); ?></div>
          <div class="nav-next"><?php next_comments_link(); ?></div>
        </nav><!--/.comments-nav-->
        <?php endif; ?>

      </div><!-- /#comment-content -->

      <!-- #pingback-content -->
      <div id="pingback-content" class="tab-pane fade">

        <!-- .pingback-list -->
        <ol class="pingback-list">
          <?php foreach ( $comments_by_type[ 'pings' ] as $ping ) : ?>
            <!-- .pingback -->
            <li class="pingback">
              <!-- .pingback-link -->
              <div class="pingback-link">
                <?php comment_author_link( $ping ); ?>
              </div><!-- /.pingback-link -->

              <!-- .pingback-meta -->
              <div class="pingback-meta">
                <?php comment_date( get_option( 'date_format' ), $ping ); ?>
              </div><!-- /.pingback-meta -->

              <!-- .pingback-content -->
              <div class="pingback-content">
                <?php comment_text( $ping ); ?>
              </div><!-- /.pingback-content -->
            </li><!-- /.pingback -->
          <?php endforeach; ?>
        </ol><!-- /.pingback-list -->

      </div><!-- /#pingback-content -->
    </div><!-- /.tab-content -->

  <?php endif; ?>

  <?php if ( comments_open() ) comment_form(); ?>

</div><!-- /#comments -->
