<?php
	/**
	* Clases para conectar mi sistema
	*/
	class datos_conex {

		//Datos locales
		private $host1 = "localhost";
		private $user1 = "root";
		private $password1 = "deepin010300666";
		private $database1 = "inia";
		private $database11 = "inicio_seguro";

		//DB desarrollo
		private $host2 = "31.170.166.58";
		private $user2 = "u258201550_pst";
		private $password2 = "123456789";
		private $database2 = "u258201550_pst";

		//Hosting de produccion
		private $host0 = "mysql.hostinger.co";
		private $user0 = "u258201550_inia";
		private $password0 = "123456";
		private $database0 = "u258201550_inia";

		public function host($a)
		{
			//============HOSTS================//
			if ($a == "local") {
				return $this->host1;
			}
			else if ($a == "desarrollo") {
				return $this->host2;
			}
			else if ($a == "produccion") {
				return $this->host0;
			}
			else
				return "error";
		}

		public function user($a)
		{
			//============USER================//
			if ($a == "local") {
				return $this->user1;
			}
			else if ($a == "desarrollo") {
				return $this->user2;
			}
			else if ($a == "produccion") {
				return $this->user0;
			}
			else
				return "error";
		}

		public function password($a)
		{
			//============PASSWORD================//
			if ($a == "local") {
				return $this->password1;
			}
			else if ($a == "desarrollo") {
				return $this->password2;
			}
			else if ($a == "produccion") {
				return $this->password0;
			}
			else
				return "error";
		}

		public function database($a)
		{
			//============DATABASE================//
			if ($a == "local") {
				return $this->database1;
			}
			else if ($a == "desarrollo") {
				return $this->database2;
			}
			else if ($a == "produccion") {
				return $this->database0;
			}
			else
				return "error";
		}

		public function db_sesion($a)
		{
			//============DATABASE================//
			if ($a == "local") {
				return $this->database11;
			}
			else if ($a == "desarrollo") {
				return $this->database11;
			}
			else if ($a == "produccion") {
				return $this->database11;
			}
			else
				return "error";
		}
	}

?>
