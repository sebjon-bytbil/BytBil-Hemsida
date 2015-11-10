<?php /* Template Name: Grundsida : Bygg bil */
$height = '651';
$width = '994';

?>

<html style="margin: 0; padding: 0; width: <?php echo $width; ?>px; height:<?php echo $height; ?>px">
<body style="margin: 0; padding: 0; width: <?php echo $width; ?>px; height:<?php echo $height; ?>px">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" style=""></script>

<?php


/*if (!isset($_GET['width'])) {
	$width = '100%';
} else {
	$width = round($_GET['width'], 0);
}
if (!isset($_GET['height'])) {
	$height = '100%';
} else {
	$height = round($_GET['height'], 0);
}*/


$vendor_id = get_field('build_car_id', 'options');
$price_localization = get_field('price_localization', 'options');
$mail_link_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//$vendor_id = '0131';
$url = 'http://vds.spark-vision.com/vds_se_retailer/spark-ds.js?price_localization=' . $price_localization . '&retailer_filter=' . $vendor_id . '&mail_link_url=' . $mail_link_url . '&width=' . $width . '&height=' . $height;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);

?>
<div class="content" style="width: <?php echo $width; ?>px; height:<?php echo $height; ?>px">
    <iframe id="spark-ds" style="width: <?php echo $width; ?>px; height:<?php echo $height; ?>px; border: 0 !important;" scrolling="no"></iframe>
    <script type="text/javascript" src="<?php echo $url ?>"></script>
</div>
<script>
    $(document).ready(function () {
        var hasFlash = false;
        try {
            var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
            if (fo) hasFlash = true;
        } catch (e) {
            if (navigator.mimeTypes ["application/x-shockwave-flash"] !== undefined) hasFlash = true;
            if (!hasFlash) {
                $('.content').hide();
                $('body').addClass('noflash');
                $('body').click(function() {
                   window.location.href = "http://itunes.apple.com/se/app/bygg-din-volvo/id514870132";
                });
            }
        }

    });
</script>
<style type="text/css">
    .noflash {
        background: transparent url(../wp-content/themes/volvo-dealer-web/images/ipadbg.jpg) left top no-repeat;
        height: 600px;
        width: 600px;
        background-size: 100%;
    }
</style>

</body>
</html>
