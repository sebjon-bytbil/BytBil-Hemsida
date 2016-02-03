<?php
    $block_background_color = 'transparent';
    if($content['content-block-background']){
        $block_background_color = $content['content-block-background'];
    }
    $block_background_style = 'background: ' . $block_background_color . ';';
    $block_shadow = $content['content-block-shadow'];
?>

<div class="card <?php if($block_shadow){echo 'shadow-'.$block_shadow;} ?>" style="<?php echo $block_background_style; ?>">
    <?php
    echo $content['content-block-contents'];
    ?>
</div>
