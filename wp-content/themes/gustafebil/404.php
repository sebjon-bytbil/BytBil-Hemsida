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
            <div class="block-wrapper">

                <?php echo get_field('settings-404-message', 'options'); ?>
                <?php get_search_form(); ?>

            </div>
        </div>
    </div>
</main>

<?php
    get_footer();
?>
