<?php
function get_histogram($forum, $users){
    $svg = "<svg width='500' height='500'>\n<g>\n";
	$max = 0;
    $nbContrib = array();
    foreach ($forum as $post){
        $responses = $post["responses"];
        foreach($responses as $response){
            $userId 	= $response["user"];				
            $userName 	= $users[$userId];
            if(!isset($nbContrib[$userName]))
                $nbContrib[$userName] = 1;
            else
                $nbContrib[$userName]++;
        }
    }
		
	$posX 	= 10;
    $maxHeight 	= max($nbContrib)*10;
		
    foreach($nbContrib as $userName => $nb){
        $height = $nb * 10;
        $posY	= $maxHeight - $height;
        $posYText = $maxHeight + 20;
        $svg .= "\t<rect width='30' height='$height' x='$posX' y='$posY' />\n";
        $svg .= "\t<text x='$posX' y='$posYText' font-size='60%'>$userName</text>\n\n";
		
        $posX = $posX + 100;
    }
    $svg .= "</g>\n</svg>\n";
    return $svg;
}
	
//Test
require_once("constantes.php");
require_once("functions.php");
require_once("forum.sax.php");
lancer_phraseur(FORUM_FILE);
	
echo get_histogram($forum, $users);
?>