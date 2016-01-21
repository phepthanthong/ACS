<?php
error_reporting(E_ALL);
require_once("../../TM/2/entete.php");
require_once('ShowForm.php');
echo entete("Etudiant");
echo   "<body>\n","<h1>Etudiant</h1>\n";
if (isset($_POST['mail']) AND isset($_POST['numEt'])){
 echo saisies_en_table($_POST, "Informations");
} else {
 echo "<form action='' method='post'><fieldset>\n",
   "<label for='numEt'>Numéro d'Étudiant :</label>",
   "<input id='numEt' name='numEt' />\n",
   "<label for='mail'>Mail :</label>",
   "<input id='mail' name='mail' />\n",
   "<input type='submit' value='Envoyer'>\n",
   "</fieldset></form>\n";
}
?>
</body>
</html>

