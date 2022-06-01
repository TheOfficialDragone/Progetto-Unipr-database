<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function segui()
    {
        $querySeguiAutore="INSERT INTO utentiautori(Utente, Autore)
                           VALUES('".$_SESSION['username']."', '".$_SESSION['nomedarte']."')";
							   
		if($GLOBALS['connection']->query($querySeguiAutore))
		{
			header("refresh:0.1; url=../HTML/profilo_utente.html");
		}else
		{
			echo("ERRORE");
		}

    }
?>