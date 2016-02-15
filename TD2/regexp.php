<?php

//1.
define('RE_MAIL', '/^([A-Z][a-z]+(-[A-Z][a-z]+)?)\.([A-Z][a-z]+(-[A-Z][a-z]+)?)@etu\.upmc\.fr$/');

//2.
function titulaire_mail($mail) {
  if (preg_match(RE_MAIL, $mail, $m))
      return $m[1] . ' ' . $m[3];
  return false;
}

//3.
// definir une RegExp bout par bout:
$re = '[A-Z]\w*';
$re = "$re(-$re)*";
# Ne pas écrire "/^$re[.]", PHP fait une erreur
#si on veut [.] mettre "/^" . $r . "[.].....
$re = "$re\.$re@\w+(\.\w+)*";
define('RE_MAIL_ETENDU',"/^($re)|([^<]*<$re>)$/");


//$test = array("Anne@etu.upmc.fr",
// 		"Anne-Marie.Manne-Ari@etu.upmc.fr",
// 		"Anne.Manne-Arie@etu.upmc.fr",
// 		"Anne.Manne@etu.upmc.fr",
// 		"Anne-Marie.Manne@etu.upmc.fr",
// 		"A.B@etu.upmc.fr",
// 		"Rien");
// 
// for ($i =0; $i<count($test); $i++)
//   echo $test[$i], "\t", titulaire_mail($test[$i]), "\n";
?>