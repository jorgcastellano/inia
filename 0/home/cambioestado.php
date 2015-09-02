<?php

	include_once '../../system/class.php';

	extract($_POST);

	$objlaboratorio= new laboratorio();
	$objanalisis = new analisis();

	$resultadolab=$objlaboratorio->cEstatus($mysqli);

	while ($result = $resultadolab->fetch_array()) {
		$consultalab[] = $result;
	}

	for ($y=0; $y < count($consultalab); $y++) {
		for ($z=0; $z < $temp1 = count($laboratorio); $z++) {
			if ($consultalab[$y][0] == $laboratorio[$z]) {
				if ($consultalab[$y][2] == "On") {
					
					$resultado = $objanalisis->consultar_estatus_analisis($mysqli);

					while ($result1 = $resultado->fetch_array()) {
						$consulta[] = $result1;
					}

					for ($i=0; $i < count($consulta); $i++)
						for ($x=0; $x < $temp = count($analisis); $x++)
							if ($consulta[$i][0] == $analisis[$x]) {
								if ($consulta[$i][1] == "On")
									$x=$temp;
								else
									$on[] = $analisis[$x];
							} elseif ($x == ($temp-1)) {
								if ($consulta[$i][1] == "On")
									$off[] = $consulta[$i][0];
							}

					for ($i=0; $i < count($on); $i++)
						$objanalisis->modificar_estatus_analisis($mysqli, "On", $on[$i]);
					
					for ($i=0; $i < count($off); $i++)
						$objanalisis->modificar_estatus_analisis($mysqli, "Off", $off[$i]);

					unset($consulta, $on, $off, $result1);

				} else {

					$objlaboratorio->modificar_estatus_laboratorio($mysqli, "On", $consultalab[$y][0]);
									
					$resultado = $objanalisis->consultar_estatus_analisis($mysqli);

					while ($result1 = $resultado->fetch_array()) {
						$consulta[] = $result1;
					}

					for ($i=0; $i < count($consulta); $i++)
						for ($x=0; $x < $temp = count($analisis); $x++)
							if ($consulta[$i][0] == $analisis[$x]) {
								if ($consulta[$i][1] == "On")
									$x=$temp;
								else
									$on[] = $analisis[$x];
							} elseif ($x == ($temp-1)) {
								if ($consulta[$i][1] == "On")
									$off[] = $consulta[$i][0];
							}

					for ($i=0; $i < count($on); $i++)
						$objanalisis->modificar_estatus_analisis($mysqli, "On", $on[$i]);
					
					for ($i=0; $i < count($off); $i++)
						$objanalisis->modificar_estatus_analisis($mysqli, "Off", $off[$i]);

					unset($consulta, $on, $off, $result1);
				}
				$z = $temp1;
			}elseif ($z == ($temp1-1)) {
				if ($consultalab[$y][2] == "On") {
					$objlaboratorio->modificar_estatus_laboratorio($mysqli, "Off", $consultalab[$y][0]);
					$objanalisis->desactive_all($mysqli, $consultalab[$y][0]);
				} else{
					$objanalisis->desactive_all($mysqli, $consultalab[$y][0]);
				}
			}
		}
	}

	header('location: estatus');
?>