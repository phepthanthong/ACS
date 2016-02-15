<?php

define('SERVER_LOG', '/tmp/sacs-http.log');

function TraiteLog ($etapes){
 $f = fopen(SERVER_LOG, 'a');
 $m = serialize($etapes);
 fputs($f, date("Y-m-d H:i:s") . ' [' . $_SERVER['REMOTE_ADDR'] . "] $m\n");
 fclose($f);
 return array(200, '');
}
?>