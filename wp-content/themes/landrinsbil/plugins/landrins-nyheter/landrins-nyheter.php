<?php
/*
Plugin Name: Landrins Nyheter
Description: Skapa och visa Nyheter.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/
add_action('init', 'cptui_register_my_cpt_news');
function cptui_register_my_cpt_news()
{
    register_post_type('news', array(
            'label' => 'Nyhet',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'nyhet', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'revisions', 'editor'),
            'labels' => array(
                'name' => 'Nyhet',
                'singular_name' => 'Nyhet',
                'menu_name' => 'Nyheter',
                'add_new' => 'Lägg till Nyhet',
                'add_new_item' => 'Lägg till Nyhet',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Nyhet',
                'new_item' => 'Ny Nyhet',
                'view' => 'Visa Nyhet',
                'view_item' => 'Visa Nyhet',
                'search_items' => 'Sök Nyhet',
                'not_found' => 'Inga Nyheter hittade',
                'not_found_in_trash' => 'Inga Nyheter i papperskorgen',
                'parent' => 'Nyhetens förälder',
            )
        )
    );
}

add_action('init', 'cptui_register_my_taxes_news_categories');
function cptui_register_my_taxes_news_categories()
{
    register_taxonomy('news_categories', array(
        0 => 'news',
    ),
        array('hierarchical' => false,
            'label' => 'Kategorier',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array(
                'search_items' => 'Kategori',
                'popular_items' => 'Populära kategorier',
                'all_items' => 'Alla kategorier',
                'parent_item' => 'Kategorins förälder',
                'parent_item_colon' => 'Kategorins förälder',
                'edit_item' => 'Redigera kategori',
                'update_item' => 'Uppdatera kategorin',
                'add_new_item' => 'Lägg till kategori',
                'new_item_name' => 'Nytt kategorinamn',
                'separate_items_with_commas' => 'Separera kategorier med kommatecken',
                'add_or_remove_items' => 'Lägg till eller ta bort kategori',
                'choose_from_most_used' => 'Välj bland de mest använda kategorierna',
            )
        ));
}


function bytbil_show_news_feed($posts, $categories = "")
{
    // set up or arguments for our custom query
    if ($posts == 0) {
        $posts = 10;
    }

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if ($categories != '' && count($categories) != 0) {
        $query_args = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'news_categories',
                    'field' => 'id',
                    'terms' => $categories,
                ),
            ),
            'posts_per_page' => $posts,
            'paged' => $paged
        );

    } else {
        $query_args = array(
            'post_type' => 'news',
            'posts_per_page' => $posts,
            'paged' => $paged
        );
    }

    // create a new instance of WP_Query
    $the_query = new WP_Query($query_args);
    ?>

    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); // run the loop ?>
    <article class="news-post">
        <a href="<?php the_permalink(); ?>">
            <h2><?php echo the_title(); ?></h2>

            <div class="excerpt">
                <?php echo excerpt(45); ?>
            </div>
            <span class="date">Skrivet den: <?php echo get_the_date('Y-m-d'); ?></span>
        </a>
    </article>
<?php endwhile; ?>
<?php endif;
    wp_reset_query();
}

?>