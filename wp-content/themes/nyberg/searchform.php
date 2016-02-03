<form action="/" method="get">

    <input class="nyberg-search-input" type="text" name="s" placeholder="Sök" id="search"
           value="<?php the_search_query(); ?>"/>
    <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/images/search-white.png"/>

</form>