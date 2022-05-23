<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function inserimentoCanzone($canzone, $genere, $titolo)
	{
		if((isset($_SESSION['email'])) && ($_SESSION['tipoProfilo']=="autore"))
		{
			$queryInserimentoCanzone="INSERT INTO brani(canzone, genere, titolo)
									  VALUES('".$canzone."', '".$genere."', '".$titolo."')";
							   
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
									VALUES('".$titolo."', '".$nbrani."', '".$_SESSION['Autore']."')";
							   
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