<h1>Bulk Flush Permalinks</h1>
<?php if (!empty($_GET["flushed"]) && $_GET["flushed"] == 1) : ?>
    <div id="message" class="updated below-h2"><p>Permalänkar är nu uppdaterade.</p></div>
<?php endif; ?>
<p>Med detta plugin kan man spara om alla permalänkar för siter i ett nätverk</p>

<form method="post" action="<?php echo admin_url("admin-post.php") ?>">
    <input type="hidden" name="action" value="bbcms-flush-permalinks"/>
    <input type="submit" value="Flush Permalinks!"/>
</form>

<?php if (!empty($_GET["queued"])) : ?>
    <h2>Köade för flush:</h2>
    <ul>
        <?php foreach ($_GET["queued"] as $site) : ?>
            <li><?php echo $site; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
