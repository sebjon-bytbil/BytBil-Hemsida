    <footer></footer>

    <div class="overlay"></div>
    <div class="media-check"></div>

    <script>
    function s3_log(x) {
        return true;
    }
    </script>

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://www.mazda.se/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script src="http://www.mazda.se/js/jquery-ui-touch.js"></script>

    <!-- Modernizer -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>

    <!-- Flexslider -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>

    <!-- Custom files -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/extra/jasny-bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/extra/alertify.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/extra/featherlight.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/extra/featherlight.gallery.min.js"></script>

    <!-- OnLoad -->
    <script type="text/javascript">
    var baseUrl = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>';

    function queryString(variable)
    {
        q = location.search.substring(1);
        v = q.split("&");
        for( var i = 0; i < v.length; i++ ){
            p = v[i].split("=");
            if( p[0] == variable ){
                if( p[1].indexOf('%20') != -1 ){
                    n = [];
                    for( var j = 0; j < p[1].split('%20').length; j++ ){
                        n.push(p[1].split('%20')[j]);
                    }
                    str = "";
                    for( var k = 0; k < n.length; k++ ){
                        str += n[k] + ' ';
                    }
                    return str.trim();
                }
                else{
                    return p[1];
                }
            }
        }
    }

    jQuery(document).ready(function($) {
        <?php $secnav = get_mazda_transient('secnav'); if ($secnav) : ?>
        var siteUrl = '<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>';
        $('#mobileSubMenu').change(function() {
            window.location.replace(siteUrl + this.value);
        });
        <?php endif; ?>

        <?php $bildspel = get_mazda_transient('bildspel'); if ($bildspel) : ?>
            <?php if (!$bildspel['video']) : ?>
                <?php if ($bildspel['single']) : ?>
                    $('#main-slideshow').flexslider({
                        maxItems: 1
                    });
                <?php else : ?>
                    $('#main-slideshow').flexslider();
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php $features = get_mazda_transient('features'); if ($features) : ?>
        if ($('.features_carousel').length > 0) {
            $('.features_carousel').flexslider({
                animation: 'slide',
                animationLoop: true,
                directionNav: true,
                itemWidth: 222,
                itemMargin: 5,
                slideshow: false,
                touch: true
            });
        }
        <?php endif; ?>

        <?php $slideshow = get_mazda_transient('slideshow'); if ($slideshow) : ?>
        if ($('.features_carousel').length > 0) {
            $('.features_carousel').flexslider({
                animation: 'slide',
                animationLoop: true,
                directionNav: true,
                itemWidth: 210,
                itemMargin: 30,
                slideshow: false,
                touch: true
            });
        }
        <?php endif; ?>

        if ($('#slideshow').length > 0) {
            $('#slideshow').flexslider();
        }

    });
    </script>

    <?php $properties = get_mazda_transient('properties'); if ($properties) : ?>
    <!-- Showroom features -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/showroom-features.js"></script>
    <?php endif; ?>

    <?php $storage = get_mazda_transient('storage'); if ($storage) : ?>
    <!-- Storage -->
    <?php echo $storage['script']; ?>
    <?php endif; ?>

    <?php $colorator = get_mazda_transient('colorator'); if ($colorator) : ?>
    <!-- Colorator -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/car-colorator.js"></script>
    <?php endif; ?>

    <?php $colors = get_mazda_transient('colors'); if ($colors) : ?>
    <!-- Colors showroom -->
    <script type="text/template" id="module-360-view-template">
        <ul class="helper-tabs level-1">
            <li class="selected" data-processed="true">
                <ul class="helper-tabs level-2">
                    <li class="selected">
                        <ul class="colour-tab"></ul>
                        <div class="colour-selector">
                            <ul class="colour-options"></ul>
                        </div>
                        <div class="model-details">
                            <h3 class="model">{title}</h3>
                            <div class="description">{description}</div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/color-showroom.js"></script>
    <?php endif; ?>

    <?php $gallery = get_mazda_transient('gallery'); if ($gallery) : ?>
    <!-- Gallery -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/small-gallery.js"></script>
    <?php endif; ?>

    <?php $bgallery = get_mazda_transient('bgallery'); if ($bgallery) : ?>
    <!-- Big gallery -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/big-gallery.js"></script>
    <?php endif; ?>

    <?php $buying_slider = get_mazda_transient('bslider'); if ($buying_slider) : ?>
    <!-- Buying slider -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/buying-slider.js"></script>
    <?php endif; ?>

    <?php $compare = get_mazda_transient('compare'); if ($compare) : ?>
    <!-- Compare specs -->
    <script src="http://www.mazda.se/js/main.msajax.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/compare-specs.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/htmlspecscompare.js"></script>
    <script src="http://www.mazda.se/js/accordion.js"></script>
    <?php endif; ?>

    <script>
    (function($) {
        var body = $('body');
        var media = $('.media-check');

        function alterBodyClass() {
            if (media.css('margin') == '1px') {
                if (body.hasClass('isDesktop')) {
                    body.removeClass('isDesktop').addClass('isMobile');
                }
            } else {
                if (body.hasClass('isMobile')) {
                    body.removeClass('isMobile').addClass('isDesktop');
                }
            }
        }

        $(window).resize(function() {
            alterBodyClass();
        });
        alterBodyClass();

        if ($('.mobile-trigger').length > 0) {
            $('.mobile-trigger').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                var sibling = $(this).siblings('.toggled-contents');
                if (sibling.hasClass('hidden')) {
                    sibling.removeClass('hidden');
                } else {
                    sibling.addClass('hidden');
                }
            });
        }

    })(jQuery);
    </script>

    </body>

    <?php wp_footer(); ?>

</html>
