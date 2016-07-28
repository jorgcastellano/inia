<?php

	class especialista{
		
		public function verificar_privilegio_2($mysqli, $ced){
		$sql = "SELECT Ced_esp FROM especialista WHERE Ced_esp = '$ced'";
		$res = $mysqli->query($sql);
		if($mysqli->errno) :
			printf(
				"<h2>No se ha podido consultar en la base de datos</h2>
				<b>Numero de error: </b>%d<br />
				<b>Mensaje de error: </b>%s",
				$mysqli->errno,
				$mysqli->error);
			exit();
		endif;
		return $res->fetch_array();
		}

	//Clases sin la funcion anterior
		public function insertar_especialista($mysqli, $cedula, $laboratorio, $nombre, $apellido, $telefono, $especialidad){
			$sql = "INSERT INTO especialista(Ced_esp, Cod_lab, Nom_esp, Ape_esp, Telf_esp, Especialidad) VALUES ('$cedula', '$laboratorio', '$nombre', '$apellido', '$telefono', '$especialidad')";
			$mysqli->query($sql);
			include 'error_insert';
		}

		public function eliminar($mysqli, $cedula){
			$sql = "DELETE FROM especialista WHERE Ced_esp = '$cedula'";
			$mysqli->query($sql);
		}
	}
?>
