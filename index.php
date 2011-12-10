<?php
	include 'routes.php';
	
	define('ROOT', '/site/');

	function _get_path() {
		$url = explode('?', $_SERVER['REQUEST_URI']);
		return substr($url[0], strlen(ROOT));
	}
	
	global $_content;

	if (array_key_exists(_get_path(), $_routes)) {	
		include $_routes[_get_path()];
        include 'index.phtml';
	} else {
		$_content = '404error.phtml';
        include 'index.phtml';
	}
?>
