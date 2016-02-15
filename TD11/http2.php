<?php

// Utilser la notation "?:" après une "(" pour que la sous-chaine delimitee
// par la paire de parentheses ne soit pas recopiee dans le tableau final

define('RE_SPLIT_URL', '@^(?:\w+://([^/:]+)(?::(\d+))?)?(/[^?]*)[?]?(.*)$@');

// Separer la Query-string du reste.
function TraiteUrl ($etapes){
    if (!preg_match(RE_SPLIT_URL, $etapes[0], $a))
        return array(400, "Bad Request");
    // retirer la copie de toute la chaine, le reste est ce qu'il faut.
    array_shift($a);
    if ($a[1] === '') $a[1] = 80; //gestion du port
    // 0: server
    // 1: port
    // 2: ressource
    // 3: Query-string
    return array(200, $a);
}

// Test
var_dump(TraiteUrl(array("https://www-licence.ufr-info-p6.jussieu.fr:443/lmd/licence/2014/ue/pacs-2015fev/Un-serveur-HTTP-minimal?var_mode=preview")));
?>
