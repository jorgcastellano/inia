<?php
	include_once '../system/classusuario.php';
	//Validacion de usuario al logearse

	extract ($_POST);

	if (!empty($correo) AND !empty($password)) :
	
		$sql = "SELECT * FROM miembros WHERE email='$correo'";
		$result = $mysqli->query($sql);
		
		if($mysqli->errno) :
			printf(
				"<h2>No se ha podido consultar en la base de datos</h2>
				<b>Numero de error: </b>%d<br />
				<b>Mensaje de error: </b>%s",
				$mysqli->errno,
				$mysqli->error
			);
			exit();
		endif;
		
		$registro = $result -> fetch_array();

		$password = hash("sha512", $password);
		
		if (("$correo"=="$registro[4]") AND ("$password"=="$registro[5]")) :
			$intentos = new inicio_seguro();
			$r2 = $intentos -> chequeo_intentos($mysqli, $correo);
			$n_intentos = $r2 -> fetch_array();
	        if ($n_intentos[0] < 5) :

				session_start();
				$_SESSION['id']="$registro[0]";
				$_SESSION['ci']="$registro[1]";
				$_SESSION['nombre']="$registro[2]";
				$_SESSION['apellido']="$registro[3]";
				$_SESSION['email']="$registro[4]";
				$_SESSION['pregunta']="$registro[7]";
				$_SESSION['respuesta']="$registro[8]";
				$_SESSION['aprobacion']="$registro[9]";
				$_SESSION['privilegios']="$registro[10]";

				//comprueba si ha sido aprobado
				if ($_SESSION['aprobacion'] == "Off") :
					header("location: ../0/home/noaceptado");
				endif;

			    //Solo para privilegios (2) especialistas
			    if ($_SESSION['privilegios'] == 0) :
		        	header("location: ../0/home/noprivilegios");
		        elseif ($_SESSION['privilegios'] == 2) : //Privilegio 2 es especialista
					include_once '../system/classesp.php';
		            $objesp = new especialista();
		            $resultado = $objesp->verificar_privilegio_2($mysqli2, $_SESSION['ci']);
			        if ($resultado[0] == $_SESSION['ci']) :
						if ($n_intentos[0] > 0) :
			        		$intentos -> eliminar_intentos($mysqli, $_SESSION['email']);
			        	endif;
			        	header("location: ../0/home/inicio");
			        else :
			        	if ($n_intentos[0] > 0) :
			        		$intentos -> eliminar_intentos($mysqli, $_SESSION['email']);
			        	endif;
			        	header("location: ../0/especialista/culminar_registro");
			    	endif;
		        else :
					if ($n_intentos[0] > 0) :
			        	$intentos -> eliminar_intentos($mysqli, $_SESSION['email']);
			        endif;
					header("location: ../0/home/inicio");
				endif;
			else :
				header("location: ../../0/home/block");
			endif;
		else :
			//Error entre correos y contraseñas
			//Registro de intento fallido
			$intentos = new inicio_seguro();
			$r2 = $intentos -> chequeo_intentos($mysqli, $correo);
			$n_intentos = $r2 -> fetch_array();
			if ($n_intentos[0] <= 4) :
				$intentos -> reg_intentos_fallidos($mysqli, $correo);
				if ($n_intentos[0] == 4) :
					$intentos -> bloquear_usuario($mysqli, $correo);
					header("location: ../../0/home/block");
				else :
					header("location: ../../0/home/iniciar_sesion");
				endif;
			else :
				$intentos -> bloquear_usuario($mysqli, $correo);
				header("location: ../../0/home/block");
			endif;
		endif;
	else :
		//En caso de que el formulario se encuentren vacios
		header("location: ../../0/home/iniciar_sesion");
	endif;
?>