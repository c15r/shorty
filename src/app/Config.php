<?php

class Config {

	private static $config;

	public static function add($key, $value) {
		Config::$config[$key] = $value;
	}

	public static function get($key) {
		return Config::$config[$key];
	}
}
?>