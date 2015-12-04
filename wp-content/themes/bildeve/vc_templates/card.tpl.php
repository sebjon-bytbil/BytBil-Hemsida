<div class="box-simple card <?php echo $css_classes; ?>">
    <div class="card-icon">
        <?php if ($use_picture == "0"): ?>
            <i class="<?php echo $icon_bytbil ?>"></i>
        <?php else: ?>
            <img src="<?php echo wp_get_attachment_url($icon_image) ?>">
        <?php endif ?>
    </div>
    <div class="card-title"><h4><?php echo $headline ?></h4></div>
    <div class="card-description">
        <?php echo apply_filters( 'the_content', $blockcontent ); ?>

        <?php foreach($links as $link) { ?>
            <a href="<?php echo $link['href']; ?>" class="btn btn-primary"><?php echo $link['text']; ?></a>
        <?php } ?>

    </div>
</div>