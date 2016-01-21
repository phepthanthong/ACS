<?php
function deconnexion($sock){
	fputs($sock, "QUIT\r\n");
	echo fgets($sock) . "\n";
	@fclose($sock);
}
?>