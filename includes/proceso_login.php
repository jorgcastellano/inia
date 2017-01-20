<?php
	require_once '../includes/conexion.php';
	include_once '../system/classusuario.php';
	//Validacion de usuario al logearse

	extract ($_POST);
	//Verificamos que los campos no queden vacios
	if (!empty($correo) AND !empty($password)) :
		//Consultamos al usuario
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

		//Verifica si los datos concuerdan
		if (("$correo"=="$registro[4]") AND ("$password"=="$registro[5]")) :
			$intentos = new inicio_seguro();

			//Verificamos si esta bloqueado el usuario
			$r1 = $intentos -> consultar_bloqueo($mysqli, $correo);
			$validar_bloqueo = $r1 -> fetch_array();
			if ($validar_bloqueo[0] == 1) :
				header("location: ../../0/home/block");
			else :
				//Como no esta bloqueado procedemos con el inicio de sesion
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

				//Ya fué aceptado!! se procede con la sesión.
				else :
					//Chequeamos los intentos fallidos
					$r2 = $intentos -> chequeo_intentos($mysqli, $correo);
					$n_intentos = $r2 -> fetch_array();

					//Comprobamos privilegios
			    if ($_SESSION['privilegios'] == 0) : //0 No tiene privilegios
		      	header("location: ../0/home/noprivilegios");
		      //Solo para privilegios (2) especialistas
		      elseif ($_SESSION['privilegios'] == 2) : //Privilegio 2 es especialista
						include_once '../system/classesp.php';
            $objesp = new especialista();
            $resultado = $objesp->verificar_privilegio_2($mysqli, $_SESSION['ci']);
			      if ($resultado[0] == $_SESSION['ci']) :
							if ($n_intentos[0] > 0) //En caso de tener intentos fallidos se eliminan
			        	$intentos -> eliminar_intentos($mysqli, $_SESSION['email']);
							$_SESSION['tipoLab'] = $resultado[1];
			        header("location: ../0/home/inicio");
			        //En caso de no estar registrado el especialista por completo debe culminar su registro, esto sucede despues de estara aprobado
			      else :
		        	if ($n_intentos[0] > 0) //En caso de tener intentos fallidos se eliminan
		        		$intentos -> eliminar_intentos($mysqli, $_SESSION['email']);
		        	header("location: ../0/especialista/culminar_registro");
			    	endif;
					elseif ($_SESSION['privilegios'] == 4) : //Solo para administradores total
						$_SESSION['tipoLab'] = "";
						if ($n_intentos[0] > 0) //En caso de tener intentos fallidos se eliminan
			        $intentos -> eliminar_intentos($mysqli, $_SESSION['email']);
						header("location: ../0/home/seleccionar_privilegio");
			    //Para el resto de privilegios
		      else :
						if ($n_intentos[0] > 0) //En caso de tener intentos fallidos se eliminan
			        $intentos -> eliminar_intentos($mysqli, $_SESSION['email']);
							header("location: ../0/home/inicio");
					endif;
				endif;
			endif;
		else :
			//Error entre correos y contraseñas
			//Registro de intento fallido
			$intentos = new inicio_seguro();
			$r2 = $intentos -> chequeo_intentos($mysqli, $correo);
			$n_intentos = $r2 -> fetch_array();
			if ($n_intentos[0] <= 4) :
				$intentos -> reg_intentos_fallidos($mysqli, $correo);
				if ($n_intentos[0] == 4) : //Al haber cometido el 4to error, se registra el quinto y automaticamente se redirige a la página de bloqueo
					$intentos -> bloquear_usuario($mysqli, $correo);
					header("location: ../../0/home/block");
				else :
					header("location: ../../0/home/iniciar_sesion");
				endif;
			else :
				//Si ha ingresado mas de 5 intentos fallidos, igual nos interesa registrar los siguientes intentos para evaluar su interés de entrar al sistema
				$intentos -> reg_intentos_fallidos($mysqli, $correo);
				header("location: ../../0/home/block");
			endif;
		endif;
	else :
		//En caso de que el formulario se encuentren vacios
		header("location: ../../0/home/iniciar_sesion");
	endif;
?>
