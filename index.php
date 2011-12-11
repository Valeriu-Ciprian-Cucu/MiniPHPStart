<?php
	include 'routes.php';

	define('ROOT', '/site/');
	
	global $_content;

	function _get_path() {
		$url = explode('?', $_SERVER['REQUEST_URI']);
		return substr($url[0], strlen(ROOT));
	}

	function _include_files($path) {
		global $_routes;
		include 'php/' . $_routes[$path]['action'] . '.php';

		if ($_routes[$path]['template'] != false) {
			$_content = 'phtml/' . $_routes[$path]['template'] . '.phtml';
			include 'index.phtml';
		}
	}

	if (strlen(_get_path()) == 0) {
		$_content = 'default.phtml';
		include 'index.phtml';	
	} else if (array_key_exists(_get_path(), $_routes)) {
		_include_files(_get_path());
	} else {
		$_content = '404error.phtml';
        include 'index.phtml';
	}
?>
