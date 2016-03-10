function moyenne(xhr) {
    if (xhr.readyState == 4) {
	var r = document.getElementById('moyenne');
	r.replaceChild(document.createTextNode('Moyenne : ' + xhr.responseText),
		       r.firstChild);
	r.style.display = 'block';	
	document.getElementById('label-groupe').style.color = 'black';
	document.getElementById('f2').style.display = 'none';
    }
}
