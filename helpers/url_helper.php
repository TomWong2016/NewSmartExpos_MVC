<?php

class Url {
	public static function redirect($url = null, $fullpath = false) {
		if ($fullpath == false) {
			$url = $_SERVER['DOCUMENT_ROOT'] . $url;
		}
		header('Location: '.$url);
		exit;
	}
	
	public static function getPath($custom = false) {
		if ($custom == true) {
			return $_SERVER['DOCUMENT_ROOT'] . '/' . $custom . '/';
		} else {
			return $_SERVER['DOCUMENT_ROOT'] . '/';
		}
	}
	
	public static function getRelativePath($custom = false) {
		if ($custom == true) {
			return $custom . '/';
		} else {
			return '';
		}
	}
	
	public static function getStaticPath($custom = false) {
		if ($custom == true) {
			return 'http://static.gohome.com.hk/' . $custom . '/';
		} else {
			return 'http://static.gohome.com.hk/';
		}
	}
	
	public static function autoLink($text, $custom = null) {
		$regex = '@(http)?(s)?(://)?(([-\w]+\.)+([^\s]+)+[^,.\s])@';
		if ($custom === null) {
			$replace = '<a href="http$2://$4">$1$2$3$4</a>';
		} else {
			$replace = '<a href="http$2://$4">'.$custom.'</a>';
		}
		return preg_replace($regex, $replace, $text);
	}
	
	public static function generateSafeSlug($slug) {
		setlocale(LC_ALL, 'en_US.utf8');
		$slug = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $slug));
		$slug = htmlentities($slug, ENT_QUOTES, 'UTF-8');
		$pattern = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
		$slug = preg_replace($pattern, '$1', $slug);
		$slug = html_entity_decode($slug, ENT_QUOTES, 'UTF-8');
		$pattern = '~[^0-9a-z]+~i';
		$slug = preg_replace($pattern, '-', $slug);
		return strtolower(trim($slug, '-'));
	}
	
	public static function previous() {
		header('Location: '.$_SERVER['HTTP_REFERER']);
		exit;
	}
	
	public static function segments() {
		return explode('/', $_SERVER['REQUEST_URI']);
	}
	
	public static function getSegment($segments, $id) {
		if (array_key_exists($id, $segments)) {
			return $segments[$id];
		}
	}
	
	public static function lastSegment($segments) {
		return end($segments);
	}
	
	public static function firstSegment($segments) {
		return $segments[0];
	}
	
	public static function modelsFolderPath() {
		return Url::getPath("models");
	}
	
	public static function viewsFolderPath() {
		return Url::getPath("views");
	}
	
	public static function controllersFolderPath() {
		return Url::getPath("controllers");
	}
	
	public static function cssFolderPath() {
		return Url::getRelativePath("assets/css");
		//return Url::getStaticPath("css");
	}
	
	public static function jsFolderPath() {
		return Url::getRelativePath("assets/js");
		//return Url::getStaticPath("js");
	}
	
	public static function fontsFolderPath() {
		return Url::getRelativePath("assets/fonts");
		//return Url::getStaticPath("fonts");
	}
	
	public static function imagesFolderPath() {
		return Url::getRelativePath("assets/images");
		//return Url::getStaticPath("images");
	}
	
	public static function apiPath() {
		return 'http://apiserver.gohome.com.hk/api/';
	}
	
}

?>