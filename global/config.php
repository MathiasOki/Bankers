<?php
setlocale(LC_TIME, "no_NO");
date_default_timezone_set("Europe/Oslo");
error_reporting(E_ALL);
ini_set("display_errors", "On");
define("CONFIG", true);

if(isset($_GET['format'])) $conf['format'] = htmlspecialchars($_GET['format']);
else $conf['format'] = "html";
// Is json?
if((isset($conf['json']) && $conf['json'] === true) || $conf['format'] == "json"){
	header("Content-Type: application/json; charset=utf-8");
	$conf['json'] = true;
}
else {
	header("Content-Type: text/html; charset=utf-8");
	$conf['json'] = false;
}

$conf['domain']    = "";
$conf['hostname']  = $_SERVER['HTTP_HOST'];
$conf['localhost'] = (($conf['hostname'] == "localhost")? true : false);
$conf['localhost'] = false;

$conf['pathToRoot'] = "./";

// Here we require qustom classes and files for easyer code.

require_once ('class/Validate.php');
require_once ('class/Mysqli.php');
require_once ('class/Custom.php');
require_once ('class/Satan.php');
require_once ('class/Bot.php');
require_once ('opendb.php');

$customClass = Custom::init();
$satan = Satan::init();
$bot = Bot::init();

//require_once ('pages.php');

$conf['sitename'] = "Bankers";

$visitorIP = $customClass->getUserIP();
$customClass->makeLog();
