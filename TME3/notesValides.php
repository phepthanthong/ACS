<?php // notesEntrees.php
require_once("../../TM/2/entete.php");
error_reporting(E_ALL);

define('RE_NOTE_VALIDE', "/^(([0-1]?[0-9])|20)(\.(25|50|5|75))?$/");

function notesValides($notes)
{
    foreach ($notes as $etu => $note) {
        if (!preg_match(RE_NOTE_VALIDE, $note)) unset($notes[$etu]);
    }
    return $notes;
}
?>