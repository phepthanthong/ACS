<?php
function get_mail_count($sock){
  $res = commande($sock, "STAT");
  if ($res) {
    $res = preg_split('/\s+/', $res);
    array_shift($res);
  }
  return $res;
}
?>
