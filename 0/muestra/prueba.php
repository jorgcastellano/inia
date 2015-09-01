<?php
	include '../../system/gcodigo.php';
	$v=2;
	$codi = new controllerCodigo();
	echo $codi -> generarCodigo($v);


?>