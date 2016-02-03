<?php
/**
 * Plugin Name: Nybergs Personal
 * Plugin URI:
 * Description: Personalhantering för bytbil, Nybergs
 * Version: 0.1
 * Author: Provide IT
 * Author URI: http://www.provideit.se
 * License:
 */


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_personal',
        'title' => 'Personal',
        'fields' => array(
            array(
                'key' => 'field_52e53587da547',
                'label' => 'Bild',
                'name' => 'contactimg',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_5318c2cddbf04',
                'label' => 'Markerad bild',
                'name' => 'contactimg2',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_52e53595da548',
                'label' => 'Förnamn',
                'name' => 'fornamn',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52e5359cda549',
                'label' => 'Efternamn',
                'name' => 'efternamn',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52e535a4da54a',
                'label' => 'Titel',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52e535abda54b',
                'label' => 'Telefon',
                'name' => 'telnr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52e535b3da54c',
                'label' => 'E-post',
                'name' => 'email',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'personal',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'revisions',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}

//Sets up the Personal custom post type
add_action('init', 'cptui_register_my_cpt_personal');
function cptui_register_my_cpt_personal()
{
    register_post_type('personal', array(
        'label' => 'Personal',
        'description' => 'Kontakt-/personhantering',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'personal', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'exclude_from_search' => true,
        'labels' => array(
            'name' => 'Personal',
            'singular_name' => 'Personal',
            'menu_name' => 'Personal',
            'add_new' => 'Lägg till Personal',
            'add_new_item' => 'Lägg till personal',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera personal',
            'new_item' => 'Ny personal',
            'view' => 'Visa Personal',
            'view_item' => 'Visa personal',
            'search_items' => 'Sök Personal',
            'not_found' => 'Ingen personal hittad',
            'not_found_in_trash' => 'Ingen personal hittad i skräp',
            'parent' => 'Parent Personal',
        )
    ));
}

add_action('init', 'cptui_register_my_taxes_avdelning');
function cptui_register_my_taxes_avdelning()
{
    register_taxonomy('avdelning', array(
        0 => 'personal',
    ),
        array('hierarchical' => false,
            'label' => 'Avdelning',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'taxonomies' => array('avdelning', 'ort'),
            'labels' => array(
                'search_items' => 'Avdelning',
                'popular_items' => '',
                'all_items' => '',
                'parent_item' => '',
                'parent_item_colon' => '',
                'edit_item' => '',
                'update_item' => '',
                'add_new_item' => '',
                'new_item_name' => '',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => '',
                'choose_from_most_used' => '',
            )
        ));
}

add_action('init', 'cptui_register_my_taxes_ort');
function cptui_register_my_taxes_ort()
{
    register_taxonomy('ort', array(
        0 => 'personal',
    ),
        array('hierarchical' => false,
            'label' => 'Ort',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array(
                'search_items' => 'Ort',
                'popular_items' => '',
                'all_items' => '',
                'parent_item' => '',
                'parent_item_colon' => '',
                'edit_item' => '',
                'update_item' => '',
                'add_new_item' => '',
                'new_item_name' => '',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => '',
                'choose_from_most_used' => '',
            )
        ));
}

function personal_orter_func($atts)
{
    $orter = get_terms(array('ort'), array('order' => 'ASC', 'orderby' => 'name'));
    $no_orter = count($orter);

    ob_start();
    $i = 0;
    if ($no_orter > 0) {
        echo '<div class="orter-div">';
        foreach ($orter as $ort) {
            if ($i == 0) {
                ?>
                <div class="orter-row">
            <?php
            }
            echo '<a class="orter-link" href="' . get_permalink() . '?ort=' . $ort->slug . '"><span class="black-button orter-button">' . $ort->name . '</span></a>';
            $i++;
            if ($i == 4) {
                echo '<div class="clear"></div></div><div class="orter-row">';
            }
        }
        echo '<div class="clear"></div></div>';
        echo '</div>';
    }
    return ob_get_clean();
}

add_shortcode('personalorter', 'personal_orter_func');

//Personal shortcode [personal]
function nybergs_personal_func($atts)
{


    $orter = array();
    if (isset($_GET['ort'])) {
        $orter = array($_GET['ort']);
    }
    if (isset($atts['ort'])) {
        $orter = explode(',', $atts['ort']);
    }
    if (!$atts['avdelning']) {
        $termObjects = get_terms('avdelning');
        $terms = array();
        foreach ($termObjects as $term) {
            $terms[] = $term->slug;
        }
    } else {
        $terms = explode(',', $atts['avdelning']);
    }
    $persons = array();
    if ($atts['persons']) {
        $persons = explode(',', $atts['persons']);
    }


    extract(shortcode_atts(array(
        'sort' => 'ASC',
        'sortby' => 'fornamn',
    ), $atts));

    ob_start();
    $a = 0;

    foreach ($terms as $term) {
        $tax_query = array();
        $tax_query[] = array(
            'taxonomy' => 'avdelning',
            'field' => 'slug',
            'terms' => array($term),
        );
        if (count($orter) > 0) {
            $tax_query[] = array(
                'taxonomy' => 'ort',
                'field' => 'slug',
                'terms' => $orter,
            );
        }

        $args = array(
            'post_type' => 'personal',
            'tax_query' => $tax_query,
            'orderby' => 'menu_order',
            'order' => $sort,
            'meta_key' => $sortby,
        );
        if (count($persons) > 0) {
            $post__in = array();
            foreach ($persons as $person) {
                $person = trim($person);
                $posts = get_posts(array('name' => $person, 'post_type' => 'personal', 'numberposts' => 1));
                if ($posts) {
                    $post__in[] = $posts[0]->ID;
                }
            }
            $args['tax_query'] = '';
            $args['post__in'] = $post__in;
        }
        $personal = new WP_Query($args);
        $i = 0;
        if ($personal->have_posts()) {

            $avdelning_text = get_term_by('slug', $term, 'avdelning')->name;

            if (count($orter) > 0) {


                $avdelning_text .= ' i ' . get_term_by('slug', $orter[0], 'ort')->name;
            } else {
                foreach ($personal as $value) {
                    if (isset($value->ID)) {
                        $has_orter = get_the_terms($value->ID, 'ort');
                        foreach ($has_orter as $enort) {
                            $ort = $enort->name;
                        }
                    }
                }
            }
            $firstpart = explode(" ", $avdelning_text);
            $RemoveChars[] = '/å/';
            $RemoveChars[] = '/ä/';
            $RemoveChars[] = '/ö/';
            $RemoveChars[] = '/Å/';
            $RemoveChars[] = '/Ä/';
            $RemoveChars[] = '/Ö/';
            $ReplaceWith[] = '/ /';


            $ReplaceWith[] = 'a';
            $ReplaceWith[] = 'a';
            $ReplaceWith[] = 'o';
            $ReplaceWith[] = 'A';
            $ReplaceWith[] = 'A';
            $ReplaceWith[] = 'O';
            $ReplaceWith[] = '_';
            $firstpart[0] = preg_replace($RemoveChars, $ReplaceWith, $firstpart[0]);

            $a++;
            echo '<div id="' . $firstpart[0] . $a . '"><div class="nyberg-kontakt-avdelning">' . $avdelning_text . ' ' . $ort . '</div>';
        }
        echo "<div class='contact-row'>";
        while ($personal->have_posts()) : $personal->the_post();
            if ($i == 4) {
                echo "</div><div class='clear'></div><div class='contact-row'>";
                $i = 0;
            }
            ?>
            <div class="contactcard">
                <div class="imagediv <?php if (get_field('contactimg2')) { ?> twoimages <?php } ?>">
                    <?php if (get_field('contactimg')) {
                        $contactimg = get_field('contactimg');
                    } else {
                        $contactimg['url'] = get_template_directory_uri() . '/img/personplaceholder.png';
                    }
                    ?>
                    <img class="contactcardimage contimg1" alt="<?php echo $contactimg['alt']; ?>"
                         title="<?php echo $contactimg['title']; ?>" src="<?php echo $contactimg['url']; ?>">
                    <?php if (get_field('contactimg2')) {
                        $contactimg2 = get_field('contactimg2') ?> <img class="contactcardimage contimg2"
                                                                        title="<?php echo $contactimg2['title']; ?>"
                                                                        alt="<?php echo $contactimg2['alt']; ?>"
                                                                        src="<?php echo $contactimg2['url']; ?>"><?php } ?>
                </div>
                <div class="contactcardinfo">
                    <?php
                    $email = get_field('email');
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $email = "<a style='color:inherit;' href='mailto:" . $email . "'>" . $email . "</a>";
                    }
                    ?>
                    <h4><?php the_field('fornamn'); ?>&nbsp;<?php the_field('efternamn'); ?></h4>
                    <span class="value"><?php the_field('title'); ?></span><br>
                    <?php
                    $has_orter = get_the_terms(get_the_ID(), 'ort');
                    /*if (count($has_orter) > 0) {
                        $ortstring = "";
                        $orters = array();
                        foreach($has_orter as $enort){
                            $orters[] = $enort->name;
                        }
                        $ortstring = implode(', ', $orters);
                        ?>
                        <?php?>
                        <span class="value"><?php echo $ortstring; ?></span><br>


                    }*/
                    $i++;
                    ?>
                    <span class="value"> <a style="color:inherit;"
                                            href="tel: <?php the_field('telnr') ?>"><?php the_field('telnr'); ?></a></span><br>
                    <span class="value"><?php echo $email; ?></span>
                </div>
            </div>
        <?php endwhile;
        $i = 0; ?>
		</div>
		<div class="clear"></div></div>
		<?php wp_reset_query();
    }?>
		<style>
		.contimg2{
			display: none;
		}
		</style>
		<script>
		jQuery(document).ready(function($) {
		           $(".imagediv.twoimages").hover(function() {
		           	$(this).children().eq(0).hide();
		           	$(this).children().eq(1).show();
                 }, function() {
                	$(this).children().eq(1).hide();
		           	$(this).children().eq(0).show();

            }); 

		});
		</script>
		<?php
    return ob_get_clean();
}

add_shortcode('bytbil_personal', 'nybergs_personal_func');


?>