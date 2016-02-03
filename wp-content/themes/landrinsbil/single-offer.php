<?php

get_header();

?>

 <div id="breadcrumbs-wrapper" class="wrap">
    <div class="wrap-inner">
        <div class="breadcrumbs">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
 </div>

<div id="middle" class="wrap">

    <div class="wrap-inner <?php echo !is_page($frontpageID) ? " content padding" : "margin"; ?>">

        <div class="row">

            <div class="col-md-12 col-sm-12" id="page-content">

                <?php
                $start_date = get_field('offer-date-start', $id);
                $stop_date = get_field('offer-date-stop', $id);
                $show_offer = bytbil_check_offer_date($start_date, $stop_date);
                if($show_offer == true) {
                    bytbil_show_offer($id, 12);
                } else {
                ?>
                    <h1>Tyvärr!</h1>
                    Detta erbjudande har gått ut.
                <?php } ?>

            </div>

        </div>
    </div>

</div>

<?php get_footer(); ?>