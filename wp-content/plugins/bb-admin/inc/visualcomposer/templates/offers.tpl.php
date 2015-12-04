<?php if($id) { ?>

<div class="bb-offers">
    <div class="offer-image">
        <img src="<?php echo $image_url; ?>" alt="" title="" />
    </div>
    <h2><?php echo $title; ?></h2>
</div>

<?php } else { ?>

<div class="bb-offers">
    <div class="row">

        <?php foreach($items as $key => $item) { ?>

            <div class="col-xs-12 col-sm-<?php echo $columns; ?>">
                <div class="offer-image">
                    <img src="<?php echo $item['headline']; ?>" alt="" title="" />
                </div>
                <h2><?php echo $item['headline']; ?></h2>
            </div>

        <?php } ?>

    </div>
</div>

<?php } ?>
