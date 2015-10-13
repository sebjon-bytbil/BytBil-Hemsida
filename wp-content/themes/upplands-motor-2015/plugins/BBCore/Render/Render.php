<?php 
	/**
	* BBCore Acf Plugin
	*
	* Contains functionality for ACF integrations
	*/
	class BBCoreRender
	{
		public $Paths = array();
		function Render($template_file, $vars = array())
		{
			if(file_exists($template_file))
			{
				ob_start();
				extract($vars);
				$data = $vars;
				include($template_file);
				return ob_get_clean();
			}else
				throw new MissingTemplateException("Template: {$template_file} could not be found!");
		}


	}

	
 ?>