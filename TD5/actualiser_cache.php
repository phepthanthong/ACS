<?php
// La fonction "file" retourne un tableau de lignes qui se terminent par \n
// On coupe en deux chaque ligne par preg_split avec \s+ 
// afin de supprimer aussi ces \n.
// On memorise la duree sous forme numerique pour accelerer le tri ulterieur

function charger_cache($nom)
{
  $clefVal = array();
  foreach (is_readable($nom) ? file($nom) : array() as $v ) {
    list($nom, $age) = preg_split('@\s+@', $v);
    $clefVal[$nom] = intval($age);
  }
  return $clefVal;
}

function actualiser_cache($nom)
{
  $tabCaches = charger_cache(CACHEFILE);
  if ($d = fopen(CACHEFILE,'w')){
    $tabCaches[$nom] = time();
    if (count($tabCaches) > MAXCACHES) 
      $tabCaches = nettoie_cache($tabCaches);
    foreach ($tabCaches as $k => $heure) fputs($d, $k." ".$heure."\n");
    fclose($d);
 }
}
?>
