<?php
/*
Plugin Name: BytBil Erbjudanden
Description: Skapa och visa Erbjudanden.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/

error_reporting(E_ERROR | E_PARSE);


add_action('init', 'cptui_register_my_cpt_offer');
function cptui_register_my_cpt_offer()
{
    register_post_type('offer', array(
            'label' => 'Erbjudande',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'erbjudande', 'with_front' => false),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Erbjudanden',
                'singular_name' => 'Erbjudande',
                'menu_name' => 'Erbjudanden',
                'add_new' => 'Lägg till Erbjudande',
                'add_new_item' => 'Lägg till nytt Erbjudande',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Erbjudande',
                'new_item' => 'Ny Erbjudande',
                'view' => 'Visa Erbjudande',
                'view_item' => 'Visa Erbjudande',
                'search_items' => 'Sök Erbjudande',
                'not_found' => 'Inga Erbjudandear hittade',
                'not_found_in_trash' => 'Inga Erbjudandear i papperskorgen',
                'parent' => 'Erbjudandeens förälder',
            )
        )
    );
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_erbjudande',
        'title' => 'Erbjudande',
        'fields' => array(
            array(
                'key' => 'field_541d5526c4384',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541d5ac33bef0',
                'label' => 'Ingresstext',
                'name' => 'offer-subheader',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_541d5564c4385',
                'label' => 'Beskrivning',
                'name' => 'offer-description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_541d559bc4386',
                'label' => 'Bild',
                'name' => 'offer-image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_541d560ec4388',
                'label' => 'Länkar',
                'name' => 'offer-links',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_541d562cc4389',
                        'label' => 'Text',
                        'name' => 'offer-link-text',
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
                        'key' => 'field_541d5643c438a',
                        'label' => 'Länktyp',
                        'name' => 'offer-link-type',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array(
                            'external' => 'Extern URL',
                            'internal' => 'Lokal sida',
                            'file' => 'Fil eller media',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_541d5af83bef1',
                        'label' => 'Extern URL',
                        'name' => 'offer-link-external',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d5643c438a',
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
                        'key' => 'field_541d5b103bef2',
                        'label' => 'Lokal sida',
                        'name' => 'offer-link-internal',
                        'type' => 'page_link',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d5643c438a',
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
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_541d5b2b3bef3',
                        'label' => 'Fil eller media',
                        'name' => 'offer-link-file',
                        'type' => 'file',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d5643c438a',
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
                        'key' => 'field_541d5688c438b',
                        'label' => 'Länkbeteende',
                        'name' => 'offer-link-target',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array(
                            '_blank' => 'Öppna i nytt fönster',
                            '_self' => 'Öppna i samma fönster',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till länk',
            ),
            array(
                'key' => 'field_541d56c3c438c',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541d56d0c438d',
                'label' => 'Erbjudandet startar',
                'name' => 'offer-date-start',
                'type' => 'date_picker',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_541d5700c438e',
                'label' => 'Erbjudandet slutar',
                'name' => 'offer-date-stop',
                'type' => 'date_picker',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_541d5712c438f',
                'label' => 'Märken',
                'name' => 'offer-brands',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'brand',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_541d5744c4390',
                'label' => 'Anläggningar',
                'name' => 'offer-facililties',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'facility',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
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
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'revisions',
                6 => 'slug',
                7 => 'author',
                8 => 'format',
                9 => 'featured_image',
                10 => 'categories',
                11 => 'tags',
                12 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}


if (function_exists('add_image_size')) {

    add_image_size('erbjudande-1170x450', 1170, 450, true);
    add_image_size('erbjudande-585x225', 585, 225, true);
    add_image_size('erbjudande-409x157', 409, 157, true);
    add_image_size('erbjudande-292x112', 292, 112, true);
}

function bytbil_check_offer_date($start_date, $stop_date)
{

    $show_offer = false;

    if (empty($start_date) && !empty($stop_date)) {
        if (date('Ymd') <= $stop_date) {
            $show_offer = true;
        }
    } elseif (!empty($start_date) && empty($stop_date)) {
        if (date('Ymd') >= $start_date) {
            $show_offer = true;
        }
    } elseif (!empty($start_date) && !empty($stop_date)) {
        if (date('Ymd') >= $start_date) {
            if (date('Ymd') <= $stop_date) {
                $show_offer = true;
            }
        }
    } else {
        $show_offer = true;
    }

    return $show_offer;
}

function bytbil_show_offers_grid($col_size = 3)
{
    echo '<h1>Storlek:</h1>' . $col_size;

}

function bytbil_show_offer($id, $size = 6)
{
    $offer_object = get_post($id);
    $start_date = get_field('offer-date-start', $id);
    $stop_date = get_field('offer-date-stop', $id);


    $title = $offer_object->post_title;
    $subheader = get_field('offer-subheader', $id);
    $description = get_field('offer-description', $id);
    $links = get_field('offer-links', $id);
    $permalink = get_post_permalink($id);

    $show_offer = bytbil_check_offer_date($start_date, $stop_date);

    if ($show_offer == true) {
        $image = get_field('offer-image', $id);

        $image_alt = $image['alt'];
        $image_title = $image['title'];
        if ($size == 12) {
            $image_size = 'erbjudande-1170x450';
            $image_url = $image['sizes'][$image_size];
            ?>
            <div class="col-xs-12 col-sm-<?php echo $size; ?>">
                <article class="offer">
                    <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt; ?>"
                         title="<?php echo $image_title; ?>"/>
                    <section class="offer-content">

                        <h2 class="offer-title"><?php echo $title; ?></h2>
                        <h4 class="offer-subtitle"><?php echo $subheader; ?></h4>

                        <p class="offer-description"><?php echo $description; ?></p>
                        <?php if (!empty($stop_date)) { ?>
                            <span class="offer-valid-until">
                            Erbjudandet gäller t.o.m: <?php echo $stop_date; ?>
                        </span>
                        <?php } ?>
                        <div class="offer-links">
                            <?php while (has_sub_fields('offer-links', $id)) :
                                $link_type = get_sub_field('offer-link-type');
                                if ($link_type == 'external') {
                                    $link_url = get_sub_field('offer-link-external');
                                } elseif ($link_type == 'internal') {
                                    $link_url = get_sub_field('offer-link-internal');
                                } elseif ($link_type == 'file') {
                                    $file = get_sub_field('offer-link-file');
                                    $link_url = $file['url'];
                                }

                                ?>

                                <a href="<?php echo $link_url; ?>" class="offer-link"
                                   target="<?php echo get_sub_field('offer-link-target'); ?>">
                                    <?php echo get_sub_field('offer-link-text'); ?>
                                </a>
                            <?php endwhile; ?>
                        </div>

                    </section>
                </article>
            </div>
        <?php

        } elseif ($size == 6) {
            $image_size = 'erbjudande-585x225';
            $image_url = $image['sizes'][$image_size];
            ?>
            <div class="col-xs-12 col-sm-<?php echo $size; ?>">
                <article class="offer block white no-padding">
                    <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt; ?>"
                         title="<?php echo $image_title; ?>"/>
                    <section class="offer-content">

                        <h2 class="offer-title"><?php echo $title; ?></h2>
                        <!--<h4 class="offer-subtitle"><?php echo $subheader; ?></h4>-->

                        <!--<p class="offer-description"><?php $out = strlen($description) > 120 ? substr($description, 0, 120) . "..." : $description;
                        echo $out; ?></p>-->
                        <?php if (!empty($stop_date)) { ?>
                            <!--<span class="offer-valid-until">
                            Erbjudandet gäller t.o.m: <?php echo $stop_date; ?>
                        </span>-->
                        <?php } ?>
                        <div class="offer-links">
                            <a href="<?php echo $permalink; ?>" class="btn btn-green offer-link"
                               title="Läs mer om <?php echo $title . ' - ' . $subheader; ?>">Se hela erbjudandet <i
                                    class="fa fa-angle-right"></i></a>
                        </div>


                    </section>
                </article>
            </div>
        <?php

        } elseif ($size == 4) {
            $image_size = 'erbjudande-409x157';
            $image_url = $image['sizes'][$image_size];
            ?>
            <div class="col-xs-12 col-sm-<?php echo $size; ?>">
                <article class="offer">
                    <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt; ?>"
                         title="<?php echo $image_title; ?>"/>
                    <section class="offer-content">

                        <h2 class="offer-title"><?php echo $title; ?></h2>
                        <h4 class="offer-subtitle"><?php echo $subheader; ?></h4>

                        <div class="offer-links">
                            <a href="<?php echo $permalink; ?>" class="offer-link button green"
                               title="Läs mer om <?php echo $title . ' - ' . $subheader; ?>">Se hela erbjudandet <i
                                    class="fa fa-angle-right"></i></a>
                        </div>

                    </section>

                </article>
            </div>
        <?php

        } elseif ($size == 3) {
            $image_size = 'erbjudande-292x112';
            $image_url = $image['sizes'][$image_size];
            ?>
            <div class="col-xs-12 col-sm-<?php echo $size; ?>">
                <article class="offer">
                    <img src="<?php echo $image_url ?>" alt="<?php echo $image_alt; ?>"
                         title="<?php echo $image_title; ?>"/>
                    <section class="offer-content">

                        <h2 class="offer-title"><?php echo $title; ?></h2>
                        <h4 class="offer-subtitle"><?php $out = strlen($subheader) > 60 ? substr($subheader, 0, 60) . "..." : $subheader;
                            echo $out; ?></h4>

                        <p class="offer-description"><?php //echo $description;
                            ?></p>
                        <?php if (!empty($stop_date)) { ?>
                            <!--<span class="offer-valid-until">
                            Erbjudandet gäller t.o.m: <?php echo $stop_date; ?>
                        </span>-->
                        <?php } ?>
                        <div class="offer-links">
                            <a href="<?php echo $permalink; ?>" class="offer-link button green"
                               title="Läs mer om <?php echo $title . ' - ' . $subheader; ?>">Se hela erbjudandet <i class="fa fa-angle-right"></i></a>
                        </div>

                    </section>
                </article>
            </div>
        <?php

        }
    }
}

function bytbil_show_offers_latest($col_size = 3)
{

    $args = array('post_type' => 'offer', 'posts_per_page' => 2);
    $offers = get_posts($args);
    $counter = 0;
    ?>
    <div class="row">
        <?php
        foreach ($offers as $offer) {
            bytbil_show_offer($offer->ID, $col_size);
        }
        ?>
    </div>
<?php

}

function bytbil_show_offers_all($col_size = 3)
{
    /*$args = array('post_type' => 'offer');
    $offers = get_posts($args);
    foreach ($offers as $offer) {
        bytbil_show_offer($offer->ID, $col_size);
    }
    */

    $posts = get_posts(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'offer'
    ));

    if($posts){

        foreach( $posts as $post ):

        setup_postdata( $post );

        $id = $post->ID;

        bytbil_show_offer($id, $col_size);

        endforeach;

        wp_reset_postdata();

    }

}


