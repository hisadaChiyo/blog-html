<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text">検索:</span>
        <input type="search" class="search-field" placeholder="検索…" value="<?php echo get_search_query(); ?>" name="s" required pattern=".*\S+.*">
    </label>
    <input type="submit" class="search-btn" value="検索">
</form>