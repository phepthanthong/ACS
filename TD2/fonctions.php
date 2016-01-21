<?php
// 1 .
function tableau_en_chaine_max($tab, $max=80){
  $chaine = "";
  foreach($tab as $v) {
    //+ 1 pour compter l'espace 
    if (strlen($chaine) + strlen($v) + 1 > $max) break;
    $chaine .= " $v";
  }
  return substr($chaine,1);
}

// 2.
function mult_vect ($vect, $other){
  if(is_array($other)){
    if(count($vect)!=count($other)){
      return array();
    }
    $scal=0;
    for ($i=0; $i<count($vect); $i++) {
       $scal+=$vect[$i]*$other[$i];
    }
    return $scal;
  }
  else{
    if(is_numeric($other)){
      foreach($vect as $k => $v){
        $vect[$k] = $v * $other;
      }
      return $vect;
    }else{
      return array();
    }
  }
}
// Tests
// echo "\nPremier tableau :";
// $tab=array(10, 20, 30, 40, 50);
// echo join(' ',$tab);
// $t=array(5, 4, 3, 2, 1);                               
// echo "\nSecond tableau :";
// echo join(' ',$t);
// echo "\nProduit scalaire : ".mult_vect ($tab,$t)."\n";
// echo "\nMultiplication des éléments du tableau par 3:\n";
// echo join(' ',mult_vect ($tab,3));
// echo "\n";
?>