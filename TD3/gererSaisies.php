<?php
error_reporting(E_ALL);
//require("../TME2/entete.php");
require('ShowForm.php');
require('controleSaisies.php');


define('RE_ETUDIANT', "/^[0-9]{7}$/");

// definir une RegExp bout par bout:
$re = '[A-Z]\w*';
$re = "$re(-$re)*";
# Ne pas écrire "/^$re[.]", PHP fait une erreur
#si on veut [.] mettre "/^" . $r . "[.].....
$re = "$re\.$re@\w+(\.\w+)*";
define('RE_MAIL_ETENDU',"/^($re)|([^<]*<$re>)$/");

$mail = saisie_fiable($_POST, 'mail', RE_MAIL_ETENDU);
$num = saisie_fiable($_POST, 'numEt', RE_ETUDIANT);

$title = "Etudiant";

if (($mail===True) AND ($num===True)) {
    $body = saisies_en_table($_POST, "Informations");
} else {
    if (($mail===False) OR ($num===False)) {
        $title = "Erreur $title";
        $mail = $_POST['mail'];
        $num = $_POST['numEt'];
    }
    $body = 
        "<form action='' method='post'><fieldset>\n" .
        "<label for='numEt'>Numéro d'Étudiant :</label>" .
        "<input id='numEt' name='numEt' value='" . htmlspecialchars($num) . "' />\n" .
        "<label for='mail'>Mail :</label>" .
        "<input id='mail' name='mail' value='" . htmlspecialchars($mail) . "' />\n" .
        "<input type='submit' value='Envoyer'>\n" .
        "</fieldset></form>\n";
}
echo entete($title), "<body><h1>$title</h1>\n", $body, "</body></html>\n";

//test
$t = array('Ju-Ma.X2@foo.bar', '"c\'est moi" <Ju-Ma.X2@foo.bar>', '<i>@foo.bar');
echo $t[0], ' ', saisie_fiable($t, 0, RE_MAIL_ETENDU), "\n";
echo $t[1], ' ', saisie_fiable($t, 1, RE_MAIL_ETENDU), "\n";
echo $t[2], ' ', saisie_fiable($t, 2, RE_MAIL_ETENDU), "\n";
?>

