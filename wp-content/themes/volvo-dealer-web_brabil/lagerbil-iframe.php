<?php /* Template Name: Fordonsurval */
get_header(); ?>
<?php
$post_object = get_field('assortment-choice');
if ($post_object):
    $post = $post_object;
    setup_postdata($post);
    ?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript"
            src="http://access.bytbil.com/volvo2014vdw/access/content/getcontent/1/access.iframe.host.js"></script>

    <script type="text/javascript">
        $(function () {
            var iframe = $('#accessFrame');
            var iframeLoad = new Access.Iframe.Load({
                packageName: "<?php the_field('accesspaket' , 'options');?>",
                assortment: "<?php the_field('assortment-string'); ?>",
                actionName: "<?php the_field('assortment-type'); ?>",
                parentUrl: window.location
            });
            iframeLoad.load(iframe);
        });
    </script>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="wrapper">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <iframe id="accessFrame" frameborder="0" allowTransparency="true" scrolling="no"
                            style="background-color: #fff;"></iframe>
                    <!-- .entry-content -->
                </article>
                <!-- #post -->

            </div>


        </div>
        <!-- #content -->
    </div><!-- #primary -->
    <script type="text/javascript">

        $(document).ready(function (e) {
            var pathname = window.location;

            $(".side-menu-large li").each(function () {
                var object = $(this).find("a");
                var url = object.attr("href");
                if (pathname == url) {
                    object.css('font-weight', 'bold');
                }
            });

            /*$(".side-menu-small li").each(function(){
             var object = $(this).find("a");
             var url = object.attr("href");
             if (url.indexOf("bygg-din-volvo") >= 0){
             object.attr("href",url+"?width=998&height=670");
             object.attr("data-lyte-options", "width:998 height:670 scrollbars:no autoResize:false");
             object.addClass('lytebox');
             }
             });*/

        });

        /**
         * Called to resize a given iframe.
         *
         * @param frame The iframe to resize.
         */
        function resize(frame) {
            var b = frame.contentWindow.document.body || frame.contentDocument.body,
                cHeight = $(b).height();

            if (frame.oHeight !== cHeight) {
                $(frame).height(0);
                frame.style.height = 0;

                $(frame).height(cHeight);
                frame.style.height = cHeight + "px";

                frame.oHeight = cHeight;
            }

            // Call again to check whether the content height has changed.
            setTimeout(function () {
                resize(frame);
            }, 250);
        }

        /**
         * Resizes all the iframe objects on the current page. This is called when
         * the page is loaded. For some reason using jQuery to trigger on loading
         * the iframe does not work in Firefox 26.
         */
        window.onload = function () {
            var frame,
                frames = document.getElementsByTagName('iframe'),
                i = frames.length - 1;

            while (i >= 0) {
                frame = frames[i];
                frame.onload = resize(frame);

                i -= 1;
            }
        };

    </script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>