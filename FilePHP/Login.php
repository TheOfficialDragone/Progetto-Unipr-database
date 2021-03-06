<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function controlloLogin($emailInserita, $passwordInserita, $Controllo)
	{
		$query=$GLOBALS['connection']->prepare("SELECT *
												FROM ".$Controllo."
												WHERE email='".$emailInserita."'
												AND password=?");

		
		$password=mysqli_real_escape_string($GLOBALS['connection'], $passwordInserita);
		$query->bind_param('s', $password);
		$query->execute();
		$risultato=$query->get_result();
		
		if($risultato->num_rows>0)
		{
			$_SESSION['email']=$emailInserita;
			
			if($Controllo=="utenti")
			{
				while($riga=$risultato->fetch_assoc())
				{
					$_SESSION['username']=$riga['username'];
				}
			}
			
			if($Controllo=="autori")
			{
				while($riga=$risultato->fetch_assoc())
				{
					$_SESSION['nomedarte']=$riga['nomedarte'];
				}
			}
			
			return 1;
		}
		return -1;
	}
	
	function login($emailControllo, $passwdControllo)
	{
		/*if((isset($_SESSION['email'])) && ($_SESSION['email']==$emailControllo))
		{
			echo("Attendere...Sei già loggato");
			header("refresh:2.5; url=../HTML/profilo_utente.html");
            exit;
		}*/
		if(controlloLogin($emailControllo, $passwdControllo, "utenti")>0)
        {
            $_SESSION['tipoProfilo'] = "utenti";
            header("refresh:0.1; url=../HTML/profilo_utente.html");
        }else if (controlloLogin($emailControllo, $passwdControllo, "autori")>0)
        {
            $_SESSION['tipoProfilo'] = "autori";
            header("refresh:0.1; url=../HTML/profilo_autore.php");
        }else
		{
			header("refresh:0.1; url=../HTML/index.html");
		}
		
		$GLOBALS['connection']->close();
	}
?>