<?php
/*
Plugin Name: BytBil Nyheter
Description: Skapa och visa nyheter på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_news');
function cptui_register_my_cpt_news()
{
    register_post_type('news', array(
        'label' => 'Nyheter',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'has_archive' => true,
        'rewrite' => array('slug' => 'nyheter', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
        'labels' => array(
            'name' => 'Nyheter',
            'singular_name' => 'Nyhet',
            'menu_name' => 'Nyheter',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till nyhet',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera nyhet',
            'new_item' => 'Ny nyhet',
            'view' => 'Visa nyhet',
            'view_item' => 'Visa nyhet',
            'search_items' => 'Sök nyheter',
            'not_found' => 'Inga nyheter hittade',
            'not_found_in_trash' => 'Inga nyheter i papperskorgen',
            'parent' => 'Nyhetens förälder',
        )
    ));
}

function get_news_item($id)
{
}

function get_news_block($layout, $amount)
{
    $news_args = array(
        'posts_per_page' => $amount,
        'offset' => 0,
        'category' => '',
        'category_name' => '',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'news',
        'post_mime_type' => '',
        'post_parent' => '',
        'post_status' => 'publish',
        'suppress_filters' => true,
    );

    $news_posts = get_posts($news_args);
    if ($news_posts) {
        ?>

        <div class="news-block layout-<?php echo $layout; ?>">
            <ul class="news-list">
                <?php
                $news_counter = 1;
                foreach ($news_posts as $news_post) {
                    $image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($news_post->ID), 'slideshow-default');
                    ?>
                    <li class="news-item">
                        <a href="<?php echo get_the_permalink($news_post->ID); ?>">
                            <div class="news-item-image col-img-bg news-thumb"
                                 style="background-image: url('<?php echo $image_thumb[0]; ?>');">
                                <img src="<?php echo $image_thumb[0]; ?>">
                            </div>
                            <div class="news-item-content">
                                <h3>
                                    <?php echo get_the_title($news_post->ID); ?>
                                </h3>

                                <p class="news-date"><?php echo get_the_time('j F Y', $news_post->ID) ?></p>
                            </div>
                        </a>
                    </li>
                    <?php
                    $news_counter++;
                }
                ?>
            </ul>
        </div>

    <?php
    }
}

?>
