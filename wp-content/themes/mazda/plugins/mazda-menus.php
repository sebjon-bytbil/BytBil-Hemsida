<?php

add_action('init', 'cptui_register_my_cpt_menus');
function cptui_register_my_cpt_menus()
{
    register_post_type('menus', array(
        'label' => 'Menyer',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'menus', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Menyer',
            'singular_name' => 'Menyer',
            'menu_name' => 'Menyer',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till meny',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera menyer',
            'new_item' => 'Ny meny',
            'view' => 'Visa menyer',
            'view_item' => 'Visa menyer',
            'search_items' => 'Sök menyer',
            'not_found' => 'Inga menyer hittade',
            'not_found_in_trash' => 'Inga menyer i papperskorgen',
            'parent' => 'Menyns förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_menyinstallningar',
        'title' => 'Menyinställningar',
        'fields' => array(
            array(
                'key' => 'field_5445120221fb3',
                'label' => 'Meny',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5445120b21fb4',
                'label' => 'Menyval',
                'name' => 'menu-items',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5445145b21fb7',
                        'label' => 'Sida',
                        'name' => 'menu-link-page',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6',
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
                        'key' => 'field_5445147421fb8',
                        'label' => 'Adress',
                        'name' => 'menu-link-url',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6',
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
                        'key' => 'field_544512a421fb6',
                        'label' => 'Länka till',
                        'name' => 'menu-link-type',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'internal' => 'Lokal sida',
                            'external' => 'Extern länk',
                        ),
                        'default_value' => 'internal',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        "key" => "field_menulinktype+9uasd08",
                        "label" => "Öppna länk i",
                        "name" => "menu-link-target",
                        "type" => "radio",
                        "choices" => array(
                            "_self" => "Samma fönster",
                            "_blank" => "Nytt fönster",
                            "lightbox" => "Lightbox"
                        ),
                    ),
                    array(
                        'key' => 'field_5445174561a04',
                        'label' => 'Använd annan titel',
                        'name' => 'menu-use-custom-title',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_544516b261a02',
                        'label' => 'Titel',
                        'name' => 'menu-link-title',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                                array(
                                    'field' => 'field_5445174561a04',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'any',
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
                        'key' => 'field_5445154b21fba',
                        'label' => 'Lägg till undermeny',
                        'name' => 'menu-link-use-submenu',
                        'type' => 'true_false',
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_5445156621fbb',
                        'label' => 'Undermeny',
                        'name' => 'menu-link-submenu',
                        'type' => 'repeater',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5445154b21fba',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_544515cd21fbd',
                                'label' => 'Sida',
                                'name' => 'submenu-link-page',
                                'type' => 'post_object',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460f2d33884',
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
                                'key' => 'field_544515de21fbe',
                                'label' => 'Adress',
                                'name' => 'submenu-link-url',
                                'type' => 'text',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460f2d33884',
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
                                'key' => 'field_54460f2d33884',
                                'label' => 'Länka till',
                                'name' => 'submenu-link-type',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array(
                                    'internal' => 'Lokal sida',
                                    'external' => 'Extern länk',
                                ),
                                'default_value' => 'internal',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                "key" => "field_submenulinktypeasd+9ahsd",
                                "label" => "Öppna länk i",
                                "name" => "submenu-link-target",
                                "type" => "radio",
                                "choices" => array(
                                    "_self" => "Samma fönster",
                                    "_blank" => "Nytt fönster",
                                    "lightbox" => "Lightbox"
                                ),
                            ),
                            array(
                                'key' => 'field_54460ee433881',
                                'label' => 'Använd annan titel',
                                'name' => 'submenu-use-custom-title',
                                'type' => 'true_false',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460f2d33884',
                                            'operator' => '==',
                                            'value' => 'internal',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'message' => '',
                                'default_value' => 0,
                            ),
                            array(
                                'key' => 'field_544516ef61a03',
                                'label' => 'Titel',
                                'name' => 'submenu-link-title',
                                'type' => 'text',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460ee433881',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                        array(
                                            'field' => 'field_54460f2d33884',
                                            'operator' => '==',
                                            'value' => 'external',
                                        ),
                                    ),
                                    'allorany' => 'any',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array(
                                "key" => "field_affardoljasub0y0hq0f8heq",
                                "name" => "submenu_af_can_hide",
                                "label" => "ÅF får dölja",
                                "type" => "true_false",
                                'column_width' => '',
                                'message' => '',
                                'default_value' => 0
                            ),
                            array(
                                "key" => "field_afhardoltsub0asdh08an0f8g",
                                "name" => "submenu_af_has_hidden",
                                "label" => "Dölj menyval",
                                "type" => "true_false",
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_affardoljasub0y0hq0f8heq',
                                            'operator' => '==',
                                            'value' => 1,
                                        ),
                                    ),
                                    'allorany' => 'any',
                                ),
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Lägg till undermenyval',
                    ),
                    array(
                        "key" => "field_affardolja0y0hq0f8heq",
                        "name" => "menu_af_can_hide",
                        "label" => "ÅF får dölja",
                        "type" => "true_false",
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0
                    ),
                    array(
                        "key" => "field_afhardolt0asdh08an0f8g",
                        "name" => "menu_af_has_hidden",
                        "label" => "Dölj menyval",
                        "type" => "true_false",
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_affardolja0y0hq0f8heq',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till menyval',
            ),

            /* START ÅF VAL */

            array(
                'key' => 'field_5445120afafb21fb4afaf',
                'label' => 'Menyval',
                'name' => 'menu-itAWSDUDIAAY1QAWFA55AAGJg_!ems-af',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5445145b2afaf1fb7afaf',
                        'label' => 'Sida',
                        'name' => 'menu-link-page-af',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6afaf',
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
                        'key' => 'field_544514afaf7421fb8afaf',
                        'label' => 'Adress',
                        'name' => 'menu-link-url-af',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6afaf',
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
                        'key' => 'field_544512a421fb6afaf',
                        'label' => 'Länka till',
                        'name' => 'menu-link-type-af',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'internal' => 'Lokal sida',
                            'external' => 'Extern länk',
                        ),
                        'default_value' => 'internal',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        "key" => "field_menulinktypeafoiha8h",
                        "label" => "Öppna länk i",
                        "name" => "menu-link-target-af",
                        "type" => "radio",
                        "choices" => array(
                            "_self" => "Samma fönster",
                            "_blank" => "Nytt fönster",
                            "lightbox" => "Lightbox"
                        ),
                    ),
                    array(
                        'key' => 'field_5445174561a04afaf',
                        'label' => 'Använd annan titel',
                        'name' => 'menu-use-custom-title-af',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6afaf',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_544516b261a02afaf',
                        'label' => 'Titel',
                        'name' => 'menu-link-title-af',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544512a421fb6afaf',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                                array(
                                    'field' => 'field_5445174561a04afaf',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'any',
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
                        'key' => 'field_5445154b21fbaafaf',
                        'label' => 'Lägg till undermeny',
                        'name' => 'menu-link-use-submenu-af',
                        'type' => 'true_false',
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_5445156621fbbafaf',
                        'label' => 'Undermeny',
                        'name' => 'menu-link-submenu-af',
                        'type' => 'repeater',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5445154b21fbaafaf',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_544515cd21fbdafaf',
                                'label' => 'Sida',
                                'name' => 'submenu-link-page-af',
                                'type' => 'post_object',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460f2d33884afaf',
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
                                'key' => 'field_544515de21fbeafaf',
                                'label' => 'Adress',
                                'name' => 'submenu-link-url-af',
                                'type' => 'text',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460f2d33884afaf',
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
                                'key' => 'field_54460f2d33884afaf',
                                'label' => 'Länka till',
                                'name' => 'submenu-link-type-af',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array(
                                    'internal' => 'Lokal sida',
                                    'external' => 'Extern länk',
                                ),
                                'default_value' => 'internal',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                "key" => "field_submenulinktypeafoiha8h",
                                "label" => "Öppna länk i",
                                "name" => "submenu-link-target-af",
                                "type" => "radio",
                                "choices" => array(
                                    "_self" => "Samma fönster",
                                    "_blank" => "Nytt fönster",
                                    "lightbox" => "Lightbox"
                                ),
                            ),
                            array(
                                'key' => 'field_54460ee433881afaf',
                                'label' => 'Använd annan titel',
                                'name' => 'submenu-use-custom-title-af',
                                'type' => 'true_false',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460f2d33884afaf',
                                            'operator' => '==',
                                            'value' => 'internal',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'message' => '',
                                'default_value' => 0,
                            ),
                            array(
                                'key' => 'field_544516ef61a03afaf',
                                'label' => 'Titel',
                                'name' => 'submenu-link-title-af',
                                'type' => 'text',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54460ee433881afaf',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                        array(
                                            'field' => 'field_54460f2d33884afaf',
                                            'operator' => '==',
                                            'value' => 'external',
                                        ),
                                    ),
                                    'allorany' => 'any',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Lägg till undermenyval',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till menyval',
            ),

            /* END ÅF VAL */

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'menus',
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

