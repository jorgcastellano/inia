<?php

	include 'config.php';

  	$mysqli = new mysqli($host, $user, $pass, $db);

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
