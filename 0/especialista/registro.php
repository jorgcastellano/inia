<?php 
	
	extract($_POST);

	include_once '../../includes/conexion.php';
	include_once '../../system/classesp.php';
	if (!empty($ci) AND !empty($name) AND !empty($apel) AND !empty($telefono) AND !empty($laboratorio) AND !empty($especialidad)) {
		$objesp = new especialista();
		$objesp->insertar_especialista($mysqli, $ci, $laboratorio, $name, $apel, $telefono, $especialidad);
		header('location: ../home/inicio');
	}
	else {
		header("location: culminar_registro");
	}
?>