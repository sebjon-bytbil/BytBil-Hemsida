<div class="card white-bg">
    <div class="card-header">
        <span class="card-icon">
            <?php if ($use_picture == "0"): ?>
                <i class="<?php echo $icon_bytbil ?>"></i>
            <?php else: ?>
                <img src="<?php echo wp_get_attachment_url($icon_image) ?>">
            <?php endif ?>
            
        </span>
        <h5 class="card-title"><?php echo $headline ?></h5>
    </div>
    <div class="card-body">
        <?php echo apply_filters( 'the_content', $blockcontent ); ?>
        <ul class="card-list">
            <li><a href="#">Boka service online</a></li>
            <li><a href="#">Skadeverkstad</a></li>
            <li><a href="#">Personlig Servicetekniker</a></li>
            <li><a href="#">Stenskott och glas</a></li>
        </ul>
    </div>
</div>