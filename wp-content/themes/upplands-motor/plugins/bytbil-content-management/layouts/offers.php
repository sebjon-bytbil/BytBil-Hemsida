<?php
    $offer_choice = get_sub_field('content-offers-choice');
    $offers_paging = get_sub_field('content-offer-amount');
    $offers_row = get_sub_field('content-offer-row');
    $offers_id = get_the_ID() . '-' . $row_counter . '-' . $content_count;

    if($offer_choice == 'specific') {
        $offers = get_sub_field('content-offers-specific');
    } else {
        $offers_brands = get_sub_field('content-offer-brands');
        $offers_cities = get_sub_field('content-offer-facility');
        $offers_types = get_sub_field('content-offer-type');
        $offer_args = get_offer_args($page_id, $offers_brands, $offers_cities, $offers_types);
        $offers = get_posts($offer_args);
    }

    if($offers_row == 2){
        $offer_size = 6;
    }
    elseif($offers_row == 3){
        $offer_size = 4;
    }
    elseif($offers_row == 4){
        $offer_size = 3;
    }

    ?>
    <div class="row">
        <div id="offer-carousel-<?php echo $offers_id; ?>" class="offer-gallery-container" data-col-size="<?php echo $offer_size; ?>">

                <?php

                foreach($offers as $offer) {
                    $id = $offer->ID;
                    show_offer_gallery($id, $offer_size);
                }

                ?>

        </div>
    </div>
    <script>
        $ = jQuery;

        var screen_width = window.innerWidth;
        var screen_height = window.innerHeight;

        // X-Small Devices
        if (screen_width < 768) {
            var paging = 1;
        }
        else if (screen_width > 768 && screen_width < 992) {
            var paging = 2;
        }
        else {
            var paging = <?php echo $offers_paging; ?>;
        }
        /*
        else if (screen_width > 998 && screen_width < 1199) {
        }

        else {
        }
        */

        var divs = $("#offer-carousel-<?php echo $offers_id; ?> > div");

        //Antal Bilder Per Slide
        for(var i = 0; i < divs.length; i+=paging) {
            divs.slice(i, i+paging).wrapAll("<div class='item'></div>");
        }


        $(document).ready(function () {
            $("#offer-carousel-<?php echo $offers_id; ?>").owlCarousel({
                navigation: true,
                pagination: true,
                items: 1,
                itemsDesktop: [1199,1],
                itemsDesktopSmall: [979,1],
                itemsTablet: [768,1],
                itemsMobile: [479, 1],
                navigationText: ["<i class='icon icon-chevron-thin-left'></i>","<i class='icon icon-chevron-thin-right'></i>"]
            });
        });

    </script>
<?php

?>
