<?php if($id) { ?>

<div class="bb-offers">
    <div class="offer-image">
        <img src="<?php echo $image_url; ?>" alt="" title="" />
    </div>
    <h2><?php echo $title; ?></h2>
    <p><?php echo $ingress; ?></p>
    <a class="btn btn-blue" href="<?php echo $permalink; ?>">Visa hela erbjudandet</a>
</div>

<?php } else { ?>

<?php if ($brand_dropdown) : ?>
    <label class="selectpicker-label">Välj märke</label>
    <select class="bb-offers-<?php echo $blockid; ?>">
        <option value="all">Alla märken</option>
        <?php foreach ($brands as $brand) : ?>
            <option value="<?php echo $brand; ?>"><?php echo $brand; ?></option>
        <?php endforeach; ?>
    </select>
<?php endif; ?>

<div class="bb-offers">
    <div class="row">
    <?php if ($show_as_slideshow) : ?>

        <div class="bb-slideshow flexslider" id="slideshow-<?php echo $blockid; ?>"
            data-id="<?php echo $blockid; ?>"
            data-slideshow="slider"
            data-animationspeed="600"
            data-animation="fade"
            data-speed="7000"
            data-arrows="true"
            data-controls="true">
            <ul class="slides">
            <?php foreach ($items as $key => $item) : ?>
                <li>
                    <img src="<?php echo $item['image_url']; ?>"
                         srcset="<?php echo $item['image_full_url']; ?> 1000w, <?php echo $item['image_medium_url']; ?> 500w"
                         alt="<?php echo ''; ?>"
                         title="<?php echo ''; ?>" />
                    <div class="caption-wrapper">
                        <div class="caption<?php if ($item['overlay_dotted'] === '1') { echo ' bg-overlay dotted-black'; } ?>" data-animation="<?php echo $item['caption-animation']; ?>">
                        <div class="vertical-align-wrapper" style="<?php echo $item['overlay_background_color']; ?>">
                            <div class="vertical-align <?php echo $item['caption_position']; ?>">
                                    <div class="horizontal-align">
                                        <div class="caption-contents"
                                            style="<?php echo $item['caption_style']; ?>">
                                            <?php
                                                if(!empty($item['caption_content'])) {
                                                    echo $item['caption_content'];
                                                } else {
                                                ?>
                                                    <h3><?php echo $item['headline']; ?></h3>
                                                    <p><?php echo $item['ingress']; ?></p>
                                                <?php
                                                }
                                            ?>
                                            <?php if (isset($item['links']) && !empty($item['links'])) : ?>
                                                <?php foreach ($item['links'] as $link) : ?>
                                                    <a class="btn btn-blue" href="<?php echo $link['link']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['text']; ?></a>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <a class="btn btn-blue" href="<?php echo get_permalink($item['id']); ?>" target="_self">Visa hela erbjudandet</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>

    <?php else : ?>
        <div class="shuffle-grid-<?php echo $blockid; ?> shuffle--container shuffle--fluid shuffle">

        <?php foreach($items as $key => $item) { ?>
            <?php
            if ($brand_dropdown) {
                $brand_string = '';
                foreach ($item['brands'] as $brand) {
                    $brand_string .= $brand . ' ';
                }
            }
            ?>

            <div class="picture-item bb-offer-card-<?php echo $blockid; ?> col-xs-12 col-sm-<?php echo $columns; ?>"<?php echo $brand_dropdown ? ' data-groups=\'["' . trim($brand_string) . '"]\'' : ''; ?>>
                <figure>
                    <div class="card white-bg no-padding">
                        <div class="offer-image">
                            <img
                                 src="<?php echo $item['image']; ?>"
                                 srcset="<?php echo $item['image_full']; ?> 1000w, <?php echo $item['image_medium']; ?> 500w"
                                 alt="<?php echo $item['headline']; ?>" title="<?php echo $item['headline']; ?>" />
                        </div>
                        <div class="offer-content">
                            <h4><?php echo $item['headline']; ?></h4>
                            <p><?php echo $item['ingress']; ?></p>
                            <?php if (!empty($item['links'])) : ?>
                                <?php foreach ($item['links'] as $link) : ?>
                                    <a class="btn btn-blue" href="<?php echo $link['link']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['text']; ?></a>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <a class="btn btn-blue" href="<?php echo $item['permalink']; ?>">Visa hela erbjudandet</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </figure>
            </div>

        <?php } ?>

        </div>

    <?php endif; ?>

    </div>
</div>

<?php if ($brand_dropdown) : ?>
<script>
jQuery(document).ready(function() {
    var $select = $('.bb-offers-<?php echo $blockid; ?>');
    $select.selectpicker();

    new BBShuffle.Shuffle.init('.shuffle-grid-<?php echo $blockid; ?>', $select, '.bb-offer-card-<?php echo $blockid; ?>', true);
});
</script>
<?php endif; ?>

<?php if ($show_as_slideshow) : ?>
<script>
if (window.location !== window.top.location) {
    imageslider.refresh_imageslider();
}
</script>
<?php endif; ?>

<?php } ?>
