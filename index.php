<?php
	#including file with routes
	include 'routes.php';

	#defining the ROOT constant for cases where the site doesn't go under the root folder but a subfolder
	define('ROOT', '/site/');
	
	#global variable $_content is used in index.phtml to load the specific template code for the given action
	global $_content;

	#function for determining the route accessed
	function _get_path() {
		$url = explode('?', $_SERVER['REQUEST_URI']);
		return substr($url[0], strlen(ROOT));
	}

	#function for loading the appropriate action and template code
	function _include_files($path) {
		global $_routes, $_content;
		include 'php/' . $_routes[$path]['action'] . '.php';

		if ($_routes[$path]['template'] != false) {
			$_content = 'phtml/' . $_routes[$path]['template'] . '.phtml';
			include 'index.phtml';
		}
	}

	/*	condition for loading the view code for the site root, code for matched route, or a
	 *	custom error page for unmatched routes
	 */
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
