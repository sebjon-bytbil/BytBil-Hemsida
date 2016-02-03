<?php 
header("Content-type: text/xml");
require_once(BBSITEMAPPATH . 'classes/Generator.class.php');
echo BBSitemapGenerator::getSitemapContent();
die(); 
?>