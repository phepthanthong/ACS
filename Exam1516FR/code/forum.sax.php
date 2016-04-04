<?php
	require_once("constantes.php");
	require_once("functions.php");
	
	$texte = "";
	$forum = array();
	$idpost;
	$user; 
	$respDate;
	
	function ouverture($parser, $name, $attrs){
		global $forum, $idpost, $user, $respDate;
		
		if($name == "post"){
			$idpost		= $attrs["id"];
			$user		= $attrs["user"];
			$category	= $attrs["category"];
			$date		= $attrs["date"]; 
			
			//initialisation de l'entrée correspondante au post courant
			$forum[$idpost] = array(
								"category" => $category,								
								"user"    => $user,
								"date"    => $date,
								"responses" => array());
		}elseif($name == "response"){
			$user 		= $attrs["user"];
			$respDate	= $attrs["date"];
		}
	}

	function fermeture($parser, $name){
		global $forum, $idpost, $texte, $user, $respDate;
		
		if($name == "subject"){
			$forum[$idpost]["subject"] = $texte;
		}elseif($name == "text"){
			$forum[$idpost]["text"] = $texte;
		}elseif($name == "response"){
			$response =  array("user"=>$user, "date"=>$respDate, "text"=>$texte);
			$forum[$idpost]["responses"][count($forum[$idpost]["responses"])] = $response;
		}
		
		$texte = "";
	}

	function texte($parser, $data){
		global $texte;
		
		$data   = trim($data);
		$texte  .= $data;
	}

	
	//Test
	//lancer_phraseur(FORUM_FILE);
	//print_r($forum);
	
	
?>