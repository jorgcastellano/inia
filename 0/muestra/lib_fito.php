<?php  //Libreria con procedimientos para campos especiales del formulario de muestras de fitopatologia
	    $g = '-';
	    $F_coleccion = $Dia.$g.$Mes.$g.$Ano;

	$sintoma = '';
	$s = '|';
	foreach ($_POST['Sintomas'] as $id){  if($sintoma == ''){ $sintoma =$id; }else{ $sintoma .= $s.$id; } }


	    $g = '-';
	    $F_sintomas = $Dia2.$g.$Mes2.$g.$Ano2;

	$Parte = '';
	$s = '|';
	foreach ($_POST['Part_afect'] as $id){  if($Parte == ''){ $Parte =$id; }else{ $Parte .= $s.$id; } }



	$practicas = '';
	$s = '|';
	foreach ($_POST['Practicas'] as $id){  if($practicas == ''){ $practicas =$id; }else{ $practicas .= $s.$id; } }

	$control = '';
	$s = '|';
	foreach ($_POST['Control'] as $id){  if($control == ''){ $control =$id; }else{ $control .= $s.$id; } }


?>