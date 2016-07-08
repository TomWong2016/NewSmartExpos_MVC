<?php

class Cookie {

	public static function set($key, $val) {
		setcookie($key, $val, time() + (86400 * 30), "/");;
	}
	
	public static function get($key){
		if(isset($_COOKIE["$key"]) && !empty($_COOKIE["$key"])) {
			return $_COOKIE["$key"];
		} else {
			return "";
		}
	}
	
	public static function getValue($key, $paramName){
		if(isset($_COOKIE["$key"]) && !empty($_COOKIE["$key"])) {
			parse_str($_COOKIE["$key"], $output);
			return $output[$paramName];
		} else {
			return "";
		}
	}

}

?>