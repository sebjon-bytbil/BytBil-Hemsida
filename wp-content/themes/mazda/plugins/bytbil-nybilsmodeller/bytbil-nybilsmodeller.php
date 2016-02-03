<?php

add_action('init', 'cptui_register_my_cpt_newcarmodel');
function cptui_register_my_cpt_newcarmodel()
{
    register_post_type('newcarmodel', array(
            'label' => 'Nybilsmodell',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'nybilsmodell', 'with_front' => false),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Nybilsmodeller',
                'singular_name' => 'Nybilsmodell',
                'menu_name' => 'Nybilsmodeller',
                'add_new' => 'Lägg till Nybilsmodell',
                'add_new_item' => 'Lägg till ny Nybilsmodell',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Nybilsmodell',
                'new_item' => 'Ny Nybilsmodell',
                'view' => 'Visa Nybilsmodell',
                'view_item' => 'Visa Nybilsmodell',
                'search_items' => 'Sök Nybilsmodeller',
                'not_found' => 'Inga Nybilsmodeller hittade',
                'not_found_in_trash' => 'Inga Nybilsmodeller i papperskorgen',
                'parent' => 'Nybilsmodellens förälder',
            )
        )
    );
}

add_action('init', 'cptui_register_my_cpt_newcarmodel_list');
function cptui_register_my_cpt_newcarmodel_list()
{
    register_post_type('newcarmodel_list', array(
        'label' => 'Nybilsmodellslistor',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=newcarmodel',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'newcarmodel_list', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'revisions'),
        'labels' => array(
            'name' => 'Nybilsmodellslistor',
            'singular_name' => 'Nybilmodellslista',
            'menu_name' => 'Nybilmodellslistor',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till Nybilmodellslista',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Nybilmodellslista',
            'new_item' => 'Ny Nybilmodellslista',
            'view' => 'Visa Nybilmodellslista',
            'view_item' => 'Visa Nybilmodellslista',
            'search_items' => 'Sök Nybilmodellslista',
            'not_found' => 'Inga Nybilmodellslistor hittade',
            'not_found_in_trash' => 'Inga Nybilmodellslistor i papperskorgen',
            'parent' => 'Nybilmodellslistans förälder',
        )
    ));
}


if (function_exists('register_field_group')) {
    register_field_group(array(
        'id' => 'acf_nybilsmodell',
        'title' => 'Nybilsmodell',
        'fields' => array(
            array(
                'key' => 'field_5901qio249afa',
                'label' => 'Modellinfo',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5901d559bc438',
                'label' => 'Bild',
                'name' => 'newcarmodel-image',
                'type' => 'image_crop',
                'crop_type' => 'hard',
                'target_size' => 'nybilsmodell-585',
                'preview_size' => 'nybilsmodell-250',
                'width' => '',
                'height' => '',
                'force_crop' => 'no',
                'save_in_media_library' => 'no',
                'retina_mode' => 'no',
                'save_format' => 'url',
            ),
            array(
                'key' => 'field_5901a8jr3io29',
                'label' => 'Årsmodell',
                'name' => 'newcarmodell-year',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5901v9e2m432',
                'label' => 'Antal mil',
                'name' => 'newcarmodell-miles',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5901cm920r92',
                'label' => 'Pris',
                'name' => 'newcarmodell-price',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'newcarmodel',
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

    register_field_group(array(
        'id' => 'acf_nybilsmodellista',
        'title' => 'Nybilsmodellista',
        'fields' => array(
            array(
                'key' => 'field_541adde4b2131',
                'label' => 'Nybilsmodeller',
                'name' => 'newcarmodel_list',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'newcarmodel',
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
                    'value' => 'newcarmodel_list',
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

if (function_exists('add_image_size')) {
    // 250x167 - 1.50
    add_image_size('nybilsmodell-960', 960, 640, true);
    add_image_size('nybilsmodell-585', 585, 390, true);
    add_image_size('nybilsmodell-450', 450, 300, true);
    add_image_size('nybilsmodell-250', 250, 167, true);
}

function bytbil_show_newcarmodel($id, $cols = null)
{
    if (is_null($cols)) {
        $cols = 3;
    }

    $title = get_the_title($id);
    $image = get_field('newcarmodel-image', $id);
    $year = get_field('newcarmodell-year', $id);
    $miles = get_field('newcarmodell-miles', $id);
    $price = get_field('newcarmodell-price', $id);
    ?>

    <div class="col-xs-12 col-sm-<?php echo $cols; ?>">
        <article class="newcarmodel">
            <a href="<?php echo get_permalink($id); ?>">
            <?php if (!is_null($image)) : ?>
                <img src="<?php echo $image; ?>">
                <?php endif; ?>
                <section class="information">
                    <h3 class="name"><strong><?php echo $title; ?></strong></h3>
                    <div class="row">
                        <div class="extras col-xs-12">
                            <span class="year-miles">
                                <span class="year"><?php echo $year; ?></span> / <span class="miles"><?php echo $miles; ?> mil</span>
                            </span>
                            <span class="price"><strong><?php echo $price; ?> kr</strong></span>
                        </div>
                    </div>
                </section>
            </a>
        </article>
    </div>

    <?php
}

function bytbil_show_newcarmodel_list($model_list)
{
    $id = $model_list->ID;
    $title = get_the_title($id);
    $models = get_field('newcarmodel_list', $id);
    ?>

    <div class="col-xs-12 list-title">
        <h2><?php echo $title; ?></h2>
    </div>

    <?php
    foreach ($models as $model) {
        bytbil_show_newcarmodel($model->ID);
    }
}

?>

