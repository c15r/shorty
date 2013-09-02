<?php

/**
 * 
 */
class KeyGenerator {
	
	public static function generate($length = 0) {
		$length = Config::get("Shorty.url.key.default_size");
		$key = "";
		
		$symbols = preg_split("//", Config::get("Shorty.url.key.symbols"));
		array_shift($symbols);
		array_pop($symbols);
		
		$randoms = array_rand($symbols, $length);
		foreach ($randoms as $random) {
				$key .= $symbols[$random];
		}
		
		return $key;
	}
}

?>