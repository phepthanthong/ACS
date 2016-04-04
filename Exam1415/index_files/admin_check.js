// utilitaires Ajax (code pour Spip 1.9, remplace par JQuery ensuite)

function createXmlHttp() {
    return  (window.XMLHttpRequest) ?
	new XMLHttpRequest() :
	((window.ActiveXObject)  ?
	 new ActiveXObject("Microsoft.XMLHTTP") :
	 false);
}

function ajah(url, mode, rappel, flux, method)
{
	var xhr = createXmlHttp();
	if (!xhr) return false;
	xhr.onreadystatechange = function () {if (rappel) ajahReady(xhr, rappel);}
	xhr.open(method ? method : 'GET', url, mode);
	// Necessaire au mode POST
	// Il manque la specification du charset
	if (flux) {
		xhr.setRequestHeader("Content-Type",
		       "application/x-www-form-urlencoded; ");
	}
	xhr.send(flux);
	return true;
}

function ajahReady(xhr, f) {
	if (xhr.readyState == 4) {
		if (xhr.status > 200) // Opera dit toujours 0 !
                      {f('Erreur HTTP :  ' +  xhr.status);}
            else  {if (f) f(xhr.responseText); }
        }
}

function rafraichir_lire(id_auteur, id_rubrique, dernier, duree)
{
    var url = 'spip.php?action=rafraichir_test' + 
	    '&id_rubrique=' + id_rubrique +
	    '&id_auteur=' + id_auteur +
	    '&date=' + dernier;

    ajah(url, 
	 true,
	 function (date) 
	    {rafraichir_tester(date, id_auteur, id_rubrique, dernier, duree)});
}

function rafraichir_tester(date, id_auteur, id_rubrique, dernier, duree)
{
    // si rien de neuf sur le serveur, reeclencher l'alarme
    // Ce qui serait mieux c'est de ne faire ca que le jour de l'examen
   //  alert(rappel + ' duree: ' + duree + '  date: ' + date);
   if (parseInt(date)) {
       if (date <= dernier) {
	   var rappel = 'rafraichir_lire(' +
	       id_auteur + ',' + id_rubrique + ',' + dernier + ',' + duree + ')';
	   setTimeout(rappel, duree);
       } else {
	   // sinon rafraichir
	   var r = document.createElement('meta');
	   r.setAttribute('http-equiv', "Refresh");
	   r.content=1;
	   document.getElementsByTagName('head')[0].appendChild(r);
       }
   }
}

function setCheckBoxes(form)
{
    var elts = form.elements;
    var elts_cnt  = (typeof(elts.length) != 'undefined')
                  ? elts.length
                  : 0;
    if (elts_cnt) {
        for (var i = elts_cnt-1; i >= 0 ; i--) {
            elts[i].checked = !elts[i].checked;
        }
    } else {
        elts.checked        =  !elts.checked;
    }

    return false;
}

function CountCheckBoxes(form, msg)
{
    var elts = form.elements;

    var elts_cnt  = (typeof(elts.length) != 'undefined')
                  ? elts.length
                  : 0;
    j = 0
    if (elts_cnt) {
        for (var i = elts_cnt-1; i >= 0 ; i--) {
            if (elts[i].checked) j++;
	}
    }

    if (j == 0) alert(msg);
    return j > 0;
}

function addSearchProvider(url) {
	try {window.external.AddSearchProvider(url);}
	catch (e) {alert('AddSearchProvider ?');return;}
}
