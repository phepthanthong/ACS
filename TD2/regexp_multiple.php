<?php
define('RE_HORAIRE', "%(0[0-9]|1[0-9]|2[0-3]):([0-5][0-9])%");

function horaires($calendrier)
{
  if (preg_match_all(RE_HORAIRE, $calendrier, $m) != 2)
    return array();
  return $m[0][0] . '-' . $m[0][1];
}

//$test = array(
//  "05:24 Avez-vous l'heure ? il est 10:12 22:64, 32:24, 0:56, 12:32, 12:58",
//  "venez entre 10:12 et 22:54",
// 	      );
//  for ($i =0; $i<count($test); $i++)
//    echo $test[$i], "\t", horaires($test[$i]), "\n";
?>