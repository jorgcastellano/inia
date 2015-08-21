
		private function consultaMuestraSue(){
			$sql = "SELECT aims FROM ayudante";
			$result = mysqli_query($conex, $sql);
			return $result;
		}
		private function consultaMuestraFito(){
			$sql = "SELECT aimf FROM ayudante";
			$result = mysqli_query($conex, $sql);
			return $result;
		}