<?php

class extraire {

    public $phraseur; 		// instance du phraseur xml
    public $personne = "";
    public $contenu = "";
	public $telephone_html = "";
	
	
	/*
	 * Constructeur par défaut du phraseur
	 */
	function __construct(){
		$p = xml_parser_create();
	  xml_set_object($p, $this);
		xml_set_element_handler($p, "ouverture", "fermeture");
		xml_set_character_data_handler($p, "texte");
		// phraseur sensible à la casse
		xml_parser_set_option($p, XML_OPTION_CASE_FOLDING, false);
		$this->phraseur = $p;
	}

	/*
	 * Preneur sur les ouvertures de balises
	 */
	function ouverture($p, $name, $attrs){
	
		// Rechercher si Mme ou M.
	
		if ($name == "personne"){
			if (!isset($attrs['sexe'])){
				die ("Erreur XML : pas d'attribut sexe<br/>");
			} else {
			  $this->personne = ($attrs['sexe'] == "M")?"M.":"Mme";
			}
		}else{
			if ($name == 'telephone') {
				// le contenu est toujours vide, c'est les attributs qu'on veut
				  $this->telephone_html = '<span> ', @$attrs['type'], ': ', @$attrs['valeur'], "</span>&nbsp;\n";
			}
		}
		// preparation de la lecture du contenu (nb etapes inconnu)
		$this->contenu = ""; 
	}

	/*
	 * Preneur sur les fermetures de balises
	 */ 
	function fermeture($p, $name){
		if ($name == "elemcarnet"){
			echo "<div> <span>", $this->personne, " </span>", $this->telephone_html, "</div>\n";
		} else if (($name == "prenom" )||
			($name == "nom" )){
				$this->personne .=  ' ' . $this->contenu;
		}
	}

	/*
	 * Preneur sur les evenements de type "texte" 
	 */ 
	function texte($p, $data_text){
			$this->contenu .= $data_text;
	}

} // fin de la classe


include("../../TM/2/entete.php");
echo entete("Analyse d'un fichier XML d'annuaire");
echo "<body>";


?>

	<h1>Liste des noms et telephones</h1>
	<ul>

<?php	
	$fp = fopen($_GET['fichier','r') or 
			die ("Fichier introuvable; analyse suspendue");

	// Creation de l'objet
	$p = new extraire();
	/*
	 * Analyse d'une chaine de caracteres
	 */
	while ($data = fread($fp,256)) {
		xml_parse($p->phraseur, $data) or die (
			sprintf("Erreur XML : %s à la ligne %d\n", 
			xml_error_string(xml_get_error_code($p->phraseur)),
			xml_get_current_line_number($p->phraseur))
		);
	}

?>
	</ul>
</body>
</html>
