function presente_tableau(suite, ol) {
    var r,c,l,i;

    while (r = /^([^;]+);?(.*)$/.exec(suite)) {
        suite = r[2];
        c = document.createElement('li');
        i = document.createElement('input');
        l = document.createElement('label');
        l.appendChild(document.createTextNode(r[1]));
        i.style.margin = '0.5em';
        i.name = 'n[' + r[1] + ']';
        // un ID ne peut contenir '[', donc ici id!=name
        //k++;
        i.id = r[1];
        // Attention on ne peut ecrire l.for car "for" est une instruction JS
        l.setAttribute('for', r[1]);
        // Concatenation du tout
        c.appendChild(l)
        c.appendChild(i);
        ol.appendChild(c);
    }
}
