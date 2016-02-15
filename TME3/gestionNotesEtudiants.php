<?php 
require_once("../TM/2/entete.php");
require_once('../TD3/controleSaisies.php');
require_once('saisies_indexees.php');
require_once('notesValides.php');

$nom = saisie_fiable($_POST, 'nom', '/^\w+$/') ;
$groupe = saisie_fiable($_POST, 'num_groupe', '/^\d+$/') ;

if ($nom == True && $groupe = True) {
    $nom = $_POST['nom'];
    $groupe = $_POST['num_groupe'];
} else {
    $nom = '';
    $groupe = '';
}

function moyenne($notes){
    $somme = 0;
    foreach ($notes as $note) $somme += $note;
    return ($somme / count($notes));
}
  
if (!empty($_POST["notes"])) {
    $result = notesValides($_POST["notes"]);
}

$title = "Gestion de note";
if (count($result) == count($_POST["notes"])) {
    echo entete($title);
    echo "<body><h1>", $title, "</h1>";
    echo "<div>Moyenne obtenue : ", moyenne($result), "</div>";
} else {
    $r = creerFormEtudiants($nom, $groupe, $result);
    if (!$r) {
    $r = "Pas de groupe";
    $title = "Erreur: $title";
    }
    echo entete($title), "<body><h1>", $title, "</h1>", $r;
}
echo "</body></html>\n";

?>