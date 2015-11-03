<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-field">
    <input id="search" type="search" required value="<?php echo get_search_query(); ?>" name="s">
    <label for="search"><i class="mdi-action-search"></i></label>
    <i class="mdi-navigation-close"></i>
  </div>
</form>
