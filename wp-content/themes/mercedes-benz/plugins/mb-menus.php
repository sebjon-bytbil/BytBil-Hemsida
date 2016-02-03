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
                'name' => 'menu-items-af',
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


            array(
                'key' => 'field_54462ba6d0dd7',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_54462bbdd0dd8',
                'label' => 'Visa hos återförsäljare för',
                'name' => 'menu-settings-show',
                'type' => 'radio',
                'choices' => array(
                    'pb' => 'Personbilar',
                    'tb' => 'Transportbilar',
                    'lb' => 'Lastbilar',
                    'hb' => 'Hyrbilar',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
            ),
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

// Skriv ut Återförsäljarmenyn
function get_af_menu()
{
    ?>

    <section id="af-links">
        <h2><?php echo get_field('af-menu-title', 'options'); ?></h2>
        <?php
        if (get_field('af-menu-links', 'options')) {
            while (have_rows('af-menu-links', 'options')) {
                the_row();
                $link_title = get_sub_field('af-menu-link-title');
                $link_icon = get_sub_field('af-menu-link-icon');
                $link_type = get_sub_field('af-menu-link-type');
                $link_target = get_sub_field("af-menu-link-target");

                if ($link_type == 'internal') {
                    $link_url = get_sub_field('af-menu-link-page');
                } elseif ($link_type == 'external') {
                    $link_url = get_sub_field('af-menu-link-url');
                } elseif ($link_type == 'file') {
                    $link_url = get_sub_field('af-menu-link-file');
                }
                ?>
                <a <?php if ($link_target == "lightbox") : elseif ($link_target != false) : ?> target="<?php echo $link_target; ?>" <?php endif; ?> class="shortlink" href="<?php echo $link_url; ?>"><i
                        class="fa fa-fw <?php echo $link_icon; ?>"></i><span
                        class="title"> <?php echo $link_title; ?></span></a>
            <?php
            }
        }
        ?>
    </section>

<?php
}

// Skriv ut Huvudmenyn
function get_main_menu($id = 0)
{
    switch_to_master();
    if (get_field('settings_menu', 'options')) :
        restore_blog();
        $current_page = $id;
        $af_reseller = get_field('af-reseller', 'options');
        $af_service = get_field('af-service', 'options');
        switch_to_master();
        ?>

        <nav class="navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <i class="fa fa-bars fa-lg"></i>
            </button>
            <a class="navbar-brand visible-xs"
               href="#"><?php $mb_logotype = get_field('settings_logotype', 'options'); ?><img
                    src="<?php echo $mb_logotype['url'] ?>" class="mb-logotype-n" alt="Mercedes-Benz"
                    title="Mercedes-Benz"></a>
        </div>
        <div class="collapse navbar-collapse" id="main-menu">
        <ul class="nav navbar-nav">

        <?php
        // Hämta Menyvalen från Inställningar
        while (have_rows('settings_menu', 'options')) {
            the_row();
            $menu_object = get_sub_field('settings_menu_item');
            $objectID = $menu_object->ID;
            $objectType = get_post_type($objectID);

            // Om det är en Sida
            if ($objectType == 'page') {
                ?>
                <li <?php if ($objectID == $current_page) {
                    echo 'class="active"';
                } ?>>
                    <a href="<?php echo get_local_url(get_permalink($objectID)); ?>" target="_self"
                       title="<?php echo get_the_title($objectID); ?>"><?php echo get_the_title($objectID); ?></a>
                </li>
                <?php
                // Om det är en Meny
            } else {
                // Printa enbart ut om Återförsäljaren får visa menyn
                $menu_show = get_field('menu-settings-show', $objectID);
                if (maybe_in_array($menu_show, $af_reseller)) {
                    ?>

                    <li <?php if ($objectID == $current_page) {
                        echo 'class="active"';
                    } ?>>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           title="<?php echo get_the_title($objectID); ?>"><?php echo get_the_title($objectID); ?></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                            // Hämta Menyvalen
                            while (have_rows('menu-items', $objectID)) {
                                the_row();
                                $link_type = get_sub_field('menu-link-type');
                                $link_target = get_sub_field("menu-link-target");
                                $use_submenu = get_sub_field('menu-link-use-submenu');
                                $af_has_hidden = get_hidden_status($objectID, "menu_af_has_hidden");

                                if ($link_type == 'internal') {
                                    $page_object = get_sub_field('menu-link-page');
                                    $page_id = $page_object->ID;
                                    $url = get_local_url(get_permalink($page_id));

                                    $use_title = get_sub_field("menu-use-custom-title");

                                    if ($use_title) {
                                        $title = get_sub_field("menu-link-title");
                                    } else {
                                        $title = get_the_title($page_id);
                                    }
                                } else {
                                    $url = get_local_url(get_sub_field('menu-link-url'));
                                    $title = get_sub_field('menu-link-title');
                                }

                                // Om det finns Undermenyval
                                if ($use_submenu == 1 && !$af_has_hidden) {
                                    ?>

                                    <li class="dropdown-submenu <?php if ($objectID == $current_page) {
                                        echo 'active';
                                    } ?>">
                                        <a href="<?php echo $url; ?>" class="dropdown-toggle"
                                           data-toggle="dropdown"><?php echo $title; ?> <i
                                                class="fa fa-angle-right pull-right"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php
                                            while (have_rows('menu-link-submenu')) {
                                                the_row();
                                                $submenu_object = get_sub_field('submenu-link-page');
                                                $submenu_id = $submenu_object->ID;
                                                $submenu_title = get_the_title($submenu_id);
                                                $submenu_url = get_local_url(get_permalink($submenu_id));
                                                $af_has_hidden = get_hidden_status($objectID, "submenu_af_has_hidden");
                                                $submenu_link_target = get_sub_field("submenu-link-target");

                                                $use_sub_title = get_sub_field("submenu-use-custom-title");
                                                if ($use_sub_title) {
                                                    $submenu_title = get_sub_field("submenu-link-title");
                                                }
                                                ?>
                                                <?php if (!$af_has_hidden) : ?>
                                                    <li <?php if ($objectID == $current_page) {
                                                        echo 'class="active"';
                                                    } ?>><a href="<?php echo $submenu_url; ?>"
                                                            <?php if ($submenu_link_target == "lightbox") : ?> data-lightbox <?php elseif ($submenu_link_target != false) : ?> target="<?php echo $submenu_link_target; ?>" <?php endif; ?>
                                                            title="<?php echo $submenu_title; ?>"><?php echo $submenu_title; ?></a>
                                                    </li>
                                                <?php endif; ?>

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                    // Om det enbart är en länk
                                } else if (!$af_has_hidden) {
                                    ?>

                                    <li <?php if ($objectID == $current_page) {
                                        echo 'class="active"';
                                    } ?>><a <?php if ($link_target == "lightbox") : ?> data-lightbox <?php elseif ($link_target != false) : ?> target="<?php echo $link_target; ?>" <?php endif; ?> href="<?php echo $url; ?>"
                                            title="<?php echo $title; ?>"><?php echo $title; ?></a></li>

                                <?php } // SLUT -  Undermenyval/Sida?>
                            <?php
                            } // SLUT - Menyval

                            restore_blog();

                            /* ÅF menyval */
                            while (have_rows('menu-items-af', maybe_get_local_id($objectID))) {
                                the_row();
                                $link_type = get_sub_field('menu-link-type-af');
                                $use_submenu = get_sub_field('menu-link-use-submenu-af');
                                $af_link_target = get_sub_field("menu-link-target-af");

                                if ($link_type == 'internal') {
                                    $page_object = get_sub_field('menu-link-page-af');
                                    $page_id = $page_object->ID;
                                    $url = get_permalink($page_id);
                                    $title = get_the_title($page_id);
                                } else {
                                    $url = get_sub_field('menu-link-url-af');
                                    $title = get_sub_field('menu-link-title-af');
                                }

                                // Om det finns Undermenyval
                                if ($use_submenu == 1) {
                                    ?>

                                    <li class="dropdown-submenu <?php if (maybe_get_local_id($objectID) == $current_page) {
                                        echo 'active';
                                    } ?>">
                                        <a href="<?php echo $url; ?>" class="dropdown-toggle"
                                           data-toggle="dropdown"><?php echo $title; ?> <i
                                                class="fa fa-angle-right pull-right"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php
                                            while (have_rows('menu-link-submenu-af')) {
                                                the_row();
                                                $submenu_object = get_sub_field('submenu-link-page-af');
                                                $submenu_id = $submenu_object->ID;
                                                $submenu_title = get_the_title($submenu_id);
                                                $submenu_url = get_permalink($submenu_id);
                                                $af_submenu_link_target = get_sub_field("submenu-link-target-af");
                                                ?>

                                                <li <?php if ($objectID == $current_page) {
                                                    echo 'class="active"';
                                                } ?>><a href="<?php echo $submenu_url; ?>"
                                                        <?php if ($af_submenu_link_target == "lightbox") : ?> data-lightbox <?php elseif ($af_submenu_link_target != false) : ?> target="<?php echo $af_submenu_link_target ?>" <?php endif; ?>
                                                        title="<?php echo $submenu_title; ?>"><?php echo $submenu_title; ?></a>
                                                </li>

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                    // Om det enbart är en länk
                                } else {
                                    ?>
                                    <li <?php if ($objectID == $current_page) {
                                        echo 'class="active"';
                                    } ?>><a href="<?php echo $url; ?>"
                                            <?php if ($af_link_target == "lightbox") : ?> data-lightbox <?php elseif ($af_link_target != false) : ?> target="<?php echo $af_link_target; ?>" <?php endif; ?>
                                            title="<?php echo $title; ?>"><?php echo $title; ?></a></li>

                                <?php } // SLUT -  Undermenyval/Sida?>
                            <?php } // SLUT - Menyval ?>
                            <?php switch_to_master(); ?>
                        </ul>
                    </li>
                <?php
                }
            }
        }

        restore_blog();

        // Fetch local top menu choices

        while (have_rows('af_settings_menu', 'options')) {
            the_row();
            $menu_object = get_sub_field('af_settings_menu_item');
            $objectID = $menu_object->ID;
            $objectType = get_post_type($objectID);

            // Om det är en Sida
            if ($objectType == 'page') {
                ?>
                <li <?php if ($objectID == $current_page) {
                    echo 'class="active"';
                } ?>>
                    <a href="<?php echo get_permalink($objectID); ?>" target="_self"
                       title="<?php echo get_the_title($objectID); ?>"><?php echo get_the_title($objectID); ?></a>
                </li>
                <?php
                // Om det är en Meny
            } else {
                ?>
                <li <?php if ($objectID == $current_page) {
                    echo 'class="active"';
                } ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       title="<?php echo get_the_title($objectID); ?>"><?php echo get_the_title($objectID); ?></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        // Hämta Menyvalen
                        while (have_rows('menu-items', $objectID)) {
                            the_row();
                            $link_type = get_sub_field('menu-link-type');
                            $use_submenu = get_sub_field('menu-link-use-submenu');
                            $target = get_sub_field("menu-link-target");

                            if ($link_type == 'internal') {
                                $page_object = get_sub_field('menu-link-page');
                                $page_id = $page_object->ID;
                                $url = get_permalink($page_id);
                                $title = get_the_title($page_id);
                            } else {
                                $url = get_sub_field('menu-link-url');
                                $title = get_sub_field('menu-link-title');
                            }

                            // Om det finns Undermenyval
                            if ($use_submenu == 1) {
                                ?>

                                <li class="dropdown-submenu <?php if ($objectID == $current_page) {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo $url; ?>" class="dropdown-toggle"
                                       data-toggle="dropdown"><?php echo $title; ?> <i
                                            class="fa fa-angle-right pull-right"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php
                                        while (have_rows('menu-link-submenu')) {
                                            the_row();
                                            $submenu_object = get_sub_field('submenu-link-page');
                                            $submenu_id = $submenu_object->ID;
                                            $submenu_title = get_the_title($submenu_id);
                                            $submenu_url = get_permalink($submenu_id);
                                            $submenu_target = get_sub_field("submenu-link-target");

                                            ?>

                                            <li <?php if ($objectID == $current_page) {
                                                echo 'class="active"';
                                            } ?>><a href="<?php echo $submenu_url; ?>"
                                                    <?php if ($submenu_target == "lightbox") : ?> data-lightbox <?php elseif ($submenu_target != false) :?> target="<?php echo $submenu_target; ?>" <?php endif; ?>
                                                    title="<?php echo $submenu_title; ?>"><?php echo $submenu_title; ?></a>
                                            </li>

                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                                // Om det enbart är en länk
                            } else {
                                ?>
                                <li <?php if ($objectID == $current_page) {
                                    echo 'class="active"';
                                } ?>><a href="<?php echo $url; ?>"
                                        <?php if ($target == "lightbox") : ?> data-lightbox <?php elseif ($target != false) : ?> target="<?php echo $target ?>" <?php endif; ?>
                                        title="<?php echo $title; ?>"><?php echo $title; ?></a></li>

                            <?php } // SLUT -  Undermenyval/Sida?>
                        <?php } // SLUT - Menyval ?>
                    </ul>
                </li>
            <?php
            }
        }
        ?>
        </ul>
        </div>
        </nav>
    <?php endif;
    restore_blog();
}

?>
