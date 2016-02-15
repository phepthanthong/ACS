<?php 
// 1. 5.5.9-1ubuntu4.14
// 2. Oct 28 2015 01:34:23
// 3. $_SERVER
include 'entete.php';
include "array_to.php";
error_reporting(E_ALL);
echo entete("ACS - TME2"); 
echo "<body>";
echo tableau_en_table($_SERVER, "Valeur du variable super global");
echo "</body></html>";

?>
