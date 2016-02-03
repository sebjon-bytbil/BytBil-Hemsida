<?php
/*
Plugin Name: BytBil Anläggningar
Description: Skapa och visa Anläggningar.
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
                'key' => 'field_1432171115331',
                'label' => 'Välj märken',
                'name' => 'facility-brands',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'brand',
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
            array(
                'key' => 'field_5a23125564a4387',
                'label' => 'Extra öppettiderruta',
                'name' => 'facility-openhours-extra-box',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_541ac21fde295',
                'label' => 'Övrig information',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5a2315a64a41287',
                'label' => 'Beskrivning',
                'name' => 'facility-description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_531e25a5b4386',
                'label' => 'Anläggningsbild',
                'name' => 'facility-image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_53125aedec313f',
                'label' => 'Anläggningssida',
                'name' => 'facility-page-link',
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

function bytbil_facilities_footer()
{

    $args = array('post_type' => 'facility');
    $facilities = get_posts($args);

    foreach ($facilities as $facility) {
        $id = $facility->ID;
        ?>
        <div class="facility">
            <h4><?php echo get_the_title($id); ?></h4>
            <span class="address"><i class="entypo fw location"></i> <?php bytbil_show_footer_facility_address($id); ?></span>
            <span class="phone"><i class="entypo fw phone"></i> <?php echo bytbil_show_first_facility_phonenumber($id); ?></span>
        </div>
    <?php
    }

}

function bytbil_show_facility_compact($id)
{ ?>

<div class="row" style="font-size:0.95em;">
    <div class="col-xs-12">
        <div class="col-xs-12 no-padding">
            <span class="facility_map">
                <?php bytbil_show_facility_map($id) ?>
            </span>
        </div>
        <div class="col-xs-12 no-padding">
            <h3 class="bold"><?php echo get_the_title($id); ?></h3>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <strong>Besöksadress</strong><br>
                <?php bytbil_show_facility_address($id); ?>
            </div>
            <div class="col-xs-12 col-sm-6">
                <?php bytbil_show_facility_first_phonenumber($id,false,true); ?>
                <?php bytbil_show_facility_emails($id,false,true); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-xs-12">
                <a href="<?php bytbil_get_facility_page($id); ?>#personal" class="btn btn-white btn-block-sm"><i class="fa fa-fw fa-users"></i> Visa personal</a>
                <a href="<?php bytbil_get_facility_page($id); ?>" class="btn btn-white btn-block-sm"><i class="fa fa-fw fa-envelope"></i> Fler kontaktuppgifter</a>
                <a href="<?php bytbil_get_facility_page($id); ?>" class="btn btn-white btn-block-sm"><i class="fa fa-fw fa-o-clock fa-clock-o"></i> Visa öppettider</a>
            </div>
        </div>
    </div>
</div>

<?php
}

function bytbil_get_facility_page($id){
    echo get_field('facility-page-link',$id);
}


function bytbil_show_facility_all($id)
{ ?>
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <div class="col-xs-12 no-padding" style="margin-bottom: 30px;">
                <div class="block-wrapper white" style="margin-bottom: 0;">
                    <h2 class="bold">Gustaf E Bil <?php echo get_the_title($id); ?></h2>
                    <?php
                    if (get_field('facility-image', $id)) {
                        $facility_image = get_field('facility-image', $id);
                        ?>
                        <span class="facility_image">
                        <img src="<?php echo $facility_image['url']; ?>" alt="<?php the_title(); ?>"
                             title="<?php the_title(); ?>">
                    </span>
                    <span class="facility_map_2">
                        <?php bytbil_show_facility_map($id) ?>
                    </span>
                    <?php } else { ?>

                        <span class="facility_map">
                    <?php bytbil_show_facility_map($id) ?>
                </span>

                    <?php } ?>
                    <span class="facility_description">
                    <?php
                    if (get_field('facility-description', $id)) {
                        echo get_field('facility-description', $id);
                    }
                    ?>
                </span>

                    <div class="facility_brands">
                        <?php
                        $brands = get_field('facility-brands', $id);
                        foreach ($brands as $brand) {
                            $brand_id = $brand->ID;
                            ?>

                            <a target="<?php echo get_field('brand_link-target', $brand_id); ?>"
                               href="<?php echo get_field('brand_link', $brand_id); ?>">
                                <img src="<?php echo get_field('brand_image', $brand_id); ?>">
                            </a>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-5">
                <span class="block blue facility_address">
                    <h2><i class="fa fa-fw fa-map-marker"></i> Besöksadress</h2>
                    <strong>Gustaf E Bil <?php echo get_the_title($id); ?></strong><br>
                    <?php bytbil_show_facility_address($id); ?>
                </span>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <div class="block white facility_contactinformation">
                        <h2><i class="fa fa-fw fa-envelope"></i> Kontaktuppgifter</h2>

                        <div class="col-xs-6 no-padding">
                            <?php bytbil_show_facility_emails($id); ?>
                            <?php bytbil_show_facility_phonenumbers($id); ?>
                        </div>
                        <div class="col-xs-6 no-padding">
                            <?php bytbil_show_facility_dep_phonenumbers($id); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="col-xs-12 no-padding">
                <div class="block white">
                    <h2 class="bold"><i class="fa fa-fw fa-clock-o"></i> Öppettider</h2>
                    <?php if (get_field('facility-openhours-extra-box', $id)) { ?>
                        <span class="faciltiy-extra-openhours">
                        <?php echo get_field('facility-openhours-extra-box', $id); ?>
                    </span>
                    <?php } ?>
                    <span class="facility_openhours">
                    <?php bytbil_show_facility_openhours($id, true); ?>
                </span>
                </div>
            </div>
        </div>
        <a name="personal"></a>
    </div>

<?php
}

function bytbil_show_facility_contact($id)
{ ?>
    <span class="facility_title">
        <?php echo get_the_title($id); ?>
    </span>
    <span class="facility_address">
        <?php bytbil_show_facility_address($id); ?>
    </span>
    <span class="facility_phonenumbers">
        <?php bytbil_show_facility_phonenumbers($id); ?>
    </span>
<?php
}

function bytbil_show_footer_facility_address($id)
{
    $location = get_field('facility-visiting-address', $id);
    $address = $location['address'];
    $address = str_ireplace('Sverige', '', str_ireplace('Sweden', '', str_replace(',', '<br>', $address)));
    $address = explode(' ', $address, 3);
    echo $address[0] . ' ' . $address[1];
}

function bytbil_show_facility_address($id)
{
    $location = get_field('facility-visiting-address', $id);
    $address = $location['address'];
    $address = str_ireplace('Sverige', '', str_ireplace('Sweden', '', str_replace(',', '<br>', $address)));
    echo $address;
}

function bytbil_show_other_facility_address($id)
{
    $address = get_field('facility-other-adress', $id);
    echo $address;
}

function bytbil_show_facility_phonenumbers($id)
{
    while (has_sub_fields('facility-phonenumbers', $id)) : ?>
        <span class="facility_phonenumber_title">
        <strong><?php the_sub_field('facility-phonenumber-title'); ?> </strong>
    </span>
        <span class="facility_phonenumber_number">
        <a href="tel:<?php the_sub_field('facility-phonenumber-number'); ?>"><?php the_sub_field('facility-phonenumber-number'); ?></a>
    </span><br/>
    <?php endwhile;
}

function bytbil_show_facility_first_phonenumber($id,$title=true,$button=false)
{
    $i = 1;
    while (has_sub_fields('facility-phonenumbers', $id) && $i == 1) : ?>
        <?php if ($title == true){ ?>
            <span class="facility_phonenumber_title">
                <strong><?php the_sub_field('facility-phonenumber-title'); ?> </strong>
            </span>
        <?php } ?>
        <span class="facility_phonenumber_number">
        <?php if($button==true){ ?>
            <a class="btn btn-green button-green btn-fw btn-block-sm" style="margin-bottom: 5px;" href="tel:<?php the_sub_field('facility-phonenumber-number'); ?>"><i class="fa fa-fw fa-phone"></i> <?php the_sub_field('facility-phonenumber-number'); ?></a>
        <?php } else { ?>
            <a href="tel:<?php the_sub_field('facility-phonenumber-number'); ?>"><?php the_sub_field('facility-phonenumber-number'); ?></a>
        <?php } ?>
        </span><br/>
    <?php
    $i++;
    endwhile;
}

function bytbil_show_first_facility_phonenumber($id)
{
    $i = 1;
    while (has_sub_fields('facility-phonenumbers', $id)) : ?>
        <span class="facility_phonenumber_number">
        <a href="tel:<?php the_sub_field('facility-phonenumber-number'); ?>"><?php the_sub_field('facility-phonenumber-number'); ?></a>
    </span>
        <?php
        $i++;
        if ($i > 1) {
            break;
        }
    endwhile;
}

function bytbil_show_first_facility_phonenumber_clean($id)
{
    $i = 1;
    while (has_sub_fields('facility-phonenumbers', $id)) :
        the_sub_field('facility-phonenumber-number');
    $i++;
    if ($i > 1) {
        break;
    }
    endwhile;
}

function bytbil_show_facility_emails($id,$title=true,$button=false)
{
    while (has_sub_fields('facility-emails', $id)) : ?>
    <?php if($title==true){ ?>
        <span class="facility_email_title">
            <strong><?php the_sub_field('facility-email-title'); ?> </strong>
        </span>
    <?php } ?>
        <span class="facility_email_address">
        <?php if($button==true){ ?>
            <a class="btn btn-blue button-blue btn-fw btn-block-sm" style="margin-bottom: 5px;" href="mailto:<?php the_sub_field('facility-email-address'); ?>"><i class="fa fa-envelope fa-fw"></i> <?php the_sub_field('facility-email-address'); ?></a>
        <?php } else { ?>
            <a href="mailto:<?php the_sub_field('facility-email-address'); ?>"><?php the_sub_field('facility-email-address'); ?></a>
        <?php } ?>
    </span><br/>
    <?php endwhile;
}


function bytbil_show_facility_dep_phonenumbers($id, $columns = false, $cols = 12)
{
    $tot = 0;
    ?>
    <div class="row">
    <?php while (has_sub_fields('facility-departments', $id)) :
    if ($tot >= 12) : ?>
        </div><div class="row">
        <?php $tot = 0; endif;
    ?>
    <?php if ($columns == true) { ?><div class="col-xs-12 col-sm-6 no-padding"><?php } ?>
    <div class="department col-xs-12 col-sm-<?php echo $cols ?>">
    <span class="facility_department">
        <strong>
            <?php the_sub_field('facility-department'); ?>
        </strong>
    </span>
        <?php
        $type = $GLOBALS["facility_info"];
        ?>
        <?php if ($type == "all") : ?>
            <?php if (get_sub_field("facility-department-phonenumber")) : ?>

                <span class="facility_openhours_time">
        <a href="tel:<?php the_sub_field('facility-department-phonenumber'); ?>"><?php the_sub_field('facility-department-phonenumber'); ?></a>
    </span><br/>
            <?php endif; ?>
            <?php if (get_sub_field("facility-department-fax")) : ?>
                <span class="facility_openhours_day">
        <strong>Fax:</strong>
    </span>
                <span class="facility_openhours_time">
        <?php the_sub_field('facility-department-fax'); ?>
    </span><br/>
            <?php endif; ?>
            <?php if (get_sub_field("facility-department-email")) : ?>
                <span class="facility_openhours_day">
        <strong>E-post:</strong>
    </span>
                <span class="facility_openhours_time">
        <a href="mailto:<?php the_sub_field('facility-department-email'); ?>"><?php the_sub_field('facility-department-email'); ?></a>
    </span><br/>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if ($columns == true) { ?></div><?php } ?>

    <?php $tot += intval($cols); endwhile; ?>
    </div>
<?php
}

function bytbil_show_facility_openhours_map($id, $columns = false, $cols = 12)
{
    $tot = 0;
?>
    <?php while (has_sub_fields('facility-departments', $id)) :
    if ($tot >= 12) : ?>
<?php $tot = 0; endif;
?>
<?php if ($columns == true) { ?><div class="col-xs-12 no-padding"><?php } ?>
<div class="department col-xs-12 col-sm-<?php echo $cols ?>">
    <strong><h4 style="margin-bottom: 3px; font-size: 1.05em;" class="facility_department">
        <?php the_sub_field('facility-department'); ?>
        </h4>
    </strong>
    <?php
    $type = $GLOBALS["facility_info"];
    ?>
    <?php if ($type == "all") : ?>
    <?php if (get_sub_field("facility-department-fax")) : ?>
    <span class="facility_openhours_day">
        <strong>Fax:</strong>
    </span>
    <span class="facility_openhours_time">
        <?php the_sub_field('facility-department-fax'); ?>
    </span><br/>
    <?php endif; ?>
    <?php if (get_sub_field("facility-department-email")) : ?>
    <span class="facility_openhours_day">
        <strong>E-post:</strong>
    </span>
    <span class="facility_openhours_time">
        <a href="mailto:<?php the_sub_field('facility-department-email'); ?>"><?php the_sub_field('facility-department-email'); ?></a>
    </span><br/>
    <?php endif; ?>
    <?php endif; ?>
    <span class="facility_openhours">
        <?php while (has_sub_fields('facility-department-openhours', $id)) : ?>
        <span class="facility_openhours_day">
            <strong><?php the_sub_field('facility-department-openhours-day'); ?> </strong>
        </span>
        <span class="facility_openhours_time">
            <?php the_sub_field('facility-department-openhours-time'); ?>
        </span><br/>
        <?php endwhile; ?>
    </span>
</div>
<?php if ($columns == true) { ?></div><?php } ?>

<?php $tot += intval($cols); endwhile; ?>
<?php
}


function bytbil_show_facility_openhours($id, $columns = false, $cols = 12)
{
    $tot = 0;
    ?>
    <div class="row">
    <?php while (has_sub_fields('facility-departments', $id)) :
    if ($tot >= 12) : ?>
        </div><div class="row">
        <?php $tot = 0; endif;
    ?>
    <?php if ($columns == true) { ?><div class="col-xs-12 no-padding"><?php } ?>
    <div class="department col-xs-12 col-sm-<?php echo $cols ?>">
        <strong><h4 style="margin-bottom: 3px; font-size: 1.05em;" class="facility_department">
                <?php the_sub_field('facility-department'); ?>
            </h4>
        </strong>
        <?php
        $type = $GLOBALS["facility_info"];
        ?>
        <?php if ($type == "all") : ?>
            <?php if (get_sub_field("facility-department-fax")) : ?>
                <span class="facility_openhours_day">
                        <strong>Fax:</strong>
                    </span>
                <span class="facility_openhours_time">
                        <?php the_sub_field('facility-department-fax'); ?>
                    </span><br/>
            <?php endif; ?>
            <?php if (get_sub_field("facility-department-email")) : ?>
                <span class="facility_openhours_day">
                        <strong>E-post:</strong>
                    </span>
                <span class="facility_openhours_time">
                        <a href="mailto:<?php the_sub_field('facility-department-email'); ?>"><?php the_sub_field('facility-department-email'); ?></a>
                    </span><br/>
            <?php endif; ?>
        <?php endif; ?>
        <span class="facility_openhours">
            <?php while (has_sub_fields('facility-department-openhours', $id)) : ?>
                <span class="facility_openhours_day">
                    <strong><?php the_sub_field('facility-department-openhours-day'); ?> </strong>
                </span>
                <span class="facility_openhours_time">
                    <?php the_sub_field('facility-department-openhours-time'); ?>
                </span><br/>
            <?php endwhile; ?>
            </span>
    </div>
    <?php if ($columns == true) { ?></div><?php } ?>

    <?php $tot += intval($cols); endwhile; ?>
    </div>
<?php
}

function bytbil_init_facility_map($zoom = 16, $mode = "ROADMAP")
{
    if (!$zoom) {
        $zoom = 16;
    }
    ?>
    <style type="text/css">

        .acf-map {
            width: 100%;
            height: 220px;
            margin: 20px 0;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
        }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
        (function ($) {
            function render_map($el) {
                // var
                var $markers = $el.find('.marker');
                // vars
                var args = {
                    zoom: <?php echo $zoom; ?>,
                    center: new google.maps.LatLng(0, 0),
                    scrollwheel: false,
                    draggable: false,
                    mapTypeId: google.maps.MapTypeId.<?php echo $mode; ?>
                };
                // create map
                var map = new google.maps.Map($el[0], args);
                // add a markers reference
                map.markers = [];
                // add markers
                $markers.each(function () {
                    add_marker($(this), map);
                });
                // center map
                center_map(map);
            }

            function add_marker($marker, map) {
                // var
                var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
                // create marker
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map
                });
                // add to array
                map.markers.push(marker);
                // if marker contains HTML, add it to an infoWindow
                if ($marker.html()) {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content: $marker.html()
                    });
                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function () {
                        infowindow.open(map, marker);
                    });
                }
            }

            function center_map(map) {
                // vars
                var bounds = new google.maps.LatLngBounds();
                // loop through all markers and create bounds
                $.each(map.markers, function (i, marker) {
                    var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                    bounds.extend(latlng);
                });
                // only 1 marker?
                if (map.markers.length == 1) {
                    // set center of map
                    map.setCenter(bounds.getCenter());
                    map.setZoom(<?php echo $zoom; ?>);
                }
                else {
                    // fit to bounds
                    map.fitBounds(bounds);
                }

            }

            $(document).ready(function () {
                $('.acf-map').each(function () {
                    render_map($(this));
                });
            });
        })(jQuery);
    </script>
<?php
}

function bytbil_show_facility_map($id)
{ ?>


    <div class="acf-map">

        <?php
        $maplocation = get_field('facility-visiting-address', $id);
        $mapaddress = $maplocation['address'];
        $mapaddress = str_replace('Sverige', '', str_replace(',', '<br>', $mapaddress));
        $map_object = get_post($id);
        ?>
        <div class="marker" data-lat="<?php echo $maplocation['lat']; ?>" data-lng="<?php echo $maplocation['lng']; ?>">
            <div class="marker-wrapper">
                <section class="facility-address">
                    <h3><?php echo $map_object->post_title; ?></h3>

                    <p class="address">
                        <?php echo $mapaddress; ?>
                    </p>
                </section>
                <div class="box">
                    <?php bytbil_show_facility_phonenumbers($id); ?>
                </div>
                <div class="box">
                    <?php bytbil_show_facility_openhours_map($id); ?>
                </div>
            </div>
        </div>

    </div>

<?php

}

function bytbil_show_map($height)
{ ?>
    <div class="acf-map" style="height: <?php echo $height; ?>px;">

        <?php

        $args = array('post_type' => 'facility');
        $facilities = get_posts($args);

        foreach ($facilities as $facility) {

            $maplocation = get_field('facility-visiting-address', $facility);
            $mapaddress = $maplocation['address'];
            $mapaddress = str_replace('Sverige', '', str_replace(',', '<br>', $mapaddress));
            $id = $facility->ID;
            ?>
            <div class="marker" data-lat="<?php echo $maplocation['lat']; ?>"
                 data-lng="<?php echo $maplocation['lng']; ?>">
                <div class="marker-wrapper">
                    <section class="facility-address">
                        <h3><?php echo $facility->post_title; ?></h3>

                        <p class="address">
                            <?php echo $mapaddress; ?>
                        </p>
                    </section>
                    <div class="box">
                        <?php bytbil_show_facility_phonenumbers($id); ?>
                    </div>
                    <div class="box">
                        <?php bytbil_show_facility_openhours_map($id, false, 3); ?>
                    </div>
                </div>
            </div>

        <?php

        }

        ?>
    </div>
<?php

}


/* OLD FUNCTIONS */

