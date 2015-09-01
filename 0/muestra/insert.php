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
                        
                        $g = '-';
                        $F_toma = $Dia.$g.$Mes.$g.$Ano;		

                        $fertil = '';
                        $s = '|';
                        foreach ($_POST['Fertilizante'] as $id){  if($fertil == ''){ $fertil =$id; }else{ $fertil .= $s.$id; } }

                        $suelo = new suelo();
                        $suelo->registrar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion);
                        $reg=$suelo->consultar_suelo($mysqli,$Cod_suelo);

                        $sol = new solicitud();
                        $sol->registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente);

                        $cas=2;
                        $das="NULL";
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis($mysqli,$Cod_sol,$cas,$Cod_suelo,$das);

                        foreach ($_POST['analisis'] as $id){

                        $Cod_ana=$id;
                        echo $Cod_ana;
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,'NULL');
                        }
                        //if(mysqli_affected_rows($conex)>0){echo "se ha insertado un registro solicitud_analisis";} else { echo "no se ha insertado los solicitud de anlisis";}
                        ?>
                        <table class="tcliente">
                        <tr><th colspan="2"><i class="fa fa-edit"></i> Datos de la muestra de suelo</th></tr>
                        <tr><th>Codigo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Laboratorio: </th><td><?php echo $reg[1] ?></td></tr>
                        <tr><th>Tamaño del lote: </th><td><?php echo $reg[2] ?></td></tr>
                        <tr><th>Profundidad de la Muestra: </th><td><?php echo $reg[3] ?></td></tr>
                        <tr><th>Caracteristicas del terreno: </th><td><?php echo $reg[4] ?></td></tr>
                        <tr><th>Riesgo de inundacion: </th><td><?php echo $reg[5] ?></td></tr>
                        <tr><th>Riego: </th><td><?php echo $reg[6] ?></td></tr>
                        <tr><th>Cual: </th><td><?php echo $reg[7] ?></td></tr>
                        <tr><th>Fecha de toma de la muestra: </th><td><?php echo $reg[8] ?></td></tr>
                        <tr><th>Tipo de vegetacion: </th><td><?php echo $reg[9] ?></td></tr>
                        <tr><th>Cultivo actual: </th><td><?php echo $reg[10] ?></td></tr>
                        <tr><th>Edad: </th><td><?php echo $reg[11] ?></td></tr>
                        <tr><th>Distancia siembra: </th><td><?php echo $reg[12] ?></td></tr>
                        <tr><th>Nro de plantas: </th><td><?php echo $reg[13] ?></td></tr>
                        <tr><th>Cultivo anterior: </th><td><?php echo $reg[14] ?></td></tr>
                        <tr><th>Rendimiento del cultivo: </th><td><?php echo $reg[15] ?></td></tr>
                        <tr><th>Restos de cosecha: </th><td><?php echo $reg[16] ?></td></tr>
                        <tr><th>Fertilizante usado: </th><td><?php echo $reg[17] ?></td></tr>
                        <tr><th>Cantidad de fertilizante: </th><td><?php echo $reg[18] ?></td></tr>
                        <tr><th>Epoca de aplicacion: </th><td><?php echo $reg[19] ?></td></tr>
                        <tr><th>Modo de aplicacion: </th><td><?php echo $reg[20] ?></td></tr>
                        </table>
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
                        $fito->registrar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Otro_tipo,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones);

                        ?>

                        <table class="tcliente">
                        <tr><th>Codigo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Tipo de muestra: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Descripcion: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Cultivo, especie ó variedad: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Edad del cultivo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Fecha de coleccion: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Poblacion más cercana: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Identificacion del microorganismo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Sintomas: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Fecha de inicio de la sintomatologia: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Daños causados por: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Tipo de plantacion: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Tamaño de plantacion: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Nro de plantas: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Nro de submuestra: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Distancia: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Fuente de la semilla: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>presentacion del microorganismo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>distribucion de las plantas afectadas: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Partes afectadas: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Riego: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Topografia del terreno: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Textura de suelo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Composicion del suelo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Humedad del suelo: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Drenaje: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Practicas realizadas: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Productos utilizados y dosis: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Control de: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Productos utilizados y dosis: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Cultivo anterior: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Condiciones agroclimaticas: </th><td><?php echo $reg[0] ?></td></tr>
                        <tr><th>Observaciones: </th><td><?php echo $reg[0] ?></td></tr>
                        </table>


                   <?php endif; ?>


                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>