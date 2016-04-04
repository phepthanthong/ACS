<?php
	require_once("entete.php");
	require_once("generer_html.php");
	
	$links = array(array("rel"=>"stylesheet", "type"=>"text/css", "href"=>"style.css"));
	
	echo entete("forum", $links);
	
	echo "<body>\n";
	
	lancer_phraseur(FORUM_FILE);
	echo array_to_html($forum, $users);
	
	echo "<script type='text/javascript' src='voir_message.js'></script>\n";
	echo "<script type='text/javascript' src='ajax.js'></script>\n";
	echo "<script type='text/javascript' src='resultat_insertion.js'></script>\n";
	echo "<script type='text/javascript' src='soumettre_reponse.js'></script>\n";

	echo "</body>\n";
	echo "</html>\n";
?>
