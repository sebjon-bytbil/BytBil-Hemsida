<?php /* Template Name: Grundsida : Boka service */

if (get_field('external_service-check', 'options')){
    $link = get_field('external_service-link', 'options');
    wp_redirect($link);
    exit;

}else{
if (!isset($_GET['width'])) {
    $width = '100%';
} else {
    $width = $_GET['width'];
}
if (!isset($_GET['height'])) {
    $height = '100%';
} else {
    $height = $_GET['height'];
}

$ccode = get_field('ccode', 'options');

$url = 'http://tibo2web.vhutv.se/T2WStandalone/faces/tibo2web/standalone/login/login.jspx?ccode=' . $ccode;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);

?>
<iframe style="width: <?php echo $width; ?>; height:<?php echo $height; ?>; border: 0 !important;"
        src="<?php echo $url; ?>"></iframe>
</script>
<?php }?>

