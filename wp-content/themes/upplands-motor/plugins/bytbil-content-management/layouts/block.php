<?php
    $block_background_color = 'transparent';
    if(get_sub_field('content-block-background')){
        $block_background_color = get_sub_field('content-block-background');
    }
    $block_background_style = 'background: ' . $block_background_color . ';';
    $block_shadow = get_sub_field('content-block-shadow');
?>

<div class="card <?php if($block_shadow){echo 'shadow-'.$block_shadow;} ?>" style="<?php echo $block_background_style; ?>">
    <?php
        echo get_sub_field('content-block-contents');
    ?>
</div>
