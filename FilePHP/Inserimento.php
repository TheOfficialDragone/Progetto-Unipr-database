<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function inserimentoCanzone($canzone, $genere, $titolo, $CODAlbum)
	{
		$queryInserimentoCanzone="INSERT INTO brani(canzone, genere, titolo, CODAlbum, Autore)
								  VALUES('".$canzone."', '".$genere."', '".$titolo."', '".$CODAlbum."', '".$_SESSION['nomedarte']."')";

		if($GLOBALS['connection']->query($queryInserimentoCanzone))
		{
			header("refresh:0.1; url=../HTML/profilo_autore.php");
		}else
		{
			echo("ERRORE");
		}
	}
	
	function inserimentoAlbum($titolo, $tipologia)
	{
		$queryInserimentoAlbum="INSERT INTO album(titolo, tipologia, Autore)
								VALUES('".$titolo."', '".$tipologia."', '".$_SESSION['nomedarte']."')";
							   
		if($GLOBALS['connection']->query($queryInserimentoAlbum))
		{
			header("refresh:0.1; url=../HTML/profilo_autore.php");
		}else
		{
			echo("ERRORE");
		}
	}
?>