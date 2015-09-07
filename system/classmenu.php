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
			$menuh->cargarElemento("fa-reorder", "../home/cerrar_sesion", "");
            return $menuh->mostrar();
		}

		public function menuNivel1(){
			$elementos = new menu();
			$elementos->cargarElemento("fa-star-o", "#", " Servicios");
			$elementos->cargarElemento("fa-shopping-cart", "#", " Productos");
			$elementos->cargarElemento("fa-bar-chart", "#", " Estadisticas");
			$elementos->cargarElemento("fa-gear", "#", " Administración");

			return $elementos -> mostrar();
		}
		public function menuNivel2($xa){
			$subElementos = new menu();
			switch ($xa) {
				case 0:
					$subElementos->cargarElemento("fa-check-square-o", "../../0/home/estatus", " Activar/Desactivar");
					$subElementos->cargarElemento("fa-flask", "../../0/laboratorio/index", " Laboratorios");
					$subElementos->cargarElemento("fa-bug", "../../0/analisis/consulta", " Analisis");
					return $subElementos->mostrar();
					break;
				case 1:
					$subElementos->cargarElemento("fa-gift", "../../0/producto/index", " Nuevos productos");
					$subElementos->cargarElemento("fa-search", "../../0/producto/inve", " Inventario");
					return $subElementos->mostrar();
					break;
				
				case 3:
					$subElementos->cargarElemento("fa-user", "#", " Aceptación de usuarios");
					$subElementos->cargarElemento("fa-list", "#", " Gestion de usuarios");
					$subElementos->cargarElemento("fa-cloud-download", "#", " Respaldar");
					$subElementos->cargarElemento("fa-cloud-upload", "#", " Restaurar");
					return $subElementos->mostrar();
					break;
			}
		}
	}
?>