<span class="legend">
	<h3>Öppettider</h3>
</span>
<div class="spacer-medium"></div>
<?php if (get_field('times', 59)): ?>
    <?php while (has_sub_fields('times', 59)) : ?>
        <span class="key"><?php the_sub_field('day', 59); ?></span><span
            class="value"><?php the_sub_field('open', 59); ?></span>
    <?php endwhile; ?>
<?php endif; ?>