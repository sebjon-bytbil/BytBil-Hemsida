<?php

global $frontpageID;

if (function_exists('getSiteSettings')) {
    $settingspage = getSiteSettings();
} else {
    $settingspage->ID = null;
}
?>

<footer>
    <div class="container-fluid">

        <?php if (get_field('sitesetting-footer-content', $settingspage->ID)) :
            while (have_rows('sitesetting-footer-content', $settingspage->ID)) : the_row();

                $size = get_sub_field('sitesetting-footer-content-size');
                $type = get_sub_field('content-type');
                $title = get_sub_field('content-title');
                if (get_sub_field('content-slideshow')) {
                    $slideshow = get_sub_field('content-slideshow');
                }
                if (get_sub_field('content-facility-choice')) {
                    $facility = get_sub_field('content-facility-choice');
                }


                ?>

                <div class="col-xs-12 col-sm-<?php echo $size . ' ' . $type; ?>">
                    <?php if (get_sub_field('setting-hide-header') != true) { ?>
                        <h3><?php echo $title; ?></h3>
                    <?php }

                    if ($type == 'wysiwyg') {
                        echo get_sub_field('content-wysiwyg');
                    } elseif ($type == 'sitemap') {
                        wp_nav_menu(array(
                                'menu' => 'Huvudmeny',
                                'depth' => 1,
                                'container' => false,
                                'menu_class' => 'footer-menu')
                        );
                    } elseif ($type == 'links') {
                        $i = 1;

                        while (have_rows('sitesetting-footer-shortlinks', $settingspage->ID)) {
                            the_row();
                            $type = get_sub_field('sitesetting-footer-shortlink-type');
                            $icon = get_sub_field('sitesetting-footer-shortlink-icon');
                            $text = get_sub_field('sitesetting-footer-shortlink-text');
                            $target = get_sub_field('sitesetting-footer-shortlink-target');

                            $url = "#";
                            if ($type == 'phone') {
                                $url = 'tel:' . get_sub_field('sitesetting-footer-shortlink-phone');
                            } elseif ($type == 'external') {
                                $url = get_sub_field('sitesetting-footer-shortlink-url');
                            } elseif ($type == 'internal') {
                                $url = get_sub_field('sitesetting-footer-shortlink-page');
                            } elseif ($type == 'mail') {
                                $url = 'mailto:' . get_sub_field('sitesetting-footer-shortlink-email');
                            }

                            if (get_sub_field('sitesetting-footer-shortlink-apperence')) {
                                $bg_color = get_sub_field('sitesetting-footer-shortlink-bgcolor');
                                $bg_color_hover = get_sub_field('sitesetting-footer-shortlink-bgcolor-hover');
                                $text_color = get_sub_field('sitesetting-footer-shortlink-color');
                                $text_color_hover = get_sub_field('sitesetting-footer-shortlink-color-hover');
                            }
                            ?>

                            <a style="display:block" id="footer-link-<?php echo $i;?>" href="<?php echo $url; ?>"
                               class="top-menu-link"><i class="fa <?php echo $icon; ?>"></i> <?php echo $text; ?></a>
                            <style>
                                a#footer-link- <?php echo $i ?> {
                                    background: <?php echo $bg_color ?>;
                                    color: <?php echo $text_color ?>;
                                }

                                a#footer-link-<?php echo $i ?>:hover {
                                    background: <?php echo $bg_color_hover ?>;
                                    color: <?php echo $text_color_hover ?>;
                                }

                            </style>
                            <?php $i++;
                        }
                    } elseif ($type == 'facility') {
                        $facility_infos = get_sub_field('content-facility-information');
                        foreach ($facility_infos as $facility_info) {

                            if ($facility_info == 'all') {
                                bytbil_show_facility_all($facility->ID);
                                $init_map = true;
                            } elseif ($facility_info == 'address') {
                                bytbil_show_facility_address($facility->ID);
                            } elseif ($facility_info == 'other-address') {
                                bytbil_show_other_facility_address($facility->ID);
                            } elseif ($facility_info == 'phonenumber') {
                                bytbil_show_facility_phonenumbers($facility->ID);
                            } elseif ($facility_info == 'email') {
                                bytbil_show_facility_emails($facility->ID);
                            } elseif ($facility_info == 'contact') {
                                bytbil_show_facility_contact($facility->ID);
                            } elseif ($facility_info == 'openhours') {
                                bytbil_show_facility_openhours($facility->ID);
                            } elseif ($facility_info == 'map') {
                                bytbil_show_facility_map($facility->ID);
                                $init_map = true;
                            }

                        }
                    } elseif ($type == 'plugs') {
                        $plugs = get_sub_field('content-plugs');
                        foreach ($plugs as $plug) {
                            bytbil_show_plug($plug->ID, $size);
                        }
                    } elseif ($type == 'offers') {
                        $offer_choice = get_sub_field('content-offers-choice');
                        if ($offer_choice == 'specific') {
                            $offer = get_sub_field('content-offer-specific');
                            bytbil_show_offer($offer->ID, $size);
                        } elseif ($offer_choice == 'brand') {
                            $col_size = get_sub_field('content-offer-col-size');
                            $brand = get_sub_field('content-offer-brand');
                            bytbil_show_offers_brand($brand, $col_size);
                        } elseif ($offer_choice == 'facility') {
                            $col_size = get_sub_field('content-offer-col-size');
                            $facility = get_sub_field('content-offer-facility');
                            bytbil_show_offers_facility($facility, $col_size);
                        } elseif ($offer_choice == 'all') {
                            $col_size = get_sub_field('content-offer-col-size');
                            bytbil_show_offers_all($col_size);
                        }

                    } elseif ($type == 'contactform') {
                        the_sub_field('content-contact-form');
                    } elseif ($type == 'map') {
                        bytbil_show_map();
                        $init_map = true;
                    } elseif ($type == 'news') {
                        bytbil_show_news_feed();
                    }

                    ?>
                </div>

            <?php endwhile; endif;
        if ($init_map == true) {
            bytbil_init_facility_map();
        } ?>

        <div class="col-xs-12 pull-right">
            <span class="produced-by">Producerad av <a href="http://www.bytbil.com"
                                                       target="_blank">BytBil.com</a> för <a
                    href="http://www.bytbil.com" target="_blank">BytBil CMS</a></span>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri() . '/js/matchMedia.js'; ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/html5shiv.min.js'; ?>"></script>
<script src="/wp-content/themes/bytbil-classic/js/respond.min.js"></script>
<![endif]-->

<?php if (get_field('extra-code') && in_array('Javascript', get_field('extra-code'))) : ?>
    <?php the_field('extra-code-javascript'); ?>
<?php endif; ?>
<input type="hidden" name="assortment_path" value="<?php echo $GLOBALS['assortment_path']; ?>">
</body>
</html>