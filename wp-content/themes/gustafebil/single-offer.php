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
            <div class="offer-description block block-wrapper white">
                <?php $offer_image = get_field('offer-image'); ?>
                <img style="max-width: 100%;" src="<?php echo $offer_image['url']; ?>"/>

                <h1><?php the_title(); ?></h1>
                <?php echo get_field('offer-description'); ?>
                <div class="clear clearfix"></div>

                <div class="offer-links">
                    <?php while (have_rows('offer-links')) {
                        the_row();

                        $offer_type = get_sub_field('offer-link-type');

                        $target = get_sub_field("offer-link-target");

                        if ($offer_type == "internal"){
                            $offer_page = get_sub_field('offer-link-internal');
                            $offer_url = get_permalink($offer_page->ID);
                        }
                        elseif($offer_type == "external"){
                            $offer_url = get_sub_field('offer-link-url');
                        }
                        elseif($offer_type == "file"){
                            $offer_file = get_sub_field('offer-link-file');
                            $offer_url = $offer_file['url'];
                        }
                    ?>
                    <span class="offer-link button btn">
                        <a href="<?php echo $offer_url; ?>"
                           <?php if ($target == "lightbox") : ?> data-lightbox <?php elseif ($target != false) : ?> target="<?php echo $target; ?>" <?php endif; ?>
                           >
                            <?php echo get_sub_field('offer-link-text'); ?>
                        </a>
                    </span>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
get_footer();
?>
