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
            <div class="block-wrapper white">

                <?php if (have_posts()): ?>

                    <ol>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php

                            $temp = esc_url(get_permalink());
                            $ignored_post_types = array(
                                'sitesettings',
                                'plug',
                                /*'employee',*/
                                /*'facility',*/
                                /*'brand',*/
                                'assortment',
                                'employee_list',
                                'post',
                            );

                            

                            if (!in_array($post->post_type, $ignored_post_types)) { ?>
                        
                                

                                <li>

                                    <?php

                                    /*if (preg_match("/employee/", $temp)) {
                                        $permalink = get_site_url() . '/kontakt/';
                                        if (preg_match("/avesta/", $temp)) {
                                            $permalink .= 'avesta/';
                                        } else if (preg_match("/bilgard/", $temp)) {
                                            $permalink .= 'bilgard/';
                                        } else if (preg_match("/eskilstuna/", $temp)) {
                                            $permalink .= 'eskilstuna/';
                                        } else if (preg_match("/vasteras-halla/", $temp)) {
                                            $permalink .= 'vasteras-halla/';
                                        } else if (preg_match("/vasteras-hasslo/", $temp)) {
                                            $permalink .= 'vasteras-hasslo/';
                                        }
                                    } else {
                                        $permalink = esc_url(get_permalink());
                                    }*/

                                    $permalink = esc_url(get_permalink());

                                    ?>

                                    

                                    <?php

                                    $query = get_search_query();
                                    $fields = get_fields($post->ID);
                                    
                                
                                

                                    if ($fields) {

                                        $search_title = get_the_title($value->ID);
                                        $search_result = '';

                                        foreach ($fields as $field_name => $value) {
                                            
                                            //echo "<strong>[" . $field_name . "]</strong><br>";

                                            if ($field_name == 'contents') {
                                                $contents = $value[0]['content-wysiwyg'];

                                                if ($contents != "") {
                                                    $wysiwyg_excerpt = utf8_decode(strip_tags($contents));
                                                    $wysiwyg_excerpt = substr($wysiwyg_excerpt, stripos($wysiwyg_excerpt, $query), 130);
                                                    $wysiwyg_excerpt = utf8_encode($wysiwyg_excerpt);
                                                    $search_result = "..." . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $wysiwyg_excerpt) . "...";
                                                    $search_title = get_the_title();
                                                }
                                            }
                                            
                                            if($field_name == 'brand-plugs'){
                                                $facility_page = get_field('brand_link', $value->ID);
                                                $brand_repeater = get_field('brand-plugs', $value->ID);
                                                $facility_name = get_the_title($value->ID);
                                                $permalink = $facility_page;
                                                $offer_excerpt = utf8_decode(strip_tags($facility_description));
                                                $offer_excerpt = substr($offer_excerpt, 0);
                                                $offer_excerpt = utf8_encode($offer_excerpt);
                                                $search_result = "..." . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $offer_excerpt) . "...";
                                                $search_title = $facility_name;
                                            }
                                            
                                            if($field_name == 'employee-facility' || $field_name == 'facility-description'){
                                                if($field_name=='employee-facility'){
                                                    $facility_description = get_the_title();
                                                    $facility_name = get_the_title($value->ID);
                                                    $search_title = $facility_name;
                                                } else {
                                                    $facility_description = get_field('facility-description', $value->ID);
                                                    $search_title = get_the_title();
                                                }
                                                $facility_page = get_field('facility-page-link', $value->ID);
                                                $permalink = $facility_page;
                                                $offer_excerpt = utf8_decode(strip_tags($facility_description));
                                                $offer_excerpt = substr($offer_excerpt, 0);
                                                $offer_excerpt = utf8_encode($offer_excerpt);
                                                $search_result = "..." . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $offer_excerpt) . "...";
                                            }                                           
                                            

                                            if ($field_name == 'offer-subheader') {
                                                $contents = $value;

                                                if ($contents != "") {
                                                    $offer_excerpt = utf8_decode(strip_tags($contents));
                                                    $offer_excerpt = substr($offer_excerpt, 0);
                                                    $offer_excerpt = utf8_encode($offer_excerpt);
                                                    $search_result = "..." . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $offer_excerpt) . "...";
                                                    $search_title = get_the_title();
                                                }
                                            }

                                            if ($field_name == 'offer-description') {
                                                $contents = $value;

                                                if ($contents != "") {
                                                    $offer_excerpt = utf8_decode(strip_tags($contents));
                                                    $offer_excerpt = substr($offer_excerpt, stripos($offer_excerpt, $query), 140);
                                                    $offer_excerpt = utf8_encode($offer_excerpt);
                                                    $search_result = "..." . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $offer_excerpt) . "...";
                                                    $search_title = get_the_title();
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <h4><a href="<?php echo $permalink; ?>" title="" rel="bookmark"><?php echo $search_title; ?></a></h4>
                                    <?php echo $search_result; ?>
                                </li>
                            <?php } ?>

                        <?php endwhile; ?>
                    </ol>

                <?php else: ?>

                    Hittade inga resultat för "<?php echo get_search_query(); ?>".

                <?php endif; ?>

            </div>
        </div>
    </div>
</main>


<?php
get_footer();
?>
