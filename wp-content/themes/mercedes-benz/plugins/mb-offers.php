<?php

add_action('admin_menu', function () {
    remove_meta_box('pageparentdiv', 'offer', 'normal');
});
add_action('add_meta_boxes', function () {
    add_meta_box('offer-parent', 'Förälder', 'offer_attributes_meta_box', 'offer', 'side', 'high');
});
function offer_attributes_meta_box($post)
{
    $post_type_object = get_post_type_object($post->post_type);
    if ($post_type_object->hierarchical) {
        $pages = wp_dropdown_pages(array('post_type' => 'page', 'selected' => $post->post_parent, 'name' => 'parent_id', 'show_option_none' => __('(Ingen förälder)'), 'sort_column' => 'menu_order, post_title', 'echo' => 0));
        if (!empty($pages)) {
            echo $pages;
        } // end empty pages check
    } // end hierarchical check.
}

add_action('init', 'cptui_register_my_cpt_offer');
function cptui_register_my_cpt_offer()
{
    register_post_type('offer', array(
        'label' => 'Erbjudanden',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'offer', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Erbjudanden',
            'singular_name' => 'Erbjudande',
            'menu_name' => 'Erbjudanden',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till erbjudande',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Erbjudande',
            'new_item' => 'Nytt Erbjudande',
            'view' => 'Visa Erbjudande',
            'view_item' => 'Visa Erbjudande',
            'search_items' => 'Sök Erbjudanden',
            'not_found' => 'Inga Erbjudanden hittade',
            'not_found_in_trash' => 'Inga Erbjudanden i papperskorgen',
            'parent' => 'Erbjudandets förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_erbjudande',
        'title' => 'Erbjudande',
        'fields' => array(
            array(
                'key' => 'field_544a0e615579b',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_544a0e905579d',
                'label' => 'Bild',
                'name' => 'offer_image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_544a0e7d5579c',
                'label' => 'Ingress',
                'name' => 'offer_description',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '2',
                'formatting' => 'none',
            ),
            array(
                'key' => 'field_544a0eab5579e',
                'label' => 'Länkar',
                'name' => 'offer_links',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_544a0ec35579f',
                        'label' => 'Länktext',
                        'name' => 'offer_link-text',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_544a0ed6557a0',
                        'label' => 'Ikon',
                        'name' => 'offer_link-icon',
                        'type' => 'font-awesome',
                        'column_width' => '',
                        'default_value' => 'fa-external-link',
                        'save_format' => 'class',
                        'allow_null' => 0,
                        'enqueue_fa' => 0,
                        'choices' => require("font-awesome-choices/font-awesome-choices.php"),
                    ),
                    array(
                        'key' => 'field_544a0eea557a1',
                        'label' => 'Länktyp',
                        'name' => 'offer_link-type',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'internal' => 'Lokal sida',
                            'external' => 'Extern URL',
                            'file' => 'Fil eller media',
                        ),
                        'default_value' => 'internal',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_544a0f6d557a2',
                        'label' => 'Sida',
                        'name' => 'offer_link-page',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544a0eea557a1',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'page',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_544a0f87557a3',
                        'label' => 'Adress',
                        'name' => 'offer_link-url',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544a0eea557a1',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_544a0f99557a4',
                        'label' => 'Fil',
                        'name' => 'offer_link-file',
                        'type' => 'file',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544a0eea557a1',
                                    'operator' => '==',
                                    'value' => 'file',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'save_format' => 'object',
                        'library' => 'all',
                    ),
                    array(
                        "key" => "field_offerlinktype9978tasd7gad",
                        "label" => "Öppna länk i",
                        "name" => "offer_link-target",
                        "type" => "radio",
                        "choices" => array(
                            "_self" => "Samma fönster",
                            "_blank" => "Nytt fönster",
                            "lightbox" => "Lightbox"
                        ),
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till länk',
            ),
            array(
                'key' => 'field_544a0fd4557a6',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_544a0fde557a7',
                'label' => 'Erbjudandet startar',
                'name' => 'offer_date-start',
                'type' => 'date_picker',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_544a1014557a8',
                'label' => 'Erbjudandet slutar',
                'name' => 'offer_date-stop',
                'type' => 'date_picker',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_544a102d557a9',
                'label' => 'Erbjudandet gäller för',
                'name' => 'offer_date-facility',
                'type' => 'checkbox',
                'choices' => array(
                    'pb' => 'Personbilar',
                    'tb' => 'Transportbilar',
                    'lb' => 'Lastbilar',
                    'hb' => 'Hyrbilar',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                "key" => "field_087aeouibqew098ygh30oub9073g2f9u2b3c97",
                "label" => "Tillhör anläggning:",
                "name" => "offer_relationship",
                "type" => "relationship",
                'post_type' => array(
                    0 => 'facility',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_type',
                    1 => 'post_title',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'offer',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}

function get_all_offers()
{
    $args = array(
        'post_type' => 'offer',
    );

    $offers_array = get_posts($args);

    foreach ($offers_array as $offer) {
        show_offer_column($offer->ID);
    }
}

function filter_offer_ids($obj)
{
    return $obj->ID;
}

function get_facility_offers($id, $count = 3)
{
    $offers = array();

    $fac_offers = get_posts(array(
        "post_type" => "offer",
        "posts_per_page" => $count,
        "meta_query" => array(
            array(
                "key" => "offer_relationship",
                "value" => $id,
                "compare" => "LIKE"
            ),
        ),
    ));

    $offers = $fac_offers;

    foreach ($offers as $k => $offer) {
        $offerStart = strtotime(get_field("offer_date-start", $offer->ID));
        $offerEnd = strtotime(get_field("offer_date-stop", $offer->ID));
        $now = time();
        $show = true;

        if ($offerStart && $offerStart > $now) {
            $show = false;
        }

        if ($offerEnd && $offerEnd < $now) {
            $show = false;
        }

        if (!$show || get_field("hide", $offer->ID)) {
            unset($offers[$k]);
        }
    }

    if (count($offers) == $count) {
        return $offers;
    }

    $no_fac_offers = get_posts(array(
        "post_type" => "offer",
        "posts_per_page" => $count - count($fac_offers),
        "meta_query" => array(
            'relation' => 'OR',
            array(
                "key" => "offer_relationship",
                "value" => false,
                "type" => "BOOLEAN"
            ),
            array(
                "key" => "offer_relationship",
                "compare" => "NOT EXISTS"
            )
        )
    ));

    $offers = array_merge($offers, $no_fac_offers);

    foreach ($offers as $k => $offer) {
        $offerStart = strtotime(get_field("offer_date-start", $offer->ID));
        $offerEnd = strtotime(get_field("offer_date-stop", $offer->ID));
        $now = time();
        $show = true;

        if ($offerStart && $offerStart > $now) {
            $show = false;
        }

        if ($offerEnd && $offerEnd < $now) {
            $show = false;
        }

        if (!$show || get_field("hide", $offer->ID)) {
            unset($offers[$k]);
        }
    }

    if (count($offers) == $count) {
        return $offers;
    }

    $ids = array_map("filter_offer_ids", $offers);

    $other_offers = get_posts(array(
        "post_type" => "offer",
        "posts_per_page" => $count - count($offers),
        "post__not_in" => $ids,
        "meta_query" => array(
            array(
                "key" => "offer_date-start",
                "value" => time(),
                "compare" => "<"
            ),
            array(
                "key" => "offer_date-end",
                "value" => time(),
                "compare" => ">"
            ),
            array(
                "relation" => "OR",
                array(
                    "key" => "hide",
                    "compare" => "NOT EXISTS"
                ),
                array(
                    "key" => "hide",
                    "value" => false,
                    "type" => "BOOLEAN"
                )
            ),
        )
    ));

    $offers = array_merge($offers, $other_offers);

    return $offers;
}

function get_offer_slider()
{
    $args = array(
        'post_type' => 'offer',
    );

    $offers_array = get_posts($args); ?>
    <div class="offer-slider-wrapper">
        <ul class="slides">
            <?php foreach ($offers_array as $offer) { ?>
                <?php
                    $offerStart = strtotime(get_field("offer_date-start", $offer->ID));
                    $offerEnd = strtotime(get_field("offer_date-stop", $offer->ID));
                    $now = time();
                    $show = true;

                    if ($offerStart && $offerStart > $now) {
                        $show = false;
                    }

                    if ($offerEnd && $offerEnd < $now) {
                        $show = false;
                    }

                    if (!$show || get_field("hide", $offer->ID)) {
                        continue;
                    }
                ?>
                <li><?php show_offer_slide($offer->ID); ?></li>
            <?php } ?>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            $('.offer-slider-wrapper').flexslider();
        });
    </script>
<?php
}

function get_facility_offer_slider($id)
{
    $offers = get_facility_offers($id, 10);

    ?>
    <div class="offer-slider-wrapper">
        <ul class="slides">
            <?php foreach ($offers as $offer) : ?>
                <li><?php show_offer_slide($offer->ID); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            $('.offer-slider-wrapper').flexslider();
        });
    </script>
<?php
}

function get_offer_image($id)
{
}

function get_offer_links($id)
{
}

function get_offer_date($id)
{
}

function show_offer_column($id)
{
    $offer_title = get_the_title($id);
    $offer_image = get_field('offer_image', $id);
    $offer_description = get_field('offer_description', $id);

    $offerStart = strtotime(get_field("offer_date-start", $id));
    $offerEnd = strtotime(get_field("offer_date-stop", $id));
    $now = time();
    $show = true;

    if ($offerStart && $offerStart > $now) {
        $show = false;
    }

    if ($offerEnd && $offerEnd < $now) {
        $show = false;
    }

    if (!$show) {
        return;
    }

    if (get_field("hide", $id)) {
        return;
    }

    ?>
    <div class="col-xs-12 col-sm-4 offer">
        <div class="offer-wrapper">
            <img src="<?php echo $offer_image['url']; ?>">

            <div class="offer-content-wrapper">
                <h3><?php echo $offer_title; ?></h3>

                <p><?php echo $offer_description; ?></p>
                <a class="button" href="<?php echo get_permalink($id); ?>">Läs hela erbjudandet <i
                        class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
<?php
}

function show_offer_slide($id)
{
    $offer_title = get_the_title($id);
    $offer_image = get_field('offer_image', $id);
    $offer_description = get_field('offer_description', $id);
    ?>
    <a href="<?php echo get_permalink($id); ?>">
        <img src="<?php echo $offer_image['url']; ?>"/>

        <div class="flex-caption">
            <h3><?php echo $offer_title; ?></h3>
            <a class="button" href="<?php echo get_permalink($id); ?>">Se hela erbjudandet <i
                    class="fa fa-angle-right"></i></a>
        </div>
    </a>

<?php
}


?>
