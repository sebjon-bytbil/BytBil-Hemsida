<?php /** * The template for displaying the footer * * Contains footer content and the closing of the #main and #page div elements. * * @package WordPress * @subpackage Twenty_Thirteen * @since Twenty Thirteen 1.0 */ ?>
<!-- #main -->
<?php echo do_shortcode('[addthis_nybergs]'); ?>
<footer id="nyberg-footer" class="nyberg-footer" role="contentinfo">

    <div class="nyberg-footer-contentbox">

        <div id="nyberg-footer-image" style="" class="nyberg-footer-image">
            <div id="nyberg-footer-image2"
                 style="background: #000 url(<?php echo GetFooterImg(); ?>); no-repeat #fff; ?>"
                 class="nyberg-footer-image">
                <div class="nyberg-footer-background-darkgray"></div>
                <div class="nyberg-footer-contentbox-contents clear">
                    <div class="clear toTopContainer" style="width: 100%; height: 60px; display: block"><a id="goTop">Till
                            toppen</a></div>
                    <div class="footertext">
                        <?php
                        $ommeny_menu_obj = get_menu_by_location('omnybergs');
                        $ommenyWrap = '<ul class="nyberg-footer-om-menu"><li id="item-id">' . esc_html($ommeny_menu_obj->name) . '</li>%3$s</ul>';
                        $verktygmeny_menu_obj = get_menu_by_location('verktyg');
                        $verktygmenyWrap = '<ul class="nyberg-footer-om-menu"><li id="item-id">' . esc_html($verktygmeny_menu_obj->name) . '</li>%3$s</ul>';
                        ?>
                        <div class="nyberg-footer-om">
                            <?php wp_nav_menu(array('theme_location' => 'omnybergs', 'menu_id' => 'nyberg-footer-om-menu', 'items_wrap' => $ommenyWrap, 'menu_class' => 'nyberg-footer-om-menu')); ?>
                        </div>

                        <div class="nyberg-footer-verktyg">
                            <?php wp_nav_menu(array('theme_location' => 'verktyg', 'menu_id' => 'nyberg-footer-verktyg-menu', 'items_wrap' => $verktygmenyWrap, 'menu_class' => 'nyberg-footer-verktyg-menu')); ?>
                        </div>
                    </div>
                    <?php echo do_shortcode('[nyberg_brand_plugs_footer]') ?>

                    <?php echo do_shortcode('[getnybergbloggrss_footer]') ?>
                </div>

            </div>
            <script type="text/javascript">
                $(window).load(function () {
                    if ($(window).width() > 980) {
                        //     $('.nyberg-footer-contentbox').css('height', $('#nyberg-footer-img').height());
                    }
                });
                $(window).resize(function () {
                    if ($(window).width() > 980) {
                        //   $('.nyberg-footer-contentbox').css('height', $('#nyberg-footer-img').height());
                    }
                });
            </script>
            <script>
                $(document).ready(function () {
                    $(window).scroll(function () {
                        if ($(this).scrollTop() > 200) {
                            $('#goTop').stop().animate({
                                top: '20px'
                            }, 500);
                        }
                        else {
                            $('#goTop').stop().animate({
                                top: '-200px'
                            }, 500);
                        }
                    });
                    $('#goTop').click(function () {
                        $('html, body').stop().animate({
                            scrollTop: 0
                        }, 500, function () {
                            $('#goTop').stop().animate({
                                top: '-200px'
                            }, 500);
                        });
                    });
                });
            </script>
            <div class="nyberg-footer-ending">
                <span><?php the_field('footertext', 'options'); ?></span><?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'nyberg-footer-disclaimer-menu', 'menu_class' => 'nyberg-footer-disclaimer-menu', 'menu' => 'Footer Disclaimer')); ?>
                <span class="lastfootertext"> <?php the_field('footertextafter', 'options'); ?></span></div>


</footer>
</div>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-12684783-1', 'auto');
    ga('send', 'pageview');

</script>
<?php wp_footer(); ?>

</body>


</html>