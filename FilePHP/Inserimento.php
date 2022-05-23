<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function inserimentoCanzone($canzone, $genere, $titolo)
	{
		if((isset($_SESSION['email'])) && ($_SESSION['tipoProfilo']=="autore"))
		{
			$branoInserito=array('canzone'=>$canzone, 'genere'=>$genere, 'titolo'=>$titolo);

			$queryInserimentoCanzone=$GLOBALS['connection']->prepare("INSERT INTO brani(canzone, genere, titolo)
									  								  VALUES('".$branoInserito['canzone']."', '".$branoInserito['genere']."', '".$branoInserito['titolo']."')");

			

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
			$queryInserimentoAlbum="INSERT INTO album(titolo, nbrani)
									VALUES('".$titolo."', '".$nbrani."')";
							   
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