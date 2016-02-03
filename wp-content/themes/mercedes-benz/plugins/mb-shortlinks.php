<?php

add_action('init', 'cptui_register_my_cpt_shortlink');
function cptui_register_my_cpt_shortlink()
{
    register_post_type('shortlink', array(
        'label' => 'Snabblänkar',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'shortlink', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Snabblänkar',
            'singular_name' => 'Snabblänkar',
            'menu_name' => 'Snabblänkar',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till snabblänk',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera snabblänk',
            'new_item' => 'Ny snabblänk',
            'view' => 'Visa snabblänk',
            'view_item' => 'Visa snabblänk',
            'search_items' => 'Sök snabblänkar',
            'not_found' => 'Inga snabblänkar hittade',
            'not_found_in_trash' => 'Inga snabblänkar i papperskorgen',
            'parent' => 'Snabblänkens förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_snabblankar',
        'title' => 'Snabblänkar',
        'fields' => array(
            array(
                'key' => 'field_54463a9e778c3',
                'label' => 'Ikon',
                'name' => 'shortlink_icon',
                'type' => 'font-awesome',
                'default_value' => 'null',
                'save_format' => 'class',
                'allow_null' => 0,
                'enqueue_fa' => 0,
                'choices' => require("font-awesome-choices/font-awesome-choices.php"),
            ),
            array(
                'key' => 'field_54463ae0778c4',
                'label' => 'Länka till',
                'name' => 'shortlink_type',
                'type' => 'select',
                'choices' => array(
                    'internal' => 'Lokal sida',
                    'external' => 'Extern URL',
                ),
                'default_value' => 'internal',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_54463b36778c5',
                'label' => 'Sida',
                'name' => 'shortlink_page',
                'type' => 'page_link',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54463ae0778c4',
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
                'key' => 'field_54463b46778c6',
                'label' => 'Adress',
                'name' => 'shortlink_url',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54463ae0778c4',
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
                "key" => "field_oiah0hq308hgaef08",
                "label" => "Öppna länk i",
                "name" => "shortlink_target",
                "type" => "radio",
                "choices" => array(
                    "self" => "Samma fönster",
                    "blank" => "Nytt fönster",
                    "lightbox" => "Lightbox"
                ),
            ),
            array(
                'key' => 'field_54463b88778c7',
                'label' => 'Visa för återförsäljare',
                'name' => 'shortlink_show',
                'type' => 'checkbox',
                'choices' => array(
                    'pb' => 'Personbilar',
                    'tb' => 'Transportbilar',
                    'lb' => 'Lastbilar',
                    'hb' => 'Hyrbilar',
                ),
                'default_value' => '',
                'layout' => 'vertical',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'shortlink',
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

// Hämta Shortlinks
function get_shortlink($id)
{
    $shortlink_title = get_the_title($id);
    $shortlink_icon = get_field('shortlink_icon', $id);
    $shortlink_type = get_field('shortlink_type', $id);
    $show_for = get_field("shortlink_show", $id);
    $target = get_field("shortlink_target", $id);

    if (is_master()) {
        restore_blog();
        $af_type = get_field("af-reseller", "options");
        switch_to_master();

        if (!maybe_in_array($af_type, $show_for)) {
            return;
        }
    }


    if ($shortlink_type == 'internal') {
        if (is_switched()) {
            $shortlink_url = get_local_url(get_field('shortlink_page', $id));
        } else {
            $shortlink_url = get_field('shortlink_page', $id);
        }
    } else {
        $shortlink_url = get_field('shortlink_url', $id);
    } ?>
    <?php if (!get_field("hide", $id)) : ?>
    <div class="col-xs-12 col-sm-3">
        <a <?php if ($target == "lightbox") : ?> data-lightbox <?php endif; ?> href="<?php echo $shortlink_url; ?>"
            <?php if ($target == "self" || $target == "blank") : ?> target="_<?php echo $target; ?>" <?php endif; ?>
            id="shortlink-<?php echo $id; ?>">
            <i class="fa fa-fw <?php echo $shortlink_icon; ?>"></i>
            <span class="title"> <?php echo $shortlink_title; ?></span>
        </a>
    </div>
<?php endif; ?>

<?php
}
