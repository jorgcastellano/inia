<?php

	//Esto solamente para verificar si existen privilegios de especialista
	define("HOSTS", "inia.jcm.co.ve");
  	define("USERS", "gproyecto");
  	define("PASSWORDS", "123456");
  	define("DB", "proyecto3");

  	$mysqli2 = new mysqli(HOSTS, USERS, PASSWORDS, DB);

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
		$sql = "SELECT Ced_esp FROM especialista WHERE Ced_esp = '$ced'";
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

	//Clases sin la funcion anterior
		public function insertar_especialista($mysqli2, $cedula, $laboratorio, $nombre, $apellido, $telefono, $especialidad){
			$sql = "INSERT INTO especialista(Ced_esp, Cod_lab, Nom_esp, Ape_esp, Telf_esp, Especialidad) VALUES ('$cedula', '$laboratorio', '$nombre', '$apellido', '$telefono', '$especialidad')";
			$mysqli2->query($sql);
			include 'error_insert';
		}

		public function eliminar($mysqli2, $cedula){
			$sql = "DELETE FROM especialista WHERE Ced_esp = '$cedula'";
			$mysqli2->query($sql);
		}
	}
?>
