<?php

function saisie_fiable($t, $index, $re='', $defaut='')
{
    if (!isset($t[$index])) return $defaut;
	return (!$re OR preg_match($re, $t[$index])) ? True : False;
}
?>