function bytbil_show_offers_facility($facility, $col_size = 3)
{
    $args = array(
        'posts_per_page'	=> -1,
        'post_type' => 'offer'
    );
    $offers = get_posts($args);
    ?>
    <div class="row">
        <?php
        foreach ($offers as $offer) {
            $id = $offer->ID;
            $offer_facilities = get_field('offer-facililties', $id);
            foreach ($offer_facilities as $offer_facility) {
                if ($offer_facility->ID == $facility->ID) {
                    bytbil_show_offer($id, $col_size);
                }
            }
        }
        ?>
    </div>
<?php
}

function bytbil_show_offers_brands($brand, $col_size = 3){
    $posts = get_posts(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'offer'
    ));

    if($posts){

        foreach( $posts as $post ):

            setup_postdata( $post );

            $id = $post->ID;
            $offer_brands = get_field('offer-brands', $id);

            foreach ($offer_brands as $offer_brand) {
                if ($offer_brand->ID == $brand->ID) {
                    bytbil_show_offer($id, $col_size);
                }
            }

         endforeach;

        wp_reset_postdata();

    }

}

/*function bytbil_show_offers_brand($brand, $col_size = 3)
{
    $args = array('post_type' => 'offer');
    $offers = get_posts($args);
    foreach ($offers as $offer) {
        $id = $offer->ID;
        $offer_brands = get_field('offer-brands', $id);
        foreach ($offer_brands as $offer_brand) {
            echo 'Brand: ' . $offer_brand->ID;
            echo '<br>';
            echo 'Offer: ' . $offer->ID;
            if ($offer_brand->ID == $brand->ID) {
                bytbil_show_offer($id, $col_size);
            }
        }
    }
}*/

function bytbil_show_offers_own($offers, $col_size = 6)
{
    foreach($offers as $offer){
        $id = $offer->ID;
        bytbil_show_offer($id, $col_size);
    }
}

?>
