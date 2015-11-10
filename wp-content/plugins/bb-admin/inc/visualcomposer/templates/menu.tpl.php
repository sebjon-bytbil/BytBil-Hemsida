<?php if ($menu !== '0') : ?>
<div class="bb-menu">
    <?php
    $defaults = array(
        'menu' => $menu
    );
    wp_nav_menu($defaults);
    ?>
</div>
<?php endif; ?>
