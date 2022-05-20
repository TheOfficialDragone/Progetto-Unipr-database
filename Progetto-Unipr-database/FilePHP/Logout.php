<?php
	function logout()
	{
		session_destroy();
		header('Location: ../HTML/index.html'); 
	}
?>