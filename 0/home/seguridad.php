<?php
	session_start();
	if(!isset($_SESSION['id']))
		header("location: no_datos.php");
?>