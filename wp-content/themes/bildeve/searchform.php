<form action="/" method="get">
    <div class="input-group">
        <input type="text" name="s" class="form-control" placeholder="Sök på bildeve.se" value="<?php the_search_query(); ?>">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"><span></span></button>
		</span>
    </div>
</form>