<?php 
require_once("naviguer.php");
require_once("../TME2/entete.php");

$cat = array('Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300);
$saisie = isset($_POST['page']) ? $_POST['page'] : 1;
$v = isset($_POST['visite']) ? $_POST['visite'] : 1;
$title = "Page $saisie";

echo entete($title), "<body><h1>$title</h1>";
if (!is_numeric($saisie)){
	echo "<div>Bon voyage pour " . ($cat[$saisie] * (($v > 1) ? ($v-1) : 1))."</div>\n";
}
else{
	$c = "<input type='hidden' name='visite' value='" . ($v+1) . "' />";
	echo naviguer($cat, $saisie, $v, $c) ;
}

echo "</body></html>" ;
 ?>