<?php

abstract class Registry
{	public static $objects = array();

	public static function set($key, $instance)
	{		self::$objects[$key] = $instance;	}

	public static function has($key)
	{		return isset(self::$objects[$key]);	}

	public static function get($key)
	{		if (self::has($key)) {			return self::$objects[$key];
		}
		return null;	}

}