<?php

$title = get_sub_field('iframe-title');
$height = get_sub_field('iframe-height');
$url = get_sub_field('iframe-url');

?>

<?php if ($title) : ?>
<div class="col-xs-12 list-title">
    <h2><?php echo $title; ?>
</div>
<?php endif; ?>

<div class="col-xs-12">
    <iframe src="<?php echo $url; ?>" height="<?php echo $height; ?>" style="width: 100%;"></iframe>
</div>

