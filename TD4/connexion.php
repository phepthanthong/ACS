<?php

// Fonction qui envoie une commande au serveur POP3 
// et renvoie vrai ssi le retour commence par "+OK"
// $com ne doit pas contenir CR/LF

function commande($sock,$com){
        fputs($sock, trim($com) . "\r\n");
        $reponse = fgets($sock);
        return preg_match("/^\+OK/",$reponse) ? $reponse : false;
}

// Fonction de connexion à un serveur POP3
// Le timeOut est fixé à 5 secondes (par défaut 300s)
function connexion($server,$user,$pass){
        $sock = fsockopen($server,110,$errno,$errstr,5);
        if ($sock == false){
                echo "Erreur de connexion au serveur POP [$errno] : $errstr\n";
                return false;
        } else {
                // Chercher le message de bienvenue du serveur
                $reponse = fgets($sock);
                // Envoi de la commande USER
                $res = commande($sock,"USER " . $user);
                if ($res){
                        // Envoi de la commande PASS
                        $res = commande($sock,"PASS " . $pass);
                        if ($res) {
			  // L'utilisateur est reconnu
			  // on retourne le descripteur de socket
                                return $sock;
                        } else {
                                return false;
                        }
                } else {
                        return false;
                }
        }
}       
?>
