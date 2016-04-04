function voir_message(billetElement){
	var elementToHide = document.getElementsByClassName("comments");
	for(var i = 0; i < elementToHide.length; i++){
		elementToHide[i].style.display = "none";
	}
	
	billetElement.getElementsByClassName("comments")[0].style.display="block";
}