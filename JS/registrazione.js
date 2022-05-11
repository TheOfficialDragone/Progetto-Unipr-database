/**Funzione che mostra o nasconde il form in base al tipo di registrazione da effettuare */
function show()
{
    var e = document.getElementById("myDropdown");
    var codice = e.value;
    if(codice == 1)
    {
        document.getElementById("regAUTORE").style.display="block";
        document.getElementById("regUTENTE").style.display="none";
    }
    if(codice == 2)
    {
        document.getElementById("regUTENTE").style.display="block";
        document.getElementById("regAUTORE").style.display="none";
    }
}
