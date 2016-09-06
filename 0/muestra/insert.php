<?php
    session_start();
    include_once '../../system/check.php';
?>
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
					<h1>Registrar Muestra</h1>
				</hgroup>
			</div>
            <?php
                extract($_POST);//extraer variables del formulario de muestras
                    require_once '../../system/class.php';//Libreria que contiene las clases con sus procedimientos

                  

                    include 'lib_muestra.php';//libreria que contiene procedimientos para guardar datos en campos especiales de la BD

                        
                        $temporal=$Cod_sol;
                        $ayudante = new ayudante();//Crear el objeto ayudante
                        $reg1=$ayudante->consultar_ayudante($mysqli);//llamado a la funcion que consulta la tabla de la BD "ayudante"
                                                                  //se actualizara esta tabla para llevar estadisticas de los registros realizados
                        $solicitud = new solicitud();//Crear  objeto solicitud
                        
                        foreach($_POST['formulario'] as $id){ if($id=='suelo') { $suelo="suelo"; } if($id=='fito') { $fito="fito"; } }


                    if(isset($RegistrarM)) ://Condicion que verifica si los datos obtenidos son para registrar una muestra de suelo
                        
                        if($RegistrarM=='Inicio'){

                            $solicitud->registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente);//Llamado a la funcion que registra una solicitud y envio de los parametros correspondientes
                            $sol=$reg1[0]+1;
                            $ayudante->actualizar_sol($mysqli,$sol);
                            if((isset($suelo)&&isset($fito))&&(!empty($suelo)&&!empty($fito))){

                                $solicitud->registrar_solicitud($mysqli,$CodeAux,$Ced_cliente);//Llamado a la funcion que registra una solicitud y envio de los parametros correspondientes
                                $sol=$reg1[0]+2;
                                $ayudante->actualizar_sol($mysqli,$sol);
                            }

                            if(isset($fito)&&!isset($suelo)) {
                                $cambiarcodigos='';
                                echo "cambiarcodigos existe";
                            }
                        }


                        if($RegistrarM=='ContinueM'){

                            
                            if(isset($BackSuelo)&&isset($fito)&&!isset($suelofito)){

                                echo "$CodeAux $Ced_cliente";
                                $solicitud->registrar_solicitud($mysqli,$CodeAux,$Ced_cliente);//Llamado a la funcion que registra una solicitud y envio de los parametros correspondientes
                                $sol=$reg1[0]+1;
                                $ayudante->actualizar_sol($mysqli,$sol);
                                $suelofito='suelofito';
                            }

                            if(isset($BackFito)&&isset($suelo)&&!isset($suelofito)){

                                $solicitud->registrar_solicitud($mysqli,$CodeAux,$Ced_cliente);//Llamado a la funcion que registra una solicitud y envio de los parametros correspondientes
                                $sol=$reg1[0]+1;
                                $ayudante->actualizar_sol($mysqli,$sol);
                                $suelofito='suelofito';
                            }
                        }

                                                    
                            if(isset($suelo)) {
                                $muestra = new muestra();
                                $muestra->registrar_muestra($mysqli,$Cod_muestra1,$Tipo_m,$Cult_act,$Nro_pl,$Edad_cul,$Tam_lote,$Topografia,$Dist_siembra,$Riego,$Cult_ant,$F_toma,$Practicas,$Produc_dosis,$Epoca_aplic,$Modo_aplic,$Pobl_cercana,$Profundidad,$Inundacion,$T_vege,$Rend_cult,$Restos,$Descrip_fito,$Id_microorg,$Sintomas,$F_sintomas,$Causa,$Tipo_plant,$Nro_subm,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parts_afect,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$Controles,$Produc_dosisb,$Cond_agroclima,$Observaciones);
                            
                                $sue=$reg1[1]+1;
                                $ayudante->actualizar_sue($mysqli,$sue);


                                if(isset($cambiarcodigos)){ $Cod_sol=$CodeAux; }
                            
                                foreach ($_POST['analisis1'] as $id){//Este bucle se encargara de extraer los analisis selecionados para la muestra de suelo

                                    $Cod_ana1=$id;//$id contiene un analisis en cada entrada de este bucle
                                    $sol_ana1 = new solicitud_analisis();//Crear el objeto solicitud_analisis
                                    $sol_ana1->registrar_solicitud_analisis($mysqli,$Cod_sol,$Cod_ana1,$Cod_muestra1);//Llamado a la funcion que registra los analisis para cada muestra
                                }

                                $Cod_sol=$temporal;

                            }
                        
                         
                            if(isset($fito)) {
                                $muestra = new muestra();
                                $muestra->registrar_muestra($mysqli,$Cod_muestra2,$Tipo_m,$Cult_act,$Nro_pl,$Edad_cul,$Tam_lote,$Topografia,$Dist_siembra,$Riego,$Cult_ant,$F_toma,$Practicas,$Produc_dosis,$Epoca_aplic,$Modo_aplic,$Pobl_cercana,$Profundidad,$Inundacion,$T_vege,$Rend_cult,$Restos,$Descrip_fito,$Id_microorg,$Sintomas,$F_sintomas,$Causa,$Tipo_plant,$Nro_subm,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parts_afect,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$Controles,$Produc_dosisb,$Cond_agroclima,$Observaciones);
                            
                                $fito=$reg1[2]+1;//sumar 1 al campo 1 del arreglo obtenido en la consulta a la tabla ayudante
                                $ayudante->actualizar_fito($mysqli,$fito);//Llamado a la funcion que actulizara el campo correspondiente de ayudante al registra una muestra de suelo
                                
                                if(isset($BackAmbos)){ $Cod_sol=$CodeAux;}
                                if(isset($BackSuelo)){ $Cod_sol=$CodeAux;}
                                if($BackFito=='suelofito'){ $Cod_sol=$CodeAux;}   
                                if(isset($suelo)){ $Cod_sol=$CodeAux; }
                                if(isset($cambiarcodigos)){ $Cod_sol=$temporal;}
                                

                                foreach ($_POST['analisis2'] as $id){//Este bucle se encargara de extraer los analisis selecionados para la muestra de suelo

                                    $Cod_ana2=$id;//$id contiene un analisis en cada entrada de este bucle
                                    $sol_ana2 = new solicitud_analisis();//Crear el objeto solicitud_analisis
                                    $sol_ana2->registrar_solicitud_analisis($mysqli,$Cod_sol,$Cod_ana2,$Cod_muestra2);//Llamado a la funcion que registra los analisis para cada muestra
                                }

                                $Cod_sol=$temporal;
                            }


                         if(isset($suelo)){ $Cod_muestra=$Cod_muestra1; }
                         if(isset($fito)){ $Cod_muestra=$Cod_muestra2; }
                         if(isset($suelo)&&isset($fito)){ $Cod_muestra=$Cod_muestra1; }
                        
                        include 'lib_analisis.php';
                        
                        include 'tabla_muestra.php';
                    
                    endif;

                    if(isset($ModificarM)):

                        $muestra = new muestra();//Crear el objeto suelo
                        $muestra->modificar_muestra($mysqli,$Cod_muestra1,$Tipo_m,$Cult_act,$Nro_pl,$Edad_cul,$Tam_lote,$Topografia,$Dist_siembra,$Riego,$Cult_ant,$F_toma,$Practicas,$Produc_dosis,$Epoca_aplic,$Modo_aplic,$Pobl_cercana,$Profundidad,$Inundacion,$T_vege,$Rend_cult,$Restos,$Descrip_fito,$Id_microorg,$Sintomas,$F_sintomas,$Causa,$Tipo_plant,$Nro_subm,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parts_afect,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$Controles,$Produc_dosisb,$Cond_agroclima,$Observaciones);//Llamado la funcion que modificara los datos de la muestra y envio de los parametros correspondientes

                        $sol_ana = new solicitud_analisis();//crear objeto solicitud_analisis

                        $sql='SELECT * FROM analisis WHERE analisis.tipo = "1" AND analisis.estatus = "On"';//Consultar analisis para muestra de suelo que esten activos
                        $res5= $mysqli->query($sql);//Guardar resultado en $res5

                        //Con los siguiente bucles verificamos cuales analisis fueron deseleccionados,seleccionados y no modificados para asi actulizarlos correctamente
                        while ($resultado = $res5->fetch_array()) ://bucle general, extrae cada registro del arreglo con los analisis para muestras de suelo
                            
                                for ($x=0; $x < $temp = count($analisis); $x++)//bucle interno que se repite por cada analisis que este selecionado para la muestra 
                                    if ($resultado[0] == $analisis[$x]) ://verificar si el analisis extraido del arreglo es el mismo que seleccionado
                                        
                                            $insert = $resultado[0];//guardar el analisis en $insert para asignarlo a la muestra de suelo
                                            $x=$temp;//igualar varibles para no seguir comparando este analisis
                                    elseif ($x == ($temp-1)) ://si el analisis extraido no es el mismo que el seleccionado

                                            $drop = $resultado[0];//guardar el analisis en $drop para que no sea asignado a la mustra de suelo
                                    endif;

                                if (isset($insert)) ://si la variable fue llenada entonces se asignara el analisis contenido en $insert a esa muestra

                                    
                                    
                                    $sol_ana->eliminar_sams($mysqli,$insert,$Cod_sol,$Cod_suelo);//se realiza una operacion de eliminacion llamando a la funcion eliminar_sams en caso de que el analisis ya estubiera preseleccionado (indicando que ya habia sido asignado a esa muestra)
                                    $sol_ana->registrar_solicitud_analisis1($mysqli,$Cod_sol,$insert,$Cod_suelo,$Cod_fito);//llamado a la funcion que registra el analisis asignado a la muestra de suelo
                                    
                                elseif (isset($drop)) ://si la variable fue llenada no se asignara el analisis contenido en $drop a esa muestra
                                    
                                    
                                    $sol_ana->eliminar_sams($mysqli,$drop,$Cod_sol,$Cod_suelo);//llamado a la funcion que elimina el analisis asignado a la muestra en caso de que halla sido deselecionado  
                                                                                               //si por el contrario el analisis no se encontraba seleccionado esta operacion no tiene efecto alguno
                                endif;
                                unset($insert, $drop);//destruir variables
                            
                        endwhile;

                        $sql="SELECT * FROM finca WHERE Cod_fin='$finca'";
                        $resfin= $mysqli->query($sql);
                        $regis = mysqli_fetch_array($resfin);
                        

                        $codm=$Cod_suelo;
                        include 'lib_analisis.php';
                        include 'tabla_muestra.php';








                    endif;



 ?>

                    <form action="index" method="post"><!-- los siguientes campos ocultos contienen variables con codigos en caso que se desee modificar una muestra para precargar el formulario -->
                            <?php if(isset($suelo)){ echo "<input type='hidden' name='suelo' value='$Cod_muestra1' />"; }
                            if(isset($fito)){ echo "<input type='hidden' name='fito' value='$Cod_muestra2' />";}
                            if(isset($suelofito)){ echo "<input type='hidden' name='suelofito' value='suelofito' />";}
                            if(isset($fito)&&isset($suelo)&&!isset($suelofito)){ echo "<input type='hidden' name='suelofito' value='suelofito' />";}   
                            if(isset($cambiarcodigos)){ echo "<input type='hidden' name='cambiarcodigos' value='' />";} ?>
                            <input type="hidden" name="Cod_sol" value="<?php echo $Cod_sol; ?>" />
                            <input type="hidden" name="CodeAux" value="<?php echo $CodeAux; ?>" />
                            <input type="hidden" name="codi_analisis1" value="<?php echo $codi_analisis1; ?>" />
                            <input type="hidden" name="codi_analisis2" value="<?php echo $codi_analisis2; ?>" />
                            <input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />
                            
                            <center>
                                <button type="submit" class="boton" name="ModificarM" value="ModificarM"><i class="fa fa-edit"></i> Modificar</button>
                                <button type="submit" class="boton" name="RegistrarM" value="ContinueM" ><i class="fa fa-plus"></i> Nueva muestra</button>
                                
                            </center>
                        </form>

                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>