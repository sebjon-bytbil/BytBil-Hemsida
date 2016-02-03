<?php get_header(); ?>

<main>
    <section id="content">
        <div class="wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php block_loop(); ?>
        <?php endwhile; endif; ?>
        </div>
    </section>
    <section id="welcome" class="darkgray">
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-2 hidden-hx hidden-sm">
                <img class="logotype" src="<?php echo get_retailer_logotype('url'); ?>" alt="<?php get_retailer_logotype('alt'); ?>" title="<?php echo get_retailer_logotype('title'); ?>">
            </div>
            <div class="col-xs-12 col-sm-5 col-md-4">
                <h2>Mazda hos <?php echo get_retailer_name(); ?></h2>
                <p><?php echo get_retailer_about(); ?></p>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-6">
                <?php get_retailer_front_plugs(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

