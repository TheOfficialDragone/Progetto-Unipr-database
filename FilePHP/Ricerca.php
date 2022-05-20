<?php
    $connection=new mysqli("localhost", "root", "", "voice_hunter");

    function ricerca($titoloInserito)
    {
        $queryRicerca="SELECT b.*
                       FROM brani b, album a
                       WHERE b.titolo='".$titoloInserito."'";

        $risultato=$GLOBALS['connection']->query($queryRicerca);

        if($risultato->num_rows>0)
		{
			$ricerche=array();
			
			while($row=$risultato->fetch_assoc())
			{
				array_push($ricerche, $row);
			}

			
			$json_pretty=json_encode($ricerche);
            echo "<pre>".$json_pretty."<pre/>";
		}else
		{
			echo("ERRORE");
		}
    }
?>