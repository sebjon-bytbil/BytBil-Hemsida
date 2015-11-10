<div class="bb-map">
    <div id="map-<?php echo $blockid; ?>"
         class="bb-google-map"
         data-defaults="false"
         data-lat="<?php echo $coordinates['lat']; ?>"
         data-lng="<?php echo $coordinates['lng']; ?>"
         data-zoom="<?php echo $zoom; ?>"
         data-panby="0,0"
         data-preventscroll="<?php echo $preventscroll; ?>"
         data-controls="<?php echo $controls; ?>"
         style="height:<?php echo $height; ?>px;width:100%;"></div>

    <script>
    if (window.location !== window.top.location) {
        var initMap = new Event('initMap');
        window.dispatchEvent(initMap);
    }
    </script>
</div>