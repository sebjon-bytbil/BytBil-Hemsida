<footer>
    <section class="white-bg default-padding">
        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <ul class="footer-list">
                                <li class="footer-header">Bilar</li>
                                <li><a href="#">Nya personbilar</a></li>
                                <li><a href="#">Begagnade personbilar</a></li>
                                <li><a href="#">Volvo i lager</a></li>
                                <li><a href="#">Renault i lager</a></li>
                                <li><a href="#">Dacia i lager</a></li>
                                <li><a href="#">Transportbilar i lager</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <ul class="footer-list">
                                <li class="footer-header">Tjänster</li>
                                <li><a href="#">Service och verkstad</a></li>
                                <li><a href="#">Boka service online</a></li>
                                <li><a href="#">Däck och däckskifte</a></li>
                                <li><a href="#">Reservdelar</a></li>
                                <li><a href="#">Hyrbil med Hertz</a></li>
                                <li><a href="#">Finansiering</a></li>
                                <li><a href="#">Boka provköring</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <ul class="footer-list">
                                <li class="footer-header">Erbjudanden</li>
                                <li><a href="#">Volvo erbjudanden</a></li>
                                <li><a href="#">Renault erbjudanden</a></li>
                                <li><a href="#">Dacia erbjudanden</a></li>
                                <li><a href="#">Transportbilserbjudanden</a></li>
                                <li><a href="#">Butikserbjudanden</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <ul class="footer-list">
                                <li class="footer-header">Kontakt</li>
                                <li><a href="#">Bra Bil Upplands Väsby</a></li>
                                <li><a href="#">Bra Bil Kungsängen</a></li>
                                <li><a href="#">Bra Bil Vallentuna</a></li>
                                <li><a href="#">Stigs Center Göteborg</a></li>
                                <li><a href="#">Bra Bil Bålsta</a></li>
                                <li><a href="#">Bra Bil Enköping</a></li>
                                <li><a href="#">Vår personal</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <span class="footer-header">Sök på brabil.se</span>
                    <?php echo get_field('search-box','options'); ?>
                    <?php get_search_form(); ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <span class="footer-header">Följ oss i sociala medier</span>
                    <?php echo get_field('social-media-box','options'); ?>
                    <ul class="footer-social-list">
                        <li><a href="#"><i class="ion ion-social-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="ion ion-social-instagram-outline"></i> Instagram</a></li>
                        <li><a href="#"><i class="ion ion-social-youtube-outline"></i> YouTube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="blue-bg small-padding">
        <div class="container-fluid wrapper align-center">
            <div class="col-xs-12">
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'footer-menu',
                        'theme_location'    => 'footer-menu',
                        'depth'             => 3,
                        'container'         => 'div',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'nav footer-nav'
                        )
                    );
                ?>                
                <!--<p>
                    <a href="#">Om oss</a> &nbsp;&nbsp;
                    <a href="#">Cookies</a> &nbsp;&nbsp;
                    <a href="#">Kontakta oss</a> &nbsp;&nbsp;
                    <a href="#">Nyhetsbrev</a> &nbsp;&nbsp;
                    <a href="#">Press och arkiv</a> &nbsp;&nbsp;
                    <a href="#">Lämna synpunkter</a> &nbsp;&nbsp;
                </p>
                -->
            </div>
        </div>
    </section>

</footer>

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/public/js/scripts.min.js"></script>

</body>

</html>