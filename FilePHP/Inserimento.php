<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function inserimentoCanzone($audio, $genere, $titolo, $video, $CODAlbum, $Autore)
	{
		if((isset($_SESSION['email'])) && ($_SESSION['tipoProfilo']=="autore"))
		{
			$queryInserimentoCanzone="INSERT INTO brani(audio, genere, titolo, video, CODAlbum, Autore)
									  VALUES('".$_SESSION['audio']."', '".$_SESSION['genere']."', '".$_SESSION['titolo']."', '".$_SESSION['video']."', '".$_SESSION['CODAlbum']."', '".$_SESSION['Autore']."')";
							   
			if($GLOBALS['connection']->query($queryInserimentoCanzone))
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
	
	function inserimentoAlbum($titolo, $nbrani, $Autore)
	{
		if((isset($_SESSION['email'])) && ($_SESSION['tipoProfilo']=="autore"))
		{
			$queryInserimentoAlbum="INSERT INTO brani(titolo, nbrani, Autore)
									VALUES('".$_SESSION['titolo']."', '".$_SESSION['nbrani']."', '".$_SESSION['Autore']."')";
							   
			if($GLOBALS['connection']->query($queryInserimentoAlbum))
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