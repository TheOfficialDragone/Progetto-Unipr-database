<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
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