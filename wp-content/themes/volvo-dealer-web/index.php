<?php get_header(); ?>
    <script type="text/javascript">
        function b64_to_utf8(str) {
            return decodeURIComponent(escape(window.atob(str)));
        }
    </script>


    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php

            // Content pull test
            //switch_to_master();

            $args = array(
                'post_type' => 'startsidor',
                'meta_key' => 'prioritet',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            );

            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) :

                $articles = array();

                while ($the_query->have_posts()) : $the_query->the_post();

                    $masterPost = bytbil_get_master_post(get_the_ID());

                    if ($masterPost) {
                        switch_to_master();
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($masterPost->ID), 'full');
                        restore_from_master();
                    }
                    if (!$masterPost || !$image) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    }


                    if ($masterPost) {
                        $title = $masterPost->post_title;
                    } else {
                        $title = get_the_title();
                    }

                    $description = base64_encode(bytbil_get_field('description', true));

                    $description2 = get_field('description2');
                    $textcolor = bytbil_get_field('textcolor', true);
                    $image = $image[0];

                    if (bytbil_get_field('lanktypen', true) == 'int') {
                        $permalink = preg_replace('/^http:\/\/.*?(?=\/)/i', "http://" . $_SERVER['HTTP_HOST'], bytbil_get_field('internlank', true));
                    } else {
                        $permalink = bytbil_get_field('externlank', true);
                    }
                    $open_link_in = bytbil_get_field('open_link_in', true);

                    $hiddenTitle = bytbil_get_field('dolj-rubrik', true);
                    $hiddenSlide = get_field('hidden');


                    if ($image != null && $hiddenSlide != true) {
                        if ($hiddenTitle != true) {
                            $article = array('title' => $title, 'textcolor' => $textcolor, 'description' => $description, 'description2' => $description2, 'image' => $image, 'permalink' => $permalink, 'open_link_in' => $open_link_in);
                        } else {
                            $article = array('title' => '', 'textcolor' => $textcolor, 'description' => $description, 'description2' => $description2, 'image' => $image, 'permalink' => $permalink, 'open_link_in' => $open_link_in);
                        }

                        $articles[] = $article;
                    }

                endwhile;

                // Content pull test
                //restore_from_master();

                ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        var articles = JSON.parse('<?php  echo json_encode($articles ); ?>');
                        if (articles.length > 0) {
                            $('#background-container').empty();
                            var ul = jQuery('<ul/>', {
                                'class': 'slides'
                            }).appendTo($('#background-container'));
                            for (var i = 0; i < articles.length; i++) {
                                var imageUrl = articles[i]['image'];
                                var title = articles[i]['title'];
                                var textcolor = articles[i]['textcolor'];
                                var description = b64_to_utf8(articles[i]['description']);
                                if (articles[i]['description2']) {
                                    var description2 = articles[i]['description2'];
                                }
                                else {
                                    var description2 = "";
                                }
                                var permalink = articles[i]['permalink'];
                                var open_link_in = articles[i]['open_link_in'];

                                var li = jQuery('<li/>', {
                                    style: 'background-image: url(' + imageUrl + ');'
                                }).appendTo(ul);

                                var contentDiv = jQuery('<div/>', {
                                    class: 'background-content'
                                }).appendTo(li);

                                var titleDiv = jQuery('<div/>', {
                                    class: 'background-title-div'
                                }).appendTo(contentDiv);

                                titleDiv.append('<a style="color:' + textcolor + ';" target="' + open_link_in + '" href="' + permalink + '">' + title + '</a>');

                                var descriptionDiv = jQuery('<div/>', {
                                    class: 'background-description-div'
                                }).appendTo(contentDiv);
                                descriptionDiv.append('<a style="color:' + textcolor + ';" target="' + open_link_in + '" href="' + permalink + '">' + description + description2 + '</a>');


                                if (articles[i].open_link_in === "lightbox") {
                                    var readMoreWrapper = jQuery('<div/>', {
                                        class: 'readmore-wrapper'
                                    }).appendTo(contentDiv);
                                    var readMoreDiv = jQuery('<a/>', {
                                        class: 'background-readmore lytebox',
                                        href: permalink,
                                        target: open_link_in
                                    }).appendTo(readMoreWrapper);
                                    readMoreDiv.html('Läs mer');
                                    readMoreDiv.attr("data-lyte-options", "");
                                } else {
                                    var readMoreWrapper = jQuery('<div/>', {
                                        class: 'readmore-wrapper'
                                    }).appendTo(contentDiv);
                                    var readMoreDiv = jQuery('<a/>', {
                                        class: 'background-readmore',
                                        href: permalink,
                                        target: open_link_in
                                    }).appendTo(readMoreWrapper);
                                    readMoreDiv.html('Läs mer');
                                }

                                var controlLi = jQuery('<li/>');
                                controlLi.appendTo('#background-slider-controls');
                                controlLi.append('<a href="#">&nbsp;</a>');
                            }


                        }
                        $('#background-container').flexslider({
                            manualControls: '.background-slider-controls li a',
                            controlsContainer: '#background-slider-nav',
                            controlNav: true,
                            directionNav: false,
                        });

                    });
                </script>
            <?php

            else:
                _e('Sorry, no posts matched your criteria.');
            endif;


            wp_reset_query();
            ?>
            <div class="home-bottom-container">
                <div class="wrapper" style="">
                    <div class="home-bottom-links">
                        <?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'home-bottom-menu' ) );
                        /* switch_to_master();
                        get_blog_details();
                        $menu = volvo_get_custom_menu('Startsidelänkar', 'home-bottom-menu');
                        $url = $_SERVER['SERVER_NAME'];
                        $blog_details = get_blog_details();
                        $menu2 = str_replace($blog_details->domain, $url, $menu);
                        echo $menu2;
                        restore_from_master(); */

                        ?>
                        <?php echo new_volvo_menu('startsida', true, 'side-menu-large', false); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>