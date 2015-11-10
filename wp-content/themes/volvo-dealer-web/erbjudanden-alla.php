<?php /* Template Name: Grundsida : Erbjudanden */
get_header();


$dealer = get_field('aterforsaljid', 'options');

$url = 'http://dms.fbinhouse.se/app/index/' . $dealer . '/?template=group_list';

?>




<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="wrapper">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="left-column black-page">

                    <header class="entry-header">
                        <h1 class="entry-title"><?php echo empty($post->post_parent) ? get_the_title($post->ID) : get_the_title($post->post_parent); ?></h1>
                    </header>
                    <!-- .entry-header -->

                    <?php include 'mobile-menu.php'; ?>

                    <div class="side-menu-container side-menu-old">
                        <ul class="side-menu-large">

                            <?php new_volvo_menu('bottom-buy'); ?>

                        </ul>
                        <!--<?php echo volvo_get_custom_menu('Bilmeny', 'side-menu-small'); ?>-->
                        <!--<ul class="side-menu-small">
								<?php // new_volvo_menu('bilmeny'); ?>
							</ul>-->
                    </div>

                </div>
                <script type="text/javascript">

                    function iframeLoaded() {
                        jQuery("#kampanjer").load(function () {
                            var frame = $('#kampanjer', window.parent.document);
                            var width = jQuery("body").width();
                            var height = jQuery("body").height();
                            frame.width(width + 15);
                            frame.height(height + 15);
                            frame.css('overflow-y', 'hidden');
                        });
                    }
                </script>

                <div class="right-column allakampanjer" style="text-align: left; height:100%; width: 100%;">
                    <!--<iframe id="kampanjer" style="border: 0 !important;" src="<?php /*echo $url; */?>"></iframe>-->

                    <style>
                        #kampanjer-20 {
                            max-width: none;
                        }

                        #kampanjer-20 div {
                            max-width: none;
                        }

                        #kampanjer-20 .fbi-link-top a {
                            -webkit-box-sizing: content-box;
                            -moz-box-sizing: content-box;
                            box-sizing: content-box;
                        }
                    </style>
                    <div id="kampanjer-20"></div>
                </div>

                <?php $jsonData = "template=group_list" ?>
                <?php $newUrl = "target=#kampanjer-20&reseller=". $dealer ."&" . $jsonData ?>
                <script id="dmsloader" src="//dms.fbinhouse.se/assets/js/loader.js"
                        data-defaults="<?php echo $newUrl; ?>"></script>
                <!-- .entry-content -->
                <script>
                    iframeLoaded();
                </script>
            </article>
            <!-- #post -->

        </div>


    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
