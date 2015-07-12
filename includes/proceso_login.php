<?php
	//Validacion de usuario al logearse
	include_once 'is-conexion_bd.php';

	extract ($_POST);

	
	if (!empty($correo AND !empty($password))) :
	
		$slq = "SELECT * FROM miembros WHERE email='$correo'";
		$result = mysqli_query($mysqli, $slq);
		
		if(mysqli_errno ($conexion) > 0) :
			printf(
				"<h2>No se ha podido consultar en la base de datos</h2>
				<b>Numero de error: </b>%d<br />
				<b>Mensaje de error: </b>%s",
				mysqli_errno($conexion),
				mysqli_error($conexion));
			exit();
		endif;
		
		$registro = mysqli_fetch_array($result);
		
		if (("$correo"=="$registro[3]") AND ("$password"=="$registro[4]")) :
			session_start();
			$_SESSION['id']="$registro[0]";
			$_SESSION['ci']="$registro[1]";
			$_SESSION['nombre']="$registro[2]";
			$_SESSION['email']="$registro[3]";
			$_SESSION['pregunta']="$registro[6]";
			$_SESSION['respuesta']="$registro[7]";
			$_SESSION['aprobacion']="$registro[8]";
			header("location: ../0/home/inicio");
		else :
			header("location: ../error");
		endif;
	else :
		//header("location: no_datos.php");
	endif;
?>