<?php
	$connection=new mysqli($GLOBALs['host'], $GLOBALs['user'], $GLOBALs['passwd'], $GLOBALs['DB_name']);
	
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
		$utenteInserito=array('username'=>strtolower($_POST['username']), 'nome'=>$_POST['nome'], 'cognome'=>$_POST['cognome'], 'email'=>$emailInserita, 'password'=>$passwordInserita, 'sesso'=>$_POST['sesso']);
		
		$queryInserisciUtente=$GLOBALS['connection']->prepare("insert into utenti values('".$utenteInserito['username']."', '".$utenteInserito['nome']."', '".$utenteInserito['cognome']."', ?, '".$utenteInserito['sesso']."', '".$utenteInserito['email']."')");
		
		$password=mysqli_real_escape_string($GLOBALS['connection'], $utenteInserito['password']);
		
		$queryInserisciUtente->bin_param('s', $password);
		
		if($queryInserisciUtente->execute()==false)
		{
			echo("Errore registrazione utente");
			exit;
		}else
		{
			echo("<script type='text/javascript'>alert('Account ".$utenteInserito['username']." registrato con successo');</script");
			header("refresh:0.1; url=../pages/login.html");
		}
	}
	
	//REGISTRAZIONE DI UN AUTORE NEL DATABASE
	function registrazioneAutore($emailInserita, $passwordInserita)
	{
		$autoreInserito=array('nomedarte'=>strtolower($_POST['nomedarte']), 'genere'=>$_POST['genere'], 'nalbum'=>$_POST['nalbum'], 'password'=>$passwordInserita, 'email'=>$emailInserita);
		
		$queryInserisciAutore=$GLOBALS['connection']->prepare("insert into autori values('".$autoreInserito['nomedarte']."', '".$autoreInserito['genere']."', '".$autoreInserito['nalbum']."', ?, '".$autoreInserito['email']."')");
		
		$password=mysqli_real_escape_string($GLOBALS['connection'], $autoreInserito['password']);
		
		$queryInserisciAutore->bin_param('s', $password);
		
		if($queryInserisciAutore->execute()==false)
		{
			echo("Errore registrazione autore");
			exit;
		}else
		{
			echo("<script type='text/javascript'>alert('Account ".$autoreInserito['nomedarte']." registrato con successo');</script");
			header("refresh:0.1; url=../pages/login.html");
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
		
		header("refresh:0.1; url=../pages/login.html");
	}
?>