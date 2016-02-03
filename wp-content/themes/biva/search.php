<?php
get_header();
$dir = get_template_directory_uri();
?>

<script type="text/javascript">
    jQuery.fn.extend({
        highlight: function (search, insensitive, highlight_class) {
            var regex = new RegExp("(<[^>]*>)|(\\b" + search.replace(/([-.*+?^${}()|[\]\/\\])/g, "\\$1") + ")", insensitive ? "ig" : "g");
            return this.html(this.html().replace(regex, function (a, b, c) {
                return (a.charAt(0) == "<") ? a : "<span class=\"" + highlight_class + "\">" + c + "</span>";
            }));
        }
    });
    jQuery(document).ready(function ($) {
        if (typeof(highlight_query) != 'undefined') {
            $(".highlight-word").highlight(highlight_query, 1, "highlight");
        }
    });
</script>

<?php $topImage = get_post_meta($post->ID, 'top-image', true); ?>
<div id="backdrop">
    <h1>
        <?php /* Search Count */
        global $wp_query;
        $count = $wp_query->found_posts;
        echo $count;
        ?>
        sökresultat för "<?php echo get_search_query(); ?>"
    </h1>
</div>

<div id="content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
        </div>
        <div class="container-fluid highlight-word">
            <div class="col-xs-12">
                <?php if (have_posts()): ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-xs-12 divider">

                            <?php
                            $temp = esc_url(get_permalink());
                            if (preg_match("/personal/", $temp)) {
                                $permalink = get_site_url() . '/besok-biva/personal/';
                            } else {
                                $permalink = esc_url(get_permalink());

                            }
                            ?>
                            <a href="<?php echo $permalink; ?>" title="<?php the_title(); ?>" rel="bookmark">
                                <h2><?php the_title(); ?></h2>
                                <!--<?php the_content(); ?>-->
                                <?php the_excerpt(); ?>
                            </a>
                        </div>

                    <?php endwhile; ?>

                <?php else: ?>

                    <h2>Vi hittade inga resultat för '<?php echo get_search_query(); ?>'</h2>

                <?php endif; ?>
                <div class="searchPagination">
                    <?php
                    global $wp_query;
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div id="bottom-plugs">
    <div class="wrapper">
        <div class="container-fluid offer">                    <!-- Vi erbjuder dig -->
            <div class="col-xs-12 col-md-6 column-double">
                <?php echo do_shortcode('[slider name=Erbjudanden]'); ?>
            </div>

            <?php
            if (have_rows('puff', 49)):
                while (have_rows('puff', 49)): the_row(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 column">
                        <a href="<?php the_sub_field('puff-link'); ?>"
                           class="offer-text <?php the_sub_field('puff-colour'); ?>">
                            <h4><?php the_sub_field('puff-header'); ?></h4>
                            <img src="<?php the_sub_field('puff-image'); ?>"/>

                            <p><?php the_sub_field('puff-message'); ?></p>
                            <button><?php the_sub_field('puff-linklabel'); ?>&nbsp;&nbsp;<i
                                    class="fa fa-angle-right"></i></button>
                        </a>
                    </div>
                <?php endwhile;
            else :
            endif;
            ?>

        </div>
    </div>
</div>

<div id="brands" class="hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php
                if (have_rows('brands', 49)):
                    while (have_rows('brands', 49)): the_row(); ?>
                        <a href="<?php the_sub_field('brand-link'); ?>"
                           title="Besök <?php the_sub_field('brand-name'); ?>s hemsida" target="_blank">
                            <img src="<?php the_sub_field('brand-logotype'); ?>"
                                 alt="Besök <?php the_sub_field('brand-name'); ?>s hemsida">
                        </a>
                    <?php endwhile;
                else : endif; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>