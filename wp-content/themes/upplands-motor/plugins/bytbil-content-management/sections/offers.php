<?php
    $offers_brands = $content['content-offer-brands'];
    $offers_faclility = $content['content-offer-facility'];
    $offers_type = $content['content-offer-type'];
    $offers_row = $content['content-offer-row'];
    $offers_paging = $content['content-offer-amount'];
    $offers_tabs = $content['content-offer-tabs'];
    $offers_id = $content['id'] . '-' . $row_counter;
    $offers_brands_keys = $offers_brands;
    foreach ($offers_brands_keys as $key => $var) {
        $offers_brands_keys[$key] = (int)$var;
    }

    //$offers_brands_tag = array_map(explode(',', $offers_brands));


    $offer_args = array(
        'posts_per_page'    => -1,
        'offset'            => 0,
        'category'          => '',
        'category_name'     => '',
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'include'           => '',
        'exclude'           => '',
        'meta_key'          => '',
        'meta_value'        => '',
        'post_type'         => 'offer',
        'post_mime_type'    => '',
        'post_parent'       => '',
        'post_status'       => 'publish',
        'suppress_filters'  => true,
        'tax_query' => array(
            array(
                'taxonomy' => 'brand',
                'field' => 'id',
                'terms' => $offers_brands_keys,
            ),
        ),

    );

    $offers = get_posts($offer_args);

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

        var divs = $("#offer-carousel-<?php echo $offers_id; ?> > div");

        //Antal Bilder Per Slide
        for(var i = 0; i < divs.length; i+=<?php echo $offers_paging; ?>) {
            divs.slice(i, i+<?php echo $offers_paging; ?>).wrapAll("<div class='item'></div>");
        }


        $(document).ready(function () {
            $("#offer-carousel-<?php echo $offers_id; ?>").owlCarousel({
                navigation: true,
                pagination: true,
                items: 1,
                navigationText: ["<i class='icon icon-chevron-thin-left'></i>","<i class='icon icon-chevron-thin-right'></i>"]
            });
        });

    </script>
<?php

?>
