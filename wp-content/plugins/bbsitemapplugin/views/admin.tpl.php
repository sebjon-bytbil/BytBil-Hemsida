<div class="wrap"><div id="icon-tools" class="icon32"></div>
		<h2>BytBil Sitemap generator</h2>
		<?php if ($exists === false): ?>
			<div class="error notice"><p>Det finns ingen sitemap skapad än</p></div>
		<?php else: ?>
			<div class="updated notice">
				<p>Senaste sitemapen genereadres <?php echo $time ?></p>
				<p>Url till sitemap: <?php echo $sitemapUrl ?></p>
				<p>Nästa gånget sitemap skapas: <?php echo $nextjob ?></p>
			</div>
			
		<?php endif ?>
		
		<p><a href="?page=bbsitemapgenerator&action=rendernewsitemap">Generera ny sitemap</a> 
		<a href="?page=bbsitemapgenerator&action=stopsiitemapcron">Stoppa schemalagt jobb</a></p>

		<h3>Senaste sitemap:</h3>
<pre><?php echo $latestmap ?></pre>
</div>