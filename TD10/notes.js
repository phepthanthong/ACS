function notes (form) {
    var t = true;
    var qs = '';
    for (var e in form.elements) {
	var i = form.elements[e];
	if ((i.tagName == 'INPUT') && i.type == 'text') {
	    if (!/^(20|[01]?[0-9](|.25|.50?|.75))$/.test(i.value)) {
		i.style.border = '2px solid red';
		t = false;   
	    } else {
		i.style.border = '1px solid black';
		if (t)
		    qs += i.name + '=' + i.value + "&";
	    }
	}
    }
    if (t) ajax('entrer_notes.php?' + qs, '', moyenne);
    return false;
}
