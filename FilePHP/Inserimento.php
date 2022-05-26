<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function inserimentoCanzone($canzone, $genere, $titolo)
	{
		$queryInserimentoCanzone="INSERT INTO brani(canzone, genere, titolo, Autore)
								  VALUES('".$canzone."', '".$genere."', '".$titolo."', '".$_SESSION['nomedarte']."')";

		if($GLOBALS['connection']->query($queryInserimentoCanzone))
		{
			header("refresh:0.1; url=../HTML/profilo_autore.html");
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
			header("refresh:0.1; url=../HTML/profilo_autore.html");
		}else
		{
			echo("ERRORE");
		}
	}
?>