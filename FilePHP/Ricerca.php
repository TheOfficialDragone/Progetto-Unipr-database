<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function ricerca($titoloInserito, $albumInserito, $genereInserito)
    {
        $queryRicerca="SELECT b.*
                       FROM brani b, album a
                       WHERE b.titolo='".$titoloInserito."'
                       OR a.titolo='".$albumInserito."'
                       OR b.genere='".$genereInserito."'";

        $risultato=$GLOBALS['connection']->query($queryRicerca);

        if($risultato->num_rows>0)
		{
			$ricerche=array();
			
			while($row=$risultato->fetch_assoc())
			{
				array_push($ricerche, $row);
			}
			
			echo json_encode($ricerche);
		}else
		{
			echo("ERRORE");
		}
    }
?>