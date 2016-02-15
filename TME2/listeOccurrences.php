<?php 
include 'entete.php';
include 'array_to.php';
define('NUM_SECSOC', '/[12][0-9]{13}/');
define('HORAIRE', '/[0-2][0-9]:[0-5][0-9]/');
define('MAIL', '/[a-z\'-]+@etu\.upmc\.fr/i');
define('NOTE','/([0-9]|1[0-9]|20)(\/20)?/');

define('TEST_SECUSOC', "12345678901234 02345678901234 123456789012345") ;
define('TEST_HORAIRES', "12:34, 05:18 et 23:14 et ensuite une heure erronée 77:17") ;
define('TEST_MAILETU', "l'elu@etu.upmc.fr saint-eloi@etu.upmc.fr faux@etu_umpc_fr") ;
define('TEST_NOTE', "20, 18/20 et 7/20 7.5") ;

function listesOccurrences($regex, $chaineEntree)
{
	if (!preg_match_all($regex, $chaineEntree, $resultTable))
		return "<div>la chaine entree ne correspond pas au motif !!</div>";
	else {
		return tableau_en_table($resultTable[0], "$regex $chaineEntree");
	}
}
echo entete("Expressions rationnelles statiques");
echo listesOccurrences(NUM_SECSOC,TEST_SECUSOC);
echo listesOccurrences(HORAIRE,TEST_HORAIRES);
echo listesOccurrences(MAIL,TEST_MAILETU);
echo listesOccurrences(NOTE,TEST_NOTE);

 ?>