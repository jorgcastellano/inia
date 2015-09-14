<?php

	define("HOST", "mipc.jorgcastellano.net.ve");
  	define("USER", "gproyecto");
  	define("PASSWORD", "123456");
  	define("DATABASE", "proyecto3");

  	$mysqli2 = new mysqli(HOST, USER, PASSWORD, DATABASE);

  	if($mysqli2->connect_errno){
		printf(
			"<h2>No se ha podido conectar a la base de datos</h2>
			<b>Numero de error: </b>%d<br />
			<b>Mensaje de error: </b>%s",
			$mysqli2->connect_errno,
			$mysqli2->connect_error
		);
		exit();
	}

	class especialista{
		public function verificar_privilegio_2($mysqli2, $ced){
		$sql = "SELECT Ced_esp FROM proyecto3.especialista WHERE Ced_esp = '$ced'";
		$res = $mysqli2->query($sql);
		if($mysqli2->errno) :
			printf(
				"<h2>No se ha podido consultar en la base de datos</h2>
				<b>Numero de error: </b>%d<br />
				<b>Mensaje de error: </b>%s",
				$mysqli2->errno,
				$mysqli2->error);
			exit();
		endif;
		return $res->fetch_array();
		}
	}
?>