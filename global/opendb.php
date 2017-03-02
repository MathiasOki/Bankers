<?php

ob_start();
session_start();

if(!defined("CONFIG")){
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
	exit("Not Found");
}

// Here is the connection information.

if(class_exists("Database")){
	$dbhost = 'tek.westerdals.no';
	$dbuser = 'tolmat15_front';
	$dbpass = 'OeE).C^0QR[I';
	$dbname = 'tolmat15_front';

	$db = Database::init();
	$db->connect($dbhost, $dbuser, $dbpass, $dbname, '', 'assoc', $conf['localhost']);
	$db->setSettings('utf8', true);
}
else {
	header($_SERVER['SERVER_PROTOCOL']." 500 Internal Error");
	exit("Missing database connection");
}

/*if( !isset($_SESSION['user']) ) {
	header("Location: home.php");
	exit;
}
*/
