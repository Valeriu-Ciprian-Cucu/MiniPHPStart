<?php
	include 'routes.php';
	
	function _get_path() {
		$uri = explode('?', $_SERVER['REQUEST_URI']);
		$url = $uri[0];
		if (substr($uri, 0, 1) == '/') {
			$url = substr($url, 1);
		}
		if (substr($uri, -1) == '/') {
			$url = substr($url, 0, strlen($url) - 2);
		}

		return $url;
	}
	
    $content = getcwd();

	if (array_key_exists(_get_path(), $_routes)) {
		
		include $_routes[_get_path()];
        include 'index.phtml';
	} else {
		$content .= '/404error.phtml';
        include 'index.phtml';
	}
?>
