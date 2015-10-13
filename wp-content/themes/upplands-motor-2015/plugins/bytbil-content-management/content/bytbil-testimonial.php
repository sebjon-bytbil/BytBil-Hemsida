<?php
/*
Plugin Name: BytBil Testimonial
Description: Skapa och visa Sagt om oss på en hemsida
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_testimonial');
function cptui_register_my_cpt_testimonial()
{
    register_post_type('testimonial', array(
        'label' => 'Sagt om oss',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'testimonial', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'labels' => array(
            'name' => 'Sagt om oss',
            'singular_name' => 'Sagt om oss',
            'menu_name' => 'Sagt om oss',
            'add_new' => 'Add Sagt om oss',
            'add_new_item' => 'Add New Sagt om oss',
            'edit' => 'Edit',
            'edit_item' => 'Edit Sagt om oss',
            'new_item' => 'New Sagt om oss',
            'view' => 'View Sagt om oss',
            'view_item' => 'View Sagt om oss',
            'search_items' => 'Search Sagt om oss',
            'not_found' => 'No Sagt om oss Found',
            'not_found_in_trash' => 'No Sagt om oss Found in Trash',
            'parent' => 'Parent Sagt om oss',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_sagt-om-oss',
        'title' => 'Sagt om oss',
        'fields' => array(
            array(
                'key' => 'field_55597b6246008',
                'label' => 'Bild',
                'name' => 'testimonial-image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_55597b7346009',
                'label' => 'Namn',
                'name' => 'testimonial-name',
                'type' => 'text',
                'instructions' => 'Fyll i ett namn som skall visas för kommentaren om du inte vill använda inläggets titel.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55597b9c4600a',
                'label' => 'Kommentar',
                'name' => 'testimonial-comment',
                'type' => 'textarea',
                'instructions' => 'Fyll i kommentaren personen har lagt om Upplands Motor.',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'formatting' => 'br',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
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
function get_testimonial_object($id)
{
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
    ?>
    <div class="item">
        <div class="testimonial-image">
            <img src="<?php echo $image[0]; ?>">
        </div>
        <div class="testimonial-content">
            <?php
            if (get_field('testimonial-name', $id)) { ?>
                <h5><?php echo get_field('testimonial-name', $id); ?></h5>
            <?php } else { ?>
                <h5><?php echo get_the_title($id); ?></h5>
            <?php } ?>
            <p class="testimonial-comment"><?php echo get_field('testimonial-comment', $id); ?></p>
        </div>
    </div>
<?php
}

function get_testimonial_slider($ids = false)
{
    $testimonial_args = array(
        'posts_per_page' => -1,
        'offset' => 0,
        'category' => '',
        'category_name' => '',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'testimonial',
        'post_mime_type' => '',
        'post_parent' => '',
        'post_status' => 'publish',
        'suppress_filters' => true,
    );

    $testimonials = get_posts($testimonial_args);

    foreach ($testimonials as $testimonial) {
        if(in_array($testimonial->ID, $ids)){
            get_testimonial_object($testimonial->ID);
        }
    }

    ?>
<?php
}
?>