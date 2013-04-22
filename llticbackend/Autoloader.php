<?php
class Autoloader
{
	public static $autoloader;
	
	public static function init()
	{
		if(self::$autoloader == NULL)
		{
			self::$autoloader = new self();
		}
		return self::$autoloader;
	}
	
	public function __construct()
	{
		spl_autoload_register(array($this,'load'));

	}
	
	public function load($class) 
	{
    include 'classes/class.' . $class . '.php';
	}
}

Autoloader::init();
?>