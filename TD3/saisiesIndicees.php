<?php 
error_reporting(E_ALL);
require("../../TM/2/entete.php");

function saisies_indicees($t)
{
    if (!$t) return '';
    $res = '';
    foreach($t as $k => $n)
        $res .= "<li><input name='ens[]' type='checkbox' value='$k' />$n</li>\n";
    return "<ol>\n$res</ol>";
}

function saisies_indices_en_liste($t)
{
  foreach ($t as $k => $v) $r[htmlspecialchars($k)] = htmlspecialchars($v);
  return  "<ul><li>" . join("</li>\n<li>", $t) . "</li></ul>\n";
}

function formulaire_indices($t)
{
    if (isset($_POST['ens'])) {
    return saisies_indices_en_liste($_POST['ens']) .
        "<p>" . htmlspecialchars($_POST['motivation']) . "</p>";
    } else {
        return "<form action='' method='post'>\n" .
		"<fieldset id='ens'><label for='ens'>Enseignements :</label>\n" .
		saisies_indicees($t) .
		"</fieldset>\n<fieldset><label for='motivation'>Motivations :</label>\n" .
		"<textarea name='motivation' id='motivation' rows='5' cols='80'></textarea>\n" .
		"<input type='submit' value='Envoyer' />\n</fieldset></form>\n";
    }
}

/* // test
$ens = array('compil',  'algo',  'posix',  'pacs');
$title = isset($_POST['ens']) ? "Enseignements choisis" : "Enseignements disponibles";
echo entete($title);
echo "<body>\n","<h1>", $title, "</h1>\n";
echo formulaire_indices($ens);
echo "</body></html>\n";
/* */
?>