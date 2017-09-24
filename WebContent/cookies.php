<?php

class CookieManager {
	public function __construct() {
		// empty one
	}
	static public function store($key, $value, $expire = false, $path = '/', $domain = 'current', $secure = 0) {
		if ($domain == 'current') {
			$domain = $_SERVER['HTTP_HOST'];
		}
		if (!$expire) {
			$expire = time() + (3600 * 24);
		}
		setcookie($key, $value, $expire, $path, $domain, $secure);
		return true;
	}

	static public function stored($key) {
		return isset($_COOKIE[$key]);
	}

	static public function read($key) {
		if (isset($_COOKIE[$key])) {
			return $_COOKIE[$key];
		}else{
			return false;
		}
	}

	static public function delete($key, $value = '', $expire = 1, $path = '/', $domain = 'current', $secure = 0) {
		if ($domain == 'current') {
			$domain = $_SERVER['HTTP_HOST'];
		}
		setcookie($key, $value, $expire, $path, $domain, $secure);
		return true;
	}
}
?>