var nbadeviner = 0;

function init() {
	nbadeviner = Math.floor((Math.random() * 10) + 1);	
	console.log(nbadeviner);
	var d = setTimeout(function () {
		var check = confirm("PERDU !! CLICK OK POUR REJOUER");
		if (check == true){
			init();
		} else {
			clearTimeout(d);
		}
		//clearTimeout(d);
	}, 3000);
}

function controle(input) {
	var regex = /\d+/ ;
	var saisie = input.value;
	if (!regex.test(saisie)) {
		alert("FARCEUR !!!");
	} else if (saisie < nbadeviner) {
		alert("C'est plus !");
	} else if (saisie > nbadeviner) {
		alert("C'est moins !");
	}

	if (saisie == nbadeviner) {
		alert("GAGNE !");
	}
}