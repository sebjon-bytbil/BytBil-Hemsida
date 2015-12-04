<?php 
/**
* 
*/
class BBSitemapXmlRender
{
	static function RenderView($view, $atts){
		$viewPath = BBSITEMAPPATH . "views/";
		ob_start();
		extract($atts);
		$data = $atts;
		include($viewPath . $view . ".tpl.php");
		return ob_get_clean();
	}
}
?>