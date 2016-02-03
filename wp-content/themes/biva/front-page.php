<?php /*
Template Name: Biva Startsida
*/
get_header();
$dir = get_template_directory_uri();?>
<?php

?>
<div id="backdrop" <?php
if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
}
?>>
    <div class="wrapper">
        <div class="slider">
            <?php $slideshow = get_field('bildspel'); bytbil_init_slideshows(); bytbil_show_slideshow(42/*$slideshow->ID*/); ?>
        </div>
    </div>
</div>

<?php
$lightbox = get_field('activate-lightbox', 36);
$lightbox_page = get_field('selected-lightbox', 36);
?>

<div id="brands" class="hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">

            <div class="col-xs-12 brands">
                <?php
                    $args = array(
                        'post_type' => 'brand',
                        'posts_per_page' => -1,
                        'caller_get_posts'=> 1,
                        'orderby' => 'title',
                        'order' => 'asc',
                    );

                    $my_query = new WP_Query($args);

                    $posts_count = $my_query->found_posts;

                    if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post();

                            $brand_title = get_the_title();

                            if($brand_title != "Saab") {
                                ?>

                                <a href="<?php the_field('brand_link'); ?>" style="width: <?php echo 100 / ($posts_count-1); ?>%"
                                   title="Besök <?php the_field('brand_name'); ?>s hemsida" target="_blank">

                                    <?php
                                        $brand_image_url = get_field('brand_image');
                                        $brand_image_alt_url = get_field('brand_image_alternative');
                                        if($brand_image_alt_url != "") {
                                            $brand_image_url = get_field('brand_image_alternative');
                                        }
                                    ?>
                                    <img src="<?php echo $brand_image_url; ?>" alt="Besök <?php the_field('brand_name'); ?>s hemsida">
                                </a>
                                <?php
                            }
                        endwhile;
                    }
                ?>
            </div>

        </div>
    </div>
</div>
<div style="clear: both;"></div>
<div id="content">
    <div class="wrapper">
        <div class="container-fluid offer" style="margin-bottom: 20px;">                    <!-- Vi erbjuder dig -->
            <h3 class="underlined hidden-xs"><i class="fa fa-caret-right orange"></i> Vi erbjuder dig:</h3>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 column-double right hidden-xs">
                    <?php bytbil_show_slideshow(5244); ?>
                </div>

                <?php
                    $frontpage_plugs = get_field('page_plugs', 36);

                    while (has_sub_fields('page_plugs', 36)) :
                        $plug = get_sub_field('plug-selected');
                        $plug_id = $plug->ID;

                        $only_mobile = get_sub_field('plug-mobile-only');
                        if($only_mobile != 1) {
                            bytbil_show_plug($plug_id, 6);
                        }
                        else {
                            echo "<div class='visible-xs'>";
                            bytbil_show_plug($plug_id, 6);
                            echo "</div>";
                        }
                    endwhile;
                ?>
            </div>

        </div>
        <div class="container-fluid tips">                    <!-- Tips från Hallen (Accesspaket)  -->
            <h3 class="underlined"><i class="fa fa-caret-right orange"></i> Tips direkt från bilhallen:</h3>

            <script type="text/javascript"
                    src="http://access.bytbil.com/sprint6/access/content/getcontent/1/access.iframe.host.js"></script>

            <iframe id="accessFrame"></iframe>
        </div>

        <script>

            $(function () {
                var iframe = $('#accessFrame');
                var iframeLoad = new Access.Iframe.Load({
                    packageName: "biva2014",
                    assortment: "AEDDUDIAAYAOeQABiYJKm6MLk6MTS2Mg!",
                    actionName: "Startsida",
                    parentUrl: window.location,
                    idName: 'carID'
                });
                iframeLoad.load(iframe);
            });

        </script>


    </div>
</div>
</div>
<div id="quicklinks">
    <div class="wrapper">
        <div class="container-fluid">        <!-- Butiker Quicklinks -->
            <h3 class="header visible-xs">Våra anläggningar</h3>
            <ul class="quick-links-list">
                <?php
                $args = array('post_type' => 'facility');
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    $title = get_the_title();
                    $title = str_replace("Biva ", "", $title);
                    $city = strtolower($title);
                    $vowels = array("Å", "Ä", "Ö", "å", "ä", "ö");
                    $change = array("a", "a", "o", "a", "a", "o");
                    $city = str_replace($vowels, $change, $city);
                    ?>
                    <li>
                        <a href="./besok-biva/anlaggningar/biva-<?php echo $city; ?>"><?php echo $title ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>
<?php require_once('google-maps.php'); ?>
<div id="bottom-plugs">
    <div class="wrapper">
        <div class="row">        <!-- Om / Nyheter / Kontakt Puffar -->
            <!--<div class="col-xs-12 col-sm-6 col-md-3 column col-first">
						<div class="header">
							<h4>Om biva</h4>
						</div>
						<div class="text">
							<?php
            if (have_rows('about', 49)):
                while (have_rows('about', 49)): the_row(); ?>
										<p><?php the_sub_field('about-description'); ?></p>
			                            <a class="button" href="<?php the_sub_field('about-link'); ?>">Läs mer här&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>
										<?php endwhile;
            else :
            endif;
            ?>
						</div>
					</div>-->
            <div class="col-xs-12 col-sm-6 col-md-6 column">
                <div class="header">
                    <h4>Nyheter</h4>
                </div>
                <div class="text">

                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    query_posts(array('posts_per_page' => 3, 'post_type' => 'news', 'paged' => $paged));

                    if (have_posts()):
                        while (have_posts()): the_post(); ?>
                            <a class="news-link" href="<?php the_permalink(); ?>">
                                <article class="news-wrapper">
                                    <?php
                                    $image = get_field('news-thumbnail');
                                    echo '<img src="' . $image['url'] . '" style="width: 17%; float: left; margin-right: 10px;" />';
                                    ?>
                                    <span class="news-header"><?php the_title(); ?></span>
                                    <span class="news-date"><?php the_time('Y-m-d') ?></span>
                                    <?php add_filter('excerpt_length', 'custom_excerpt_length', 999);
                                    the_excerpt(); ?></p>
                                    <div style="clear: both;"></div>
                                </article>
                            </a>
                        <?php endwhile; ?>

                    <?php else : ?>
                    <?php endif;
                    wp_reset_query(); ?>

                    <a href="<?php echo home_url('/'); ?>besok-biva/nyheter" class="button">Läs alla nyheter &nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 column">
                <div class="header">
                    <h4>Kontakta oss</h4>
                </div>
                <div class="contact-form">

                    <?php echo do_shortcode('[contact-form-7 id="34"]'); ?>

                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
</div>
</div>

<?php

$popup = $_GET["no-popup"];

if($lightbox == true) {
?>

    <a class="colorbox-trigger" href="lightbox/<?php echo $lightbox_page->post_name; ?>"></a>

    <script>

        $(document).ready(function (e) {
            $(".colorbox-trigger").colorbox({iframe: true, width: "980px", height: "600px", opacity: "0.8"});

             var width = $(window).width();

             if(width >= 768){
             $(".colorbox-trigger").click();
             }
             if(width <= 767){
             window.open("lightbox/<?php echo $lightbox_page->post_name; ?>","_self")
             }

        });

    </script>

<?php }

?>



<?php get_footer(); ?>
