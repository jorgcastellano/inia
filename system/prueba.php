<?php

	include_once '../includes/conexion_bd.php';

	class gcodigo{
		private $formatoSolicitud = "SSS-MER-";
		private $formatoSuelo = "SUE-MER-";
		private $formatoSFito = "FITO-MER-";

		public function getDatos($b, $nro){
			$ano = date("Y");
			if ($ano == $b) {
				$this->formatoSolicitud = $this->formatoSolicitud.$b."-".$nro;
				return $this->formatoSolicitud;
			}
		}
	}

	class controllerCodigo{
		//Generador de codigo
		public function generarCodigo($y){
			$generador = new gcodigo();
			$a = $this->consultaAno();
			echo "Año: $a<br />";

			switch ($y) {
				case 1:
				echo "Opcion 1<br />";
					$n = $this->consultaSolicitud();
					echo "Nro. solicitud: $n<br />";
					//$resultado = $generador->getDatos($a, $n);
					//return $resultado;
				break;
			}
		}
	}

	$result = $mysqli->query("SELECT ano FROM ayudante LIMIT 1");
	//$aiso = $mysqli->query("SELECT aiso FROM ayudante WHERE 1");

	$row = $result->fetch_array();
	echo $row[0];


	//$prueba = new controllerCodigo();
	//$prueba->generarCodigo(1);
?>
