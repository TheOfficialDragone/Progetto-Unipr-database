<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function cancellazioneCanzone($genere, $titolo)
	{
		$queryCancellazioneCanzone="DELETE FROM brani
									WHERE (genere='".$genere."' AND titolo='".$titolo."' AND Autore='".$_SESSION['nomedarte']."')";
							   
		if($GLOBALS['connection']->query($queryCancellazioneCanzone))
		{
			header("refresh:0.1; url=../HTML/profilo_autore.php");
		}else
		{
			echo("ERRORE");
		}
	}
?>