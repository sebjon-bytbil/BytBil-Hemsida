<?php

add_action('init', 'cptui_register_my_cpt_employee');
function cptui_register_my_cpt_employee()
{
    register_post_type('employee', array(
        'label' => 'Personal',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=facility',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'employee', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'taxonomies' => array('brand', 'cities'),
        'labels' => array(
            'name' => 'Personal',
            'singular_name' => 'Personal',
            'menu_name' => 'Personal',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till personal',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera personal',
            'new_item' => 'Ny personal',
            'view' => 'Visa personal',
            'view_item' => 'Visa personal',
            'search_items' => 'Sök personal',
            'not_found' => 'Ingen personal hittad',
            'not_found_in_trash' => 'Ingen personal i papperskorgen',
            'parent' => 'Personalens förälder',
        )
    ));
}

add_action('init', 'cptui_register_my_cpt_employee_list');
function cptui_register_my_cpt_employee_list()
{
    register_post_type('employee_list', array(
        'label' => 'Personallista',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=facility',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'employee_list', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'taxonomies' => array('brand', 'cities'),
        'labels' => array(
            'name' => 'Personallista',
            'singular_name' => 'Personallista',
            'menu_name' => 'Personallistor',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till personallista',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera personallista',
            'new_item' => 'Ny personallista',
            'view' => 'Visa personallista',
            'view_item' => 'Visa personallista',
            'search_items' => 'Sök personallista',
            'not_found' => 'Ingen personallista hittad',
            'not_found_in_trash' => 'Ingen personallista i papperskorgen',
            'parent' => 'Personallistans förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_personal',
        'title' => 'Personal',
        'fields' => array(
            array(
                'key' => 'field_5546d85a96237',
                'label' => 'Personalbild',
                'name' => 'employee-image',
                'instructions' => 'Välj eller ladda upp en bild på personalen.',
                'type' => 'image_crop',
                'crop_type' => 'hard',
                'target_size' => 'employee-default',
                'width' => '',
                'height' => '',
                'preview_size' => 'employee-sd',
                'force_crop' => 'yes',
                'save_in_media_library' => 'no',
                'retina_mode' => 'no',
                'save_format' => 'object',
            ),
            array(
                'key' => 'field_5549be2e14079',
                'label' => 'Titel',
                'name' => 'employee-work-title',
                'type' => 'text',
                'instructions' => 'Fyll i om du vill visa personalens Arbetstitel.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5546d89696239',
                'label' => 'E-post',
                'name' => 'employee-email',
                'type' => 'email',
                'instructions' => 'Fyll i om du vill visa personalens E-postaddress.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_5549be0bac909',
                'label' => 'Telefon',
                'name' => 'employee-phone',
                'type' => 'text',
                'instructions' => 'Fyll i om du vill visa personalens Telefonnummer.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5546dca03727f',
                'label' => 'Avdelning',
                'name' => 'employee-department',
                'type' => 'checkbox',
                'choices' => array(
                    'carsales' => 'Bilförsäljning',
                    'store' => 'Butik och bildelar',
                    'damage' => 'Skadecenter',
                    'workshop' => 'Verkstad',
                    'other' => 'Lägg till annan',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_5546dd3deb206',
                'label' => 'Annan avdelning',
                'name' => 'employee-other-department',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5546dca03727f',
                            'operator' => '==',
                            'value' => 'other',
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
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'employee',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'excerpt',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'slug',
                5 => 'author',
                6 => 'format',
                7 => 'featured_image',
                8 => 'categories',
                9 => 'tags',
                10 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_personallista',
        'title' => 'Personallista',
        'fields' => array(
            array(
                'key' => 'field_5549c18b09e5c',
                'label' => 'Rubrik',
                'name' => 'employee-list-title',
                'type' => 'text',
                'instructions' => 'Fyll i om du vill skriva ut en unik rubrik för denna personallista.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5549c26b3ac58',
                'label' => 'Personal',
                'name' => 'employee-list-employee',
                'type' => 'relationship',
                'return_format' => 'id',
                'post_type' => array(
                    0 => 'employee',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'employee_list',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'discussion',
                4 => 'comments',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'categories',
                9 => 'tags',
                10 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}


function get_brand_logotype($id)
{
    $logotype = get_field('brand-logotype', 'brand_' . $id);
    ?>
    <img class="brand-logotype" src="<?php echo $logotype['url']; ?>"/>
<?php
}

function get_brand_pagelink($id)
{
    $link = get_field('brand-page', 'brand_' . $id);
    return $link;
}

function get_brand_color($id)
{
    $color = get_field('brand-color', 'brand_' . $id);
    return $color;
}

function get_employee_list($cities, $department, $brand, $hide, $employee_args=false)
{
    if ($brand) {

        $employee_brand_keys = $brand;
        foreach ($employee_brand_keys as $key => $var) {
            $employee_brand_keys[$key] = (int)$var;
        }

        $employee_args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'orderby' => 'rand',
            'post_type' => 'employee',
            'post_status' => 'publish',
            'suppress_filters' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'brand',
                    'field' => 'id',
                    'terms' => $employee_brand_keys,
                ),
            ),
        );
    } elseif ($cities) {

        $employee_cities_keys = $brand;
        foreach ($employee_cities_keys as $key => $var) {
            $employee_cities_keys[$key] = (int)$var;
        }

        $employee_args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'orderby' => 'rand',
            'post_type' => 'employee',
            'post_status' => 'publish',
            'suppress_filters' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'cities',
                    'field' => 'id',
                    'terms' => $employee_cities_keys,
                ),
            ),
        );
    } elseif ($brand && $cities) {

        $employee_cities_keys = $brand;
        foreach ($employee_cities_keys as $key => $var) {
            $employee_cities_keys[$key] = (int)$var;
        }

        $employee_brand_keys = $brand;
        foreach ($employee_brand_keys as $key => $var) {
            $employee_brand_keys[$key] = (int)$var;
        }

        $employee_args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'orderby' => 'rand',
            'post_type' => 'employee',
            'post_status' => 'publish',
            'suppress_filters' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'brand',
                    'field' => 'id',
                    'terms' => $employee_brand_keys,
                ),
                array(
                    'taxonomy' => 'cities',
                    'field' => 'id',
                    'terms' => $employee_cities_keys,
                ),
            ),
        );
    }
    
    $employees = get_posts($employee_args);

    foreach ($employees as $employee) {
        get_employee_card($employee->ID, $hide);
    }

    ?>

<?php
}

