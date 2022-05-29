<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");

function visualizzaProfilo()
{
	if(isset($_SESSION['email']))
	{
		$tipoProfilo=$_SESSION['tipoProfilo'];

			if($tipoProfilo=="utenti")
			{
				$queryInfoUtenti = "SELECT u.username, u.nome, u.cognome, u.email
                             FROM utenti u
                             WHERE u.username = '".$_SESSION['username']."' AND u.email = '".$_SESSION['email']."'";
        		
				$risultato = $GLOBALS['connection']->query($queryInfoUtenti);

				echo ('	<!DOCTYPE html>
				<html lang="it">
			
				<head>
			
					<meta charset="UTF-8">
					<title>Voice Hunter</title>
			
					<link rel="stylesheet" href="../CSS/General_theme.css">
				
				</head>
			
				<body>
					
					<div class="navbar">
				
						<a href="../HTML/profilo_utente.html">  <!--home-->
							<img src="../Img/home.png">
						</a>

						<form method="post" action="../FilePHP/Controller.php">
                			<input type="submit" name="azione" value="account" id="btnAccount">
            			</form>
							
						<form method="post" action="../FilePHP/Controller.php">
							<input type="submit" name="azione" value="logout" id="btnlogout">
						</form>
						
					</div>
				
					<div id="pagina">
						<div id="logo">
							<img src="../img/logo.png"><br> 
						</div>');

				//Controllo di aver effettivamente avuto dei risultati
				if($risultato->num_rows > 0) 
				{
					//Faccio un ciclo in cui scorro tutte le righe ottenute come risultato e le inserisco in un array
					while($row = $risultato->fetch_assoc()) 
					{
						$username=$row['username'];
						$nome=$row['nome'];
						$cognome=$row['cognome'];
						$email=$row['email'];

						echo (	'<h3><b>Dati utente</b></h3>
								<p><b>Username:</b> '.$username.'</p>
								<p><b>Nome:</b> '.$nome.'</p>
								<p><b>Cognome:</b> '.$cognome.'</p>
								<p><b>Email:</b> '.$email.'</p>');
					}

				}else
				{
					echo("ERRORE");
				}   

			}else if($tipoProfilo=="autori")
			{
				$queryInfoAutore = "SELECT a.nomedarte, a.genere, a.email
                             FROM autori a
                             WHERE a.nomedarte = '".$_SESSION['nomedarte']."' AND a.email = '".$_SESSION['email']."'";
        		
				$risultato = $GLOBALS['connection']->query($queryInfoAutore);

				echo ('	<!DOCTYPE html>
				<html lang="it">
			
				<head>
			
					<meta charset="UTF-8">
					<title>Voice Hunter</title>
			
					<link rel="stylesheet" href="../CSS/General_theme.css">
				
				</head>
			
				<body>
					
					<div class="navbar">
				
						<a href="../HTML/profilo_autore.html">  <!--home-->
							<img src="../Img/home.png">
						</a>

						<form method="post" action="../FilePHP/Controller.php">
                			<input type="submit" name="azione" value="account" id="btnAccount">
            			</form>
							
						<form method="post" action="../FilePHP/Controller.php">
							<input type="submit" name="azione" value="logout" id="btnlogout">
						</form>
						
					</div>
				
					<div id="pagina">
						<div id="logo">
							<img src="../img/logo.png"><br> 
						</div>');

				//Controllo di aver effettivamente avuto dei risultati
				if($risultato->num_rows > 0) 
				{
					//Faccio un ciclo in cui scorro tutte le righe ottenute come risultato e le inserisco in un array
					while($row = $risultato->fetch_assoc()) 
					{
						$nomedarte=$row['nomedarte'];
						$genere=$row['genere'];
						$email=$row['email'];

						echo (	'<h3><b>Dati utente</b></h3>
								<p><b>Nome artista:</b> '.$nomedarte.'</p>
								<p><b>Genere:</b> '.$genere.'</p>
								<p><b>Email:</b> '.$email.'</p>');
					}

				}else
				{
					echo("ERRORE");
				}
			}

			echo 		('</div>

					</body>
			
				</html>');

	}else 
	{
		echo("ERRORE");
	}
}

	
		
?>