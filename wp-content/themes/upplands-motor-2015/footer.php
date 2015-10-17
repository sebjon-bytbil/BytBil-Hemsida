<footer class="scroll">
    <?php
global $option_fields;
    ?>
    <section id="footer-blocks" >
        <div class="container-fluid wrapper">
            <?php if($option_fields["footer-show-search"] ){ ?>
                <div class="col-xs-12 col-sm-<?php echo $option_fields["footer-search-content-width"]; ?>">
                    <div class="search block white-bg">
                        <h4><?php echo $option_fields["footer-search-headertext"]; ?></h4>
                        <p><?php echo $option_fields["footer-search-bodytext"]; ?></p>
                        <form method="get" action="/">
                            <input type="text" name="s" id="footer-search">
                        </form>
                    </div>
                </div>
            <?php } ?>
            <?php if($option_fields["footer-show-shortcuts"] ){ ?>
                <div class="col-xs-12 col-sm-<?php echo $option_fields["footer-shortcuts-content-width"]; ?>">
                    <div class="shortcuts block white-bg">
                        <h4><?php echo $option_fields["footer-shortcuts-headertext"]; ?></h4>
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
            <?php if($option_fields["footer-show-openhours"] ){ ?>
                <div class="col-xs-12 col-sm-<?php echo $option_fields["footer-openhours-content-width"]; ?>">
                    <div class="openhours block white-bg">
                        <h4><?php echo $option_fields["footer-openhours-headertext"]; ?></h4>
                        <?php
                        $facilities = $option_fields['footer-openhours-facility'];
                        get_facility_widget(get_the_ID(), $facilities, 6);
                        ?>
                    </div>
                </div>
            <?php } ?>
            
            <?php if($option_fields["footer-show-help"] ){

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
                <div class="col-xs-12 col-sm-<?php echo $option_fields["footer-help-content-width"]; ?>">
                    <div class="contact-form block white-bg">
                        <h4><?php echo $option_fields["footer-help-headertext"]; ?></h4>
                        <p><?php echo $option_fields["footer-help-bodytext"]; ?></p>
                        <?php
                        $footer_form = $option_fields['footer-form'];
                        set_wpcf7_array($footer_form);
                        echo $footer_form;
                        ?>

                    </div>
                </div>
            <?php } ?>
            <?php if($option_fields["footer-show-accesspackage"] ){
                wp_enqueue_script('elasticaccess');
                wp_enqueue_script('elasticaccess-front');
                wp_enqueue_style( 'elasticaccesscss');
                $hash = $option_fields["field_elasticaccess-hash"];
                $loadMoreType = $option_fields['accesspackage-load-type'];
                $loadObjectPage = $option_fields['accesspackage-object-page'];
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
                <div class="col-xs-12 col-sm-<?php echo $option_fields["footer-accesspackage-content-width"]; ?>">
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


<script src="<?php echo get_template_directory_uri(); ?>/minified/js/scripts.min.js?ver=7kqtHrlqADYGyFg3jKLj"></script>

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
