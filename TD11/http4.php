<?php
function TraiteControle ($etapes){
  $f = $etapes[3];
  if (!is_file($f))
      return array(404, "$f Not Found");
  if (!is_readable($f))
      return array(403, "$f Forbidden");
  else
      return array(200, "");
}
?>