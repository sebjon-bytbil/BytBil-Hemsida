<?php
/*
Plugin Name: Disable WP URL Redirection
Description:
Version: 1.0
Author: Leo Starcevic
*/

remove_filter('template_redirect', 'redirect_canonical');

?>