<?php
define('RE_EXPIRE', "%^Expires: (.*)%");

function limiter_cache($headers){
  foreach($headers as $l){
    if (preg_match(RE_EXPIRE, $l, $match)){
      return  (strtotime($match[1]) < time()) ;
    }
  }
  return true;
}
?>
