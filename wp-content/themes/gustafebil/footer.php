<?php
$footer_logotype = get_field('footer-logotype', 'options');
$footer_logotype_url = $footer_logotype['url'];
?>

<footer style="background-image: url('<?php echo $footer_logotype_url; ?>')">
    <div class="wrapper">
        <div class="col-xs-12 col-sm-5 pull-right">
            <h3><i class="entypo pencil"></i> Kontakta oss</h3>
            <div id="contact-form">
            <?php
            echo get_field('contact-form-footer', 'options');
            ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 pull-right">
            <h3><i class="entypo location"></i> Våra anläggningar</h3>
            <?php bytbil_facilities_footer(); ?>
        </div>
        <div class="col-xs-12 col-sm-2 pull-left">
            <h3><i class="entypo address"></i> Genvägar</h3>
            <?php
            $footer_menu = wp_nav_menu(array(
                'menu' => 'Sidfot',
                'echo' => false,
                'depth' => 1,
                'container' => false,
                'menu_class' => 'shortcuts',
                'theme_location' => 'footer'
            ));
            ?>
            <?php echo $footer_menu; ?>
        </div>
        <div class="clearfix"></div>
        <?php
        $facebook_show = get_field('facebook-show', 'options');
        if($facebook_show=='true'){
            ?>
            <div class="col-xs-12 col-sm-6">
                <h3><i class="entypo social facebook"></i> Facebook</h3>
                <div style="width: 100%; background-color: #fff;">
                    <?php echo get_field('facebook-page', 'options'); ?>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="col-xs-12 col-sm-6">
            <?php
                $instagram_type = get_field('instagram-type', 'options');
                if($instagram_type=='hashtag'){?>
                    <h3><i class="entypo social instagram"></i> #<?php echo get_field('instagram-hashtag', 'options'); ?></h3>
                <?php }
                elseif($instagram_type=='user'){ ?>
                    <h3><i class="entypo social instagram"></i> @<?php echo get_field('instagram-user', 'options'); ?></h3>
                <?php }
            ?>
            <div id="instafeed">
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookiebar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.placeholder.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/instagram.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/instafeed.min.js"></script>


<script>
    var width = window.innerWidth;

    function bb_cookieWarning(){
        $.cookieBar({
            message: 'Den här webbplatsen använder Cookies för att ge dig den bästa användarupplevelsen.',
            effect: 'slide',
            acceptText: 'Ok! Jag förstår.', //Text on accept/enable button
        });
    }

    bb_cookieWarning();

    // Responsive / Mobile
    if (width > 767) {
        // Fixed Header
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 100) {
                $('header').addClass('fixed');
                $('main').addClass('fixed-header');
                $('#cookie-bar').addClass('fixed-cookie-header');
                $('body').css("padding-top", "90px");
            }
            else {
                $('header').removeClass('fixed');
                $('main').removeClass('fixed-header');
                $('#cookie-bar').addClass('fixed-cookie-header');
                $('body').css("padding-top", "0");
            }
        });

        //Toggla top-menyn
        $('.contact-toggle').click(function () {
            $('.contact-box').slideToggle('slow');
        });

        // Skrolla Up
        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    }

    // Toggla sidomenyn/kryss
    $(".navbar-toggle").click(function () {
        $('.navbar-toggle').html($('.navbar-toggle').html() == '<i class="fa fa-times"></i>' ? '<i class="fa fa-bars"></i>' : '<i class="fa fa-times"></i>');
    });

    //Toggla top-menyn
    $('.contact-toggle').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $('.mobile-contact-menu').slideToggle('slow');
    });
    
    $(document).ready(function(){
        $('input, textarea').placeholder();
        $('.facility-choice select').each(function() {
            $(this).find("option:eq(0)").attr('disabled','disabled');
        });
    });

    // Instagram Feed
    var feed = new Instafeed({
        <?php if($instagram_type=='hashtag'){ ?>
        get: 'tagged',
        tagName: '<?php echo get_field('instagram-hashtag','options'); ?>',
        <?php }
        elseif($instagram_type=='user'){ ?>
        get: 'user',
        userId: '<?php echo get_field('instagram-user','options'); ?>',
        <?php } ?>
        clientId: '680e76451708413485859ff3caf1c0df',
        limit: 8,
        links: true,
        resolution: 'thumbnail',
        after: function () {
            $("#instafeed > a").each(function (i) {
                $(this).attr('target','_blank');
                if(i >= 8) {
                    $(this).remove();
                }
            });
        },

    });
    feed.run();

</script>

<script>
    $(function() {
        $(".flex-prev, .flex-next, .flex-control-paging a").click(function() {
            $("video").get(0).pause();
        });

        $(window).load(function() {
            setTimeout(function () {
                $(".ajax-loader").after('<div class="custom-ajax-loader"><i class="fa fa-spinner fa-spin ajax-loader"></i>&nbsp; Skickar meddelandet...</div>');
            }, 100);
        });

        setInterval(function() {
            if( $("img.ajax-loader").css("visibility") == "hidden" ) {
                $(".custom-ajax-loader").css("visibility", "hidden");
            } else {
                $(".custom-ajax-loader").css("visibility", "visible");
            }
        },100);

        setTimeout(function() {
            $(".facility-choice").find("select").find("option").each(function () {
                if ($(this).val() == "") {
                    $(this).text("Välj anläggning");
                }
            });
        },100);
    });

    $("#top-menu .search-form label").click(function() {
        if( $(this).width() > 200 ) {
            if( $(this).find("input").val() != "" ) {
                $(this).parent("form").submit();
            }
        }
    });

    $("#mobile-menu .search-form label").click(function() {
        if( $(this).find("input").val() != "" ) {
            $(this).parent("form").submit();
        }
    });
</script>

</body>
<?php
wp_footer();
?>
</html>
