function resultat_insertion(xhr){
	if ( xhr.readyState == 4 ) {
	  if (xhr.status == 401) {
		  alert("Erreur 401: Non authorisé");
	  }else if(xhr.status == 400){
		  alert("Erreur 400: Mauvaise requête");
	  }else if(xhr.status == 200){
		  alert("Code 200: Commentaire inséré");
	  }
	}	  
}