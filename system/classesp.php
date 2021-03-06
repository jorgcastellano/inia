<?php
	//Esto solamente para verificar si existen privilegios de especialista
	class especialista{

		public function verificar_privilegio_2($mysqli, $ced){
		$sql = "SELECT * FROM especialista WHERE Ced_esp = '$ced'";
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

		public function consulta_completo($mysqli){
			$sql = "SELECT * FROM especialista";
			return $mysqli->query($sql);
		}

		public function consulta_lab($mysqli,$tipo2){
			$sql = "SELECT * FROM especialista WHERE Cod_lab='$tipo2' ";
			return $mysqli->query($sql);
		}

		public function consulta_especialista($mysqli,$Ced_esp){
			$sql = "SELECT * FROM especialista WHERE especialista.Ced_esp='$Ced_esp'";
			return $mysqli->query($sql);
		}

		public function eliminar($mysqli, $cedula){
			$sql = "DELETE FROM especialista WHERE Ced_esp = '$cedula'";
			$mysqli->query($sql);
		}
	}
?>
