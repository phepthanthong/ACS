<?php

function TraiteReponse ($etapes){
  $f = $etapes[3];
  if (!$etapes[5]) {
    system($f);
  } else {
    if (preg_match('/\.php$/', $f, $a))
      include($f);
    else {
      header("HTTP/1.1 200");
      header("Content-Type: " . $etapes[5]);
      header("Last-Modified: " . filemtime($f));
      readfile($f);
    }
  }
  return array(200, '');
}
?>
