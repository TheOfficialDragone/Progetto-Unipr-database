<?php
	function logout()
	{
		session_destroy();
		header("refresh:0.1; url=../index.html");
	}
?>