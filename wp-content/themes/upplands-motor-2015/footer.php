<footer class="scroll">
    <?php

    ?>
    <section id="footer-blocks" >
        <div class="container-fluid wrapper">
            <?php if(get_field("footer-show-search", "options") ){ ?>
                <div class="col-xs-12 col-sm-<?php the_field("footer-search-content-width", "options"); ?>">
                    <div class="search block white-bg">
                        <h4><?php the_field("footer-search-headertext", "options"); ?></h4>
                        <p><?php the_field("footer-search-bodytext", "options"); ?></p>
                        <form method="get" action="/">
                            <input type="text" name="s" id="footer-search">
                        </form>
                    </div>
                </div>
            <?php } ?>
            <?php if(get_field("footer-show-shortcuts", "options") ){ ?>
                <div class="col-xs-12 col-sm-<?php the_field("footer-shortcuts-content-width", "options"); ?>">
                    <div class="shortcuts block white-bg">
                        <h4><?php the_field("footer-shortcuts-headertext", "options"); ?></h4>
                        <?php
                            $shortcut_menu = wp_nav_menu(array(
                                'menu' => 'Genvägar',
                                'echo' => false,
                                'depth' => 1,
                                'container' => false,
                                'menu_class' => 'shortcuts-nav-list',
                                'theme_location' => 'shortcuts'
                            ));

                            echo $shortcut_menu;
                        ?>
                    </div>
                </div>
            <?php } ?>
            <?php if(get_field("footer-show-openhours", "options") ){ ?>
                <div class="col-xs-12 col-sm-<?php the_field("footer-openhours-content-width", "options"); ?>">
                    <div class="openhours block white-bg">
                        <h4><?php the_field("footer-openhours-headertext", "options"); ?></h4>
                        <?php
                        $facilities = get_field('footer-openhours-facility', 'options');
                        get_facility_widget(get_the_ID(), $facilities, 6);
                        ?>
                    </div>
                </div>
            <?php } ?>
            
            <?php if(get_field("footer-show-help", "options") ){

//                $facility_args = array(
//                    'posts_per_page'    => -1,
//                    'offset'            => 0,
//                    'category'          => '',
//                    'category_name'     => '',
//                    'orderby'           => 'post_date',
//                    'order'             => 'ASC',
//                    'include'           => '',
//                    'exclude'           => '',
//                    'meta_key'          => '',
//                    'meta_value'        => '',
//                    'post_type'         => 'facility',
//                    'post_mime_type'    => '',
//                    'post_parent'       => '',
//                    'post_status'       => 'publish',
//                    'suppress_filters'  => true,
//                );
//                $facilities = get_posts($facility_args);
//                $facility_names = array();
//                foreach($facilities as $facility){
//                    $facility_names[] = $facility->post_title;
//                }
//                foreach($facilities as $facility){
//                    $facility_names[] = explode(" ", $facility->post_title, 3);
//                }

                ?>
                <div class="col-xs-12 col-sm-<?php the_field("footer-help-content-width", "options"); ?>">
                    <div class="contact-form block white-bg">
                        <h4><?php the_field("footer-help-headertext", "options"); ?></h4>
                        <p><?php the_field("footer-help-bodytext", "options"); ?></p>
                        <?php
                        $footer_form = get_field('footer-form', 'options');
                        set_wpcf7_array($footer_form);
                        echo $footer_form;
                        ?>

                    </div>
                </div>
            <?php } ?>
            <?php if(get_field("footer-show-accesspackage", "options") ){
                wp_enqueue_script('elasticaccess');
                wp_enqueue_script('elasticaccess-front');
                wp_enqueue_style( 'elasticaccesscss');
                $hash = get_field("field_elasticaccess-hash", "options");
                $loadMoreType = get_field('accesspackage-load-type', "options");
                $loadObjectPage = get_field('accesspackage-object-page', "options");
                $loadObjectUrl = get_the_permalink($loadObjectPage->ID);
                ?>
                <style>
                    .ElasticAccess-Footer .list{
                        display: block;
                    }
                    .ElasticAccess-Footer .footer-filter,
                    .ElasticAccess-Footer .footer-searchlist{
                        display: none;
                    }
                </style>
                <div class="col-xs-12 col-sm-<?php the_field("footer-accesspackage-content-width", "options"); ?>">
                    <div class="ElasticAccess ElasticAccess-Footer" data-app="elasticaccesspackage">
                        <div ng-controller="SetupCtrl" ng-init="init('', '', 'List', '<?php echo $loadMoreType;?>', '<?php echo $loadObjectUrl;?>', '<?php echo $hash;?>'); lock('true');">
                            <div ng-if="showSearch()">
                                <div class="footer-searchlist" ng-include="'templates/SearchList.html'"></div>
                            </div>
                            <div ng-if="showFilter()">
                                <div class="footer-filter" ng-include="'templates/Filter.html'"></div>
                            </div>
                            <div ng-if="showList()">
                                <div class="wrapper includes list" ng-include src="'templates/List.html'"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
    </section>
    <section id="footer-navbar" >
        <div class="container-fluid wrapper">
            <a class="footer-logotype" href="#">
                <img class="logotype"
                     src="<?php echo get_logotype('svg'); ?>"
                     onerror="this.onerror=null; this.src='<?php echo get_logotype('pngd'); ?>'"
                     alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"
                     title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
            </a>
            <nav role="navigation">
                <?php
                    $footer_menu = wp_nav_menu(array(
                        'menu' => 'Sidfot',
                        'echo' => false,
                        'depth' => 1,
                        'container' => false,
                        'menu_class' => 'footer-nav-list',
                        'theme_location' => 'footer'
                    ));

                    echo $footer_menu;
                ?>
            </nav>
            <div class="footer-social">
            </div>
        </div>
    </section>
</footer>
<button class="button white" id="scroll-to-top">
    <span class="scroll-icon"><i class="icon icon-chevron-thin-up"></i></span>
</button>
<?php
wp_footer();
?>


<script src="<?php echo get_template_directory_uri(); ?>/minified/js/scripts.min.js?ver=KlcQgiEs4v7GG7maoH7s"></script>

<script>
    function bb_cookieWarning(){
        $.cookieBar({
            message: '<h4>Vi använder Cookies</h4><p>För att ge er den bästa användarupplevelsen använder vi Cookies på vår webbplats Läs mer om Cookies och våra villkor.</p>',
            effect: 'slide',
            acceptText: 'Ok! Jag förstår.', //Text on accept/enable button
            bottom: true,
            element: 'footer',
        });
    }

    bb_cookieWarning();
</script>
<script type="text/javascript">
    $('.ElasticAccess').each(function(){

        bootstrapAngular($(this));
    });
</script>
<?php echo get_settings_code('js'); ?>

</body>

</html>
