<?php
    global $frontpageID;
    $dir = get_template_directory_uri();

    $menu = new wp_bootstrap_navwalker();

    $menu_string = wp_nav_menu(array(
            'menu' => 'Sidfot',
            'echo' => false,
            'depth' => 3,
            'container' => false,
            'walker' => $menu
        )
    );
?>

            <footer class="side-padding">
                <div class="wrapper wrapper-narrow">


                    <div class="footer-search">
                        <h2>Har du hittat det du letar efter?</h2>

                        <div class="side-padding">
                            Vi vill att det skall vara enkelt för dig att hitta den information du söker - om du inte gjort det på denna sida så testa vår sökfunktion för att
                            få förslag på innehåll som kan passa dig. Eller kontakta oss för mer information.<br><br>
                        </div>

                        <?php get_search_form(); ?>
                    </div>

                    <div class="footer-row footer-facilities">
                        <?php get_facilities_footer(); ?>
                    </div>

                    <div class="footer-row" id="footer-menu">
                        <?php echo preg_replace('/\n(.+?)(?=\n)/', " | $1", $menu_string); ?>
                    </div>

                    <img src="<?php echo $dir; ?>/images/sigill.png" id="bildeve-seal" />


                </div>
            </footer>

        </div>

        <?php wp_footer(); ?>

        <script>
            $(function() {
                $(".checkbox-wrap input[type=checkbox]").wrap("<div class='custom-checkbox'></div>").after("<span></span>");
            });
        </script>

    </body>
</html>