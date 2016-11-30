<?php  //Libreria con procedimientos para campos especiales del formulario de muestras
	   $g = '-';
       $F_toma = $Dia.$g.$Mes.$g.$Ano;

	$Sintomas = '';
	$s = '|';
	foreach ($_POST['Sintoma'] as $id){  if($Sintomas == ''){ $Sintomas =$id; }else{ $Sintomas .= $s.$id; } }


	$F_sintomas = $Dia2.$g.$Mes2.$g.$Ano2;

	$Parts_afect = '';
	$s = '|';
	foreach ($_POST['Part_afect'] as $id){  if($Parts_afect == ''){ $Parts_afect =$id; }else{ $Parts_afect .= $s.$id; } }



	$Practicas = '';
	$s = '|';
	foreach ($_POST['Practica'] as $id){  if($Practicas == ''){ $Practicas =$id; }else{ $Practicas .= $s.$id; } }

	$Controles = '';
	$s = '|';
	foreach ($_POST['Control'] as $id){  if($Controles == ''){ $Controles =$id; }else{ $Controles .= $s.$id; } }


?>