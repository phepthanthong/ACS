<?php
function ouvrante($parser, $name, $attrs)
{
  echo "<$name";
  foreach (ouvrante_attrs($name, $attrs) as $k => $v)
      echo " $k='", htmlspecialchars($v), "'";
  echo ">";
}

function ouvrante_attrs($name, $attrs)
{
    static $titles = array();
    if (($name == 'img') AND !isset($attrs['alt'])) {
        $src = isset($attrs['src']) ? $attrs['src'] : '';
        if (preg_match("@([^/]+)\.\w+$@", $src, $m))
            $attrs['alt'] = $m[1];
        else $attrs['alt'] = 'inconnu';
    } else if (($name == 'a') AND isset($attrs['href'])) {
        $pred = isset($titles[$attrs['href']]) ? $titles[$attrs['href']] : '';
        if (!isset($attrs['title'])) {
            if (!$pred)                
                $pred = 'Lien ' . (count($titles)+1);
            $attrs['title'] = $pred;
        } else {
            if ($pred AND ($attrs['title'] != $pred))
                $attrs['title'] = $pred;          
            else
                $pred = $attrs['title']; 
        }
        $titles[$attrs['href']] = $pred;
    }
    return $attrs;
}

function fermante($parser, $name)
{
    echo "</", $name, ">";
}

function texte($parser, $data)
{
    echo $data;
}
include('accessibiliser.php')
?>