<?php
function creerFormEtudiants($nomEn, $numGroup, $t=array()) {
	include('/tmp/' . $nomEn . '.php')));
	$g = isset($GLOBALS['groupes'][$numGroup]) ? $GLOBALS['groupes'][$numGroup] : array();
	return
	"<form action='gestionNotesEtudiants.php' method='post'><fieldset>\n" .
	"<table><caption>Saisie</caption>\n" .
	"<tr><th>Etudiant</th><th>Note</th></tr>\n" .
	
	"</table>\n" .
	"<input type='hidden' name='nom' value='$nomEn' />\n" .
	"<input type='hidden' name='num_groupe' value='$numGroup' />\n" .
	"<input type='submit' />\n</fieldset></form>\n";
}

?>