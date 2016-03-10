<?php
require('../../TM/2/tableau_en_table.php');

function tableau_mail($num, $entetes, $message){

  foreach ($entetes as $k=>$v) {
    if (is_array($v)) {
        $v = "<ul><li>" .
            join("</li><li>", array_map("htmlspecialchars", $v)) .
            "</li></ul>";
    } $v = htmlspecialchars($v);
    $entetes[$k] = preg_replace("/\n/s", "<br />\n");
  }
  $message = preg_replace("/\r\n/s", "<br />\n", htmlspecialchars($message));
  $message = "<tr><td colspan='2'>$message</td></tr>\n</table>";
  return preg_replace('@</table>@', $message, tableau_en_table($entetes, "Mail $num"));
}
?>
