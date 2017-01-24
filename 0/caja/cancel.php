<?php

	extract($_POST);
	include_once '../../system/class.php';

	$factura = new factura();
	$producto = new producto();
	$contenido = new factura_descripcion();

	$r = $contenido->consultar_factura($mysqli, $codigoListado); //consulto el contenido la factura
	while ($resultado = $r->fetch_array()) :
		$producto_consultado = $producto->consultar_produc($mysqli, $resultado[7]); //Consulto los productos contenidos en la factura
		$nueva_existencia = $producto_consultado[2] + $resultado[3];
		$producto->actualizar_existencia($mysqli, $nueva_existencia, $resultado[7]);
	endwhile;

	$factura->eliminar_factura($mysqli, $codigoListado);
	header('location: ../../0/home/inicio');

?>
