<?php
function ouvrante($parser, $name, $attrs)
{
    static $labels = array();
    global $tr;

    // La ligne suivante concerne la Question 4 + declaration global
    //une nouvelle table dont la premiere ligne n'est pas encore rencontrée
    if ($name == 'table') $tr = 0;
    if ($name == 'tr') $tr++;
    if (($name == 'td') AND ($tr==1)) $name = 'th'; 

    if (($name == 'input') AND isset($attrs['name'])){
        $id = (isset($attrs['id'])) ? $attrs['id']:$attrs['name'];
        $attrs['id'] = $id;
        if (!isset($labels[$id]) AND isset($attrs['value'])){
            echo "<label for='$id'>", $attrs['value'], "</label>\n";
        }  
    } elseif ($name == 'label')
            $labels[$attrs['for']] = true;
    
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
    global $tr;
    if (($name == 'td') AND ($tr ==1))
        $name = 'th';
    echo "</", $name, ">";
}

function texte($parser, $data)
{
    echo $data;
}
include('accessibiliser.php')
?>
