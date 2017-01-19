<?php


	class gcodigo{
		private $formatoSolicitud = "SSS-MER-";
		private $formatoSuelo = "SUE-MER-";
		private $formatoFito = "FITO-MER-";

		private function generar($ano, $nro, $x){
			switch ($x) {
				case 1:
					$this->formatoSolicitud = $this->formatoSolicitud.$ano."-".$nro;
					return $this->formatoSolicitud;
					break;
				case 2:
					$this->formatoSuelo = $this->formatoSuelo.$ano."-".$nro;
					return $this->formatoSuelo;
					break;
				case 3:
					$this->formatoFito = $this->formatoFito.$ano."-".$nro;
					return $this->formatoFito;
					break;
			}
		}

		public function getDatos($ano, $nro, $x) {
			
			if ($ano == date("Y")) {
				return $this->generar($ano, $nro, $x);
			}
			elseif (($ano < (date("Y")-1)) || date("Y") < $ano) {
				echo "Error de fechas en el servidor, reportelo con el administrador de sistemas";
				exit();
			}
			else {
				include '../../includes/conexion.php';
				$anonew = date("Y");
				$result = $mysqli->query("UPDATE ayudante SET aiso=0, aims=0, aimf=0, ano='$anonew' WHERE 1");

				$mysqli->close();
				return $this->generar($anonew, 1, $x);
			}
		}
	}
	

	class controllerCodigo{
		private function consultaAno(){
			include '../../includes/conexion.php';
			$result = $mysqli->query("SELECT ano FROM ayudante LIMIT 1");
			$ano = $result->fetch_array();
			$mysqli->close();
			return $ano[0];
		}
		private function consultaSolicitud(){
			include '../../includes/conexion.php';
			$result = $mysqli->query("SELECT aiso FROM ayudante LIMIT 1");
			$aiso = $result->fetch_array();
			$mysqli->close();
			return $aiso[0];
		}
		private function consultaSuelo(){
			include '../../includes/conexion.php';
			$result = $mysqli->query("SELECT aims FROM ayudante LIMIT 1");
			$aiso = $result->fetch_array();
			$mysqli->close();
			return $aiso[0];
		}

		private function consultaFito(){
			include '../../includes/conexion.php';
			$result = $mysqli->query("SELECT aimf FROM ayudante LIMIT 1");
			$aiso = $result->fetch_array();
			$mysqli->close();
			return $aiso[0];
		}


		//Generador de codigo
		public function generarCodigo($x){
			$generador = new gcodigo();
			$ano = (int) $this->consultaAno();
			//echo "Año: $ano<br />";
			switch ($x) {
				case 1:
					//echo "Opcion 1<br />";
					$nro = $this->consultaSolicitud();
					$nro++;
					//echo "Nro. solicitud: $nro<br />";
					$resultado = $generador->getDatos($ano, $nro, 1);
					return $resultado;
					break;
				case 2:
					//echo "Opcion 2<br />";
					$nro = $this->consultaSuelo();
					$nro++;
					//echo "Nro. solicitud: $nro<br />";
					$resultado = $generador->getDatos($ano, $nro, 2);
					return $resultado;
					break;
				case 3:
					//echo "Opcion 3<br />";
					$nro = $this->consultaFito();
					$nro++;
					//echo "Nro. solicitud: $nro<br />";
					$resultado = $generador->getDatos($ano, $nro, 3);
					return $resultado;
					break;
			}
		}
	}

	

?>
