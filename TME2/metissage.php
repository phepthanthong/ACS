<?php 
include("entete.php");
$entete = entete("ACS - TME2");
$date = date("F j, Y, g:i a");
echo $entete . "<body><h1>Date du jour: $date</h1></body></html>";

 ?>