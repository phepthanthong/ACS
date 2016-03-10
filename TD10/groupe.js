function groupe_td10 (form) {
    document.getElementById('u').innerHTML = '';
    document.getElementById('moyenne').style.display = 'none';
    var v = form.elements['groupe'].value;
    // construire une Query-string SECURISEE (un nombre, rien d'autre)
    if (!/^[0-9]+$/.test(v)) v = 0;
    return !ajax('get_groupe.php?groupe=' + v, '', verifier_td10);
}
