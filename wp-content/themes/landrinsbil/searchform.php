<form action="/" method="get">

    <div class="input-group pull-right" style="width: 250px;">
        <input type="text" name="s" class="form-control" placeholder="Sök på landrinsbil.se"
               value="<?php the_search_query(); ?>">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"><span class="fa fa-arrow-right"
                                                                style="height: 20px; line-height: 20px;"></span>
            </button>
		</span>
    </div>

</form>