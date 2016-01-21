<?php
// La fonction demandee est presque "tableau_en_table"
// sauf qu'il faut neutraliser les caracteres speciaux des saisies.

require('../../TD/2/array_to.php');

function saisies_en_table($t, $legende)
{
  $r = array();
  // Le tableau etant des saisies de l'utilisateur
  // il faut se mefier de ce qu'il a pu ecrire comme "<" etc
  // y compris pour les index qui peuvent resulter d'une query-string ad hoc
  foreach ($t as $k => $v) $r[htmlspecialchars($k)] = htmlspecialchars($v);
  // A l'inverse, la legende etant fournie par le programmeur
  // on fait confiance aux chevrons qui y figurent, on ne transcode pas.
  // cf exemple ci-dessous
  return tableau_en_table($r, $legende);
}

/* // Test
 require('../../TM/2/entete.php');
 echo entete('ShowForm'), '<body>';
 $caption = '<strong>$_GET</strong> : ' . htmlspecialchars($_SERVER['QUERY_STRING']);
 echo saisies_en_table($_GET, $caption);
 echo '</body></html>';
/* */
?>
