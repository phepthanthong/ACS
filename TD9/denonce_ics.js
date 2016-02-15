function signaleErreur(input, re)
{
    var t = re.test(input.value);
    // pour mettre en rouge pointille les fautifs:
    input.style.border = t ? "1px solid" : '2px dashed red';
    return t;
}
