<?php

function recuperation_message($sock, $num){
  $res = commande($sock,"RETR $num");
  if (!$res) return false;
  
  $message = '';
  
  while (($ligne = trim(fgets($sock))) != '') {
    // On passe les en-têtes
  }
  
  // Lecture du corps du message
  while (($ligne = trim(fgets($sock))) != '.') {
    $message .= $tmp;
  }
  return $message;
}

?>
