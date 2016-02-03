<?php
/*
Plugin Name: Mercedes-Benz Fordonsurval
Description: Skapa och visa Fordonsurval.
Author: Sebastian Jonsson : BytBil Nordic AB
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
            array (
                'key' => 'field_094dc6e6-8702-4e20-b5c4-f3510d4d2da4',
                'label' => '',
                'name' => '',
                'type' => 'message',
                'name' => 'assortment-generate-criteria',
                'message' => '<a data-lightbox class="button button-primary" href="http://access.bytbil.com/mb-stockholm-2014-b/Access/Home/SokCriterias">Generera criteriasträng</a>',
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
                    'Sok' => 'Enbart sökfunktion',
                ),
                'default_value' => 'SokLista',
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

function bytbil_init_assortment($alias, $string, $page, $path = false, $id)
{
    global $wp_query;
    $objekt = false;
    if (isset($wp_query->query_vars["objekt"])) {
        $objekt = $wp_query->query_vars["objekt"];
    }
    ?>
    <script> $ = jQuery; </script>
    <script>
        var objekt = false;
        <?php if ($objekt) : ?>
        objekt = "<?php echo $objekt; ?>";
        <?php endif ?>
    </script>
    <script type="text/javascript"
            src="http://access.bytbil.com/sprint6/access/content/getcontent/1/access.iframe.host-v2.js"></script>
    <script type="text/javascript">

        var iframe = $('.access-iframe-<?php echo $id; ?>');
        var iframeLoad = new Access.Iframe.Load({
            packageName: "<?php echo $alias; ?>",
            assortment: "<?php echo $string; ?>",
            actionName: "<?php echo $page; ?>",
            parentUrl: "<?php echo $path; ?>",
            idName: 'objekt',
            objekt: objekt
        });
        iframeLoad.load(iframe);

    </script>
<?php
}


/*function check_search(){
    if($_POST["SearchType"]) {
        global $post;

        $Used = $_POST['Used'];
        $SearchType = $_POST['SearchType'];

        $slug = get_page_template_slug($post->name);
        $url = get_site_url();

        //Personbilar
        if ($SearchType == "rvppdkyg") {
            $base_slug = "personbilar";
            //Nya & begagnade
            if (empty($Used)) {
                return;
                //Nya
            } else if ($Used == "rvppdkyg") {
                $slug = "nya-bilar-i-lager";
                $redirect_url = $url . "/" . $base_slug . "/" . $slug;
                wp_redirect($redirect_url);
                exit;

                //Begagnade
            } else if ($Used == "sv3pdkyg") {
                $slug = "begagnade-bilar-i-lager";
                $redirect_url = $url . "/" . $base_slug . "/" . $slug;
                wp_redirect($redirect_url);
                exit;
            }
            //Transportbilar
        } else if ($SearchType == "pv7pdkyg") {
            $base_slug = "transportbilar";

        }
    }else{
        return;
    }
}
add_action('init', check_search);*/


