<?php
get_header();
$id = get_the_ID();
$model_brand = wp_get_post_terms(get_the_ID(), 'brand');
$brand = $model_brand[0]->name;
$brand_slug = $model_brand[0]->slug;

include_once 'plugins/bytbil-content-management/layouts/share_form.php';

?>

<main id="post-<?php the_ID(); ?>" class="<?php echo $brand_slug ?>">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
        $todays_date = date('Ymd');
        $offer_start_date = get_field('offer-start-date', $id);
        $offer_stop_date = get_field('offer-stop-date', $id);
        if ($offer_start_date > $todays_date || $offer_stop_date < $todays_date) {
            include_once 'offer-not-active.php';
            break;
        } else {
            $rows = get_field('row');
            if ($rows) {
                get_offer_slider($id);
                get_offer_submenu($id, true);
                get_single_offer_content($id);
                bytbil_content_loop(true, false);
            } else {
                get_offer_slider($id);
                get_single_offer_content($id);
            }
        }
        ?>

    <?php endwhile; endif; ?>

</main>

<?php
get_footer();
?>
