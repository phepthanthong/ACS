<?php
header('text/plain');
$n = isset($_GET['n']) ? $_GET['n'] : 0;
if (!$n OR !is_array($n))
  echo 0;
else {
  $d = fopen('/tmp/td10.log', 'w');
  fwrite($d, var_export($n, true));
  fclose($d);
  echo array_sum($n) / count($n);
}
?>
