<?php
/*
Plugin Name: BytBil Puffar
Description: Skapa och visa puffar.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/

function bb_plugs_add_mce_modal()
{
    if (!current_user_can("edit_posts") || !current_user_can("edit_pages")) {
        return;
    }

    add_filter("mce_external_plugins", "bb_plugs_add_mce_plugin");
    add_filter("mce_buttons", "bb_plugs_register_mce_button");

    $plugs = get_posts(array(
        "post_type" => "plug",
        "posts_per_page" => -1,
        "orderby" => "title",
        "order" => "ASC"
    ));
    $formatted_plugs = array();

    foreach ($plugs as $plug) {
        $formatted_plugs[] = array(
            "text" => $plug->post_title,
            "value" => $plug->ID
        );
    }

    $plugs = json_encode($formatted_plugs);

    echo "<script>var PLUGS = {$plugs}; </script>";
}

add_action("admin_head", "bb_plugs_add_mce_modal");

function bb_plugs_add_mce_plugin($arr)
{
    $url = plugin_dir_url(__FILE__) . "js/bb-plugs-modal.js";
    $arr["bb_plugs_modal"] = $url;
    return $arr;
}

function bb_plugs_register_mce_button($buttons)
{
    array_push($buttons, "bb_plugs_modal");
    return $buttons;
}

function bb_plugs_shortcode($atts)
{
    if (empty($atts["id"]))
        return false;

    $id = intval($atts["id"]);
    ob_start();
    bytbil_show_plug($id);
    return ob_get_clean();
}

add_shortcode("puff", "bb_plugs_shortcode");

add_action('init', 'cptui_register_my_cpt_plug');
function cptui_register_my_cpt_plug()
{
    register_post_type('plug', array(
        'label' => 'Puffar',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'plug', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => 'Puffar',
            'singular_name' => 'Puff',
            'menu_name' => 'Puffar',
            'add_new' => 'Lägg till Puff',
            'add_new_item' => 'Lägg till Puff',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Puff',
            'new_item' => 'Ny Puff',
            'view' => 'VIsa Puff',
            'view_item' => 'VIsa Puff',
            'search_items' => 'Sök Puffar',
            'not_found' => 'Inga Puffar hittade',
            'not_found_in_trash' => 'Inga Puffar i papperskorgen',
            'parent' => 'Puffens förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_puffar',
        'title' => 'Puffar',
        'fields' => array(
            array(
                'key' => 'field_541a8dccc6f11',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541a8616d1d12',
                'label' => 'Pufftyp',
                'name' => 'plug-type',
                'type' => 'radio',
                'choices' => array(
                    'text' => 'Enbart text',
                    'small-image' => 'Med liten bild',
                    'big-image' => 'Med stor bild',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'text',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a86cdd1d13',
                'label' => 'Text',
                'name' => 'plug-text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_541a873ed1d14',
                'label' => 'Liten bild',
                'name' => 'plug-small-type',
                'type' => 'radio',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'small-image',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'icon' => 'Befintlig ikon',
                    'image' => 'Egen bild',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a881ad1d19',
                'label' => 'Stor bild',
                'name' => 'plug-big-type',
                'type' => 'radio',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'big-image',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'icon' => 'Befintlig ikon',
                    'image' => 'Egen bild',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a87asdd1d15',
                'label' => 'Ikon',
                'name' => 'plug-icon-small',
                'type' => 'font-awesome',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'small-image',
                        ),
                        array(
                            'field' => 'field_541a873ed1d14',
                            'operator' => '==',
                            'value' => 'icon',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 'fa-certificate',
                'save_format' => 'class',
                'allow_null' => 0,
                'enqueue_fa' => 0,
                'choices' => require(WP_PLUGIN_DIR . "/font-awesome-choices/font-awesome-choices.php"),
            ),
            array(
                'key' => 'field_541a87e8d1d17',
                'label' => 'Egen bild',
                'name' => 'plug-image-small',
                'type' => 'image',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'small-image',
                        ),
                        array(
                            'field' => 'field_541a873ed1d14',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_541aasd41d1d15',
                'label' => 'Ikon',
                'name' => 'plug-icon-big',
                'type' => 'font-awesome',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'big-image',
                        ),
                        array(
                            'field' => 'field_541a881ad1d19',
                            'operator' => '==',
                            'value' => 'icon',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 'fa-certificate',
                'save_format' => 'class',
                'allow_null' => 0,
                'enqueue_fa' => 0,
                'choices' => require(WP_PLUGIN_DIR . "/font-awesome-choices/font-awesome-choices.php"),
            ),
            array(
                'key' => 'field_541a87e8d123sa7',
                'label' => 'Egen bild',
                'name' => 'plug-image-big',
                'type' => 'image',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'big-image',
                        ),
                        array(
                            'field' => 'field_541a881ad1d19',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_541a8dccc5e21',
                'label' => 'Utseende',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541a9cbd1f1f7',
                'label' => 'Storlek',
                'name' => 'plug-size',
                'type' => 'radio',
                'instructions' => 'Välj vilken storlek puffen skall ha',
                'choices' => array(
                    9 => 'Stor (75%)',
                    6 => 'Medium (50%)',
                    4 => 'Liten (33%)',
                    3 => 'Minst (25%)',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 3,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_592821e6a1b68',
                'label' => 'Bakgrundsfärg',
                'name' => 'plug-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg puffen skall ha.',
                'default_value' => '#333333',
            ),
            array(
                'key' => 'field_59241236a1b68',
                'label' => 'Textfärg',
                'name' => 'plug-textcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg texten i puffen skall ha.',
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_592821e6a1a37',
                'label' => 'Bakgrundsfärg : Hover',
                'name' => 'plug-bghovercolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken hover-bakgrundsfärg puffen skall ha.',
                'default_value' => '#333333',
            ),
            array(
                'key' => 'field_541a8ddbc6f12',
                'label' => 'Länkning',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541a8951d1d20',
                'label' => 'Länktyp',
                'name' => 'plug-link-type',
                'type' => 'radio',
                'choices' => array(
                    'internal' => 'Lokal sida',
                    'external' => 'Extern URL',
                    'file' => 'Fil',
                    'false' => 'Ingen länk',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'internal',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a8995d1d21',
                'label' => 'Lokal sida',
                'name' => 'plug-link-internal',
                'type' => 'page_link',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '==',
                            'value' => 'internal',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_541a89b4d1d22',
                'label' => 'Extern URL',
                'name' => 'plug-link-external',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '==',
                            'value' => 'external',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_541ranbo1d22',
                'label' => 'Fil',
                'name' => 'plug-link-file',
                'prefix' => '',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'return_format' => 'url',
                'library' => 'all',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '==',
                            'value' => 'file',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_541a89cdd1d23',
                'label' => 'Länkbeteende',
                'name' => 'plug-link-target',
                'type' => 'radio',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '!=',
                            'value' => 'false',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    '_self' => 'Öppna i samma fönster',
                    '_blank' => 'Öppna i nytt fönster',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'plug',
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

function bytbil_show_plugs_sidebar($id)
{
    $plug_type = get_field('plug-type', $id);
    $plug_text = get_field('plug-text', $id);
    $plug_link_type = get_field('plug-link-type', $id);
    $plug_image_small = get_field('plug-image-small', $id);
    $plug_image_big = get_field('plug-image-big', $id);
    $plug_bgcolor = get_field('plug-bgcolor', $id);
    $plug_textcolor = get_field('plug-textcolor', $id);
    $plug_bghovercolor = get_field('plug-bghovercolor', $id);

    if ($plug_bgcolor || $plug_textcolor || $plug_bghovercolor) : ?>
        <style>
            #plug-<?php echo $id; ?>, #plug-<?php echo $id; ?>:link, #plug-<?php echo $id; ?>:visited {

            <?php if($plug_bgcolor) {?> background-color: <?php echo $plug_bgcolor; ?>;
            <?php }

            if($plug_textcolor) {?> color: <?php echo $plug_textcolor; ?>;
            <?php } ?>
            }

            #plug-<?php echo $id; ?>:hover {
            <?php if($plug_bghovercolor){?> background-color: <?php echo $plug_bghovercolor; ?>;
            <?php } ?>
            }
        </style>
    <?php endif; ?>

    <div class="col-xs-12">
        <?php if ($plug_link_type != 'false'){ ?>
        <a href="<?php if ($plug_link_type == 'internal') {
            echo get_field('plug-link-internal', $id);
        } else if ($plug_link_type == "external") {
            echo get_field('plug-link-external', $id);
        } else if ($plug_link_type == "file") {
            the_field("plug-link-file", $id);
        } else {
            echo "#";
        } ?>" class="plug" id="plug-<?php echo $id; ?>" target="<?php echo get_field('plug-link-target', $id); ?>">
            <?php } else { ?>
            <span class="plug" id="plug-<?php echo $id;?>">
         <?php } ?>
                <?php
                if ($plug_type == 'text') { ?>
                    <span class="plug-text">
                        <?php echo $plug_text; ?>
                    </span>
                <?php } elseif ($plug_type == 'small-image') { ?>
                    <span class="plug-icon">
                        <?php
                        if (get_field('plug-small-type', $id) == 'icon') {
                            ?>
                            <i class="fa fa-fw <?php echo get_field('plug-icon-small', $id); ?>"></i>
                        <?php } elseif (get_field('plug-small-type', $id) == 'image') {
                            ?>
                            <img src="<?php echo $plug_image_small['url']; ?>"/>
                        <?php } ?>
                    </span>
                    <span class="plug-icon-text">
                        <?php echo $plug_text; ?>
                    </span>
                <?php } elseif ($plug_type == 'big-image') { ?>
                    <span class="plug-image">
                        <?php
                        if (get_field('plug-big-type', $id) == 'icon') {
                            ?>
                            <div class="plug-big-icon">
                                <i class="fa fa-fw <?php echo get_field('plug-icon-big', $id); ?>"></i>
                            </div>
                        <?php } elseif (get_field('plug-big-type', $id) == 'image') {
                            ?>
                            <div class="plug-big-image"
                                 style="background-image: url(<?php echo $plug_image_big['url']; ?>);">
                            </div>
                        <?php } ?>
                    </span>
                    <span class="plug-image-text">
                        <h3><?php echo $plug_text; ?></h3>
                    </span>
                <?php } ?>
                <?php if ($plug_link_type != 'false'){ ?>
        </a>
    <?php } else { ?>
            </span>
        <?php } ?>
    </div>
<?php
}


function bytbil_show_plug($id, $size = 12)
{
    $plug_size = get_field('plug-size', $id);

    if ($size == 12) {
        $plug_size = $plug_size;
    } else if ($size == 9 && $plug_size == 3) {
        $plug_size = 6;
    } else {
        $plug_size = 12;
    }

    $plug_type = get_field('plug-type', $id);
    $plug_text = get_field('plug-text', $id);
    $plug_link_type = get_field('plug-link-type', $id);
    $plug_image_small = get_field('plug-image-small', $id);
    $plug_image_big = get_field('plug-image-big', $id);
    $plug_bgcolor = get_field('plug-bgcolor', $id);
    $plug_textcolor = get_field('plug-textcolor', $id);
    $plug_bghovercolor = get_field('plug-bghovercolor', $id);

    if ($plug_bgcolor || $plug_textcolor) : ?>
        <style>
            #plug-<?php echo $id; ?>, #plug-<?php echo $id; ?>:link, #plug-<?php echo $id; ?>:visited {

            <?php if($plug_bgcolor) {?> background-color: <?php echo $plug_bgcolor; ?>;
            <?php }

            if($plug_textcolor) {?> color: <?php echo $plug_textcolor; ?>;
            <?php } ?>
            }

            #plug-<?php echo $id; ?> h3 {
            <?php if($plug_textcolor) {?> color: <?php echo $plug_textcolor; ?>;
            <?php } ?>
            }

            #plug-<?php echo $id; ?>:hover {
            <?php if($plug_bghovercolor){?> background-color: <?php echo $plug_bghovercolor; ?>;
            <?php } ?>
            }

        </style>
    <?php endif; ?>

    <div class="col-xs-12 col-sm-<?php echo $plug_size; ?>">
        <?php if ($plug_link_type != 'false'){ ?>
        <a href="<?php if ($plug_link_type == 'internal') {
            echo get_field('plug-link-internal', $id);
        } else if ($plug_link_type == "external") {
            echo get_field('plug-link-external', $id);
        } else if ($plug_link_type == "file") {
            $file = get_field("plug-link-file", $id);
            echo $file["url"];
        } else {
            echo "#";
        } ?>" class="plug" id="plug-<?php echo $id; ?>" target="<?php echo get_field('plug-link-target', $id); ?>">
            <?php } else { ?>
            <span class="plug" id="plug-<?php echo $id;?>">
         <?php } ?>
                <?php
                if ($plug_type == 'text') { ?>
                    <span class="plug-text">
                        <?php echo $plug_text; ?>
                    </span>
                <?php } elseif ($plug_type == 'small-image') { ?>
                    <span class="plug-icon">
                        <?php
                        if (get_field('plug-small-type', $id) == 'icon') {
                            ?>
                            <i class="fa fa-fw <?php echo get_field('plug-icon-small', $id); ?>"></i>
                        <?php } elseif (get_field('plug-small-type', $id) == 'image') {
                            ?>
                            <img src="<?php echo $plug_image_small['url']; ?>"/>
                        <?php } ?>
                    </span>
                    <span class="plug-icon-text">
                        <?php echo $plug_text; ?>
                    </span>
                <?php } elseif ($plug_type == 'big-image') { ?>
                    <span class="plug-image">
                        <?php
                        if (get_field('plug-big-type', $id) == 'icon') {
                            ?>
                            <div class="plug-big-icon">
                                <i class="fa fa-fw <?php echo get_field('plug-icon-big', $id); ?>"></i>
                            </div>
                        <?php } elseif (get_field('plug-big-type', $id) == 'image') {
                            ?>
                            <div class="plug-big-image"
                                 style="background-image: url(<?php echo $plug_image_big['url']; ?>);">
                            </div>
                        <?php } ?>
                    </span>
                    <span class="plug-image-text">
                        <h3><?php echo $plug_text; ?></h3>
                    </span>
                <?php } ?>
                <?php if ($plug_link_type != 'false'){ ?>
        </a>
    <?php } else { ?>
            </span>
        <?php } ?>
    </div>
<?php
}

?>