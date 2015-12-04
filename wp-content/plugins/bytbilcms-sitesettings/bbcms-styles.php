<style type="text/css">
    <?php if (get_field("sitesetting-font-family-header", $sid) == "annat") :?>
    <?php the_field("sitesetting-font-other-import", $sid); ?>
    <?php endif; ?>

    <?php include 'tabs/utseende.php'; ?>
    <?php include 'tabs/menyer.php'; ?>
    <?php include 'tabs/sidhuvud.php'; ?>
    <?php include 'tabs/sidfot.php'; ?>

    <?php if (get_field("sitesettings-forms-edit", $sid)) : ?>
    <?php include "tabs/forms.php"; ?>
    <?php endif; ?>

</style>

<?php
if (get_field('sitesetting-custom-code', $sid)) {
    if (in_array('css', get_field('sitesetting-custom-code', $sid))) {
        the_field('sitesetting-custom-code-css', $sid);
    }
}
?>
