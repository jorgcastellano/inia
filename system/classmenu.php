<?php
	class menu{
		private $icono = array();
		private $direccion = array();
		private $nombre = array();

		public function cargarElemento($icon, $dir , $nom){
			$this->icono[] = $icon;
			$this->direccion[] = $dir;
			$this->nombre[] = $nom;
		}

		public function mostrar(){
			$arreglo = array();
			for ($i=0; $i < count($this->nombre); $i++ ) {
            	$arreglo[$i] = '<li>
            						<a href="'.$this->direccion[$i].'">
            							<i class="fa '.$this->icono[$i].' fa-fw"></i>'.$this->nombre[$i].'
            						</a>';
			}
			return $arreglo;
		}
	}

	class controladorMenu{
		private $direcc;
		private $name;

		public function menuHome(){
			$menuh = new menu();
			$menuh->cargarElemento("fa-home", "../home/inicio", "Inicio");
            return $menuh->mostrar();
        }

		public function cerrar_sesion(){
			$menuh = new menu();
			$menuh->cargarElemento("fa-sign-out", "../../0/home/cerrar_sesion", "");
            return $menuh->mostrar();
		}
		public function menuNivel15() {
			$elementos = new menu();
			$elementos->cargarElemento("fa-plus", "../../0/home/inicio", " Asignar");
			$elementos->cargarElemento("fa-flask", "../../0/laboratorio/analizar_muestras", " Analizar");
			$elementos->cargarElemento("fa-clock-o", "../../0/laboratorio/pendientes", " Pendientes");
			$elementos->cargarElemento("fa-pencil-square-o", "../../0/laboratorio/recomendacion", " Recomendar");

			return $elementos -> mostrar();

		}
		public function menuNivel16() {
			$elementos = new menu();
			$elementos->cargarElemento("fa-flask", "../../0/home/inicio", " Analizar");
			$elementos->cargarElemento("fa-clock-o", "../../0/laboratorio/pendientes", " Pendientes");
			$elementos->cargarElemento("fa-pencil-square-o", "../../0/laboratorio/recomendacion", " Recomendar");
			$elementos->cargarElemento("fa-flag-checkered", "../../0/home/inicio", " Finalizadas");

			return $elementos -> mostrar();

		}
		public function menuNivel13() {
			$elementos = new menu();
			$elementos->cargarElemento("fa-money", "../../0/home/inicio", " Facturas impagas");
			$elementos->cargarElemento("fa-search", "../../0/producto/inve", " Inventario");
			$elementos->cargarElemento("fa-bar-chart", "../../0/caja/estadistica", " Estadísticas");
			$elementos->cargarElemento("fa-star-o", "#", " Registro");

			return $elementos -> mostrar();

		}
		public function menuNivel14($xa){
			$subElementos = new menu();
			switch ($xa) {
				case 3:
					$subElementos->cargarElemento("fa-gift", "../../0/producto/index", " Nuevos productos");
					$subElementos->cargarElemento("fa-bar-chart", "../../0/producto/iva", " Nuevo IVA");
					return $subElementos->mostrar();
					break;
			}
		}

		public function menuNivel1(){
			$elementos = new menu();
			$elementos->cargarElemento("fa-star-o", "#", " Servicios");
			$elementos->cargarElemento("fa-shopping-cart", "#", " Productos");
			$elementos->cargarElemento("fa-pencil-square-o", "#", " Informes");
			$elementos->cargarElemento("fa-gear", "#", " Administración");

			return $elementos -> mostrar();
		}
		public function menuNivel2($xb){
			$subElementos = new menu();
			switch ($xb) {
				case 0:
					$subElementos->cargarElemento("fa-check-square-o", "../../0/home/estatus", " Activar/Desactivar");
					$subElementos->cargarElemento("fa-bug", "../../0/analisis/index", " Análisis");
					return $subElementos->mostrar();
					break;
				case 1:
					$subElementos->cargarElemento("fa-search", "../../0/producto/inve", " Inventario");
					$subElementos->cargarElemento("fa-gift", "../../0/producto/index", " Nuevos productos");
					return $subElementos->mostrar();
					break;

				case 3:
					$subElementos->cargarElemento("fa-list", "../../0/home/gestion_usuario", " Gestion de usuarios");
					$subElementos->cargarElemento("fa-cloud-download", "../../includes/respaldo", " Respaldar");
					$subElementos->cargarElemento("fa-cloud-upload", "../../0/home/restaurar", " Restaurar");
					return $subElementos->mostrar();
					break;
			}
		}
	}
?>
