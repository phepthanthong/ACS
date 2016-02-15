<?php 
include 'entete.php';
include 'array_to.php';

function message_erreur($s, $adrIP)
{
	$newAdrIP = str_replace('.', '\.', $adrIP);
	$mois = date("M");
	$errMessFormat = "/\[$mois \d+ (..:..:..) 2016\] \[:error\] \[client $newAdrIP\](.+)/";

	if (!preg_match_all($errMessFormat, $s, $resultTable, PREG_SET_ORDER))
		return "<div>La chaine entree ne correspond pas au motif !!</div>";
	else{
		$result = array();
		foreach ($variable as $key) {
			$result[$key[1]] = $key[2];
		}
		return tableau_en_table($result, "$mois $adrIP, $errMessFormat erreurs");
	}
}

$chaine = file_get_contents("/var/log/apache2/error.log");
echo entete("Expressions rationnelles dynamiques");
echo "<body>" . message_erreur($chaine, "127.0.0.1") . "</body></html>";
 ?>