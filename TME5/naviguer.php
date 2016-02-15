<?php 
require_once("../TD2/array_to.php");
require_once("../TME2/entete.php");

function naviguer($catalogue, $pageDemandee, $mul = 1, $chaine="" )
{
	if (($pageDemandee <= 0) OR ($pageDemandee > count($catalogue))) 
		$pageDemandee = 1;

	if ($pageDemandee > 1)
		$buttonLeft = "<input type='submit' name='page' style='float:left' value='" . ($pageDemandee-1) . "' />";
	else $buttonLeft = "";

	if ($pageDemandee < count($catalogue))
		$buttonRight = "<input type='submit' name='page' style='float:right' value='" . ($pageDemandee+1) . "' />";
	else $buttonRight = "";

	$descField = "";
	foreach ($catalogue as $nom => $value) {
		if (!--$pageDemandee){
			$descField = "<input type='submit' name='page' value='".$nom."'/>".($value*$mul);	
			break;
		}
	}

	$formulaire = 
		"<form action='' method='post' style='width:15%'>\n" . $chaine .
		"<fieldset>" . $buttonLeft . $buttonRight . "</fieldset>\n" .
		"<fieldset>" . $descField . "</fieldset>\n" .
		"</form>";  

	return $formulaire;
}

// $cat = array('Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300);
// $num = isset($_POST['page']) ? $_POST['page'] : 1;

// $title = "Page $num";
// echo entete($title);
// echo "<body><h1>$title</h1>" . naviguer($cat, $num) . "</body></html>";
 ?>