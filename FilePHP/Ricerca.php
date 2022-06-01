<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function ricercaBrano($titoloInserito)
    {
		$tipoProfilo=$_SESSION['tipoProfilo'];

		if($tipoProfilo=="utenti")
		{
			$queryRicerca="SELECT b.*
						FROM brani b
						WHERE b.titolo='".$titoloInserito."'";

			
			$risultato=$GLOBALS['connection']->query($queryRicerca);

			echo 	("<!DOCTYPE html>
							<html lang='it'>
					
								<head>
						
									<meta charset='UTF-8'>
									<title>Voice Hunter</title>
							
									<link rel='stylesheet' href='../CSS/General_theme.css'>
								</head>
						
							
								<div class='navbar'>
									<a href='../HTML/profilo_utente.html'>  <!--home-->
										<img src='../Img/home.png'>
									</a>
									<form method='post' action='../FilePHP/Controller.php'>
										<input type='submit' name='azione' value='account' id='btnAccount'>
									</form>
									<form method='post' action='../FilePHP/Controller.php'>
										<input type='submit' name='azione' value='logout' id='btnlogout'>
									</form>
								</div>
								
								<div id='pagina'>");

			if($risultato->num_rows>0)
			{
				//$ricerche=array();

				while($row=$risultato->fetch_assoc())
				{
					$canzone=$row['canzone'];
					$genere=$row['genere'];
					$titolo=$row['titolo'];
					$_SESSION['ID']=$row['ID'];
					$autore=$row['Autore'];

					
								
					echo (	"<p><b>".$titolo."</b> appartenente a ".$genere."</p>
							<p><b>Realizzata da:</b> ".$autore."</p>
							<a href='".$canzone."'>".$titolo."</a>
							<form method='post' action='../FilePHP/Controller.php'>
								<input type='submit' name='azione' value='like'>
							</form><hr>");
								
								

					//array_push($ricerche, $row);
				}

				/*$json_pretty=json_encode($ricerche);
				echo "<pre>".$json_pretty."<pre/>";*/
			}else
			{
				echo ("<p>Nessun risultato trovato</p>");
			}

			echo ("</div>
				</html>");
		}else if($tipoProfilo=="autori")
		{
			$queryRicerca="SELECT b.*
						FROM brani b
						WHERE b.titolo='".$titoloInserito."'";

			
			$risultato=$GLOBALS['connection']->query($queryRicerca);

			echo 	("<!DOCTYPE html>
							<html lang='it'>
					
								<head>
						
									<meta charset='UTF-8'>
									<title>Voice Hunter</title>
							
									<link rel='stylesheet' href='../CSS/General_theme.css'>
								</head>
						
							
								<div class='navbar'>
									<a href='../HTML/profilo_autore.php'>  <!--home-->
										<img src='../Img/home.png'>
									</a>
									<form method='post' action='../FilePHP/Controller.php'>
										<input type='submit' name='azione' value='account' id='btnAccount'>
									</form>
									<form method='post' action='../FilePHP/Controller.php'>
										<input type='submit' name='azione' value='logout' id='btnlogout'>
									</form>
								</div>
								
								<div id='pagina'>");

			if($risultato->num_rows>0)
			{
				//$ricerche=array();

				while($row=$risultato->fetch_assoc())
				{
					$canzone=$row['canzone'];
					$genere=$row['genere'];
					$titolo=$row['titolo'];
					$autore=$row['Autore'];
					
								
					echo (	"<p><b>".$titolo."</b> appartenente a ".$genere."</p>
							<p><b>Realizzata da:</b> ".$autore."</p>
							<a href='".$canzone."'>".$titolo."</a><hr>");
								
								

					//array_push($ricerche, $row);
				}

				/*$json_pretty=json_encode($ricerche);
				echo "<pre>".$json_pretty."<pre/>";*/
			}else
			{
				echo ("<p>Nessun risultato trovato</p>");
			}

			echo ("</div>
				</html>");
		}
    }

	function ricercaAutore($autoreInserito)
	{

		$tipoProfilo=$_SESSION['tipoProfilo'];

		if($tipoProfilo=="utenti")
		{
			$queryRicerca="SELECT a.*
						FROM autori a
						WHERE a.nomedarte='".$autoreInserito."'";

			
			$risultato=$GLOBALS['connection']->query($queryRicerca);

			echo 	("<!DOCTYPE html>
							<html lang='it'>
					
								<head>
						
									<meta charset='UTF-8'>
									<title>Voice Hunter</title>
							
									<link rel='stylesheet' href='../CSS/General_theme.css'>
								</head>
						
							
								<div class='navbar'>
									<a href='../HTML/profilo_utente.html'>  <!--home-->
										<img src='../Img/home.png'>
									</a>
									<form method='post' action='../FilePHP/Controller.php'>
										<input type='submit' name='azione' value='account' id='btnAccount'>
									</form>
									<form method='post' action='../FilePHP/Controller.php'>
										<input type='submit' name='azione' value='logout' id='btnlogout'>
									</form>
								</div>
								
								<div id='pagina'>");

			if($risultato->num_rows>0)
			{
				//$ricerche=array();

				while($row=$risultato->fetch_assoc())
				{
					$_SESSION['nomedarte']=$row['nomedarte'];
					$genere=$row['genere'];

					
								
					echo (	"<p><b>".$_SESSION['nomedarte']."</b> artista di genere ".$genere."</p>
							<form method='post' action='../FilePHP/Controller.php'>
								<input type='submit' name='azione' value='segui'>
							</form>");
								
								

					//array_push($ricerche, $row);
				}

				/*$json_pretty=json_encode($ricerche);
				echo "<pre>".$json_pretty."<pre/>";*/
			}else
			{
				echo ("<p>Nessun risultato trovato</p>");
			}

			echo ("</div>
				</html>");
		}
	}
?>