<?php
	extract($_POST);

	for ($i=0; $i < count($laboratorio); $i++) { 
		echo "Laboratorios: <br />".$laboratorio[$i]."<br />";
		for ($x=0; $x < count($analisis); $x++) { 
			echo "Analisis: <br />".count($analisis)." ".$analisis[$i]."<br />";
		}
	}
?>