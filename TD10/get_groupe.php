<?php
$groupes = array(
		 1 => array('1234567', '1234568', '1234569'),
		 2 => array('1234557', '1234587', '1234597', '1334567'),
		 3 => array('1434567', '1534567'),
		 4 => array('1634567', '1734567', '1834567')
		 );

if (!isset($_GET['groupe']) OR !isset($groupes[$_GET['groupe']])) {
    header("HTTP/1.1 204 No Content");
} else {
  header('Content-Type: text/plain');
  echo join(";", $groupes[$_GET['groupe']]) . ';';
}