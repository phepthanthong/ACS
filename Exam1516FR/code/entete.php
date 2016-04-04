<?php
function entete($title, $links = array()) {

  $liens = '';
  foreach ($links as $link) {
      if (is_array($link)) {
          $atts = '';
          foreach ($link as $k => $v) $atts .= " $k='$v'";
          $liens .= "<link$atts />\n";
      } else {
          // Si pas un sous-tableau,
          // on considere que c'est le contenu d'une balise Style
          $liens .= "<style type='text/css'>$link</style>\n";
      }
  }
  return
    "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML Basic 1.1//EN'
		'http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd'>\n" .
    "<html xmlns='http://www.w3.org/1999/xhtml' lang='fr'>\n" .
    "<head>\n" .
    "<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />\n" .
    "<title>" . 
    $title .
    "</title>\n" .
    $liens .
    "</head>\n";
}
?>
