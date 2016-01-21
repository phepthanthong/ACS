<?php
include('entete_smtp.php');

function recuperation_entetes($sock, $num){
  $res = commande($sock,"TOP $num 0");
  if (!$res) return false;
  $entetes = array();
  $cle = '';
  // lire tout le message
  while (($ligne = trim(fgets($sock))) != '.') {
    if (preg_match(RE_ENTETE_SMTP, $ligne, $r)){
      $cle = $r[1];
      if (!isset($entetes[$cle])){
          $entetes[$cle] = $r[2];
      } else {
          if (is_array($entetes[$cle]))
              $entetes[$cle][] = $r[2];
          else
              $entetes[$cle] = array($entetes[$cle], $r[2]);
      }  			
    } else {
      // Autre ligne : ajout a la derniere cle trouvee
        if (is_array($entetes[$cle]))
            $entetes[$cle][count($entetes[$cle])-1] .= "\n" . $ligne;
        else
            $entetes[$cle] .= "\n" . $ligne;
    }
  }
  return $entetes;
}
?>
