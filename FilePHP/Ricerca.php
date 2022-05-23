<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function ricerca($titoloInserito)
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
								<a href='../HTML/index.html'>
									<img src='../Img/home.png'/>
								</a>
								<a href='../HTML/profilo.html'>
									<img src='../Img/user.png'/>
								</a>
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
?>