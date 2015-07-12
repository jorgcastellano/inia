<?php

		extract($_POST);

		require_once './system/class.php';


        	for ($i=0;$i<count($Tipo_fito);$i++) { $Tipo_fito=$Tipo_fito[$i]; }
			
			for ($i=0;$i<count($Dia);$i++){ $Dia=$Dia[$i]; }
			for ($i=0;$i<count($Mes);$i++){ $Mes=$Mes[$i]; }
			for ($i=0;$i<count($Ano);$i++){ $Ano=$Ano[$i]; }
				$g = '-';
				$F_coleccion = $Dia.$g.$Mes.$g.$Ano;

			$sintoma = '';
			$s = '|';
			foreach ($_POST['Sintomas'] as $id){  if($sintoma == ''){ $sintoma =$id; }else{ $sintoma .= $s.$id; } }


        	for ($i=0;$i<count($Dia2);$i++){ $Dia2=$Dia2[$i]; }
			for ($i=0;$i<count($Mes2);$i++){ $Mes2=$Mes2[$i]; }
			for ($i=0;$i<count($Ano2);$i++){ $Ano2=$Ano2[$i]; }
				$g = '-';
				$F_sintomas = $Dia2.$g.$Mes2.$g.$Ano2;

			for ($i=0;$i<count($Tipo_plan);$i++){ $Tipo_plan=$Tipo_plan[$i]; }

			for ($i=0;$i<count($Pres_microorg);$i++){ $Pres_microorg=$Pres_microorg[$i]; }

			for ($i=0;$i<count($Dist_planafect);$i++){ $Dist_planafect=$Dist_planafect[$i]; }

			$Parte = '';
			$s = '|';
			foreach ($_POST['Part_afect'] as $id){  if($Parte == ''){ $Parte =$id; }else{ $Parte .= $s.$id; } }

			for ($i=0;$i<count($Riego);$i++){ $Riego=$Riego[$i]; }

			for ($i=0;$i<count($Topografia);$i++){ $Topografia=$Topografia[$i]; }

			for ($i=0;$i<count($Text_sue);$i++){ $Text_sue=$Text_sue[$i]; }

			for ($i=0;$i<count($Composicion);$i++){ $Composicion=$Composicion[$i]; }

			for ($i=0;$i<count($Hum_sue);$i++){ $Hum_sue=$Hum_sue[$i]; }

			for ($i=0;$i<count($Drenaje);$i++){ $Drenaje=$Drenaje[$i]; }

			$practicas = '';
			$s = '|';
			foreach ($_POST['Practicas'] as $id){  if($practicas == ''){ $practicas =$id; }else{ $practicas .= $s.$id; } }



			$control = '';
			$s = '|';
			foreach ($_POST['Control'] as $id){  if($control == ''){ $control =$id; }else{ $control .= $s.$id; } }


        	$fito = new fito();
        	$fito->registrar_fito($conex,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Otro_tipo,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Part_afect,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones);

?>