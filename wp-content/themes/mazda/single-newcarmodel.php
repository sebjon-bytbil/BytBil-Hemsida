<?php
get_header();

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
                <?php
                $image = get_field('newcarmodel-image');
                $year = get_field('newcarmodell-year');
                $miles = get_field('newcarmodell-miles');
                $price = get_field('newcarmodell-price');
                ?>
                <img style="max-width: 100%;" src="<?php echo $image; ?>"/>
                <h1><?php the_title(); ?></h1>
                <div>
                    <p><?php echo $year; ?></p>
                    <p><?php echo $miles; ?> mil</p>
                    <p><?php echo $price; ?> kr</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>


