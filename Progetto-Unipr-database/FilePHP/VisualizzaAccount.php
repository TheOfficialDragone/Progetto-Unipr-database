<?php
	$connection=new mysqli("localhost", "root", "", "voice_hunter");
	
	function visualizzaProfilo()
	{
		if(isset($_SESSION['email']))
		{
			$tipoProfilo=$_SESSION['tipoProfilo'];
		}else
		{
			echo("<script type='text/javascript'>alert('Prima e' necessario effettuare il login');</script>");
            header("refresh:5; url=../pages/login.html");
        }
	}
?>