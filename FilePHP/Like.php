<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function like()
    {
        $queryLike="INSERT INTO utentibrani(Utente, CODBrano)
                    VALUES('".$_SESSION['username']."', '".$_SESSION['ID']."')";
							   
		if($GLOBALS['connection']->query($queryLike))
		{
			header("refresh:0.1; url=../HTML/profilo_utente.html");
		}else
		{
			echo("ERRORE");
		}
    }
?>