<?php
function memoriser_cache($nom, $entetes, $page)
{
  $type = typer_cache($entetes);
  if (($d1 = fopen($nom . ".http",'w')) AND
      ($d2 = fopen($nom . "." . $type,'w'))) {
    fputs($d1, join('', $entetes));
    fclose($d1);
    fputs($d2, $page);
    fclose($d2);
    return true;
  }
  return false;
}
?>