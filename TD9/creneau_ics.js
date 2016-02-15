var pas_question = false;

function controleJour(input) {
    pas_question = !re_jour.test(input.value);
    if (!pas_question) return;
    alert('jour incorrect: ' +  input.value);
    pas_question = input;
}

function controleHeure(input) {
    pas_question = !re_heure.test(input.value);
    if (!pas_question) return;
    alert('heure incorrecte: ' + input.value);
    pas_question = input;
}

function controleICS(input) {
    pas_question = !re_ics.test(input.value);
    if (!pas_question) return;
    alert('fichier incorrect: ' + input.value);
    pas_question = input;
}

function focusInterdit()
{
    if (pas_question) pas_question.focus();
    pas_question = false;
}

function init_ics() {
    document.getElementById('jour').value = date8chiffres();
    document.getElementById('debut').value = 120000;
    document.getElementById('fin').value = 130000;
    // Ceci est rejete car dangereux par les navigateurs
    // document.getElementById('ICS').value = 'defaut.ics';
    var i = document.getElementsByTagName('input');
    if (i) i[0].focus();
}
