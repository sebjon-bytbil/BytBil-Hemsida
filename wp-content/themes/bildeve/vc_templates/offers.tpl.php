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
                <a class="box-offer" href="<?php echo $item['permalink']; ?>" target="_self">
                <div class="offer-image">
                <img src="<?php echo $item['image']; ?>" class="box-offer-image" alt="" title="" />
                </div>
                <div class="box-offer-inner">
                    <div class="box-offer-header">
                        <h2><?php echo $item['headline']; ?></h2>
                    </div>
                </div>
                </a>
            </div>

        <?php } ?>

    </div>
</div>

<?php } ?>
