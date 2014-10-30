  </div><!-- /#main -->

  <!-- #footer -->
  <div id="footer">

    <!-- .container -->
    <div class="container">
      <?php

        if ( has_nav_menu( 'footer' ) ) :

        // Shows footer nav menu
        wp_nav_menu(
          array(
            'depth'           => 1,
            'theme_location'  => 'footer',
            'menu_class'      => 'list-inline',
            'container'       => false
          )
        );

        endif;

      ?>

      <?php if ( ot_get_option( 'tmgts_footer_text_show' ) !== 'off' ) : ?>
        <?php echo ot_get_option( 'tmgts_footer_text' ); ?>
      <?php else : ?>
        <?php echo date( 'Y' ); ?> @ <?php bloginfo( 'sitename' ); ?>.
        <br>
        <?php _e( 'Powered by', 'tmgts' ); ?> <a href="http://wordpress.org" rel="nofollow">WordPress</a>.
        <?php _e( 'Theme by', 'tmgts' ); ?> <a href="http://about.me/markotom">@Markotom</a>.
      <?php endif; ?>
    </div><!-- /.container -->
  </div><!-- /#footer -->

  <a href="#" class="toup" style="display: none">
    <span class="fa fa-arrow-up"></span>
  </a>

  <?php wp_footer(); ?>
</body>
</html>
