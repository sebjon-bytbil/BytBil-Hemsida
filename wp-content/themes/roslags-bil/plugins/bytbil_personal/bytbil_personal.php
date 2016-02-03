<?php
/**
 * Plugin Name: BytBil Personal
 * Plugin URI:
 * Description: Personalhantering för bytbil
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
                'save_format' => 'url',
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
        'hierarchical' => false,
        'rewrite' => array('slug' => 'personal', 'with_front' => true),
        'query_var' => true,
        'exclude_from_search' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
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
    if ($atts['select'] == true) {
        $list = true;
    } else {
        $list = false;
    }
    ob_start();
    $i = 0;
    if ($no_orter > 0) {
        if ($list) {

            echo '<select name="personal_select" class="personal_select">';
            echo '<option class="orter-list-item" value="">-- Välj ort --</option>';
        } else {
            echo '<div class="orter-div">';
        }

    foreach ($orter as $ort) {
    if ($list) {
        $compare = strtolower(str_replace(array('å', 'ä', 'ö', 'Å', 'Ä', 'Ö'), array('a', 'a', 'o', 'a', 'a', 'o'), $ort->name));
        if ($_GET['ort'] == $compare) {
            $selected = 'selected="selected"';
        } else {
            $selected = '';
        }
        echo '<option class="orter-list-item" value="' . $ort->slug . '" ' . $selected . '>' . $ort->name . '</option>';
    } else {
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
    }
    if ($list) {
    echo '</select>';
    ?>
        <script>

            $(document).ready(function () {


                $(".single-block span.avd").parent().parent().css('display', 'none');
                var ort = '<?php echo $_GET['ort']; ?>';

                if (ort != '') {
                    $(".single-block span.avd." + ort).parent().parent().css('display', 'block');
                }

                $(".blocks-block").find("br").remove();

                $("select[name='personal_select']").change(function () {

                    window.location.replace("<?php echo get_permalink(); ?>?ort=" + $("select[name='personal_select']").val());
                });

            });

        </script>
    <?php
    } else {
        echo '<div class="clear"></div></div>';
        echo '</div>';
    }
    }
    return ob_get_clean();
}

add_shortcode('personalorter', 'personal_orter_func');

//Personal shortcode [personal]
function nybergs_personal_func($atts)
{
    if (isset($atts['rowwidth'])) {
        $rowWidth = $atts['rowwidth'];
    } else {
        $rowWidth = 5;
    }

    $orter = array();
    if (isset($_GET['ort']) && strlen($_GET['ort']) > 0) {
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
    ?>
    <script>
        $(function () {
            $('.contact-expand').click(function (e) {
                $(this).toggleClass('open');
                $(this).parent().toggleClass('open');
                return false;
            });
        });
    </script>
    <?php
    echo "<div class='contactHolder page-template-servicetekniker_noiframe-php'><div class='single-block'>";
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
            'orderby' => 'meta_value',
            'order' => $sort,
            'meta_key' => $sortby
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
            $avdelning_slug .= get_term_by('slug', $orter[0], 'ort')->slug;
            $avdelning_slug2 = get_term_by('slug', $term, 'avdelning')->slug;
            if (count($orter) > 0) {
                $avdelning_text .= ' i ' . get_term_by('slug', $orter[0], 'ort')->name;
            }
            echo '<span class="avd ' . $avdelning_slug . '">';
            echo '<a name="' . $avdelning_slug2 . '"></a>';
            echo '<div class="nyberg-kontakt-avdelning ' . $avdelning_slug . ' ' . $avdelning_slug2 . ' ">' . $avdelning_text . '</div>';
        }
        echo "<div class='contact-row " . $avdelning_slug . "'>";
        while ($personal->have_posts()) : $personal->the_post();
            $i++;
            if ($i == $rowWidth) {
                echo "</div><div class='clear'></div><div class='contact-row'>";
                $i = 1;
            }
            ?>
            <div class="contactcard">
                <div class="imagediv">
                    <img class="contactcardimage" src="<?php if (get_field('contactimg')) {
                        echo the_field('contactimg');
                    } else {
                        echo get_template_directory_uri() . '/images/personplaceholder.png';
                    } ?>" alt="">
                </div>
                <div class="contactcardinfo">
                    <?php
                    $email = get_field('email');
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $email = "<a style='color:inherit;' href='mailto:" . $email . "'>" . $email . "</a>";
                    }
                    ?>
                    <h4><?php the_field('fornamn'); ?>&nbsp;<?php the_field('efternamn'); ?></h4>
					
					
					<span class="contact-content">
					<span style="visibility:visible;" class="contact-expand"></span>
						<span class="value"><?php the_field('title'); ?></span><br>
                        <?php
                        $has_orter = get_the_terms(get_the_ID(), 'ort');
                        if (count($has_orter) > 0) {
                            $ortstring = "";
                            $orters = array();
                            foreach ($has_orter as $enort) {
                                $orters[] = $enort->name;
                            }
                            $ortstring = implode(', ', $orters);
                            ?>
                            <span class="value"><?php echo $ortstring; ?></span><br>
                        <?php
                        }
                        ?>
                        <span class="value"> <a style="color:inherit;"
                                                href="tel: <?php the_field('telnr') ?>"><?php the_field('telnr'); ?></a></span><br>
						<span class="value"><?php echo $email; ?></span>
					</span>
                </div>
            </div>
        <?php endwhile;
        $i = 0; ?>
        <div class="clear"></div></div>
        <?php wp_reset_query();
    }
    echo "</div></div><!--contactHolder-->";
    return ob_get_clean();
}

add_shortcode('bytbil_personal', 'nybergs_personal_func');


?>