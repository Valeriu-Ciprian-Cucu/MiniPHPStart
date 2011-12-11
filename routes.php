<?php
	/*
	 *	The $_routes variable stores all known routes ass associative arrays with 2 values (action and template).
	 *	Action files are located in the <php> folder and all have the <.php> extension.
	 *	Template files are stored in the <phtml> folder and all have the <.phtml> extension
	 *	For routes where there is no view code to be generated (such as json/xml rpc webservices) set the template variable to <false>
	 */
	global $_routes;
	$_routes = array(
		'main' => array('action' => 'main', 'template' => 'main')	
	);
?>
