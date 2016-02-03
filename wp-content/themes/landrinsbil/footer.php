<?php

global $frontpageID;

if (function_exists('getSiteSettings')) {
    $settingspage = getSiteSettings();
} else {
    $settingspage->ID = null;
}
?>

<div class="wrap-inner">
    <div id="footer">
        <?php /* Initiera menyn för sidfoten */
        $footer_menu = new wp_bootstrap_navwalker();

        $footer_menu_string = wp_nav_menu(array(
                'menu' => 'Sidfot',
                'echo' => false,
                'depth' => 1,
                'container' => false,
                'menu_class' => 'footer-menu',
                'walker' => $footer_menu
            )
        );

        echo $footer_menu_string;
        ?>
    </div>
</div>

<button id="btn-totop"><span class="fa fa-chevron-circle-up"></span></button>

<?php wp_footer(); ?>
<input type="hidden" name="assortment_path" value="<?php echo $GLOBALS['assortment_path']; ?>">
</body>
</html>