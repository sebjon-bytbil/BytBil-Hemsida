<?php

$brands = get_sub_field('content-brands');
if ($brands) { ?>
    <div class="brands">
        <?php
        foreach ($brands as $brand) {
            $id = $brand->ID; ?>
            <a target="<?php echo get_field('brand_link-target', $id); ?>"
               href="<?php echo get_field('brand_link', $id); ?>"><img
                    src="<?php echo get_field('brand_image', $id); ?>"
                    alt="<?php echo 'Besök ' . $brand->post_title . ' på: ' . get_field('brand_link', $id); ?>"
                    title="<?php echo 'Besök ' . $brand->post_title . ' på: ' . get_field('brand_link', $id); ?>"></a>
        <?php } ?>
    </div>
<?php } ?>
