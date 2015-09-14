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
		
		if (("$correo"=="$registro[3]") AND ("$password"=="$registro[4]")) :
			session_start();
			$_SESSION['id']="$registro[0]";
			$_SESSION['ci']="$registro[1]";
			$_SESSION['nombre']="$registro[2]";
			$_SESSION['email']="$registro[3]";
			$_SESSION['pregunta']="$registro[6]";
			$_SESSION['respuesta']="$registro[7]";
			$_SESSION['aprobacion']="$registro[8]";
			$_SESSION['privilegios']="$registro[9]";
			header("location: ../0/home/inicio");
		else :
			//Error entre correos y contraseñas
			header("location: ../../0/home/index");
		endif;
	else :
		//En caso de que el formulario se encuentren vacios
		header("location: ../../0/home/index");
	endif;
?>