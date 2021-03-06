<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function ControlloEmail($emailInserita)
	{
		$queryEmail="SELECT * 
                     FROM utenti u, autori a
                     WHERE u.email='".$emailInserita."' OR a.email = '".$emailInserita."'";
					 
		$risultato=$GLOBALS['connection']->query($queryEmail);
		
		if($risultato->num_rows>0)
		{
			return -1;					//EMAIL INESISTENTE NEL DATABASE
		}else
		{
			return 1;					//EMAIL PRESENTE NEL DATABASE
		}
	}
	
	//REGISTRAZIONE DI UN UTENTE NEL DATABASE
	function registrazioneUtente($emailInserita, $passwordInserita)
	{
		$utenteInserito=array('username'=>strtolower($_POST['username']), 'nome'=>$_POST['nome'], 'cognome'=>$_POST['cognome'], 'email'=>$emailInserita, 'password'=>$passwordInserita);
		
		$queryInserisciUtente=$GLOBALS['connection']->prepare("INSERT INTO utenti VALUES('".$utenteInserito['username']."', '".$utenteInserito['nome']."', '".$utenteInserito['cognome']."', ?, '".$utenteInserito['email']."')");
		
		$password=mysqli_real_escape_string($GLOBALS['connection'], $utenteInserito['password']);
		
		$queryInserisciUtente->bind_param('s', $password);
		
		if($queryInserisciUtente->execute()==false)
		{
			echo("Errore registrazione utente");
			exit;
		}else
		{
			header("refresh:0.1; url=../HTML/login.html");
		}
	}
	
	//REGISTRAZIONE DI UN AUTORE NEL DATABASE
	function registrazioneAutore($emailInserita, $passwordInserita)
	{
		$autoreInserito=array('nomedarte'=>strtolower($_POST['nomedarte']), 'genere'=>$_POST['genere'], 'password'=>$passwordInserita, 'email'=>$emailInserita);
		
		$queryInserisciAutore=$GLOBALS['connection']->prepare("INSERT INTO autori VALUES('".$autoreInserito['nomedarte']."', '".$autoreInserito['genere']."', ?, '".$autoreInserito['email']."')");
		
		$password=mysqli_real_escape_string($GLOBALS['connection'], $autoreInserito['password']);
		
		$queryInserisciAutore->bind_param('s', $password);
		
		if($queryInserisciAutore->execute()==false)
		{
			echo("Errore registrazione autore");
			exit;
		}else
		{
			header("refresh:0.1; url=../HTML/login.html");
		}
	}
	
	function registrazione($tipoRegistrazione, $postEmail, $postPasswd)
	{
		if(ControlloEmail($_POST['email'])<0)
		{
			echo("ERRORE!");
			exit;
		}
		
		if($tipoRegistrazione=="utente")
		{
			registrazioneUtente($postEmail, $postPasswd);
		}else if($tipoRegistrazione=="autore")
		{
			registrazioneAutore($postEmail, $postPasswd);
		}else
		{
			echo("Errore tipologia registrazione");
			exit;
		}
		
		header("refresh:0.1; url=../HTML/login.html");
	}
?>