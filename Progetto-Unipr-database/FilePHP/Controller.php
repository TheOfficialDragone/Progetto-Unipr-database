<?php
    include "Account.php";
    include "Cancellazione.php";
    include "DataBase_Connection.php";
    include "HomePage.php";
    include "Inserimento.php";
    include "Login.php";
    include "Logout.php";
    include "Registrazione.php";
    include "VisualizzaAccount.php";
    include "Ricerca.php";

    if(!isset($_SESSION['email']))
    {
        session_start();
    }

    $scelta=$_REQUEST['azione'];

    switch($scelta)
    {
        case "login":
            login($_POST["email"], hash("md5", $_POST["password"]));
            break;
        case "logout":
            logout();
            break;
        case "registrazione":
            registrazione($_REQUEST['tipoRegistrazione'], strtolower($_POST['email']), hash("md5", $_POST["password"]));
            break;
        case "tipo_profilo":
            getTipoAccount();
            break;
        case "home_page":
            HomePage();
            break;
        case "account":
            getAccount();
            break;
        case "inserisci_canzone":
            inserimentoCanzone($_REQUEST['audio'], $_REQUEST['genere'], $_REQUEST['titolo'], $_REQUEST['video']);
            break;
        case "inserisci_album":
            inserimentoAlbum($_REQUEST['titolo'], $_REQUEST['nbrani']);
            break;
        case "canellazione_canzone":
            cancellazioneCanzone($_REQUEST['genere'], $_REQUEST['titolo']);
            break;
        case "ricerca":
            ricerca($_POST['brano']);
            break;
        default: 
            echo("ERRORE");
    }
?>
