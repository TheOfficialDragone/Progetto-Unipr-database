<?php
	function getTipoAccount()
	{
		echo($_SESSION['tipoProfilo']);
	}
	
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function getElencoCanzoni()
	{
		$queryElencoCanzoni="SELECT *
							 FROM brani";
							 
		$risultato=$GLOBALS['connection']->query($queryElencoCanzoni);
		
		if($risultato->num_rows>0)
		{
			$elenco=array();
			
			while($row=$risultato->fetch_assoc())
			{
				array_push($elenco, $row);
			}
			
			echo json_encode($elenco);
		}else
		{
			echo("ERRORE");
		}
	}
	
	function getCanzoni()
	{
		$queryAlbum="SELECT a.*
					 FROM album a, autori au
					 WHERE a.AUtore=au.nomedarte
					 AND au.email='".$_SESSION['email']."'";
		
		$risultato=$GLOBALS['connection']->query($queryAlbum);
		
		if($risultato->num_rows>0)
		{
			$album=array();
			
			while($row=$risultato->fetch_assoc())
			{
				array_push($album, $row);
			}
			
			echo json_encode($album);
		}else
		{
			echo("ERRORE");
		}
	}
	
	function HomePage()
	{
		if(isset($_SESSION['email']))
		{
			$tipoProfilo=$_SESSION['tipoProfilo'];
			
			if($tipoProfilo=="utente")
			{
				getElencoCanzoni();
			}else if($tipoProfilo=="autore")
			{
				getCanzoni();
			}
		}else
		{
			echo("ERRORE");
		}
	}
?>