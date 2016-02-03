<?php
/*
Plugin Name: BytBil Fordonsurval
Description: Skapa och visa Fordonsurval.
Author: Sebastian Jonsson / Leo Starcevic: BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/
add_action('init', 'cptui_register_my_cpt_assortment');
function cptui_register_my_cpt_assortment()
{
    register_post_type('assortment', array(
            'label' => 'Fordonsurval',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'assortment', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Fordonsurval',
                'singular_name' => 'Fordonsurval',
                'menu_name' => 'Fordonsurval',
                'add_new' => 'Lägg till Fordonsurval',
                'add_new_item' => 'Lägg till Fordonsurval',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Fordonsurval',
                'new_item' => 'Nytt Fordonsurval',
                'view' => 'Visa Fordonsurval',
                'view_item' => 'Visa Fordonsurval',
                'search_items' => 'Sök Fordonsurval',
                'not_found' => 'Inga Fordonsurval hittade',
                'not_found_in_trash' => 'Inga Fordonsurval i papperskorgen',
                'parent' => 'Fordonsurvalets förälder',
            )
        )
    );
}

// Lägger till fält för Urvalsinställningar

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_urvalsinstallningar',
        'title' => 'Urvalsinställningar',
        'fields' => array(
            array(
                'key' => 'field_535f882bba18d',
                'label' => 'Söksträng',
                'name' => 'assortment_string',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_535f8931ba18e',
                'label' => 'Sidtyp',
                'name' => 'assortment_page',
                'type' => 'select',
                'choices' => array(
                    'SokLista' => 'Med sökfunktion',
                    'Lista' => 'Utan sökfunktion',
                    'Favoriter' => 'Favoriter',
                    'Senaste' => 'Senaste',
                    'Sok' => 'Sökfunktion',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_53e4630cdfe5f',
                'label' => 'Sökväg',
                'name' => 'assortment_path',
                'type' => 'page_link',
                'instructions' => 'Välj sidan som visar dina fordon.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_535f8931ba18e',
                            'operator' => '==',
                            'value' => 'Senaste',
                        ),
                        array(
                            'field' => 'field_535f8931ba18e',
                            'operator' => '==',
                            'value' => 'Sok',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),

            array(
                'key' => 'field_535f882123asdsd',
                'label' => 'Information',
                'name' => 'assortment_hidden_info',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => "Detta fält kan användas för att beskriva criteriasträngen. Texten som skrivs in syns bara på denna sida."
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'assortment',
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

add_action( 'wp_ajax_get_criteria', 'getCriteria' );
add_action( 'wp_ajax_nopriv_get_criteria', 'getCriteria' );

function getCriteria(){
    $alias = safe($_POST['alias']);

    $data = array(
        'Used' => safe($_POST['Used']),
        'PageSize' => safe($_POST['PageSize']),
        'SearchType' => safe($_POST['SearchType']),
        'Brand' => safe($_POST['Brand']),
        'ModelName' => safe($_POST['ModelName'])
    );

    $response = wp_remote_post(
        "http://access.bytbil.com/" . $alias . "/Access/json/GetCriteria/",
        array(
            'body' => $data,
            'timeout' => 20
        )
    );
    wp_send_json($response);

}

function bytbil_init_assortment($alias, $string, $page, $path = false, $id)
{ ?>
    <script> $ = jQuery; </script>
    <script type="text/javascript"
            src="http://access.bytbil.com/sprint6/access/content/getcontent/1/access.iframe.host.js"></script>
    <script type="text/javascript">
        $(function () {
            var iframe = $('.access-iframe-<?php echo $id; ?>');
            var iframeLoad;
            var criteria;
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

            <?php if($_POST){ ?>

            var form = {
                action: 'get_criteria',
                alias: "<?php echo $alias; ?>",
                Used: "<?php echo safe($_POST['Used']); ?>",
                PageSize: "<?php echo safe($_POST['PageSize']); ?>",
                SearchType: "<?php echo safe($_POST['SearchType']); ?>",
                Brand: "<?php echo safe($_POST['Brand']); ?>",
                ModelName: "<?php echo safe($_POST['ModelName']); ?>",
                Body: "<?php echo safe($_POST['Body']); ?>",
                Fuel: "<?php echo safe($_POST['Fuel']); ?>",
                Gearbox: "<?php echo safe($_POST['Gearbox']); ?>",
                YearFrom: "<?php echo safe($_POST['YearFrom']); ?>",
                YearTo: "<?php echo safe($_POST['YearTo']); ?>",
                MilesFrom: "<?php echo safe($_POST['MilesFrom']); ?>",
                MilesTo: "<?php echo safe($_POST['MilesTo']); ?>",
                PriceFrom: "<?php echo safe($_POST['PriceFrom']); ?>",
                PriceTo: "<?php echo safe($_POST['PriceTo']); ?>",
                Sort: "<?php echo safe($_POST['Sort']); ?>",
                SelectCity: "<?php echo safe($_POST['SelectCity']); ?>"
            };
            $.post(
                ajaxurl,
                form,
                function (data) {
                    if(data.response.code == 200) {
                        criteria = data.body;
                    } else {
                        criteria = "<?php echo $string; ?>";
                        console.log("getCriteria failed!");
                    }
                    //console.log(data);
                })
                .fail(function () {
                    criteria = "<?php echo $string; ?>";
                    console.log("getCriteria failed!");
                })
                .always(function () {
                    iframeLoad = new Access.Iframe.Load({
                        packageName: "<?php echo $alias; ?>",
                        assortment: criteria,
                        actionName: "<?php echo $page; ?>",
                        parentUrl: window.location,
                        idName: 'objekt'
                    });
                    iframeLoad.load(iframe);
                });
            <?php }else{ ?>
            $(function () {
                iframeLoad = new Access.Iframe.Load({
                    packageName: "<?php echo $alias; ?>",
                    assortment: "<?php echo $string; ?>",
                    actionName: "<?php echo $page; ?>",
                    parentUrl: window.location,
                    idName: 'objekt'
                });
                iframeLoad.load(iframe);
            });
            <?php } ?>
        });
    </script>
    <?php
    // Skriv om så man hamnar på rätt sida
    if ($_GET["objekt"] && $path != "") {
        $uri = $_SERVER['REQUEST_URI'];
        $url = $path . $uri;
        header("HTTP/1.1 301 Moved Permanently");
        header("Location:" . $url);
    }
}

function bytbil_show_assortment_search($id)
{
    $assortment_alias = get_field('bytbil-access_alias', 'options');
    $assortment_string = get_field('assortment_string', $id);
    $assortment_page = get_field('assortment_page', $id);
    $assortment_path = get_field('assortment_path', $id);
    ?>
    <iframe class="access-iframe-<?php echo $id; ?>"></iframe>
    <?php

    bytbil_init_assortment($assortment_alias, $assortment_string, $assortment_page, $assortment_path, $id);
}

function bytbil_show_assortment($id)
{
    if (function_exists('getSiteSettings')) {
        $settingspage = getSiteSettings();
    } else {
        $settingspage = null;
    }
    $assortment_alias = get_field('bytbil-access_alias', 'options');
    $assortment_string = get_field('assortment_string', $id);
    $assortment_page = get_field('assortment_page', $id);
    $assortment_path = get_field('assortment_path', $id);
    $GLOBALS['assortment_path'] = $assortment_path;

    ?>
    <iframe class="access-iframe-<?php echo $id; ?>"></iframe>
    <?php

    bytbil_init_assortment($assortment_alias, $assortment_string, $assortment_page, $assortment_path, $id);


}

function bytbil_show_assortment_object($object)
{
    echo $object;
}

function safe($value)
{
    return esc_sql($value);
}

?>