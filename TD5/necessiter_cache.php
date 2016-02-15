<?php
define('RE_HTTP200', "%^HTTP.*200 OK%");
define('RE_NOCACHE', "%^(Pragma|Cache-Control):.*no-cache%");

function necessiter_cache($entetes)
{
    if (!preg_match(RE_HTTP200, array_shift($entetes)))
        return False;
    foreach($entetes as $h)
        if (preg_match(RE_NOCACHE, $h)) return False;
    return True;
}
?>
