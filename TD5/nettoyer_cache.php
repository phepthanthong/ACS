<?php
function nettoie_cache($tabCaches){
  sort($tabCaches);
  $nom = key($tabCaches);
  $nom_h = $nom . '.http';
  $nom_t = $nom . '.' . typer_cache(file($nom_h));
  unlink($nom_h);        
  unlink($nom_t);
  array_shift($tabCaches); 
  return $tabCaches;
}
?>
