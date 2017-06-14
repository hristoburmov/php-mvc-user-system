<?php

class Session
{

	public function __construct()
	{
		
	}

	public static function get($key)
	{
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return false;
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function unset_item($item)
	{
		unset($item);
	}

}