<!DOCTYPE html>
<html>
    <head>
        <title>Registro de Muestra</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
				<hgroup>
					<h1>Registrar Muestra de suelo</h1>
				</hgroup>
			</div>
            <?php
                extract($_POST);
                    require_once '../../system/class.php';
                    if(isset($RegistrarS)) :
                        for ($i=0;$i<count($Cod_lab);$i++) { $Cod_lab=$Cod_lab[$i];  }
                        for ($i=0;$i<count($Carac_terreno);$i++) { $Carac_terreno=$Carac_terreno[$i]; }
                        for ($i=0;$i<count($Dia);$i++){ $Dia=$Dia[$i]; }
                        for ($i=0;$i<count($Mes);$i++){ $Mes=$Mes[$i]; }
                        for ($i=0;$i<count($Ano);$i++){ $Ano=$Ano[$i]; }
                        $g = '-';
                        $F_toma = $Dia.$g.$Mes.$g.$Ano;		

                        $fertil = '';
                        $s = '|';
                        foreach ($_POST['Fertilizante'] as $id){  if($fertil == ''){ $fertil =$id; }else{ $fertil .= $s.$id; } }

                        $suelo = new suelo();
                        $suelo->registrar_suelo($conex,$Cod_suelo,$Cod_lab,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion);
                        $reg=$suelo->consultar_suelo($conex,$Cod_suelo);

                        $sol = new solicitud();
                        $sol->registrar_solicitud($conex,$Cod_sol,$Ced_cliente);

                        foreach ($_POST['analisis'] as $id){

                        $Cod_ana=$id;
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis($conex,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);
                        }
                        //if(mysqli_affected_rows($conex)>0){echo "se ha insertado un registro solicitud_analisis";} else { echo "no se ha insertado los solicitud de anlisis";}
                        ?>
                        <ul>
                        <li>Codigo: <?php echo $reg[0] ?></li>
                        <li>Laboratorio: <?php echo $reg[1] ?></li>
                        <li>Tamaño del lote: <?php echo $reg[2] ?></li>
                        <li>Profundidad de la Muestra: <?php echo $reg[3] ?></li>
                        <li>Caracteristicas del terreno: <?php echo $reg[4] ?></li>
                        <li>Riesgo de inundacion: <?php echo $reg[5] ?></li>
                        <li>Riego: <?php echo $reg[6] ?></li>
                        <li>Cual: <?php echo $reg[7] ?></li>
                        <li>Fecha de toma de la muestra: <?php echo $reg[8] ?></li>
                        <li>Tipo de vegetacion: <?php echo $reg[9] ?></li>
                        <li>Cultivo actual: <?php echo $reg[10] ?></li>
                        <li>Edad: <?php echo $reg[11] ?></li>
                        <li>Distancia siembra: <?php echo $reg[12] ?></li>
                        <li>Nro de plantas: <?php echo $reg[13] ?></li>
                        <li>Cultivo anterior: <?php echo $reg[14] ?></li>
                        <li>Rendimiento del cultivo: <?php echo $reg[15] ?></li>
                        <li>Restos de cosecha: <?php echo $reg[16] ?></li>
                        <li>Fertilizante usado: <?php echo $reg[17] ?></li>
                        <li>Cantidad de fertilizante: <?php echo $reg[18] ?></li>
                        <li>Epoca de aplicacion: <?php echo $reg[19] ?></li>
                        <li>Modo de aplicacion: <?php echo $reg[20] ?></li>
                        </ul>
                        <form action="index" method="post">
                            <input type="hidden" name="Cod_suelo" value="<?php echo $Cod_suelo; ?>" />
                            
                            <button class="boton" type="submit" value="ModificarS" name="ModificarS"><i class="fa fa-edit"></i> Modificar</button>
                            <button type="submit" class="boton" name="RegistrarS" value="RegistrarS" ><i class="fa fa-plus"></i> Muestra de Suelo</button>
                            <button type="submit" name="RegistrarF" value="RegistrarF" class="boton" ><i class="fa fa-plus"></i> Muestra de Fitopatologia</button>
                            
                        </form>
                        <?php
                    endif;

                    if(isset($RegistrarF)) :
                        
                            $g = '-';
                            $F_coleccion = $Dia.$g.$Mes.$g.$Ano;

                        $sintoma = '';
                        $s = '|';
                        foreach ($_POST['Sintomas'] as $id){  if($sintoma == ''){ $sintoma =$id; }else{ $sintoma .= $s.$id; } }

                        
                            $g = '-';
                            $F_sintomas = $Dia2.$g.$Mes2.$g.$Ano2;

                        for ($i=0;$i<count($Tipo_plan);$i++){ $Tipo_plan=$Tipo_plan[$i]; }
                        for ($i=0;$i<count($Pres_microorg);$i++){ $Pres_microorg=$Pres_microorg[$i]; }
                        for ($i=0;$i<count($Dist_planafect);$i++){ $Dist_planafect=$Dist_planafect[$i]; }

                        $Parte = '';
                        $s = '|';
                        foreach ($_POST['Part_afect'] as $id){  if($Parte == ''){ $Parte =$id; }else{ $Parte .= $s.$id; } }

                       

                        $practicas = '';
                        $s = '|';
                        foreach ($_POST['Practicas'] as $id){  if($practicas == ''){ $practicas =$id; }else{ $practicas .= $s.$id; } }

                        $control = '';
                        $s = '|';
                        foreach ($_POST['Control'] as $id){  if($control == ''){ $control =$id; }else{ $control .= $s.$id; } }


                        $fito = new fito();
                        $fito->registrar_fito($conex,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Otro_tipo,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones);

                        $sql='SELECT * FROM analisis';
                        $res2= $conex->query($sql);
                    endif;

?>
                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>