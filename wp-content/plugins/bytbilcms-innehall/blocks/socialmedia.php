<?php
$user = get_sub_field('social_media-user');
$height = get_sub_field('social_media-height');
$width = get_sub_field('social_media-width');
$showposts = get_sub_field('social_media-show_posts');
$showfaces = get_sub_field('social_media-show_faces');
$socialmedia = get_sub_field('social_media-type');
$resolution = get_sub_field('social_media-quality');
$hashtag = get_sub_field('social_media-hashtag');

//Facebook
if ($socialmedia == 'fb') { ?>
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="fb-like-box" data-href="https://www.facebook.com/<?php echo $user; ?>"
         data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>"
         data-colorscheme="<?php echo $theme; ?>" data-show-faces="<?php echo $showfaces; ?>" data-header="false"
         data-stream="<?php echo $showposts[0]; ?>" data-show-border="false"></div>
    <?php
    //Twitter
} else if ($socialmedia == 'tw') { ?>

    <a class="twitter-timeline" href="https://twitter.com/<?php echo $user; ?>" data-theme="<?php echo $theme; ?>"
       data-screen-name="<?php echo $user; ?>" data-widget-id="495141016639250432">Tweets från @<?php echo $user; ?></a>
    <script>
        !function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, "script", "twitter-wjs");
    </script>



    <?php
    //Instagram
} else if ($socialmedia == 'ig') {

    $count = get_sub_field('social_media-pic_count'); ?>
    <div id="socialmedia-container instagram">
        <i class="fa fa-instagram"></i> #<?php echo $hashtag; ?>
        <div id="socialmedia-view" class="instagram" style="height: <?php echo $height; ?>px; width: <?php echo $width; ?>px"></div>
    </div>

    <script>
        var Instagram = {};
        Instagram.search = search;
        var Count = <?php echo $count; ?>;
        Instagram.search("<?php echo $hashtag; ?>");


        function search(tag) {
            $.getJSON(url, toScreen);
        }

        function show(photos) {
            $.each(photos.data, function (index, photo) {
                photo = "<div class='list-object'><a target='_blank' href='" + photo.link + "'><img src='" + photo.images.<?php echo $resolution; ?>.url + "' /></a>"
                <?php if(get_sub_field('social_media-show_title')){ ?>
                + "<span>" + photo.caption.text + "</span>"
                <?php } ?>;

                $('#socialmedia-view.instagram').append(photo);
            });
        }
        function search(tag) {
            var url = 'https://api.instagram.com/v1/tags/' + tag + '/media/recent/?callback=?&count=' + Count + '&client_id=b44483be244e4e8cb84f25e290bca2ab'
            jQuery.getJSON(url, show);
        }

    </script>
    <?php
    //Youtube
    //AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0
} else if ($socialmedia == 'yt') {

    $count = get_sub_field('social_media-vids_count'); ?>

    <script src="https://apis.google.com/js/platform.js"></script>
    <div id="socialmedia-container youtube">
        <div class="g-ytsubscribe" data-channel="<?php echo $user; ?>" data-layout="full" data-count="default"></div>
        <div id="socialmedia-view" class="youtube" style="height: <?php echo $height; ?>px; width: <?php echo $width; ?>px"></div>
        <?php
        switch ($resolution) {
            case 'low_resolution':
                $resolution = 'list_object.snippet.thumbnails.medium.url';
                break;
            case 'standard_resolution':
                $resolution = 'list_object.snippet.thumbnails.high.url';
                break;
            case 'thumbnail':
                $resolution = 'list_object.snippet.thumbnails.default.url';
                break;
        }
        ?>
        <script>
            var id_url = 'https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=<?php echo $user; ?>&key=AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0';
            jQuery.getJSON(id_url, getPlayListID);

            function getPlayListID(data) {
                var playListID = data.items[0].contentDetails.relatedPlaylists.uploads;
                console.log(data);
                var url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=<?php echo $count; ?>&playlistId=' + playListID + '&key=AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0';
                jQuery.getJSON(url, getPlayListVideos);
            }

            function getPlayListVideos(data) {
                var resolution = "<?php echo $resolution; ?>";
                console.log(data);
                jQuery.each(data.items, function (index, list_object) {
                    //console.log(list_object);

                    list_object = "<a target='_blank' href='https://www.youtube.com/watch?v=" + list_object.snippet.resourceId.videoId + "'><div class='list-object no-padding col-sm-12'>" +
                    "<span class='col-sm-3 no-padding'><img src='" + eval(resolution) + "'/></span><span class='col-sm-9 no-padding'>" + list_object.snippet.title + "</span></div><a/>";

                    $('#socialmedia-view.youtube').append(list_object);
                });
            }
        </script>
    </div>
<?php
}
?>