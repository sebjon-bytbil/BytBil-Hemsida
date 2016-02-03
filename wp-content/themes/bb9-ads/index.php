<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/style.css'; ?>">
<?php
    $args = array(
        'posts_per_page'   => 1,
        'post_type'        => 'bb9ad',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );
    $ads = get_posts( $args );

    foreach($ads as $ad){
        $adMeta = get_fields($ad->ID);
    }

    $image = $adMeta['bb9-ad-image']['url'];
    $link = $adMeta['bb9-ad-link'];
?>
<a target="_blank" href="<?php echo $link; ?>">
    <img src="<?php echo $image; ?>" alt="">
</a>
