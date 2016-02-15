<?php

#define('MIME_TYPES', '/usr/share/cups/mime/mime.types'); // MacOSX
define('MIME_TYPES', '/etc/mime.types'); // Linux

function TraiteMime ($etapes){
  $f = $etapes[2];
  if (is_executable($f))
   return array(200, '');
 elseif (preg_match('/\.(\w+)$/', $f, $a)) {
   $e = '/^\s*([^#]\S+)(\s+\S+)*\s+' . $a[1] . '(\s.*)*$/';
   foreach (file(MIME_TYPES) as $l) {
     if (preg_match($e, $l, $r)) return array(200, $r[1]);
   }
 }
 return array(200, 'text/plain');
}

?>
