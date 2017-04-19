<?php

if(isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
} else {
	$referer = "";
}

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_file = basename($_SERVER["SCRIPT_FILENAME"]);
$actual_login_link = str_replace($actual_file, "login.php", $actual_link);

if($referer == $actual_login_link ){
	$result = $satan->getAccounts($logged['customerID']);

	for ($i=0; $i < count($result); $i++) {
		if($result[$i]['main'] == 1 && $result[$i]['accountType'] == "Brukskonto"){
			if($result[$i]['kroner'] >= 5000){
				$accountName = $result[$i]['name'] != null ? $result[$i]['name'] : $result[$i]['accountType'];

				echo $bot->reveal('bubble', 11, 'Tips!', 'Jeg ser at du har mye penger på ' . $accountName . '. Det kan lønne seg å spare noen av pengene på en sparekonto. Da får du renter på pengene, som vil si at du gradvis får mer <b>gratis</b> penger!', '#', 'Ja, vis meg!');
			}
		}
	}
}
