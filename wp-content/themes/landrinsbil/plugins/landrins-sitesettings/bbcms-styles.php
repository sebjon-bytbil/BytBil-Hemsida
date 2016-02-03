<style type="text/css">

    <?php include 'tabs/utseende.php'; ?>
    <?php include 'tabs/menyer.php'; ?>
    <?php include 'tabs/sidhuvud.php'; ?>
    <?php include 'tabs/sidfot.php'; ?>

</style>

<?php
if (get_field('sitesetting-custom-code', $sid)) {
    if (in_array('css', get_field('sitesetting-custom-code', $sid))) {
        the_field('sitesetting-custom-code-css', $sid);
    }

    if (in_array('javascript', get_field('sitesetting-custom-code', $sid))) {
        the_field('sitesetting-custom-code-js', $sid);
    }
}
?>
