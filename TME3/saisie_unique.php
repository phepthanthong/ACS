<?php
require_once("../TME2/entete.php");
require_once("../TD3/controleSaisies.php");

define('NOM_ENS', "/[a-zA-Z]+/");

$nom = saisie_fiable($_POST, 'nom', NOM_ENS);

if (($nom == False) OR (!is_readable($fichier = "/var/tmp/" . $_POST['nom'] . ".php"))) {
	$title = (isset($_POST['nom']) ? "Erreur: " : "") . "Enseignement";
	$body =  
	    "<form action='' method='post'><fieldset>\n" . 
	    "<label for='nomEn'>Nom d'enseignement :</label>" . 
	    "<input type='text' id='nomEn' name='nom'/>\n" . 
	    "</fieldset></form>\n"; 
	echo entete($title), "<body><h1>$title</h1>\n", $body, "</body></html>\n"; 
}else{
	include('select_groupe.php');
	array_to_select($_POST['nom'], $groupes);
}
 ?>