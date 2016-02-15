<?php
define('RE_CONTENT_TYPE', ',Content-Type:\s+\w+/([^\s;]+),');

function typer_cache($headers){
  foreach ($headers as $l) {
    if (preg_match(RE_CONTENT_TYPE, $l, $match)){
      return $match[1];
    }
  }
  return 'html';
}
?>