function bytbil_show_assortment_page($id)
{

    global $wp_query;
    $objekt = false;
    if (isset($wp_query->query_vars["objekt"])) {
        $objekt = $wp_query->query_vars["objekt"];
    }

    $assortment_string = get_field('assortment_string', $id);

    $Used = $_POST['Used'];
    $PageSize = $_POST['PageSize'];
    $SearchType = $_POST['SearchType'];
    $Brand = $_POST['Brand'];
    $ModelName = $_POST['ModelName'];
    $Body = $_POST['Body'];
    $Fuel = $_POST['Fuel'];
    $Gearbox = $_POST['Gearbox'];
    $YearFrom = $_POST['YearFrom'];
    $YearTo = $_POST['YearTo'];
    $MilesFrom = $_POST['MilesFrom'];
    $MilesTo = $_POST['MilesTo'];
    $PriceFrom = $_POST['PriceFrom'];
    $PriceTo = $_POST['PriceTo'];
    $Sort = $_POST['Sort'];
    $SelectCity = $_POST['SelectCity'];

    $CritieraString = $_GET["criteriastring"];
    ?>
    <script type="text/javascript"
            src="http://access.bytbil.com/sprint6/access/content/getcontent/1/access.iframe.host-v2.js"></script>

    <iframe class="access-iframe"></iframe>

    <script>
        var objekt = false;
        <?php if ($objekt) : ?>
        objekt = "<?php echo $objekt; ?>";
        <?php endif ?>
    </script>

    <?php

    if (empty($CritieraString)) {
        ?>

        <script type="text/javascript">
            var iframe = $('.access-iframe');
            var iframeLoad;
            var criteria;

            <?php if($_POST){ ?>

            var form = {
                Used: "<?php echo safe($_POST['Used']); ?>",
                SearchType: "<?php echo safe($_POST['SearchType']); ?>",
                Brand: "<?php echo safe($_POST['Brand']); ?>",
                ModelName: "<?php echo safe($_POST['ModelName']); ?>",
                Body: "<?php echo safe($_POST['Body']); ?>",
                VAT: "<?php echo safe($_POST['VAT']); ?>",
                OnlyStarClass: "<?php echo safe($_POST['OnlyStarClass']); ?>",
                OnlyUsed1: "<?php echo safe($_POST['OnlyUsed1']); ?>",
                Fuel: "<?php echo safe($_POST['Fuel']); ?>",
                Gearbox: "<?php echo safe($_POST['Gearbox']); ?>",
                YearFrom: "<?php echo safe($_POST['YearFrom']); ?>",
                YearTo: "<?php echo safe($_POST['YearTo']); ?>",
                MilesFrom: "<?php echo safe($_POST['MilesFrom']); ?>",
                MilesTo: "<?php echo safe($_POST['MilesTo']); ?>",
                PriceFrom: "<?php echo safe($_POST['PriceFrom']); ?>",
                PriceTo: "<?php echo safe($_POST['PriceTo']); ?>"


            };

            var jqhxr = $.ajax({
                url: "http://access.bytbil.com/mercedes-benz-af/Access/json/GetCriteria",
                type: "POST",
                data: form,
                success: function (data) {
                    setCriteria(data);
                }
            });

            function setCriteria(string) {
                criteria = string;

                iframeLoad = new Access.Iframe.Load({
                    packageName: "<?php echo get_field('af-bb-alias','options'); ?>",
                    assortment: criteria,
                    actionName: "SokLista",
                    parentUrl: window.location,
                    idName: 'objekt'
                });

                iframeLoad.load(iframe);
            }
            <?php

            } else{
                $alias = get_field('af-bb-alias', 'options');
                $string = get_field('assortment_string', $id);
                $page = get_field('assortment_page', $id);
                $path = get_field('assortment_path', $id); ?>

            $(function () {
                iframeLoad = new Access.Iframe.Load({
                    packageName: "<?php echo $alias; ?>",
                    assortment: "<?php echo $string; ?>",
                    actionName: "<?php echo $page; ?>",
                    parentUrl: window.location,
                    idName: 'objekt',
                    objekt: objekt
                });
                iframeLoad.load(iframe);
            });
            <?php }?>

        </script>
    <?php

    } else {
        ?>

        <script type="text/javascript">
            var iframe = $('.access-iframe');
            var iframeLoad;
            var criteria;

            <?php if($_POST){ ?>

                var form = {
                    Used: "<?php echo safe($_POST['Used']); ?>",
                    SearchType: "<?php echo safe($_POST['SearchType']); ?>",
                    Brand: "<?php echo safe($_POST['Brand']); ?>",
                    ModelName: "<?php echo safe($_POST['ModelName']); ?>",
                    Body: "<?php echo safe($_POST['Body']); ?>",
                    VAT: "<?php echo safe($_POST['VAT']); ?>",
                    OnlyStarClass: "<?php echo safe($_POST['OnlyStarClass']); ?>",
                    OnlyUsed1: "<?php echo safe($_POST['OnlyUsed1']); ?>",
                    Fuel: "<?php echo safe($_POST['Fuel']); ?>",
                    Gearbox: "<?php echo safe($_POST['Gearbox']); ?>",
                    YearFrom: "<?php echo safe($_POST['YearFrom']); ?>",
                    YearTo: "<?php echo safe($_POST['YearTo']); ?>",
                    MilesFrom: "<?php echo safe($_POST['MilesFrom']); ?>",
                    MilesTo: "<?php echo safe($_POST['MilesTo']); ?>",
                    PriceFrom: "<?php echo safe($_POST['PriceFrom']); ?>",
                    PriceTo: "<?php echo safe($_POST['PriceTo']); ?>"

                };

                var jqhxr = $.ajax({
                    url: "http://access.bytbil.com/mercedes-benz-af/Access/json/GetCriteria",
                    type: "POST",
                    data: form,
                    success: function (data) {
                        setCriteria(data);
                    }
                });

                function setCriteria(string) {
                    criteria = string;

                    iframeLoad = new Access.Iframe.Load({
                        packageName: "<?php echo get_field('af-bb-alias','options'); ?>",
                        assortment: "<?php echo $CritieraString; ?>",
                        actionName: "SokLista",
                        parentUrl: window.location,
                        idName: 'objekt'
                    });

                    iframeLoad.load(iframe);
                }
            <?php

            } else{
                $alias = get_field('af-bb-alias', 'options');
                $string = get_field('assortment_string', $id);
                $page = get_field('assortment_page', $id);
                $path = get_field('assortment_path', $id); ?>

                $(function () {
                    iframeLoad = new Access.Iframe.Load({
                        packageName: "<?php echo $alias; ?>",
                        assortment: "<?php echo $CritieraString; ?>",
                        actionName: "<?php echo $page; ?>",
                        parentUrl: window.location,
                        idName: 'objekt'
                    });
                    iframeLoad.load(iframe);
                });
            <?php }?>

        </script>

    <?php

    }

}

function bytbil_show_assortment_front($id)
{

    $assortment_alias = get_field('af-bb-alias', 'options');
    $assortment_string = get_field('assortment_string', $id);
    $assortment_page = get_field('assortment_page', $id);
    $assortment_path = get_field('assortment_path', $id);
    ?>
    <iframe class="access-iframe-<?php echo $id; ?>"></iframe>
    <?php

    bytbil_init_assortment($assortment_alias, $assortment_string, $assortment_page, $assortment_path, $id);
}

function bytbil_get_path_assortment($id)
{
    $assortment_path = get_field('assortment_path', $id);
    return $assortment_path;
}

function safe($value)
{
    return mysql_real_escape_string($value);
}


?>
