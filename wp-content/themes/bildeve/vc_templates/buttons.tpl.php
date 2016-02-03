<?php if (isset($the_buttons)) : ?>
    <div class="bb-buttons">
        <?php foreach ($the_buttons as $button) : ?>
            <?php
                $external = false;
                if(strpos($button['link_to'], "http") !== false) {
                    $external = true;
                }
            ?>

        <a class="<?php echo $button['width'] != "auto" ? "col-sm-" . $button['width'] : ""; ?> btn btn-primary <?php echo $extra_css; ?> <?php echo $external == true ? 'external' : ''; ?>" href="<?php echo $button['link_to']; ?>"><?php echo $button['button_text']; ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