function bytbil_facility_loop($id = false)
{
    if ($id != false) {
        $args = array(
            'post_type' => 'facility',
            'order' => 'ASC',
            'p' => $id,
        );
    } else {
        $args = array(
            'post_type' => 'facility',
            'order' => 'ASC',
        );
    }
    $loop = new WP_Query($args);
    return $loop;
}

function bytbil_facility($id)
{
    $loop = bytbil_facility_loop($id);

    while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="col-xs-12 contact">
            <?php bytbil_facility_address($id); ?>
            <?php bytbil_facility_phonenrs($id); ?>
        </div>
    <?php endwhile;
}

function bytbil_facility_address($id)
{

    $loop = bytbil_facility_loop($id);

    while ($loop->have_posts()) : $loop->the_post(); ?>
            <p>
            <h4><?php the_title(); ?></h4>
            <?php
        $location = get_field('facility-visiting-address');
        $address = $location['address'];
        $address = str_replace('Sverige', '', str_replace(',', '<br>', $address));
        echo $address;
        ?>
            </p>
    <?php endwhile;
}

function bytbil_facility_openhours($id)
{

    $loop = bytbil_facility_loop($id);

    while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="col-xs-12 open-hours">
            <?php while (has_sub_fields('facility-departments')) : ?>
                <div class="department">
                    <h4><?php the_sub_field('facility-department'); ?></h4>

                    <p>
                        <?php while (has_sub_fields('facility-department-openhours')) : ?>
                            <strong><?php the_sub_field('facility-department-openhours-day'); ?> </strong> <?php the_sub_field('facility-department-openhours-time'); ?>
                            <br/>
                        <?php endwhile; ?>
                    </p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endwhile;
}

function bytbil_facility_phonenrs($id)
{

    $loop = bytbil_facility_loop($id);

    while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="col-xs-12 contact">
            <p>
                <?php while (has_sub_fields('facility-phonenumbers')) : ?>
                    <strong><?php the_sub_field('facility-phonenumber-title'); ?> </strong> <a
                        href="tel:<?php the_sub_field('facility-phonenumber-number'); ?>"><?php the_sub_field('facility-phonenumber-number'); ?></a>
                    <br/>
                <?php endwhile; ?>
            </p>
        </div>
    <?php endwhile;
}

function bytbil_facility_footer()
{

    $loop = bytbil_facility_loop();

    while ($loop->have_posts()) : $loop->the_post();
        $id = get_the_ID();
        ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <?php
            if (get_field('facility-use-postal-adress')) {
                ?> <h4><?php the_title(); ?></h4> <?php
                the_field('postadress');
            } else {
                bytbil_facility_address($id);
            }
            bytbil_facility_phonenrs($id);
            ?>
        </div>

    <?php
    endwhile;
}


?>
