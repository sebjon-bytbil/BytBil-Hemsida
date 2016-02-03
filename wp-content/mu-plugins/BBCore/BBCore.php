<?php
/*
Plugin Name: BytBil Core
Description: Core functionallitet för byt bil. Bestäm vilka funktioner som ska vara med på en sajt
Plugin URI: http://#
Author: BytBil.com
Author URI: http://bytbil.com
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/


/**
* Class for init BBCore
*/
class BBCore
{
	public $FilePath;
	public $Plugins = array();
	
	function __construct()
	{
		$this->FilePath = dirname(__FILE__);
		# code...
	}

	function LoadPlugins($plugins = array()){

		$plugins = apply_filters( 'BBCore_load_plugins', $plugins );
		if (count($plugins) < 1) {
			return false;
		}

		foreach ($plugins as $key => $plugin) {
			include_once($this->FilePath . '/' . $plugin . '/' . $plugin . '.php');
			$className = 'BBCore'.$plugin;
			$this->Plugins[$plugin] = new $className();
		}
	}
}
global $BBCore;
$BBCore = new BBCore();


require_once("extrafunctions.php");

?>