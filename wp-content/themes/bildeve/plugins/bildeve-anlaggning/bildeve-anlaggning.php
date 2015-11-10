<?php
/*
Plugin Name: Bildeve Anläggningar
Description: Skapa och visa anläggningar.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/
add_action('init', 'cptui_register_my_cpt_facility');
function cptui_register_my_cpt_facility()
{
    register_post_type('facility', array(
            'label' => 'Anläggning',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'facility', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Anläggning',
                'singular_name' => 'Anläggning',
                'menu_name' => 'Anläggningar',
                'add_new' => 'Lägg till Anläggning',
                'add_new_item' => 'Lägg till nytt Anläggning',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Anläggning',
                'new_item' => 'Ny Anläggning',
                'view' => 'Visa Anläggning',
                'view_item' => 'Visa Anläggning',
                'search_items' => 'Sök Anläggning',
                'not_found' => 'Inga Anläggningar hittade',
                'not_found_in_trash' => 'Inga Anläggningar i papperskorgen',
                'parent' => 'Anläggningens förälder',
            )
        )
    );
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_anlaggning',
        'title' => 'Anläggning',
        'fields' => array(
            array(
                'key' => 'field_541ac22f98595',
                'label' => 'Kontaktinformation',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541ac24d98596',
                'label' => 'Besöksadress',
                'name' => 'facility-visiting-address',
                'type' => 'google_map',
                'center_lat' => '57.718468',
                'center_lng' => '14.764942',
                'zoom' => 6,
                'height' => '',
            ),
            array(
                'key' => 'field_541ac879b4238',
                'label' => 'Använd annan Postadress',
                'name' => 'facility-use-postal-adress',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_541ac8b4b4239',
                'label' => 'Postadress',
                'name' => 'facility-other-adress',
                'type' => 'textarea',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541ac879b4238',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_541ac92cb423a',
                'label' => 'Telefonnummer',
                'name' => 'facility-phonenumbers',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_541ac952b423b',
                        'label' => 'Titel',
                        'name' => 'facility-phonenumber-title',
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
                        'key' => 'field_541ac973b423c',
                        'label' => 'Nummer',
                        'name' => 'facility-phonenumber-number',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till nummer',
            ),
            array(
                'key' => 'field_541ac996b423d',
                'label' => 'E-post',
                'name' => 'facility-emails',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_541ac9bcb423e',
                        'label' => 'Titel',
                        'name' => 'facility-email-title',
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
                        'key' => 'field_541ac9d0b423f',
                        'label' => 'E-post',
                        'name' => 'facility-email-address',
                        'type' => 'email',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till E-post',
            ),
            array(
                'key' => 'field_541aca1fb4240',
                'label' => 'Innehåll och utseende',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541aca29b4241',
                'label' => 'Beskrivning',
                'name' => 'facility-description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_541acb36b4243',
                'label' => 'Avdelningar och öppettider',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541acb44b4244',
                'label' => 'Avdelningar',
                'name' => 'facility-departments',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_541acb80b4245',
                        'label' => 'Avdelning',
                        'name' => 'facility-department',
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
                        'key' => 'field_541acb9cb4246',
                        'label' => 'Telefonnummer',
                        'name' => 'facility-department-phonenumber',
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
                        'key' => 'field_5411239cb4123',
                        'label' => 'Fax',
                        'name' => 'facility-department-fax',
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
                        'key' => 'field_541acbd6b4247',
                        'label' => 'E-postadress',
                        'name' => 'facility-department-email',
                        'type' => 'email',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array(
                        'key' => 'field_541acbebb4248',
                        'label' => 'Öppettider',
                        'name' => 'facility-department-openhours',
                        'type' => 'repeater',
                        'column_width' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_541acbfeb4249',
                                'label' => 'Dag',
                                'name' => 'facility-department-openhours-day',
                                'type' => 'text',
                                'column_width' => 40,
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_541acc18b424a',
                                'label' => 'Tid',
                                'name' => 'facility-department-openhours-time',
                                'type' => 'text',
                                'column_width' => 40,
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'table',
                        'button_label' => 'Lägg till öppettid',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till avdelning',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'facility',
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

function get_facilities_footer() {
    $args = array(
        'post_type' => 'facility',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'asc',
    );

    $my_query = new WP_Query($args);

    if( $my_query->have_posts() ) {
        while ($my_query->have_posts()) : $my_query->the_post();

            $facility_name = get_the_title();
            $facility_numbers = "";

            $i = 0;
            while( has_sub_fields('facility-phonenumbers') && $i == 0 ) {
                $facility_numbers .= get_sub_field('facility-phonenumber-number');
                $i++;
            }

            ?>

                <div class="footer-col" style="padding: 0 15px;">
                    <h6><?php echo $facility_name; ?></h6>
                    <span class="phonenumber"><?php echo $facility_numbers; ?></span>
                </div>

            <?php

        endwhile;
    }

    wp_reset_query();
}

function get_facilities_compact() {
    $args = array(
        'post_type' => 'facility',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'asc',
    );

    $my_query = new WP_Query($args);

    if( $my_query->have_posts() ) {
        while ($my_query->have_posts()) : $my_query->the_post();

            $facility_name = get_the_title();
            $facility_numbers = "";
            $facility_emails = "";

            $i = 0;
            while( has_sub_fields('facility-phonenumbers') && $i == 0 ) {
                $facility_numbers .= get_sub_field('facility-phonenumber-number');
                $i++;
            }

            $i = 0;
            while( has_sub_fields('facility-emails') && $i == 0 ) {
                $facility_emails .= get_sub_field('facility-email-address');
                $i++;
            }

            ?>

            <div class="facility-row">
                <div class="row">
                    <div class="col-xs-12 col-sm-5">
                        <h5><?php echo $facility_name; ?></h5>
                        Bergavägen 4<br />
                        Öppet vardagar 07:00-18:00<br />
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <div class="row">
                            <br />
                            <div class="col-xs-6"><a href="tel:<?php echo $facility_numbers; ?>" class="btn btn-block btn-primary"><i class="fa fa-phone"></i>&nbsp; <?php echo $facility_numbers; ?></a></div>
                            <div class="col-xs-6"><a href="mailto:<?php echo $facility_emails; ?>" class="btn btn-block btn-primary-inverted"><i class="fa fa-envelope-o"></i>&nbsp; Skicka e-post</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <br />

            <?php

        endwhile;
    }

    wp_reset_query();
}
?>
