<?php
	include 'routes.php';
	
	function _get_path() {
		$uri = $_SERVER['REQUEST_URI'];
		$url = explode('?', $uri)[0];
		if (substr($uri, 0, 1) == '/') {
			$uri = substr($uri, 1);
		}
		if (substr($uri, -1) == '/') {
			$uri = substr($uri, 0, strlen($uri) - 2);
		}

		return $uri;
	}

	if (array_key_exists(_get_path()), $_routes)) {
		
		include $_routes[_get_path()];
	}	
?>
