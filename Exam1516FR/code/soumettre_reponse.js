function soumettre_reponse(form){
	//r�cup�ration des valeur du formulaire
	var post_id = form.elements["id_post"].value;
	var texte	= form.elements["texte"].value;
	
	//G�n�ration de la date
	var d		= new Date();	
	var dString = d.getDate() + "/" + d.getMonth() + "/" + d.getFullYear();
	
	//construction de l'url
	var url = "forum.http.php?id_post="+post_id+"&texte="+texte+"&date="+dString;
	
	ajax(url, "", resultat_insertion, "GET");
	
	return false;
}
