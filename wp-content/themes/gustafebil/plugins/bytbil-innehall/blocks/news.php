<?php
$posts = get_sub_field('content-news-nr-posts');
$categories = get_sub_field('content-news-categories');
bytbil_show_news_feed($posts, $categories);
?>
