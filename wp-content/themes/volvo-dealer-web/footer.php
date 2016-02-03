<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

</div><!-- #main -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-div">
        <div class="footer-inside">
            <div class="end-menu">
                <?php new_volvo_menu('footer', true, 'end-menu'); ?>
            </div>
            <div class="footer-feed">
                <span id="newsticker" style="display: inline-block; width: 452px; height: 16px; overflow: hidden">
                    <?php

                    function download_page($path)
                    {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $path);
                        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                        $retValue = curl_exec($ch);
                        curl_close($ch);

                        return $retValue;
                    }

                    switch_to_master();
                    $newstickerUrl = get_field('newsticker_url', 'options');
                    restore_from_master();

                    if ($newstickerUrl) {
                        $sXML = download_page($newstickerUrl);

                        $oXML = new SimpleXMLElement($sXML);
                        $rssIndex = 0;

                        foreach ($oXML->channel->item as $item) {
                            $rssIndex++;
                            if ($rssIndex >= 6) {
                                break;
                            }
                            $date = date_parse($item->pubDate);
                            $date_string = $date['year'] . '-' . sprintf('%02d', $date['month']) . '-' . sprintf('%02d', $date['day']);
                            $title_string = $item->title;
                            $max_len = 50;
                            if (strlen($title_string) > $max_len) {
                                $title_string = substr($title_string, 0, $max_len - 3);
                                $title_string .= '...';
                            }

                            echo '<span class="ticker-item"><a target="_blank" href="' . $item->link . '">' . $date_string . ' ' . $title_string . ' <strong>Läs mer ></strong></a></span>';


                        }
                    }

                    /* MENU FIX */

                    if (get_field('external_service-check', 'options')) { ?>
                        <script type="text/javascript">
                            $('a[href="<?php echo get_site_url() . '/boka-service/' ?>"]');
                        </script>
                    <?php
                    }else{ ?>
                        <script type="text/javascript">
                            $('a[href="<?php echo get_site_url() . '/boka-service/' ?>"]').addClass('lytebox');
                        </script>
                    <?php
                    } ?>

                    <script type="text/javascript">
                        /* MENU FIX - Current Item bold and Lytebox on Bygg Din Volvo*/

                        $('.side-menu-large a[href="' + pathname + '"]').css('font-weight', 'bold');
                        $('a[href="<?php echo get_site_url() . '/bygg-din-volvo/' ?>"]').addClass('lytebox');

                        var feedTimer = setInterval(function () {
                            $('#newsticker .ticker-item:first').slideUp(function () {
                                $(this).appendTo($('#newsticker')).slideDown();
                            });

                        }, 5000);

                        var pathname = window.location;

                    </script>
                </span>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php
    global $_wp_switched_stack;
    if (is_array($_wp_switched_stack)) {
        foreach ($_wp_switched_stack as $stack) {
            restore_current_blog();
        }
    }

?>

<?php wp_footer(); ?>
<?php
switch_to_master();
$jscode = get_field('global_js-code', 'options');
if($jscode){
    echo $jscode;
}
restore_from_master();?>
<?php
$local_jscode = get_field('global_js-code', 'options');
if($local_jscode){
    echo $local_jscode;
}
?>

</body>
</html>
