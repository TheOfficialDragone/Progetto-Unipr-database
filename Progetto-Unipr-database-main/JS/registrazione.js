/**Funzione che mostra o nasconde il form in base al tipo di registrazione da effettuare */
function show()
{
    var e = document.getElementById("myDropdown");
    var codice = e.value;
    if(codice == 1)
    {
        document.getElementById("registrazioneAutore").style.display="block";
        document.getElementById("registrazioneUtente").style.display="none";
    }
    if(codice == 2)
    {
        document.getElementById("registrazioneUtente").style.display="block";
        document.getElementById("registrazioneAutore").style.display="none";
    }
}
