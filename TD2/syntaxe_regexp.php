<?php
// 1.
// ([^0-9]|$) = soit un caractère quelconque soit la fin
define('RE_NUMERO', "/Numéro d'étudiant : ([1-9][0-9]{6})([^0-9]|$)/"); 

// 2. le "s" final force l'acceptation de \n par le motif "."
// il n'est pas necessaire si la chaine n'en contient pas
define('RE_OREMUN', "/^.*Numéro d'étudiant : ([1-9][0-9]{6})([^0-9]|$)/s"); 

/*
define('RE_TEST', 
 	"Numéro d'étudiant : 123,
 		Numéro d'étudiant : 2456783,
 		Numéro d'étudiant : 457894566,
 		Numéro d'étudiant : 0510236,
 		Numéro d'étudiant : 1234567");

 if (preg_match(RE_NUMERO, RE_TEST, $m)) echo $m[1], "\n";
 if (preg_match(RE_OREMUN, RE_TEST, $m)) echo $m[1], "\n";
*/
?>
