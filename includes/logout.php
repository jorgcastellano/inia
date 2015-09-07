<?php

	include_once 'funtions.php';
	sec_session_start();

	//Desconfigura todos los valores de session
	$_SESSION = array();

	//Obtiene los parametros de sesion
	$params = session_get_cookie_params();

	//Borra el cookie actual
	setcookie(session_name(),
		'', time() - 42000,
		$params["path"],
		$params["domain"],
		$params["secure"],
		$params["httponly"]);

	//Destruye la session
	session_destroy();
	header('location: ../html/index.php')

?>