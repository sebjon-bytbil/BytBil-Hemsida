<?php
/*
Plugin Name: BytBil Social Media
Description: Lägg till Sociala Medie-widgets.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/
add_action('init', 'cptui_register_my_cpt_socialmedia');
function cptui_register_my_cpt_socialmedia()
{
    register_post_type('socialmedia', array(
        'label' => 'Sociala medier',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'socialmedia', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => 'Sociala medier',
            'singular_name' => 'Social media',
            'menu_name' => 'Sociala medier',
            'add_new' => 'Lägg till Social media',
            'add_new_item' => 'Lägg till ny Social media',
            'edit' => 'Edit',
            'edit_item' => 'Redigera Social media',
            'new_item' => 'Ny Social media',
            'view' => 'Visa Social media',
            'view_item' => 'Visa Social media',
            'search_items' => 'Sök Sociala medier',
            'not_found' => 'No Sociala medier Found',
            'not_found_in_trash' => 'No Sociala medier Found in Trash',
            'parent' => 'Parent Social media',
        )
    ));
}


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_sociala-medier',
        'title' => 'Sociala Medier',
        'fields' => array(
            array(
                'key' => 'field_53db59fd34b4b',
                'label' => 'Välj Social Media.',
                'name' => 'social_media-type',
                'type' => 'radio',
                'required' => 1,
                'choices' => array(
                    'fb' => 'Facebook',
                    'tw' => 'Twitter',
                    'yt' => 'Youtube',
                    'ig' => 'Instagram',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'layout' => 'horizontal',
                'instructions' => 'Välj vilken typ av socialt mediablock du vill visa.'
            ),
            array(
                'key' => 'field_53db3b46a2656',
                'label' => 'Användarnamn',
                'name' => 'user',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '!=',
                            'value' => 'ig',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: Autoking',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => 'Fyll i ert användarnamn för det kontot du vill visa.'
            ),
            array(
                'key' => 'field_53db6290ee0d6',
                'label' => 'Hashtag',
                'name' => 'hashtag',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: autoking',
                'prepend' => '#',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => 'Fyll er hashtag för kontot på Instagram.'
            ),
            array(
                'key' => 'field_53db7c282c984',
                'label' => 'Välj bildkvalité',
                'name' => 'quality',
                'type' => 'select',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'yt',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'choices' => array(
                    'low_resolution' => 'Låg upplösning',
                    'standard_resolution' => 'Hög upplösning',
                    'thumbnail' => 'Tumnaglar'
                ),
                'default_value' => 'low_resolution',
                'allow_null' => 0,
                'multiple' => 0,
                'instructions' => 'Välj vilken kvalitet bilder skall visas i.'
            ),
            array(
                'key' => 'field_53db7fdc21168',
                'label' => 'Antal bilder i listan',
                'name' => 'pic_count',
                'type' => 'number',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '10',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '33',
                'step' => '',
                'instructions' => 'Välj hur många bilder som skall visas.'
            ),
            array(
                'key' => 'field_53e48e0ae70b4',
                'label' => 'Antal videoklipp i listan',
                'name' => 'vids_count',
                'type' => 'number',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'yt',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '10',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '50',
                'step' => '',
                'instructions' => 'Välj hur många videoklipp som skall visas.'
            ),

            array(
                'key' => 'field_53e4ae13e187b',
                'label' => 'Färgtema',
                'name' => 'theme',
                'type' => 'select',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'fb',
                        ),
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'tw',
                        ),

                    ),
                    'allorany' => 'any',
                ),
                'choices' => array(
                    'light' => 'Ljus',
                    'dark' => 'Mörk',
                ),
                'default_value' => 'light',
                'allow_null' => 0,
                'multiple' => 0,
                'instructions' => 'Välj vilket färgtema du vill ha på blocket',
            ),
            array(
                'key' => 'field_53db552abcc6a',
                'label' => 'Bredd',
                'name' => 'width',
                'type' => 'text',
                'default_value' => '100%',
                'placeholder' => 'Exempel: 300px eller 50%',
                'instructions' => 'Ange blockets bredd i pixlar eller procent',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_53db55a218350',
                'label' => 'Höjd',
                'name' => 'height',
                'type' => 'text',
                'default_value' => '400px',
                'placeholder' => 'Exempel: 400px eller 25%',
                'instructions' => 'Ange blockets höjd i pixlar eller procent',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_53db7f86da847',
                'label' => '',
                'name' => 'show_title',
                'type' => 'checkbox',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),

                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'true' => 'Visa bildrubrik/taggar',
                ),
                'default_value' => 'true',
                'layout' => 'vertical',
                'instructions' => 'Markera om du vill visa bildrubrik och taggar.'
            ),
            array(
                'key' => 'field_53db55d616fd8',
                'label' => '',
                'name' => 'show_posts',
                'type' => 'checkbox',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'fb',
                        ),

                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'true' => 'Visa inlägg',
                ),
                'default_value' => 'true',
                'layout' => 'vertical',
            ),
            array(
                'key' => 'field_53db58ca108f2',
                'label' => '',
                'name' => 'show_faces',
                'type' => 'checkbox',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'fb',
                        ),

                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'true' => 'Dölj ansikten',
                ),
                'default_value' => 'true',
                'layout' => 'vertical',
            ),


        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'socialmedia',
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

//Social media Shortcode [socialmedia name='']
function socialmedia_func($atts)
{
    extract(shortcode_atts(array('namn' => ''), $atts));
    ob_start();

    $args = array('post_type' => 'socialmedia', 'name' => $namn);
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();

        $user = get_field('user');
        $height = get_field('height');
        $width = get_field('width');
        $showposts = get_field('show_posts');
        $showfaces = get_field('show_faces');
        $socialmedia = get_field('social_media-type');
        $resolution = get_field('quality');
        $hashtag = get_field('hashtag');
        $theme = get_field('theme');

        //Facebook
        if ($socialmedia == 'fb') { ?>
            <div id="socialmedia-container"
                 style="margin-right: 20px; height: <?php echo $height; ?>; width: <?php echo $width; ?>">

                <div id="fb-root"></div>
                <script>
                    (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));

                </script>

                <div class="fb-like-box" data-href="https://www.facebook.com/<?php echo $user; ?>"
                     data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>"
                     data-colorscheme="<?php echo $theme; ?>" data-show-faces="<?php echo $showfaces; ?>"
                     data-header="false" data-stream="<?php echo $showposts[0]; ?>" data-show-border="false"></div>
            </div>
            <?php
            //Twitter
        } else if ($socialmedia == 'tw') { ?>
            <style>
                #socialmedia-container.twitter {
                    display: block;
                    float: left;
                    width: <?php echo $width; ?>;
                    height: <?php echo $height; ?>;
                }

                #socialmedia-container.twitter iframe {
                    width: <?php echo $width; ?>;
                    height: <?php echo $height; ?>;
                }
            </style>
            <div id="socialmedia-container">

                <a class="twitter-timeline" href="https://twitter.com/<?php echo $user; ?>"
                   data-theme="<?php echo $theme; ?>" data-screen-name="<?php echo $user; ?>"
                   data-widget-id="495141016639250432">Tweets av @<?php echo $user; ?></a>
                <script>
                    !function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + "://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");
                </script>

            </div>

            <?php
            //Instagram
        } else if ($socialmedia == 'ig') {

            $count = get_field('pic_count'); ?>
            <div id="socialmedia-container" style="height: <?php echo $height; ?>; width: <?php echo $width; ?>">
                <i class="fa fa-instagram"></i> #<?php echo $hashtag; ?>
                <div id="socialmedia-view" style="height: <?php echo $height; ?>; width: <?php echo $width; ?>"></div>
            </div>

            <script>
                var Instagram = {};
                Instagram.search = search;
                var Count = <?php echo $count; ?>;
                Instagram.search("<?php echo $hashtag; ?>");


                function search(tag) {
                    $.getJSON(url, toScreen);
                }

                function show(photos) {
                    console.log(photos);
                    $.each(photos.data, function (index, photo) {
                        photo = "<div class='list-object'><a target='_blank' href='" + photo.link + "'><img src='" + photo.images.<?php echo $resolution; ?>.url + "' /></a>"
                        <?php if(get_field('show_title')){ ?>
                        + "<span>" + photo.caption.text + "</span>"
                        <?php } ?>;

                        $('#socialmedia-view').append(photo);
                    });
                }
                function search(tag) {
                    var url = 'https://api.instagram.com/v1/tags/' + tag + '/media/recent/?callback=?&count=' + Count + '&client_id=b44483be244e4e8cb84f25e290bca2ab'
                    $.getJSON(url, show);
                }

            </script>
            <?php
            //Youtube
            //AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0
        } else if ($socialmedia == 'yt') {

            $count = get_field('vids_count'); ?>

            <script src="https://apis.google.com/js/platform.js"></script>
            <div id="socialmedia-container" style="height: <?php echo $height; ?>; width: <?php echo $width; ?>">
                <div class="g-ytsubscribe" data-channel="<?php echo $user; ?>" data-layout="full"
                     data-count="default"></div>
                <div id="socialmedia-view" style="height: <?php echo $height; ?>"></div>
                <?php
                switch ($resolution) {
                    case 'low_resolution':
                        $resolution = 'list_object.snippet.thumbnails.medium.url';
                        break;
                    case 'standard_resolution':
                        $resolution = 'list_object.snippet.thumbnails.high.url';
                        break;
                    case 'thumbnail':
                        $resolution = 'list_object.snippet.thumbnails.default.url';
                        break;
                }
                ?>
                <script>
                    var id_url = 'https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=<?php echo $user; ?>&key=AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0';
                    $.getJSON(id_url, getPlayListID);

                    function getPlayListID(data) {
                        var playListID = data.items[0].contentDetails.relatedPlaylists.uploads;
                        console.log(data);
                        var url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=<?php echo $count; ?>&playlistId=' + playListID + '&key=AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0';
                        $.getJSON(url, getPlayListVideos);
                    }

                    function getPlayListVideos(data) {
                        var resolution = "<?php echo $resolution; ?>";
                        console.log(data);
                        $.each(data.items, function (index, list_object) {
                            //console.log(list_object);

                            list_object = "<a target='_blank' href='https://www.youtube.com/watch?v=" + list_object.snippet.resourceId.videoId + "'><div class='list-object no-padding col-sm-12'>" +
                            "<span class='col-sm-3 no-padding'><img src='" + eval(resolution) + "'/></span><span class='col-sm-9 no-padding'>" + list_object.snippet.title + "</span></div><a/>";

                            $('#socialmedia-view').append(list_object);
                        });
                    }
                </script>
            </div>
        <?php
        }


    endwhile; ?>

    <?php wp_reset_query();

    return ob_get_clean();

}

add_shortcode('socialmedia', 'socialmedia_func');
?>