// Skriv ut Huvudmenyn
function get_main_menu($id = 0)
{
    if (get_field('settings_menu', 'options')) {
        $current_page = $id;
        ?>
<nav class="navbar" role="navigation">
    <div class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navbar-offcanvas" data-canvas="body">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-2x fa-bars"></i>
                </button>
                <a class="navbar-brand ga" href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/mazda-logotype-new-2015.png" alt="Logotype" class="logotype mazda">
                </a>
                <a class="navbar-brand af" href="#">
                    <img src="<?php echo get_retailer_logotype('url'); ?>" alt="<?php echo get_retailer_logotype('alt'); ?>" title="<?php echo get_retailer_logotype('title'); ?>">
                </a>
            </div>

            <div id="mazda-menu" class="navbar-offcanvas offcanvas canvas-slid">
                <a class="navmenu-brand" href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/mazda-logotype-new-2015.png" alt="Logotype" class="logotype mazda">
                </a>
                <a class="navmenu-brand" href="#">
                    <img src="<?php echo get_retailer_logotype('url'); ?>" alt="<?php echo get_retailer_logotype('alt'); ?>" title="<?php echo get_retailer_logotype('title'); ?>">
                </a>
                <ul class="nav navbar-nav">

<?php
        while (have_rows('settings_menu', 'options')) { the_row();
            $menu_object = get_sub_field('settings_menu_item');
            $object_id = $menu_object->ID;
            $object_title = get_the_title($object_id);
            $object_url = get_permalink($object_id);
            $object_type = get_post_type($object_id);
            // Sida
            if ($object_type == 'page') {
                ?>

                    <li<?php echo ($current_page == $object_id) ? ' class="active"' : ''; ?>>
                        <a href="<?php echo $object_url; ?>" target="_self" title="<?php echo $object_title; ?>"><?php echo $object_title; ?></a>
                    </li>

                <?php
            // Meny
            } else {
                ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $object_title; ?></a>
                        <ul class="dropdown-menu">

                    <?php
                // Menyval
                while (have_rows('menu-items', $object_id)) { the_row();
                    $link_type = get_sub_field('menu-link-type');
                    $link_target = get_sub_field("menu-link-target");
                    $use_submenu = get_sub_field('menu-link-use-submenu');

                    if ($link_type == 'internal') {
                        $page_object = get_sub_field('menu-link-page');
                        $page_id = $page_object->ID;
                        $url = get_permalink($page_id);

                        $use_title = get_sub_field('menu-use-custom-title');
                        if ($use_title) {
                            $title = get_sub_field('menu-link-title');
                        } else {
                            $title = get_the_title($page_id);
                        }
                    } else {
                        $url = get_sub_field('menu-link-url');
                        $title = get_sub_field('menu-link-title');
                    }

                    if ($use_submenu == 1 && !$af_has_hidden) {
                        ?>

                            <li class="dropdown-submenu">
                                <a href="<?php echo $url; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $title; ?></a>
                                <ul class="dropdown-menu">

                            <?php
                        while (have_rows('menu-link-submenu')) { the_row();
                            $submenu_object = get_sub_field('submenu-link-page');
                            $submenu_id = $submenu_object->ID;
                            $submenu_title = get_the_title($submenu_id);
                            $submenu_url = get_permalink($submenu_id);

                            $af_has_hidden = false;
                            $submenu_link_target = get_sub_field('submenu-link-target');

                            $use_sub_title = get_sub_field('submenu-use-custom-title');
                            if ($use_sub_title) {
                                $submenu_title = get_sub_field('submenu-link-title');
                            }

                            if (!$af_has_hidden) {
                                ?>

                                    <li<?php echo ($current_page == $object_id) ? ' class="active"' : ''; ?>>
                                        <a href="<?php echo $submenu_url; ?>" <?php if ($submenu_link_target == 'lightbox') : ?> data-lightbox <?php elseif ($submenu_link_target != false) : ?> target="<?php echo $submenu_link_target; ?>" <?php endif; ?> title="<?php echo $submenu_title; ?>"><?php echo $submenu_title; ?></a>
                                    </li>

                                    <?php
                            }
                        }
                        ?>

                                </ul>
                            </li>

                            <?php
                    } elseif (!$af_has_hidden) {
                        ?>

                            <li<?php echo ($current_page == $object_id) ? ' class="active"' : ''; ?>>
                                <a href="<?php echo $url; ?>" <?php if ($link_target == 'lightbox') : ?> data-lightbox <?php elseif ($link_target != false) : ?> target="<?php echo $link_target; ?>" <?php endif; ?> title="<?php echo $title; ?>"><?php echo $title; ?></a>
                            </li>

                            <?php
                    }
                }

                /* ÅF Menyval */
                while (have_rows('menu-itAWSDUDIAAY1QAWFA55AAGJg_!ems-af', $object_id)) {
                    the_row();
                    $link_type = get_sub_field('menu-link-type-af');
                    $use_submenu = get_sub_field('menu-link-use-submenu-af');
                    $af_link_target = get_sub_field('menu-link-target-af');

                    if ($link_type == 'internal') {
                        $page_object = get_sub_field('menu-link-page-af');
                        $page_id = $page_object->ID;
                        $url = get_permalink($page_id);
                        $title = get_the_title($page_id);
                    } else {
                        $url = get_sub_field('menu-link-url-af');
                        $title = get_sub-field('menu-link-title-af');
                    }

                    if ($use_submenu == 1) {
                        ?>

                            <li class="dropdown-submenu">
                                <a href="<?php echo $url; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $title; ?></a>
                                <ul class="dropdown-menu">

                        <?php
                        while (have_rows('menu-link-submenu-af')) {
                            the_row();
                            $submenu_object = get_sub_field('submenu-link-page-af');
                            $submenu_id = $submenu_object->ID;
                            $submenu_title = get_the_title($submenu_id);
                            $submenu_url = get_permalink($submenu_id);
                            $af_submenu_link_target = get_sub_field('submenu-link-target-af');
                            ?>

                            <li<?php echo ($current_page == $object_id) ? ' class="active"' : ''; ?>>
                                <a href="<?php echo $submenu_url; ?>" <?php if ($af_submenu_link_target == 'lightbox') : ?> data-lightbox <?php elseif ($af_submenu_link_target != false) : ?> target="<?php echo $af_submenu_link_target; ?>" <?php endif; ?> title="<?php echo $submenu_title; ?>"><?php echo $submenu_title; ?></a>
                            </li>

                            <?php
                        }
                        ?>
                            </ul>
                        </li>
                            <?php
                    } else {
                        ?>

                            <li<?php echo ($current_page == $object_id) ? ' class="active"' : ''; ?>>
                                <a href="<?php echo $url; ?>" <?php if ($af_link_target == 'lightbox') : ?> data-lightbox <?php elseif ($af_link_target != false) : ?> target="<?php echo $af_link_target; ?>" <?php endif; ?> title="<?php echo $title; ?>"><?php echo $title; ?></a>
                            </li>

                        <?php
                    }
                }
                ?>

                        </ul>
                    </li>
                    <?php
            }
        }
        ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

            <?php
    }
}

?>