function get_employee_card($id, $hide)
{
    $image = get_field('employee-image', $id);
    if ($image) {
        $image_url = $image['url'];
    } else {
        $image_url = '/wp-content/themes/upplands-motor/images/employee-placeholder.png';
    }

    $employee_phone = get_field('employee-phone', $id);
    $employee_mail = get_field('employee-email', $id);

    $employee_brand = wp_get_post_terms($id, 'brand');

    $brand = $employee_brand[0]->name;
    $brand_slug = $employee_brand[0]->slug;
    $brand_id = $employee_brand[0]->term_id;

    ?>
    <div class="col-xs-12 col-sm-3">
        <div class="employee-card" id="employeee-<?php echo $id; ?>">
            <div class="employee-image">
                <img src="<?php echo $image_url; ?>"/>

                <div class="employee-image-overlay"></div>
            </div>
            <div class="clear clearfix"></div>
            <div class="employee-information block white-bg" data-hide="<?php echo $hide; ?>">
                <?php
                if ($hide == 'logotype') {
                    ?>
                    <span class="employee-brand">
                        <?php get_brand_logotype($brand_id); ?>
                    </span>
                <?php
                }
                ?>
                <h5 class="employee-name">
                    <?php echo get_the_title($id); ?>
                </h5>
                <span class="employee-title">
                    <?php echo get_field('employee-work-title', $id); ?>
                </span>
                <?php
                if ($hide == 'text') {
                ?>
                    <span class="employee-brand employee-text">
                        <?php
                        $brand_counter = 1;
                        foreach($employee_brand as $brand){
                            if($brand_counter==1){
                                echo $brand->name;
                            }
                            else {
                                echo ', ' . $brand->name;
                            }
                            $brand_counter++;
                        }
                        ?>
                    </span>
                <?php
                }
                ?>
                <span class="employee-buttons">
                    <?php if ($employee_phone) { ?>
                        <a href="tel:<?php echo $employee_phone; ?>" class="employee-phone button green fw"><i
                                class="icon icon-phone"></i> <?php echo $employee_phone; ?></a>
                    <?php } ?>
                    <?php if ($employee_phone) { ?>
                        <a href="mailto:<?php echo $employee_mail; ?>" class="employee-mail button blue fw"><i
                                class="icon icon-mail"></i> Skicka e-post</a>
                    <?php } ?>
                </span>

                <div class="clearfix clear"></div>
            </div>
        </div>
    </div>
<?php
}

?>
