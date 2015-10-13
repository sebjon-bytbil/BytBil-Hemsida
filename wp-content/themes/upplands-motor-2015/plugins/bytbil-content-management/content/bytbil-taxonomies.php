<?php

add_action('init', 'cptui_register_my_taxes_search_meta');
function cptui_register_my_taxes_search_meta()
{
    register_taxonomy('search_meta', array(
        0 => 'page',
        1 => 'offer',
        2 => 'news',
    ),
        array(
            'hierarchical' => false,
            'label' => 'Sökord',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array (
                'search_items' => 'Sökord',
                'popular_items' => 'Populära sökord',
                'all_items' => 'Alla sökord',
                'parent_item' => 'Sökordets förälder',
                'parent_item_colon' => 'Sökordets förälder:',
                'edit_item' => 'Redigera sökord',
                'update_item' => 'Uppdatera sökord',
                'add_new_item' => 'Lägg till sökord',
                'new_item_name' => 'Nytt sökord',
                'separate_items_with_commas' => 'Separera sökord med komma',
                'add_or_remove_items' => 'Lägg till eller ta bort sökord',
                'choose_from_most_used' => 'Välj från mest använda',
            )
        ));
}

add_action('init', 'cptui_register_my_taxes_brand');
function cptui_register_my_taxes_brand()
{
    register_taxonomy('brand', array(
        0 => 'vehicle',
        1 => 'engine',
        2 => 'modelgroup',
        3 => 'offer',
        4 => 'equipment',
        5 => 'equipment_package',
        6 => 'facility',
        7 => 'employee',
        8 => 'news',
        9 => 'page',
    ),
        array(
            'hierarchical' => true,
            'label' => 'Märke och modell',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array(
                'search_items' => 'Märke/Modell',
                'popular_items' => 'Populära',
                'all_items' => 'Alla',
                'parent_item' => 'Märke/modellens förälder',
                'parent_item_colon' => '',
                'edit_item' => 'Redigera',
                'update_item' => 'Uppdatera',
                'add_new_item' => 'Lägg till',
                'new_item_name' => 'Nytt märke/modell',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => 'Lägg till/ta bort',
                'choose_from_most_used' => 'Välj från populära',
            ),
        ));
}

add_action('init', 'cptui_register_my_taxes_utrustning');
function cptui_register_my_taxes_utrustning()
{
    register_taxonomy('utrustning', array(
        0 => 'equipment',
    ),
        array(
            'hierarchical' => true,
            'label' => 'Utrustningstyper',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array(
                'search_items' => 'Utrustningstyp',
                'popular_items' => 'Populära',
                'all_items' => 'Alla',
                'parent_item' => 'Typens förälder',
                'parent_item_colon' => '',
                'edit_item' => 'Redigera',
                'update_item' => 'Uppdatera',
                'add_new_item' => 'Lägg till',
                'new_item_name' => 'Ny utrustningstyp',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => 'Lägg till/ta bort',
                'choose_from_most_used' => 'Välj från populära',
            ),
        ));
}

add_action('init', 'cptui_register_my_taxes_tillbehor');
function cptui_register_my_taxes_tillbehor()
{
    register_taxonomy('tillbehor', array(
        0 => 'accessory',
    ),
        array(
            'hierarchical' => true,
            'label' => 'Tillbehörstyper',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array(
                'search_items' => 'Tillbehörstyp',
                'popular_items' => 'Populära',
                'all_items' => 'Alla',
                'parent_item' => 'Typens förälder',
                'parent_item_colon' => '',
                'edit_item' => 'Redigera',
                'update_item' => 'Uppdatera',
                'add_new_item' => 'Lägg till',
                'new_item_name' => 'Ny tillbehörstyp',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => 'Lägg till/ta bort',
                'choose_from_most_used' => 'Välj från populära',
            ),
        ));
}

add_action('init', 'cptui_register_my_taxes_cities');
function cptui_register_my_taxes_cities()
{
    register_taxonomy('cities', array(
        0 => 'offer',
        1 => 'facility',
        2 => 'employee',
        3 => 'news',
    ),
        array(
            'hierarchical' => true,
            'label' => 'Orter',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array(
                'search_items' => 'Ort',
                'popular_items' => 'Populära',
                'all_items' => 'Alla',
                'parent_item' => 'Ortens förälder',
                'parent_item_colon' => '',
                'edit_item' => 'Redigera',
                'update_item' => 'Uppdatera',
                'add_new_item' => 'Lägg till',
                'new_item_name' => 'Ny ort',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => 'Lägg till/ta bort',
                'choose_from_most_used' => 'Välj från populära',
            ),
        ));
}

