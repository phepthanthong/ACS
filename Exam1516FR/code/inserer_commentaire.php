	<?php
require_once("functions.php");

function inserer_reponse($forum, $file, $id_post, $from, $texte, $date){
	if(!isset($forum[$id_post])){
		return false;
	}else{
		$forum[$id_post]["responses"][count($forum[$id_post]["responses"])] = 
            array("user"=>$from, "date"=>$date, "text"=>$texte);
		
		return true;
	}
}
?>
