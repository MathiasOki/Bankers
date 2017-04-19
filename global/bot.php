<?php

if(isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
} else {
	$referer = "";
}

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_file = basename($_SERVER["SCRIPT_FILENAME"]);
$actual_login_link = str_replace($actual_file, "login.php", $actual_link);

//if($referer == $actual_login_link ){
	$result = $satan->getAccounts($logged['customerID']);

	for ($i=0; $i < count($result); $i++) {
		if($result[$i]['main'] == 1 && $result[$i]['accountType'] == "Brukskonto" && $result[$i]['kroner'] >= 5000){
			$accountName = $result[$i]['name'] != null ? $result[$i]['name'] : $result[$i]['accountType'];

			echo $bot->reveal('bubble', 31, 'Tips om sparing!', 'Jeg ser at du har mye penger på ' . $accountName . '. Det kan lønne seg å spare noen av pengene på en sparekonto. Da får du renter på pengene, som vil si at du gradvis får mer <b>gratis</b> penger!', '#', 'Ja, vis meg!');
			$x = true;
			$y = true;
		}
		if ((!isset($x) || $x == false) && $result[$i]['main'] == 1 && $result[$i]['accountType'] == "Sparekonto" && $result[$i]['kroner'] >= 20000){
			echo $bot->reveal('bubble', 31, 'Tips om BSU!', 'Jeg ser at du har du mye penger på sparekonto. Det kan være lurt å bruke noe av det til å spare til bolig. Vil du overføre til BSU?', '#', 'Ja, vis meg!');
			$y = true;
		}
	}
	if (!isset($y) || $y != true) {
		$a = [
			'Penger fungerer som byttemiddel for varer og tjenester. Så om du skal kjøpe ny sykkel, så betaler man penger for en sykkel (vare). Det samme kan man gjøre for at noen skal reparere noe (tjeneste).',
			'Renter er betaling man får for å låne andre penger. For eksempel så gir banken deg renter, fordi du låner den penger ved å sette dem inn på sparekontoen din.',
			'Tegnet for prosent er slik: % Renter blir ofte oppgitt i prosent. Det at man har 2 prosent rente kan skrives slik: 2%',
			'Man burde betale regningene sine innenfor fristen, ellers må man betale mer.',
			'Det er lurt å spare penger til det man ønsker seg, ikke bruke kredittkort. Hvis man ikke betaler inn kredittkortgjeld før fristen, så må man betale mye renter.'
		];

		$tip = $a[mt_rand(0, count($a) - 1)];

		echo $bot->reveal('bubble', 31, 'Tips!', $tip);
	}
//}
