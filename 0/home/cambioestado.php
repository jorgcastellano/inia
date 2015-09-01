<?php

	include_once '../../system/class.php';

	extract($_POST);

	$objanalisis = new analisis();

	function ana($mysqli){

		$resultado = $objanalisis->consultar_estatus_analisis($mysqli);

		while ($result = $resultado->fetch_array()) {
			$consulta[] = $result;
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

		//$mysqli->close();

		//header('location: estatus');
    }

	$objlaboratorio= new laboratorio();
	$resultadolab=$objlaboratorio->cEstatus($mysqli);

	while ($consulta1 = $resultadolab->fetch_array()) {
		$consulta1[] = $result;
	}

	for ($y=0; $y < count($consulta1); $y++)
		for ($z=0; $z < $temp1 = count($laboratorio); $z++) {
			if ($consulta1[$y][0]==$laboratorio[$z]) {
				if ($consulta1[$y][2]=="Off") {
					$objlaboratorio->modificar_estatus_laboratorio($mysqli, "On", $consulta1[$y][0]);
					
					$resultado = $objanalisis->consultar_estatus_analisis($mysqli);

					while ($result = $resultado->fetch_array()) {
						$consulta[] = $result;
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

				} else{
									
					$resultado = $objanalisis->consultar_estatus_analisis($mysqli);

					while ($result = $resultado->fetch_array()) {
						$consulta[] = $result;
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
				}
			}elseif ($z == ($temp1-1)) {
				if ($consulta1[$y][2] == "On") {
					$objlaboratorio->modificar_estatus_laboratorio($mysqli, "Off", $consulta1[$y][0]);
					$objanalisis->desactive_all($mysqli, "Off", $consulta1[$y][0]);
					//$mysqli->close();
				}
			}
		}

	header('location: estatus');
?>