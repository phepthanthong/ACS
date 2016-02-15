<?php 

function protege_cookie()
{
  if (!isset($_COOKIE['visite'])) {
    $valeur = 1;
    $num = mt_rand();
    $f = "/var/www/html/ACS/TME5/cookie" . md5($num . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
  } else {
    $f = $_COOKIE['visite'];
    if ($_COOKIE['visite'] AND is_readable($f)) {
      list($valeur, $num) = file($f);
      $f2 = "/var/www/html/ACS/TME5/cookie" . md5($num . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
    } else $f2 = '';
    if ($_COOKIE['visite'] != $f2) {
      header('HTTP/1.1 403 Forbidden');
    }
  }
  if ($d = fopen($f, 'w')) {
    fputs($d, $valeur+1 . "\n$num");
    fclose($d);
 }
  setcookie('visite', $f);
  return $valeur;
}


 ?>