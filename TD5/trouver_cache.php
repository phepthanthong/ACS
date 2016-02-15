<?php
function trouver_cache($nom)
{
  if (!is_readable($nom . '.http')) return array();
  $h = file($nom . '.http');
  $type = typer_cache($h);
  return (is_readable($nom . '.' . $type) ? $h : array());
}
?>
