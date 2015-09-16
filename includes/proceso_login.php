<?php
	//Validacion de usuario al logearse
	include_once 'is-conexion_bd.php';

	extract ($_POST);

	if (!empty($correo AND !empty($password))) :
	
		$sql = "SELECT * FROM miembros WHERE email='$correo'";
		$result = $mysqli->query($sql);
		
		if($mysqli->errno) :
			printf(
				"<h2>No se ha podido consultar en la base de datos</h2>
				<b>Numero de error: </b>%d<br />
				<b>Mensaje de error: </b>%s",
				$mysqli->errno,
				$mysqli->error);
			exit();
		endif;
		
		$registro = $result -> fetch_array();

		$password = hash("sha512", $password);
		
		if (("$correo"=="$registro[4]") AND ("$password"=="$registro[5]")) :
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

		    //Solo para privilegios (2) especialistas
		    if ($_SESSION['privilegios'] == 2) :
		    	$cod = $_SESSION['ci'];
				include_once '../system/classesp.php';
	            $objesp = new especialista();
	            $resultado = $objesp->verificar_privilegio_2($mysqli2, $cod);
		        if ($resultado[0] == $_SESSION['ci']) :
		        	header("location: ../0/home/inicio");
		        else :
		        	header("location: ../0/especialista/culminar_registro");
		    	endif;
		    else :
				header("location: ../0/home/inicio");
			endif;
		else :
			//Error entre correos y contraseñas
			header("location: ../../0/home/index");
		endif;
	else :
		//En caso de que el formulario se encuentren vacios
		header("location: ../../0/home/index");
	endif;
?>