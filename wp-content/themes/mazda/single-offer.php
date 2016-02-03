<?php
get_header();
$init_map = false;

?>

<section id="breadrumb">
    <div class="wrapper">
        <div class="breadcrumbs col-xs-12">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
</section>

<main>
    <div class="wrapper">
        <div class="col-xs-12">
            <div class="offer-description block white">
                <?php $offer_image = get_field('offer-image'); ?>
                <img style="max-width: 100%;" src="<?php echo $offer_image['url']; ?>"/>

                <h1><?php the_title(); ?></h1>
                <?php echo get_field('offer-description'); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
