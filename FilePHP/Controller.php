<?php
    include "Cancellazione.php";
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
        case "account":
            visualizzaProfilo();
            break;
        case "inserisci canzone":
            inserimentoCanzone($_POST['canzone'], $_POST['genere'], $_POST['titolo']);
            break;
        case "inserisci album":
            inserimentoAlbum($_POST['titolo'], $_POST['tipologia']);
            break;
        case "canellazione canzone":
            cancellazioneCanzone($_POST['genere'], $_POST['titolo']);
            break;
        case "ricerca":
            ricerca($_POST['brano']);
            break;
        default: 
            echo("ERRORE");
    }
?>
