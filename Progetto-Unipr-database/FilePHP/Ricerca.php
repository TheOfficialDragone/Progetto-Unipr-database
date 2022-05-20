<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function ricerca($titoloInserito)
    {
        $queryRicerca="SELECT b.*
                       FROM brani b
                       WHERE b.titolo='".$titoloInserito."'";

		
        $risultato=$GLOBALS['connection']->query($queryRicerca);

        if($risultato->num_rows>0)
		{
			$ricerche=array();
			
			echo 	"<!DOCTYPE html>
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
							
							<div id='pagina'>";

			while($row=$risultato->fetch_assoc())
			{
				$canzone=$row['canzone'];
				$genere=$row['genere'];
				$titolo=$row['titolo'];

				
							
				echo "<a href='".$canzone."'>".$titolo."</a><br>";
							
							

				//array_push($ricerche, $row);
			}

			echo "</div>
			</html>";

			/*$json_pretty=json_encode($ricerche);
            echo "<pre>".$json_pretty."<pre/>";*/
		}else
		{
			echo("ERRORE");
		}
    }
?>