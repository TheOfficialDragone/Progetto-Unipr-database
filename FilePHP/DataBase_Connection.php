<?php
	$host = "localhost";
	$user = "root";
	$passwd = "";
	$DB_name = "voice_hunter";
	
	$connection = new mysqli($host, $user, $passwd, $DB_name);
	
	if($connection->connection_error)
	{
		die("Errore nella connessione al database: " . $connection->connection_error);
	}
	
	if($connection->select_db("voice_hunter"===0))
	{
		echo("Il database voice_hunter non esiste");
		exit;
	}
	
	$connection->close();
?>