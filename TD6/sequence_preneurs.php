<?php
function ouverture($parser, $name, $attrs){
    echo "<div style='color:green'>Ouverture de : </div>";
    echo "&lt;$name " ;
    foreach ($attrs as $cle=>$valeur){
        echo "$cle='" . $valeur . "' ";
    }
    echo "&gt;<br/>\n";
}

function fermeture($parser, $name){
    echo "<div style='color:red'>Fermeture de : </div>";
    echo "&lt;/$name&gt;<br/>\n";
}

function texte($parser, $data){
    if (trim($data) == ""){
        echo "<div style='color:orange'>Saut de ligne</div>";
    } else {
        echo "<div style='color:blue'>R&eacute;ception du texte : </div>";
        echo $data . "<br/>\n";
    }
}

function lancer_phraseur($fichier){
  $xml_phraseur = xml_parser_create();
  
// Les noms de balise et attributs ne doivent pas passer en majuscules
  // automatiquement car XHTML ne le fait pas.
  xml_parser_set_option($xml_phraseur, XML_OPTION_CASE_FOLDING, 0);
  xml_set_element_handler($xml_phraseur, "ouverture", "fermeture");
  xml_set_character_data_handler($xml_phraseur, "texte");
  
  // Ouverture et analyse du fichier
  if (!$fp = fopen($fichier,'r')){
	xml_parser_free($xml_phraseur);
    return array(false, false);
  }
  
  while ($data = fread($fp,256)){
  	if(!xml_parse($xml_phraseur, $data, feof($fp))){
	  $r = array(xml_error_string(xml_get_error_code($xml_phraseur)), xml_get_current_line_number($xml_phraseur));
	  xml_parser_free($xml_phraseur);
      return $r;
  	}
  }
  
  xml_parser_free($xml_phraseur);
  return true;
}

function get_xml_error_as_string($errors_array){
    return "Erreur XML : " .
      xml_error_string($errors_array[0]) .
      " ligne ".
      $errors_array[1];
}

include("../../TM/2/entete.php");
echo entete("Analyse d'un fichier XML d'annuaire");
echo "<body>";
$fichier = $_GET['fichier'];
$resultat = lancer_phraseur($fichier);
if(is_array($resultat)){
  if($resultat[0] === False) {
	echo "<div>impossible de lire le fichier '", $fichier , "'</div>";
  }else{
	echo "<div>", get_xml_error_as_string($resultat), "</div>";
  }
}else{
  echo "<div>Le fichier XML ", $fichier, " est bien form&eacute; </div>";
}
echo "</body>\n</html>\n";
?>
