<?php ?>

<div class="wrap">
    <h1>Mastersite</h1>

    <ul>
        <?php foreach ($sites as $site) : ?>
            <li><?php echo $site["blog_id"] ?> - <?php echo $site["domain"] ?></li>
        <?php endforeach; ?>
    </ul>

    <form class="update-form" action="#" method="post">
        <input type="text" name="blog_id" placeholder="Mastersite"/>
        <input type="submit" value="Uppdatera"/>
    </form>
</div>