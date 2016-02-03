<?php
require_once('shortcode.base.php');

/**
 * Nyheter
 */
class NewsShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function RegisterScripts()
    {
        wp_register_script('multiselect', VCADMINURL . 'assets/js/multiselect.js', array(), '1.0.0', true);
    }
    function EnqueueScripts()
    {
        wp_enqueue_script('multiselect');
    }

    function processData($atts)
    {

        if ($atts['news_choice'] == 'all') {

            $columns = $atts['columns'];

            $relation = array('relation' => 'OR');
            $posts_per_page = $atts['posts_per_page'];

            if($atts['posts_per_page'] == null) {
                $posts_per_page = "-1";
            }

            $taxonomy_query = array();
            $taxonomy_terms = array();

            if($atts['news_categories']) {

                $categories = explode(",", $atts['news_categories']);

                foreach($categories as $category) {
                    array_push(
                        $taxonomy_terms,
                        $category
                    );
                }

                $taxonomy_query = array(
                    'taxonomy'	=> 'news_categories',
                    'field'		=> 'term_id',
                    'terms'		=> $taxonomy_terms,
                    'operator'  => 'IN',
                );
            }

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'posts_per_page'    => $posts_per_page,
                'orderby'           => 'date',
                'order'             => 'DESC',
                'paged'             => $paged,
                'post_type'         => 'news',
                'tax_query'         => array(
                    $taxonomy_query
                ),
            );

            //echo "<pre>"; print_r($args); echo "</pre>"; // Useful for viewing the arguments in their entirety

            $news = new WP_Query( $args );

            if ( $news->have_posts() ) :

                $items = array();
                $i = 0;

                while ( $news->have_posts() ) : $news->the_post();

                    // Headline
                    $items[$i]['headline'] = get_the_title();

                    // Article text
                    $content = apply_filters( 'the_content', get_the_content() );
                    $content = str_replace( ']]>', ']]&gt;', $content );
                    $items[$i]['article_text'] = $content;

                    // Article excerpt
                    $excerpt = get_the_excerpt();
                    $items[$i]['article_excerpt'] = $excerpt;

                    // Article permalink
                    $items[$i]['article_link'] = get_permalink();

                    $i++;
                endwhile;

                $atts['items'] = $items;

            endif;

            $atts['pagination_prev'] = get_previous_posts_link( '&lsaquo; Föregående sida' );
            $atts['pagination_separator'] = get_previous_posts_link() ? " &nbsp;|&nbsp; " : "";
            $atts['pagination_next'] = get_next_posts_link( 'Nästa sida &rsaquo;', $news->max_num_pages );

            wp_reset_query();

        } else {

            $id = self::Exists($atts['news'], false);
            if ($id) {
                $image = get_field('offer-image', $id);
                $atts['image_url'] = $image['url'];

                $title = get_field('offer-title', $id);
                $atts['title'] = $title;
            }

        }

        return $atts;
    }
}

function bb_init_news_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Nyheter',
        'base' => 'news',
        'description' => 'Visa nyhetsartiklar',
        'class' => '',
        'show_settings_on_create' => true,
        'weight' => 10,
        'category' => 'Innehåll',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => 'Urval av erbjudanden',
                'param_name' => 'news_choice',
                'value' => array(
                    'Alla nyheter' => 'all',
                    'Enskild nyhet' => 'single',
                )
            ),
            array(
                'type' => 'cpt',
                'post_type' => 'news',
                'heading' => 'Välj nyhetsartikel',
                'param_name' => 'news',
                'placeholder' => 'Välj nyhetsartikel',
                'value' => '',
                'description' => 'Välj en existerande nyhetsartikel.',
                'dependency' => array(
                    'element' => 'news_choice',
                    'value' => 'single'
                )
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Filtrera på kategori',
                'param_name' => 'news_categories',
                'value' => get_tax_terms('news_categories'),
                'dependency' => array(
                    'element' => 'news_choice',
                    'value' => 'all'
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Kolumner per rad',
                'param_name' => 'columns',
                'placeholder' => 'Kolumner per rad',
                'value' => array(
                    'En' => 12,
                    'Två' => 6,
                    'Tre' => 4,
                    'Fyra' => 3,
                    'Sex' => 2,
                ),
                'dependency' => array(
                    'element' => 'news_choice',
                    'value' => 'all'
                )
            ),
            array(
                'type' => 'integer',
                'heading' => 'Poster per sida',
                'param_name' => 'posts_per_page',
                'placeholder' => 'Poster per rad',
                'min' => 0,
                'max' => 100,
                'dependency' => array(
                    'element' => 'news_choice',
                    'value' => 'all'
                )
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Inkludera sidbläddring',
                'param_name' => 'pagination',
                'value' => array(
                    'Ja' => 1,
                ),
                'dependency' => array(
                    'element' => 'news_choice',
                    'value' => 'all'
                )
            ),
        )
    );

    // Alter params filter
    $map['params'] = apply_filters('bb_alter_news_params', $map['params']);

    $vcNews = new NewsShortcode($map);
}

function get_tax_terms($taxonomy) {
    $args = array(
        'hide_empty' => 0
    );
    $terms = get_terms($taxonomy, $args);

    $terms_array = array();

    foreach($terms as $term) {
        $terms_array[$term->name] = $term->term_id;
    }

    return $terms_array;
}

add_action('after_setup_theme', 'bb_init_news_shortcode',10);

?>