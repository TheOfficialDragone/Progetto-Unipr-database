<?php
	$connection=new mysqli($GLOBALs['host'], $GLOBALs['user'], $GLOBALs['passwd'], $GLOBALs['DB_name']);
	
	function cancellazioneCanzone($genere, $titolo, $Autore)
	{
		if((isset($_SESSION['email'])) && ($_SESSION['tipoProfilo']=="autore"))
		{
			$queryCancellazioneCanzone="DELETE FROM brani
										WHERE (genere='".$_SESSION['genere']."' AND titolo='".$_SESSION['titolo']."' AND Autore='".$_SESSION['Autore']."')";
							   
			if($GLOBALS['connection']->query($queryCancellazioneCanzone))
			{
				echo("Perfetto");
			}else
			{
				echo("ERRORE");
			}
		}else
		{
			echo("ERRORE");
		}
	}
?>