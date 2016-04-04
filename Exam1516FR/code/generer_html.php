<?php
require_once("constantes.php");
require_once("forum.sax.php");
	
function array_to_html($forum, $users){
		$html = "";
		foreach($forum as $id_post => $post){
			$userId 	= $post["user"];
			$userName	= $users[$userId];
			$postDate	= $post["date"];
			$mainText	= $post["text"];
			
			$div = "<div class='billet' onclick='voir_message(this)'>\n";
			
			$div .= "<span class='user_name'>$userName</span>\n";
			$div .= "<span class='main_text'>$mainText</span>\n";
			$div .= "<span class='date'>$postDate</span>\n";
			
			//récupération des réponses à un billet
			$responses = $post["responses"];
			$div .= "<div class='comments'>\n";			
			foreach($responses as $response){
				$commentUserName 	= $users[$response["user"]];
				$commentDate		= $response["date"];
				$commentText		= $response["text"];
				
				$div .= "<div class='comment'>\n";
				
				$div .= "<span class='user_name'>$commentUserName</span>\n";
				$div .= "<span class='main_text'>$commentText</span>\n";
				$div .= "<span class='date'>$commentDate</span>\n";
				
				$div .= "</div>\n";
			}			
			
			//Construction du formulaire
			$div .= "<form method='POST' action='' onsubmit='return soumettre_reponse(this)'>\n";
			$div .= "<fieldset>\n";
			$div .= "<input type='hidden' name='id_post' value='$id_post' />\n";
			$div .= "<label for='$id_post'>R&eacute;ponse : </label><input id='$id_post' type='text' name='texte' value='' />\n";
			$div .= "<input type='submit' value='Envoyer' />\n";
			$div .= "</fieldset>\n";
			$div .= "</form>\n";
			
			$div  .= "</div>\n";
			$div  .= "</div>\n";
			
			$html = $html.$div;
		}
		
		return $html;
	}
	
?>