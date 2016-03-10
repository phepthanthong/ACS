function verifier_td10(xhr) {
    var r;
    if ( xhr.readyState == 4 ) {
	  if (xhr.status == 204) {
	      document.getElementById('label-groupe').style.color = 'red';
	      document.title += ' Erreur';
	  } else if (xhr.status == 200) {
	      document.getElementById('label-groupe').style.color = 'green';
	      r = /^(.*) Erreur$/.exec(document.title);
	      if (r) document.title = r[1];
	      r = document.getElementById('u');
	      presente_tableau(xhr.responseText, r);
	      document.getElementById('f2').style.display = 'block';	      
	      // On ne peut donner le focus que si display != none
	      u.firstChild.firstChild.nextSibling.focus();
	  } else { alert('status ' + xhr.status);}
      }
}
