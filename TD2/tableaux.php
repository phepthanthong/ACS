<?php
// 1.
$Candidats = array("candidatB","candidatA","candidatC");

$asort($Candidats); //juste pour pouvoir vérifier la question 3 de cet exercice

// 2. A
echo "<h1>Liste avec for</h1>\n<ul>\n";
for ($i =0; $i<count($Candidats); $i++) {
  echo "<li>", $Candidats[$i], "</li>\n";
}
echo "</ul>\n";
  



// 2. B
echo "<h1>Liste avec while</h1>\n<ul>\n";
$i=0;
while ($i < count($Candidats)) {
  echo "<li>", $Candidats[$i], "</li>\n";
  $i=$i+1;
}
echo "</ul>\n";


// 2. C  
echo "<h1>Liste avec foreach</h1>\n<ul>\n";
foreach ($Candidats as $elt) {
  echo "<li>", $elt, "</li>\n" ;
}
echo "</ul>\n";

//3.
// La fonction asort conservant la relation entre une valeur et son index
// l'usage de For ou While provoquera l'affichage dans l'ordre d'origine,
// tandis que Foreach affichera bien par ordre alphabetique.

//4.
echo "<h1>Liste avec join </h1>";
echo "<ul><li>" . join("</li>\n<li>", $Candidats) . "</li></ul>\n";

// 5.
$Scores = array("candidatA"=>130,"candidatB"=>300,"candidatC"=>30);

// 6.
arsort($Scores);
echo "<h1>Liste num&eacute;rot&eacute;e avec foreach</h1>\n<ol>\n";
foreach ($Scores as $key => $val) {
  echo "<li>", $key, ": ", $val, "</li>\n" ;
}
echo "</ul>\n";

?>
