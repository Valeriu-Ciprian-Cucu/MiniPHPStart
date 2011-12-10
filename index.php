<?php
	include 'routes.php';
	
	define('ROOT', '/site/');

	function _get_path() {
		return '/' . substr($_SERVER['SCRIPT_FILENAME'], strlen(ROOT));
	}
	
    global $_content;
    $_content = getcwd();

	if (array_key_exists(_get_path(), $_routes)) {	
		include $_routes[_get_path()];
        include 'index.phtml';
	} else {
		$_content .= '/404error.phtml';
        include 'index.phtml';
	}
?>
