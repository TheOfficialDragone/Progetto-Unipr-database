<?php
	function logout()
	{
		session_destroy();
		header('Location: ../index.html'); 
	}
?>