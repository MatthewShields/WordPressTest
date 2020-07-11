<form role="search" method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
        <input type="search" class="search-field" placeholder="<?php the_field('translate_search_form_placeholder', 'options'); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <input class="screen-reader-text search-button btn" type="submit" id="search-submit" value="Search" />
    </div>
</form>