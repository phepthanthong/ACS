<?php
require_once('../TME2/entete.php');

function array_to_select($nom, $groupes)
{
    $r = '';
    if (is_array($groupes)) {
        foreach ($groupes as $k => $v) 
            $r .= "<option value='$k'>Groupe $k, nombre d'inscrits: " . count($v) . "</option>\n";

        $r = "<form action='gestionNotesEtudiants.php' method='post'><fieldset>".
            "<label for='num_groupe'>Choisissez un groupe</label>\n".
            "<select id='num_groupe' name='num_groupe'>$r</select>" . 
            "<input type='hidden' name='nom' value='$nom' />" .
            "<input type='submit' />" .
            "</fieldset></form>\n";
    }
    if (!$r) {
        $titre = "Erreur :" ;
        $r = "Pas de groupe";
    } else $titre = '';
    return entete($titre . "Choix du groupe pour $nom") .
        "<body>$r</body></html>\n";
}

// test
include($f = '/var/tmp/' . $_POST['nom'] . '.php');
echo array_to_select($_POST['nom'], $groupes);

?>
