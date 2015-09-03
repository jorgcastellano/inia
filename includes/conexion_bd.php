<?php

	define("HOST", "192.168.150.1");
 	//define("USER", "sec_user");
  	define("USER", "P4VM800");
  	define("PASSWORD", "123456");
  	//define("PASSWORD", "AHxySPDT7U8mNTdE");
  	define("DATABASE", "proyecto3");

  	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

  	if($mysqli->connect_errno){
		printf(
			"<h2>No se ha podido conectar a la base de datos</h2>
			<b>Numero de error: </b>%d<br />
			<b>Mensaje de error: </b>%s",
			$mysqli->connect_errno,
			$mysqli->connect_error
		);
		exit();
	}
?>
