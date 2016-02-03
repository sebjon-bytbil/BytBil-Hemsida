<form role="search" method="get" class="search-form" action="/">
    <label>
        <input type="search"
               class="search-field"
               placeholder="Sök på gustafebil.se"
               value="<?php the_search_query(); ?>" name="s"
               title="Sök efter">
    </label>
    <input type="submit" class="search-submit" value="Search">
</form>
