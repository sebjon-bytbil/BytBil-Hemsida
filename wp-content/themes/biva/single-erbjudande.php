<?php

get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
$postType = get_post_meta($post->ID, 'erbjudande-type', true);
$type = $_GET["type"];
$city = $_GET["city"];
?>
<div id="backdrop" <?php if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
} ?>>
    <h1><?php the_title(); ?></h1>
</div>

<div id="content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                <div class="contentcontainer2"></div>

            </div>
            <div class="hidden-xs col-sm-3 col-first">

                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'start_in' => $ID_of_page,
                    'container-class' => 'main-nav',
                    'menu_class' => 'nav submenu',
                );

                wp_nav_menu($args);
                ?>

                <ul class="nav submenu">
                    <li <?php if ($postType == 'car') {
                        echo 'class="current"';
                    } ?>>
                        <a href="../../erbjudanden/personbilar/">Bilkampanjer</a></li>
                    <li <?php if ($postType == 'carrier') {
                        echo 'class="current"';
                    } ?>>
                        <a href="../../erbjudanden/transportbilar/">Transportbilar</a></li>
                    <li <?php if ($postType == 'misc') {
                        echo 'class="current"';
                    } ?>>
                        <a href="../../erbjudanden/ovriga-erbjudanden/">Övriga erbjudanden</a></li>
                </ul>

            </div>

            <div class="col-xs-12 col-sm-9 offer">


                <?php

                if (have_posts()) : while (have_posts()) : the_post();
                    ?>

                    <div class="offer-container offertype-<?php echo $postType;
                    $attatchment = get_post_field('erbjudande-attatchment') ?>">
                        <img src="<?php the_field('erbjudande-image'); ?>"/>

                        <h2><?php the_title(); ?></h2>
                        <?php the_field('erbjudande-desc-wysiwyg'); ?>

                        <div class="linkbuttons">
                            <?php if (!empty($attatchment)) { ?>
                                <a class="button" href="<?php the_field('erbjudande-attatchment') ?>" target="_blank"
                                   class="button">Se PDF-annons <i class="fa fa-angle-right"></i></a>
                            <?php } ?>

                            <?php if (have_rows('linkbutton')): ?>
                                <?php while (have_rows('linkbutton')): the_row(); ?>
                                    <a class="button" href="<?php the_sub_field('linkbutton-url'); ?>"
                                       target="<?php the_sub_field('linkbutton-target'); ?>"><?php the_sub_field('linkbutton-text'); ?>
                                        <i class="fa fa-angle-right"></i></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endwhile; endif;

                ?>

            </div>
        </div>
    </div>
</div>

<div id="bottom-plugs">
    <div class="wrapper">
        <div class="container-fluid offer">                    <!-- Vi erbjuder dig -->
            <!--<h3><span class="glyphicon glyphicon-play orange"></span> Vi erbjuder dig:</h3>-->
            <div class="col-xs-12 col-md-6 column-double">
                <?php echo do_shortcode('[slider name=Erbjudanden]'); ?>
            </div>

            <?php
            if (have_rows('puff', 49)):
                while (have_rows('puff', 49)): the_row(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 column">
                        <a href="<?php the_sub_field('puff-link'); ?>"
                           class="offer-text <?php the_sub_field('puff-colour'); ?>">
                            <h4><?php the_sub_field('puff-header'); ?></h4>
                            <img src="<?php the_sub_field('puff-image'); ?>"/>

                            <p><?php the_sub_field('puff-message'); ?></p>
                            <button><?php the_sub_field('puff-linklabel'); ?>&nbsp;&nbsp;<i
                                    class="fa fa-angle-right"></i></button>
                        </a>
                    </div>
                <?php endwhile;
            else :
            endif;
            ?>
        </div>
    </div>
</div>

<div id="brands" class="hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php
                if (have_rows('brands', 49)):
                    while (have_rows('brands', 49)): the_row(); ?>
                        <a href="<?php the_sub_field('brand-link'); ?>"
                           title="Besök <?php the_sub_field('brand-name'); ?>s hemsida" target="_blank">
                            <img src="<?php the_sub_field('brand-logotype'); ?>"
                                 alt="Besök <?php the_sub_field('brand-name'); ?>s hemsida">
                        </a>
                    <?php endwhile;
                else :
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $("ul.nav li#menu-item-164").addClass('current-menu-item');
</script>

<?php get_footer(); ?>
