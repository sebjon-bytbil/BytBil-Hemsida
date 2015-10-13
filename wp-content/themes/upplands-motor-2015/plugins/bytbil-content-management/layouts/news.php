<?php

$layout = get_sub_field('content-news-layout');
$amount = get_sub_field('content-news-amount');

get_news_block($layout,$amount);

?>