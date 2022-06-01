<?php
    include "Cancellazione.php";
    include "Inserimento.php";
    include "Login.php";
    include "Logout.php";
    include "Registrazione.php";
    include "VisualizzaAccount.php";
    include "Ricerca.php";
    include "Segui.php";
    include "Like.php";

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
            inserimentoCanzone($_POST['canzone'], $_POST['genere'], $_POST['titolo'], $_POST['CODAlbum']);
            break;
        case "inserisci album":
            inserimentoAlbum($_POST['titolo'], $_POST['tipologia']);
            break;
        case "canellazione canzone":
            cancellazioneCanzone($_POST['genere'], $_POST['titolo']);
            break;
        case "ricerca brano":
            ricercaBrano($_POST['brano']);
            break;
        case "ricerca autore":
            ricercaAutore($_POST['autore']);
            break;
        case "segui":
            segui();
        case "like":
            like();
        default: 
            echo("ERRORE");
    }
?>
