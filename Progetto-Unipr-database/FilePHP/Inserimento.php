<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function inserimentoCanzone($audio, $genere, $titolo, $video)
	{
		if((isset($_SESSION['email'])) && ($_SESSION['tipoProfilo']=="autore"))
		{
			$queryInserimentoCanzone="INSERT INTO brani(audio, genere, titolo, video, CODAlbum, Autore)
									  VALUES('".$audio."', '".$genere."', '".$titolo."', '".$video."', '".$_SESSION['CODAlbum']."', '".$_SESSION['Autore']."')";
							   
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
	
	function inserimentoAlbum($titolo, $nbrani)
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