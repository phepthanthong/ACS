<?php
require_once '../3/controleSaisies.php';

function perm_rot($s, $p, $h, $a)
{

$h1 = "?s=$s&amp;h=$h&amp;p=$p&amp;a=" .
  (($a == 'all.css') ? 'all2.css' : 'all.css');

$h2 = "?s=$h&amp;h=$p&amp;p=$s";

return  "<ul>" .
    "<li><a href='$h1'>Permutation des styles</a></li>\n" .
    "<li><a href='$h2'>Rotation des périphériques</a></li>\n" .
    "</ul>\n";
}

// Eviter les caracteres problematique pour HTML mais aussi Unix
define('RE_FICHIER', '/^[^<>"\'\/&]+$/');

// La fonction saisie_fiable retourne True ou False
$s = saisie_fiable($_GET, 's', RE_FICHIER) ? $_GET['s'] : 'screen.css';
$h = saisie_fiable($_GET, 'h', RE_FICHIER) ? $_GET['h'] : 'handheld.css';
$p = saisie_fiable($_GET, 'p', RE_FICHIER) ? $_GET['p'] : 'print.css';
$a = saisie_fiable($_GET, 'a', RE_FICHIER) ? $_GET['a'] : '';
if ($a) {
  setcookie('all', $a);
} else {
    $a = saisie_fiable($_COOKIE, 'all', RE_FICHIER, 'all.css');
}
include "entete.php";
echo entete("EDT Screen: $s, Handheld $h, Print $p",
	array(
	 array('rel'=>'stylesheet', 'href'=>$a),
	 array('rel'=>'stylesheet', 'href'=>$p, 'media'=>'print'),
	 array('rel'=>'stylesheet', 'href'=>$h, 'media'=>'handheld'),
	 array('rel'=>'stylesheet', 'href'=>$s, 'media'=>'screen')));
echo "<body>\n";
echo perm_rot($s, $p, $h, $a);
include 'edt.html';
echo "</body></html>\n";
?>
