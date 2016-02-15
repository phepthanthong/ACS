<?php 
function memorise_cookie()
{
	if (isset($_COOKIE['visite'])){
		$nomDeCookie = $_COOKIE['visite'];
		$fichier = fopen("/var/www/html/ACS/TME5/cookie" . $nomDeCookie, "r" );
		$contenu = intval(fgets($fichier));
		fclose($fichier);
	}
	else{
		$nomDeCookie = md5((string) mt_rand() . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_REFERER']);
		$contenu = 1;
	}
	$fichier = fopen("/var/www/html/ACS/TME5/cookie" . $nomDeCookie, "w+" );
	fwrite($fichier, $n+1);
	fclose($fichier);
	setcookie('visite', $nomDeCookie);
	return $nomDeCookie;
}


 ?>