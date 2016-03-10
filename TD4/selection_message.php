<?php
require_once("../../TM/2/entete.php");

function selection_message($sock, $criteres) {
  $res = '';
  $n = get_mail_count($sock);
  if ($n) $n = $n[0];
  for (;$n;$n--) {
    $entetes = recuperation_entetes($sock, $n);
    $ok = true;
    foreach ($criteres as $cle=>$val){
        if (!isset($entetes[$cle]) || ($entetes[$cle] != $val)) {
            $ok = false;
            break;
        }
    }
    if ($ok) {
        $message = recuperation_message($sock, $num);
        $res .= tableau_mail($num, $entetes, $message);
    }
  }
  $strCriteres = '';
  foreach ($criteres as $k => $v)
      $strCriteres .= htmlspecialchars($k) . ': ' . htmlspecialchars($v) . ' ';
  return entete("Mails " . trim($strCriteres)) . "<body>$res</body></html>"; 
}
?>