<?php
get_header();
$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
?>

<?php bytbil_init_slideshows(); ?>

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

            </div>
            <div class="col-xs-12 col-sm-12">

                <h1>Sidan du försökte nå kunde inte hittas.</h1>

                <p>Vi ber om ursäkt, men den kanske har flyttats eller tagits bort.</p>

                <p><a href="<?php bloginfo('url'); ?>">Klicka här för att gå vidare till startsidan</a> eller <a
                        href="<?php bloginfo('url'); ?>/besok-biva/anlaggningar">här för att hitta kontaktuppgifter till
                        våra anläggningar</a>.</p>

            </div>
        </div>
    </div>
</div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