add_action('init', 'cptui_register_my_taxes_offer_type');
function cptui_register_my_taxes_offer_type()
{
    register_taxonomy('offer_type', array(
        0 => 'offer',
    ),
        array(
            'hierarchical' => true,
            'label' => 'Erbjudandetyper',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'labels' => array(
                'search_items' => 'Erbjudandetyp',
                'popular_items' => 'Populära',
                'all_items' => 'Alla',
                'parent_item' => 'Typens förälder',
                'parent_item_colon' => '',
                'edit_item' => 'Redigera',
                'update_item' => 'Uppdatera',
                'add_new_item' => 'Lägg till',
                'new_item_name' => 'Ny erbjudandetyp',
                'separate_items_with_commas' => '',
                'add_or_remove_items' => 'Lägg till/ta bort',
                'choose_from_most_used' => 'Välj från populära',
            ),
        ));
}

add_action('init', 'cptui_register_my_taxes_departments');
function cptui_register_my_taxes_departments()
{
    register_taxonomy('departments', array(
        0 => 'facility',
        1 => 'settings',
    ),
    array('hierarchical' => false,
        'label' => 'Avdelningar',
        'show_ui' => true,
        'query_var' => true,
        'show_admin_column' => false,
        'labels' => array (
            'search_items' => 'Avdelning',
            'popular_items' => 'Populära',
            'all_items' => 'Alla',
            'parent_item' => 'Typens förälder',
            'parent_item_colon' => '',
            'edit_item' => 'Redigera',
            'update_item' => 'Uppdatera',
            'add_new_item' => 'Lägg till',
            'new_item_name' => 'Ny erbjudandetyp',
            'separate_items_with_commas' => '',
            'add_or_remove_items' => 'Lägg till/ta bort',
            'choose_from_most_used' => 'Välj från populära',
        )
    ));
}

add_action('departments_add_form_fields', 'taxonomy_add_departments_meta_field');
function taxonomy_add_departments_meta_field()
{
?>
    <div class="form-field">
        <label for="term_meta[custom_term_meta]"><?php _e('Oberoende av Märke/Modell', 'UM'); ?></label>
        <input type="hidden" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="0" />
        <input type="checkbox" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="1" />
        <p class="description"><?php _e('Den här knappen styr om epost ska skickas, när man har valt denna avdelning i formulären, oberoende av Märke/Modell.', 'UM'); ?></p>
    </div>
<?php
}

add_action('departments_edit_form_fields', 'taxonomy_edit_departments_meta_field');
function taxonomy_edit_departments_meta_field($term)
{
    $t_id = $term->term_id;
    $term_meta = get_option("taxonomy_$t_id"); ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e('Oberoende av Märke/Modell', 'UM'); ?></label></th>
        <td>
            <input type="hidden" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="0" />
            <input type="checkbox" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="1" <?php checked('1', $term_meta['custom_term_meta']); ?> />
            <p class="description"><?php _e('Den här knappen styr om epost ska skickas, när man har valt denna avdelning i formulären, oberoende av Märke/Modell.', 'UM'); ?></p>
        </td>
    </tr>
<?php
}

add_action('edited_departments', 'taxonomy_save_departments_meta_field', 10, 2);
add_action('create_departments', 'taxonomy_save_departments_meta_field', 10, 2);
function taxonomy_save_departments_meta_field($term_id)
{
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option("taxonomy_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        update_option("taxonomy_$t_id", $term_meta);
    }
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_markesinstallningar',
        'title' => 'Märkesinställningar',
        'fields' => array(
            array(
                'key' => 'field_554214f373ab3',
                'label' => 'Logotyp',
                'name' => 'brand-logotype',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_5542150e73ab4',
                'label' => 'Profilfärg',
                'name' => 'brand-color',
                'type' => 'color_picker',
                'default_value' => '',
            ),
            array(
                'key' => 'field_554a5cca83959',
                'label' => 'Märkessida',
                'name' => 'brand-page',
                'type' => 'page_link',
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_taxonomy',
                    'operator' => '==',
                    'value' => 'brand',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

?>
