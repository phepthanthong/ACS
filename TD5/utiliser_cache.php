<?php
// Constante indiquant le nombre maximum de cache
define('MAXCACHES', 6);
// Répertoire des caches
define('DIRCACHE', 'Cache/');
// Fichier de la table des caches : md5 => date (en secondes depuis le 1/1/1970)
define('CACHEFILE', 'Cache/caches');
// Analyses
define('RE_URL', "%http://([^/:]*)(:(\d+))?(/.*)$%");

include('actualiser_cache.php');
include('limiter_cache.php');
include('memoriser_cache.php');
include('nettoyer_cache.php');
include('alimenter_cache.php');
include('trouver_cache.php');
include('typer_cache.php');
include('necessiter_cache.php');

function utiliser_cache($url)
{
    $md5 = md5($url);
    $h = trouver_cache(DIRCACHE . $md5);
    if ($h AND !limiter_cache($h)) {
      actualiser_cache($md5);
      foreach ($h as $l) header($l);
      readfile(DIRCACHE . $md5 . "." . typer_cache($h));
    } elseif (!preg_match(RE_URL,$url,$m)) {
      header('HTTP/1.1 400');
      echo "URL incomprise";
    } else {
        list($entetes, $page) = alimenter_cache($m[1], $m[4], $m[3] ? $m[3] : 80);
        if (!$entetes) {
            header('HTTP/1.1 400');
            echo "Serveur injoignable";
        } else {
            if (necessiter_cache($entetes)
            AND memoriser_cache(DIRCACHE . $md5, $entetes, $page)) {
            // En PHP, pour une condition avec AND le second argument n'est pas tester si le premier est faux
                actualiser_cache($md5);
            }
        }
    }
}
// Pour tester (avec utiliser_cache.php?URL sans meme de truc=URL):
utiliser_cache($_SERVER["QUERY_STRING"]);
?>
