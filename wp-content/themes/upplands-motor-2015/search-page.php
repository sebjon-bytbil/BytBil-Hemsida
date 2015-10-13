Template Name: Söklista
*/
get_header('clean');
?>
<link href="<?php echo get_template_directory_uri(); ?>/css/elasticaccess-style.css" rel="stylesheet">

<main id="post-<?php the_ID(); ?>">
    <?php if($pagename == "bilar-i-lager" || $pagename = "fritextssok"){ ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/ElasticAccess.js"></script>
        <div ng-app="ElasticAccess">
            <section id="main-slider" class="scroll white search-box">
                <div class="flexslider" data-slideshow="otherslider">
                    <ul class="slides">
                        <li>
                            <img src="/wp-content/themes/upplands-motor/images/bg-wide.jpg" draggable="false"/>
                            <div class="caption-container">
                                <div class="caption-wrapper">
                                    <div class="caption" data-animation="none">
                                        <div class="vertical-align-wrapper">
                                            <div class="vertical-align center">
                                                <div class="horizontal-align">
                                                    <div class="caption-contents" style="background:#fff">
                                                        <?php if($pagename == "bilar-i-lager"){ ?>
                                                            <div ng-include="'templates/SearchList.html'"></div>
                                                            <div class="col-xs-12 center">
                                                                <div class="search-buttons">
                                                                    <button class="button black">
                                                                        <i class="entypo cog"></i> Fler sökalternativ
                                                                    </button>
                                                                    <button class="button red">
                                                                        <i class="entypo search"></i><strong>Sök och hitta</strong>
                                                                    </button>
                                                                    <button class="button white">
                                                                        <i class="entypo trash"></i> Rensa
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <?php }else if($pagename == "fritextssok"){?>
                                                            <div ng-include="'templates/FreeTextSearch.html'"></div>
                                                            <div class="col-xs-12 center">
                                                                <div class="search-buttons">
                                                                    <a href="#vehicles" class="button red">
                                                                        <i class="entypo search"></i><strong>Sök och hitta</strong>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <div class="clearfix clear"></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <section name="vehicles" id="vehicles" class="lt-gray scroll">
                <div class="filter-search container-fluid" ng-include="'templates/Filter.html'"></div>

                <div class="wrapper container-fluid" ng-include="'templates/List.html'"></div>
            </section>
        </div>
    <?php } ?>

    </div>

    <?php
    if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php bytbil_content_loop(true, true); ?>

    <?php endwhile; endif; ?>

</main>

<script>
    $(window).scroll(function (){
        var slider_height = $("#main-slider").height();

        var top = $(this).scrollTop();

        if (top > slider_height) {
            $("body").addClass("push-down-search");
            $(".filter-search").addClass("affix");
        }
        else {
            $("body").removeClass("push-down-search");
            $(".filter-search").removeClass("affix");
        }
    });

    // This adds an offset in case the header is fixed
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                var top_offset = 0;
                $('html,body').animate({
                    scrollTop: target.offset().top - top_offset
                }, 1000);
                return false;
            }
        }
    });
</script>

<?php
get_footer('clean');
?>
