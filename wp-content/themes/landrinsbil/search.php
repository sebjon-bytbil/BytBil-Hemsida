<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <div id="middle" class="wrap">

        <div class="wrap-inner margin content padding">

            <div class="row">

                <div class="col-md-12 col-sm-12" id="page-content">

                    <h1>Sökresultat för "<?php echo get_search_query(); ?>"</h1>

                    <hr style="margin-bottom: 30px;"/>

                    <?php if (have_posts()): ?>

                        <ol>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php

                                $temp = esc_url(get_permalink());
                                $ignored_post_types = array('sitesettings','plug','employee','facility','brand');

                                if (!in_array($post->post_type, $ignored_post_types)) { ?>
                                    <li>
                                        <?php

                                        if (preg_match("/employee/", $temp)) {
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
                                        }
                                        ?>

                                            <h4><a href="<?php echo $permalink; ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                                            <?php
                                                $query = get_search_query();

                                                $fields = get_fields($post->ID);

                                                if($fields)
                                                {
                                                    foreach( $fields as $field_name => $value )
                                                    {
                                                        if($field_name == 'contents') {
                                                            $contents = $value[0]['content-wysiwyg'];

                                                            if($contents != "") {
                                                                $wysiwyg_excerpt = utf8_decode(strip_tags($contents));
                                                                $wysiwyg_excerpt = substr($wysiwyg_excerpt, stripos($wysiwyg_excerpt, $query), 130);
                                                                $wysiwyg_excerpt = utf8_encode($wysiwyg_excerpt);
                                                                echo "..." . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $wysiwyg_excerpt) . "...";
                                                            }
                                                        }

                                                        if($field_name == 'offer-subheader') {
                                                            $contents = $value;

                                                            if($contents != "") {
                                                                $offer_excerpt = utf8_decode(strip_tags($contents));
                                                                $offer_excerpt = substr($offer_excerpt, 0);
                                                                $offer_excerpt = utf8_encode($offer_excerpt);
                                                                echo "<strong>" . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $offer_excerpt) . "</strong><br />";
                                                            }
                                                        }

                                                        if($field_name == 'offer-description') {
                                                            $contents = $value;

                                                            if($contents != "") {
                                                                $offer_excerpt = utf8_decode(strip_tags($contents));
                                                                $offer_excerpt = substr($offer_excerpt, stripos($offer_excerpt, $query), 140);
                                                                $offer_excerpt = utf8_encode($offer_excerpt);
                                                                echo "..." . preg_replace("/$query/i", "<span class='search-term'>$0</span>", $offer_excerpt) . "...";
                                                            }
                                                        }
                                                    }
                                                }
                                            ?>
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
    </div>

<?php
get_footer();