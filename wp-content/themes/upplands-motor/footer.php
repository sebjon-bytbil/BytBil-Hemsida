<footer>
    <section id="footer-blocks">
        <div class="container-fluid wrapper">
            <div class="col-xs-12 col-sm-9">
                <div class="search block white-bg">
                    <h4>Sök på upplandsmotor.se</h4>
                    <p>Använd vår smarta sökfunktion för att hitta sidor eller bilar du letar efter.</p>
                    <input type="text" name="footer-search" id="footer-search">
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="shortcuts block white-bg">
                    <h4>Genvägar</h4>
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
            <div class="col-xs-12 col-sm-6">
                <div class="openhours block white-bg">
                    <h4>Öppettider</h4>
                    <?php
                        $facility_args = array(
                            'posts_per_page'    => -1,
                            'offset'            => 0,
                            'category'          => '',
                            'category_name'     => '',
                            'orderby'           => 'post_date',
                            'order'             => 'ASC',
                            'include'           => '',
                            'exclude'           => '',
                            'meta_key'          => '',
                            'meta_value'        => '',
                            'post_type'         => 'facility',
                            'post_mime_type'    => '',
                            'post_parent'       => '',
                            'post_status'       => 'publish',
                            'suppress_filters'  => true,
                        );
                        $facilities = get_posts($facility_args);
                        get_facility_widget(get_the_ID(), $facilities, 6)
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="testimonials block white-bg">
                    <h4>Sagt om oss</h4>
                    <p>Vi älskar att höra vad vi gör bra och vad vi kan förbättra.</p>
                    <div class="testimonial-slider">
                        <?php get_testimonial_slider(); ?>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $(".testimonial-slider").owlCarousel({
                                navigation: true,
                                pagination: true,
                                items: 1,
                                itemsDesktop: [1199,1],
                                itemsDesktopSmall: [979,1],
                                itemsTablet: [768,1],
                                itemsMobile: [479, 1],
                                navigationText: ["<i class='icon icon-chevron-thin-left'></i>","<i class='icon icon-chevron-thin-right'></i>"]
                            });
                        });
                    </script>
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="contact-form block white-bg">
                    <h4>Behöver du hjälp?</h4>
                    <p>Skicka ett meddelande till oss så hjälper vi dig.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-navbar" class="scroll">
        <div class="container-fluid wrapper">
            <a class="footer-logotype" href="#">
                <img class="logotype"
                     src="<?php echo get_logotype('svg'); ?>"
                     onerror="this.onerror=null; this.src='<?php echo get_logotype('png'); ?>'"
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

<!-- On Load -->
<script src="/wp-content/themes/upplands-motor/js/custom.js"></script>
<script src="/wp-content/themes/upplands-motor/js/jquery-1.11.1.min.js"></script>
<script src="/wp-content/themes/upplands-motor/js/um.search.js"></script>

<!-- Bootstrap -->
<script src="/wp-content/themes/upplands-motor/js/bootstrap.min.js"></script>

<!-- Modernizer -->
<script src="/wp-content/themes/upplands-motor/js/modernizr.custom.js"></script>

<!-- Flexslider -->
<script src="/wp-content/themes/upplands-motor/js/jquery.flexslider-min.js"></script>
<script src="/wp-content/themes/upplands-motor/js/owl.carousel.js"></script>

<!-- Classie -->
<script src="/wp-content/themes/upplands-motor/js/extra/classie.js"></script>

<!-- jQueryUI -->
<script src="/wp-content/themes/upplands-motor/js/jquery-ui.min.js"></script>

<!-- Custom files -->
<script src="/wp-content/themes/upplands-motor/js/jasny-bootstrap.min.js"></script>
<script src="/wp-content/themes/upplands-motor/js/google-maps.js"></script>

<?php echo get_settings_code('js'); ?>

</body>

</html>
