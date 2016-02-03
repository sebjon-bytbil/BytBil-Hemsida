<?php $dir = get_template_directory_uri(); ?>

<?php if($id) { ?>

    <div class="bb-offer">
        <div class="offer-image">
            <img src="<?php echo $image_url; ?>" alt="" title="" />
        </div>
        <h2><?php echo $title; ?></h2>
    </div>

<?php } else { ?>

    <div class="bb-offers">
        <div class="row">

            <?php foreach($items as $key => $item) { ?>

                <?php
                $brand_logos = "";
                foreach($item['brands'] as $brand) {
                    $brand_logos = "<img src=\"" . $dir . "/images/logo-" . $brand . "-small.png\" />";
                }
                ?>

                <div class="col-xs-12 col-sm-<?php echo $columns; ?>">
                    <div class="box-offer">
                        <div class="box-offer-inner">
                            <img class="box-offer-image" src="<?php echo $item['image']; ?>" />
                            <div class="box-offer-lower">
                                <div class="box-offer-header"><?php echo $item['headline']; ?></div>
                                <div class="box-offer-logo"><?php echo $brand_logos; ?></div>
                                <div class="box-offer-more">
                            <span>
                                <div style="margin-bottom: 10px;"><?php echo $item['ingress']; ?></div>
                                <a href="#" class="btn btn-primary btn-small">Läs hela erbjudandet</a> &nbsp;
                                <a href="#" class="btn btn-transparent-black btn-small">Ladda ner .PDF</a>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>

        <?php if($pagination == "1" && $pagination_next != null) { ?>
            <div class="pagination">
                <strong><?php echo $pagination_prev; ?></strong><?php echo $pagination_separator; ?><strong><?php echo $pagination_next; ?></strong>
            </div>
        <?php } ?>
    </div>

<?php } ?>

<script>
    $(function() {

        $(".box-offer").css({ "left" : -9999 });
        //$(".box-offer").closest(".row").hide();

        $(window).load(function() {

            $(".box-offer").closest(".row").slideDown();

            var i = 0;
            setInterval(function() {
                var currentOffer = $(".box-offer:eq("+i+")");

                currentOffer.find(".box-offer-inner").css("height", "-=" + currentOffer.find(".box-offer-more").innerHeight());
                currentOffer
                    .hide()
                    .css({ "left" : 0 })
                    .fadeIn();
                i++;
            },100);

            $(".box-offer").mouseenter(function() {
                $(this).find(".box-offer-image").stop().animate({
                    top: "-" + ($(this).find(".box-offer-more").innerHeight() / 2),
                }, 200);
                $(this).find(".box-offer-lower").stop().animate({
                    top: "-" + $(this).find(".box-offer-more").innerHeight()
                }, 200);
            });
            $(".box-offer").mouseleave(function() {
                $(this).find(".box-offer-image, .box-offer-lower").stop().animate({
                    top: 0,
                }, 200);
            });
        });

    });
</script>
