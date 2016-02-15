<?php
function ouverture($p, $name, $attrs) {
  global $contenu; 
  if ($name == 'telephone') {
    // le contenu est toujours vide, c'est les attributs qu'on veut
      echo '<div> ', @$attrs['type'], ': ', @$attrs['valeur'], "</div>\n";
  } elseif ($name == "personne"){
    if (!isset($attrs['sexe'])){
      die ("Erreur XML : pas d'attribut sexe<br/>");
    } else {
      echo ($attrs['sexe'] == "M") ? "M." : "Mme";
    }
  } 
  // Preparer la lecture du contenu
  $contenu = "";
}

function fermeture($p, $name){
  global $lire, $contenu;
  if (($name == "nom") || ($name == "prenom")){
    echo $contenu;
  }
  $contenu = '';
}
function texte($p, $data_text){
  global $contenu;
  $contenu .= $data_text;
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

$fichier = $_GET['fichier'];
$resultat = lancer_phraseur($fichier)
if(is_array($resultat)){
  if($resultat[0] === False) {
	echo "impossible de lire le fichier '", $fichier , "'.\n";
  }else{
	echo get_xml_error_as_string($resultat);
  }
}else{
  echo "Le fichier XML ", $fichier, " est bien form&eacute;.\n";
}

?>
