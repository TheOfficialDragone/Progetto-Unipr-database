<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function ricerca($titoloInserito)
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

					
								
					echo ("<p><b>".$titolo."</b> appartenente a ".$genere."</p>
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
									<a href='../HTML/profilo_autore.html'>  <!--home-->
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

					
								
					echo ("<p><b>".$titolo."</b> appartenente a ".$genere."</p>
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
?>