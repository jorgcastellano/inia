<?php
	/**
	* Clases para conectar mi sistema
	*/
	class datos_conex {
		private $host1 = "localhost";
		private $user1 = "jorge";
		private $password1 = "jorgejac";
		private $database1 = "proyecto3";
		private $database11 = "inicio_seguro";

		private $host2 = "31.220.104.130";
		private $user2 = "u817028193_uptm";
		private $password2 = "123456";
		private $database2 = "u817028193_uptm";

		public function host($a)
		{
			//============HOSTS================//
			if ($a == "local") {
				return $this->host1;
			}
			else if ($a == "global") {
				return $this->host2;
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
			else if ($a == "global") {
				return $this->user2;
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
			else if ($a == "global") {
				return $this->password2;
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
			else if ($a == "global") {
				return $this->database2;
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
			else if ($a == "global") {
				return $this->database11;
			}
			else
				return "error";
		}
	}

?>
