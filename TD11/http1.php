<?php


// $infos[][]
// 0: Url
// 1: [0]server, [1]port, [2]ressource, [3]qs (TraiteUrl)
// 2: $_SERVER[’PHP_AUTH_USER’] (TraiteAuth)
// 3: DocumentRootPath (TraitePerso)
// 4: "" (Check of TraiteControle)
// 5: type mime (TraiteMime)
// 6: "" (TraiteReponse)
// 7: "" (TraiteLog)
function serveur($url)
{
        $infos = array($url);
        foreach (
        array('TraiteUrl', 'TraiteAuth', 'TraitePerso', 'TraiteControle',
              'TraiteMime', 'TraiteReponse') as $etape)
        {
          list($status, $reponse) = $etape($infos);
          if(200 == $status)
            {$infos[] = $reponse;}
          else
          {
            header("HTTP/1.1 $status");
            echo $reponse;
            break;
          }
        }
        TraiteLog($infos);
}
?>
