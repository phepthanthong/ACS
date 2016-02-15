<?php

//Etape 2
function TraiteAuth ($etapes) {
  return array(200,@$_SERVER['PHP_AUTH_USER']);
}

//Etape 3
define('RE_HTTP_CONF', '@^\s*(\w+)\s*(.*)$@');

function TraitePerso ($etapes){
    $path = function_exists('TraiteDocumentRoot') ?
        TraiteDocumentRoot($etapes) : '/tmp/';
    $noms = preg_split(',/+,',  $etapes[1][2]);
    array_shift($noms); // saute le "" initial
    foreach($noms as $nom) {
        $file = $path . "/.htaccess";
        if (file_exists($file)) {
            if (!is_readable($file) OR (fileperms ($file) & 2)) {
                return array(500, "Probleme d’acces sur $file");
            } else {
                foreach(file($file) as $ligne) {
                    if (preg_match(RE_HTTP_CONF, $ligne, $m)) {
                        if (function_exists($f = 'TraiteHtaccess_' . $m[1])) {
                            $res = $f($etapes, $m[2]);
                            if ($res) return $res;
                        }
                    }
                }
            }
        }
        $path .= '/' . $nom;
    }
    return array(200, $path);
}

function TraiteHtaccess_require($etapes, $arg)
{
    if (($arg == 'valid $user') AND !$etapes[2])
        return array(401, "Demande d'authentification");
    else return array();
}
// Test
// TraitePersoRoot (array(1 => array(2 => '/a/b/c.txt')), '');
?>
