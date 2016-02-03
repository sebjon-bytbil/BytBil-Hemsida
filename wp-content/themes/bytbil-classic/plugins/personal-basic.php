<?php
/**
 * Plugin Name: BytBil Personal Basic
 * Description: Personal för bytbil
 * Version: 0.1
 * Author: BytBil AB
 * Author URI: http://www.bytbil.com
 */

// Lägger till Personal som innehållstyp

add_action('init', 'cptui_register_my_cpt_personal');
function cptui_register_my_cpt_personal()
{
    register_post_type('personal', array(
        'label' => 'Personal',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'personal', 'with_front' => true),
        'query_var' => true,
        'exclude_from_search' => true,
        'menu_icon' => '/wp-content/themes/basic-modern/images/admin-icons/personal.png',
        'supports' => array('title', 'revisions'),
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
            'parent' => 'Personal förälder',
        )
    ));
}

// Lägger till fält för Personal

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_personal',
        'title' => 'Personal',
        'fields' => array(
            array(
                'key' => 'field_5358c12f01d92',
                'label' => 'Bild',
                'name' => 'employee_image',
                'type' => 'image',
                'save_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_5358c0e301d8f',
                'label' => 'Titel',
                'name' => 'employee_jobtitle',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_538c63ef7bc50',
                'label' => 'Telefonnummer',
                'name' => 'employee_phonenrs',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_538c64157bc51',
                        'label' => 'Rubrik',
                        'name' => 'phonenrs_title',
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
                        'key' => 'field_538c642a7bc52',
                        'label' => 'Nummer',
                        'name' => 'phonenrs_number',
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
                'key' => 'field_5358c10c01d90',
                'label' => 'Telefon',
                'name' => 'employee_phone',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5358c11a01d91',
                'label' => 'E-post',
                'name' => 'employee_email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_5360ca6a3a035',
                'label' => 'Anläggning',
                'name' => 'employee_anlaggning',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'anlaggning',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'personal',
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

// Lägger till Personallista
add_action('init', 'cptui_register_my_cpt_personallista');
function cptui_register_my_cpt_personallista()
{
    register_post_type('personallista', array(
        'label' => 'Personallistor',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=personal',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'personallista', 'with_front' => true),
        'query_var' => true,
        'exclude_from_search' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Personallistor',
            'singular_name' => 'Personallista',
            'menu_name' => 'Personallistor',
            'add_new' => 'Lägg till personallista',
            'add_new_item' => 'Ny Personallista',
            'edit' => 'Edit',
            'edit_item' => 'Redigera personallista',
            'new_item' => 'Ny personallista',
            'view' => 'Visa personallista',
            'view_item' => 'Visa personallista',
            'search_items' => 'Sök personallistor',
            'not_found' => 'No Personallistor Found',
            'not_found_in_trash' => 'No Personallistor Found in Trash',
            'parent' => 'Parent Personallista',
        )
    ));
}


// Skapar fält för Personallista
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_personallista',
        'title' => 'Personallista',
        'fields' => array(
            array(
                'key' => 'field_5358c37c65f8d',
                'label' => 'Personer',
                'name' => 'stafflist_persons',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5358c3c665f8e',
                        'label' => 'Personal',
                        'name' => 'stafflist_employee',
                        'type' => 'post_object',
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'personal',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till person',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'personallista',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}


function personallista_func($atts)
{

    global $post;

    extract(shortcode_atts(array('namn' => ''), $atts));
    ob_start();

    $args = array('post_type' => 'personallista', 'name' => $namn);
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post(); ?>

        <?php if (get_field('stafflist_persons')) : ?>

            <div class="col-xs-12 employees">
                <h3><?php the_title(); ?></h3>

                <?php

                $employees = get_field('stafflist_persons');

                if ($employees):
                    foreach ($employees as $employee):

                        $post = $employee['stafflist_employee'];
                        setup_postdata($post); ?>

                        <div class="col-xs-12 col-sm-6 col-md-3 employee">
                            <?php if (!get_field('employee_image')): ?>
                                <img src="<?php bloginfo('template_url'); ?>/images/employee-no-img.jpg"/>
                            <?php else: ?>
                                <?php
                                $personalImage = get_field('employee_image');
                                $size = 'personal-cropped';
                                $image = wp_get_attachment_image_src($personalImage, $size);
                                ?>

                                <img src="<?php echo $image[0]; ?>"/>
                            <?php endif; ?>
                            <h4><?php the_title(); ?></h4>


                            <?php
                            // Visa orten //
                            $post_object = get_field('employee_anlaggning');
                            if ($post_object):
                                $post = $post_object;
                                setup_postdata($post);
                                echo "<span class='city'>" . get_the_title() . "</span>";
                                wp_reset_postdata();
                            endif;
                            ?>
                            <?php

                            $post = $employee['stafflist_employee'];
                            setup_postdata($post); ?>
                            <div class="employeeInfo">
                                <p>

                                    <span class="title"><?php echo get_field('employee_jobtitle'); ?></span><br/>
							<span class="phonenrs">
							<?php if (get_field('employee_phonenrs')) : ?>
                                <?php while (has_sub_fields('employee_phonenrs')) : ?>
                                    <span class="phonenrs-title"><?php the_sub_field('phonenrs_title'); ?></span>
                                    <span class="phonenrs-number"><?php the_sub_field('phonenrs_number'); ?></span><br/>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            </span>
                                    <a href="mailto:<?php the_field('employee_email'); ?>"><?php the_field('employee_email'); ?></a>
                                </p>
                            </div>
                            <!--employeeInfo-->
                        </div>

                    <?php endforeach;

                    wp_reset_postdata(); ?>

                    <div class="clear">
                    </div>

                <?php endif; ?>

            </div>

        <?php endif; ?>



    <?php endwhile; ?>

    <?php wp_reset_query();

    return ob_get_clean();
}

add_shortcode('personallista', 'personallista_func');

?>