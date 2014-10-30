<!-- .search-form -->
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="input-group">
    <input type="search" class="search-field form-control" placeholder="<?php _ex( 'Search &hellip;', 'placeholder' ); ?>" value="<?php get_search_query(); ?>" name="s" title="<?php _ex( 'Search for:', 'label' ); ?>">
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default">
        <span class="fa fa-search"></span>
      </button>
    </span>
  </div>
</form><!-- /.search-form -->
