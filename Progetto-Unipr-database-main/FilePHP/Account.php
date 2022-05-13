<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function getInfoUtenti()
	{
		$queryInfoUtente="SELECT *
						  FROM utenti
						  WHERE username='".$_SESSION['username']."'
						  AND email='".$_SESSION['email']."'";
		
		$risultato=$GLOBALS['connection']->query($queryInfoUtente);
		
		if($risultato->num_rows>0)
		{
			$utente=array();
			
			while($row=$risultato->fetch_assoc())
			{
				array_push($utente, $row);
			}
			
			echo json_encode($utente);
		}else
		{
			echo("ERRORE");
		}
	}
	
	function getInfoAutore()
	{
		$queryInfoAutore="SELECT *
						  FROM autori
						  WHERE nomedarte='".$_SESSION['nomedarte']."'
						  AND email='".$_SESSION['email']."'";
		
		$risultato=$GLOBALS['connection']->query($queryInfoAutore);
		
		if($risultato->num_rows>0)
		{
			$autore=array();
			
			while($row=$risultato->fetch_assoc())
			{
				array_push($autore, $row);
			}
			
			echo json_encode($autore);
		}else
		{
			echo("ERRORE");
		}
	}
	
	function getAccount()
	{
		if(isset($_SESSION['email']))
		{
			$tipoProfilo=$_SESSION['tipoProfilo'];
			
			if($tipoProfilo=="utente")
			{
				getInfoUtenti();
			}else if($tipoProfilo=="autore")
			{
				getInfoAutore();
			}
		}else
		{
			echo("ERRORE");
		}
	}
?>