function controleFormICS(form) {
    var t = true;
    t &= signaleErreur(form.elements['jour'], re_jour);
    t &= signaleErreur(form.elements['debut'], re_heure);
    t &= signaleErreur(form.elements['fin'], re_heure);
    t &= signaleErreur(form.elements['ICS'], re_ics);
    if (!t) return false;
    if (form.elements['fin'].value >= form.elements['debut'].value) return true;
    alert('fin avant debut ');
    return false;
}
