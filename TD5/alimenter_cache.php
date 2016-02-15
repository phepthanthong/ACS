<?php
function alimenter_cache($serveur, $resource, $port='80'){
  $d = fsockopen($serveur,$port);
  if (!$d) return array(array(),'');
  $entetes = array();
  $cache = true;
  fputs($d, "GET http://$serveur:$port$resource HTTP/1.1\nHost: $serveur:$port\n\n");
  while (strlen($l = fgets($d)) >2) {
      header($l);
      $entetes[] = $l;
  }
  $page='';
  while ( !feof($d) ) $page .= fgets($d);
  echo $page;
  return array($entetes, $page);
}
?>
