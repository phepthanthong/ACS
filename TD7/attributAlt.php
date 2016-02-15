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
    if (($name == 'img') AND !isset($attrs['alt'])) {
        $src = isset($attrs['src']) ? $attrs['src'] : '';
        if (preg_match("@([^/]+)\.\w+$@", $src, $m))
            $attrs['alt'] = $m[1];
        else $attrs['alt'] = 'inconnu';
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