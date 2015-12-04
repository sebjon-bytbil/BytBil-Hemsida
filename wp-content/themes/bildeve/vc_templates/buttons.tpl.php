<?php if (isset($the_buttons)) : ?>
    <div class="bb-buttons">
        <?php foreach ($the_buttons as $button) : ?>
        <a class="<?php echo $button['width'] != "auto" ? "col-sm-" . $button['width'] : ""; ?> btn btn-primary btn-small" href=""><?php echo $button['button_text']; ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<!--<div class="bb-buttons">
    <h2><?php echo $headline ?></h2>
    <?php echo $blockcontent ?>
</div>-->