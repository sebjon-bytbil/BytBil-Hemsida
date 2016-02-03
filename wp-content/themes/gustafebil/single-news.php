<?php
get_header();
$init_map = false;

?>

<section id="breadrumb">
    <div class="wrapper">
        <div class="breadcrumbs col-xs-12">
            <div id="breadcrumbs">
                <a href="<?php echo get_option('home'); ?>">Gustaf E Bil</a> <i class="fa fa-angle-right"></i> <a href="/om-gustaf-e-bil/">Om Gustaf E Bil</a> <i class="fa fa-angle-right"></i> <a href="/om-gustaf-e-bil/press-och-nyheter/">Press och nyheter</a> <i class="fa fa-angle-right"></i> <span class="current"><?php echo the_title(); ?></span>
            </div>
        </div>
    </div>
</section>

<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="wrapper">
        <div class="col-xs-12">


            <div class="block-wrapper white">
                <h1><?php the_title(); ?></h1>
                <?php echo the_content(); ?>
                <span class="date">Skrivet den: <?php echo get_the_date('Y-m-d'); ?></span>
            </div>

        </div>
    </div>

    <?php endwhile; endif; ?>
</main>

<?php
get_footer();
?>
