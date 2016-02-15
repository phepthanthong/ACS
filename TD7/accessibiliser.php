<?php
function accessibiliser($file) {
        $xml_parser = xml_parser_create();
        xml_set_element_handler($xml_parser, "ouvrante", "fermante");
        xml_set_character_data_handler($xml_parser, "texte");
        xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, false);
        if (!($f = fopen($file, "r"))) {
          die("Impossible d'ouvrir le fichier '$file'");
        }

        while ($data = fread($f, 1024)) {
          if (!xml_parse($xml_parser, $data, feof($f))) {
            die(sprintf("erreur XML : %s ligne %d",
                        xml_error_string(xml_get_error_code($xml_parser)),
                        xml_get_current_line_number($xml_parser)));
          }
        }
        xml_parser_free($xml_parser);
} 
header('Content-Type: text/plain');
accessibiliser("test.html");   
?>