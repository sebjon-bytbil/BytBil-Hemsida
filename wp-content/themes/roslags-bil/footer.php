<?php
$dir = get_template_directory_uri();
?>

<div id="banners">
    <div class="wrapper">
        <div class="container-fluid">

            <?php
            if (have_rows('banner', 8)):
                while (have_rows('banner', 8)): the_row(); ?>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="banner">
                            <a href="<?php the_sub_field('banner-link'); ?>" target="_blank">
                                <img src="<?php the_sub_field('banner-image'); ?>"/>
                            </a>
                        </div>
                    </div>

                <?php endwhile;
            else :
            endif;
            ?>

            <div class="clear"></div>
        </div>
        <a href="#" id="toTop">Upp <span class="glyphicon glyphicon-arrow-up"></span></a>
    </div>
</div>

<div id="footer">
    <div class="wrapper">
        <div class="container-fluid">
            <?php

            // check if the repeater field has rows of data
            if (have_rows('contactinformation', 8)):

                // loop through the rows of data
                while (have_rows('contactinformation', 8)): the_row(); ?>
                    <div class="col-md-3 col-sm-3 hidden-xs">
                        &copy; <?php bloginfo('name') ?> <?php echo date('Y'); ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 right">
                        <span class="contactinfo telephone"><a
                                href="tel:<?php the_sub_field('contactinfo-telephone'); ?>"><?php the_sub_field('contactinfo-telephone'); ?></a></span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 right">
                        <span class="contactinfo email"><a
                                href="mailto:<?php the_sub_field('contactinfo-email'); ?>"><?php the_sub_field('contactinfo-epost-text'); ?></a></span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 right">
                        <span class="contactinfo facebook"><a href="<?php the_sub_field('contactinfo-facebook'); ?>"
                                                              target="_blank"><?php bloginfo('name') ?></a></span>
                    </div>
                    <div class="hidden-lg hidden-xl hidden-md hidden-sm col-xs-12 center">
                        &copy; <?php bloginfo('name') ?> <?php echo date('Y'); ?>
                    </div>
                <?php endwhile;

            else :

                // no rows found

            endif;

            ?>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>
