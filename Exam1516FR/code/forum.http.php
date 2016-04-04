<?php
require_once("constantes.php");
require_once("inserer_commentaire.php");
	
if((!isset($_GET["id_post"])) || (!isset($_GET["texte"])) || (!isset($_GET["date"]))){
	header("HTTP/1.1 400 Bad Request");
}else{
	if (!isset($_COOKIE["code_auth"]) || !isset($users[$_COOKIE["code_auth"]])){
			header("HTTP/1.1 401 Unauthorized");
    } else {
        $user = $users[$_COOKIE["code_auth"]];
        $mainText = $_GET["texte"];
        $date = $_GET["date"];

        if (inserer_reponse($forum, FORUM_FILE, $_GET["id_post"], $user, $mainText, $date)) {
            header("HTTP/1.1 200 OK");
				
            echo "<div><span>",
                    $user,
                    "</span><span>",
                    $mainText,
                    "</span><span>",
                    $date,
                    "</span></div>";
        }else{
            header("HTTP/1.1 400 Bad Request");
        }
    }
}
?>