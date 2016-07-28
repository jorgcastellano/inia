<?php

	include_once 'conexion_config.php';

	//=============   README   ===============//
	//global = conexiones de base de datos para conexion en comun (alojada en el hosting inia.dev.web.ve)
	//local = configuraciones basada en la pc local

	$datos = new datos_conex();
	$parametro = "global";

	$host = $datos->host($parametro);
	$user = $datos->user($parametro);
	$pass = $datos->password($parametro);
	$db = $datos->database($parametro);
	$db_sesion = $datos->db_sesion($parametro);

?>
