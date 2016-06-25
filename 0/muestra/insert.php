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

//####################################################################################################################################################
//###########################  #  # ## # __ #  __#     # __ #### #######  __# ## # __ # ####    ######################################################
//########################### # # # ## # __##__  ### ### __ ### # ######__  # ## # __## #### ## ######################################################
//########################### ### #    #    #    ### ### ### # ### #####    #    #    #    #    ######################################################
//####################################################################################################################################################

                    if(isset($RegistrarS)) ://Condicion que verifica si los datos obtenidos son para registrar una muestra de suelo
                        
                        include 'lib_suelo.php';//libreria que contiene procedimientos para guardar datos en campos especiales de la BD
                        $suelo = new suelo();//Crear el objeto suelo
                        $suelo->registrar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Tipo_sue,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion,$finca);//llamado a la funcion que registrara la muestra de suelo y envio de los parametros correspondientes

                       if($RegistrarS=='Inicio')://Condicion que verifica si es la primera muestra de suelo que se registrara 
                        
                        
                        
                        $sol = new solicitud();//Crear  objeto solicitud
                        $sol->registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente);//Llamado a la funcion que registra una solicitud y envio de los parametros correspondientes
                       

                        foreach ($_POST['analisis'] as $id){//Este bucle se encargara de extraer los analisis selecionados para la muestra de suelo

                        $Cod_ana=$id;//$id contiene un analisis en cada entrada de este bucle
                        $sol_ana = new solicitud_analisis();//Crear el objeto solicitud_analisis
                        $sol_ana->registrar_solicitud_analisis1($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);//Llamado a la funcion que registra los analisis para cada muestra
                        }

                        
                        $ayuda = new ayudante();//Crear el objeto ayudante
                        $reg2=$ayuda->consultar_ayudante($mysqli);//llamado a la funcion que consulta la tabla de la BD "ayudante"
                                                                  //se actualizara esta tabla para llevar estadisticas de los registros realizados
                        
                        $sue=$reg2[1]+1;//sumar 1 al campo 1 del arreglo obtenido en la consulta a la tabla ayudante
                        $ayuda->actualizar_sue($mysqli,$sue);//Llamado a la funcion que actulizara el campo correspondiente de ayudante al registra una muestra de suelo
            
                        $sol=$reg2[0]+1;//sumar 1 al campo 0 del arreglo obtenido en la consulta a la tabla ayudante
                        $ayuda->actualizar_sol($mysqli,$sol);//Llamado a la funcion que actulizara el campo correspondiente de ayudante al registra una solicitud
                        endif;

                        if($RegistrarS=='ContinueS')://Esta condicion verifica si ya no es la primera muestra de suelo a registrar para la solicitud actual
                        

                        foreach ($_POST['analisis'] as $id){//Este bucle se encargara de extraer los analisis selecionados para la muestra de suelo

                        $Cod_ana=$id;//$id contiene un analisis en cada entrada de este bucle
                        $sol_ana = new solicitud_analisis();//Crear el objeto solicitud_analisis
                        $sol_ana->registrar_solicitud_analisis1($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);//Llamado a la funcion que registra los analisis para cada muestra
                        }

                        $ayuda = new ayudante();//Crear el objeto ayudante
                        $reg2=$ayuda->consultar_ayudante($mysqli);//llamado a la funcion que consulta la tabla de la BD "ayudante"
                                                                  //se actualizara esta tabla para llevar estadisticas de los registros realizados

                        $sue=$reg2[1]+1;//sumar 1 al campo 1 del arreglo obtenido en la consulta a la tabla ayudante
                        $ayuda->actualizar_sue($mysqli,$sue);//Llamado a la funcion que actulizara el campo correspondiente de ayudante al registra una muestra de suelo
            
                        endif;

                        $sql="SELECT * FROM finca WHERE Cod_fin='$finca'";//Consultar datos de la finca a la que pertenece la muestra
                        $resfin= $mysqli->query($sql);//Guardar arreglo obtenido
                        $regis = mysqli_fetch_array($resfin);//Extraer arreglo obtenido

                        $codm=$Cod_suelo;//Guardar el codigo de la muestra en $codm para usarlo en otra operacion
                        include 'tabla_analisis.php';//libreria que contiene las consultas y procedimientos para mostrar los analisis registrados en una tabla
                        include 'tabla_suelo.php';//libreria que contiene las consultas y procedimientos para mostrar los datos de la muestra registrada en una tabla
                        
                        ?>
                        
                        <form action="index" method="post"><!-- los siguientes campos ocultos contienen variables con codigos en caso que se desee modificar una muestra para precargar el formulario -->
                            <input type="hidden" name="Cod_suelo" value="<?php echo $Cod_suelo; ?>" />
                            <input type="hidden" name="Cod_sol" value="<?php echo $Cod_sol; ?>" />
                            <input type="hidden" name="codi_analisis" value="<?php echo $codi_analisis; ?>" />
                            <input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />
                            
                            <button class="boton" type="submit" value="ModificarS" name="RegistrarS"><i class="fa fa-edit"></i> Modificar</button>
                            <button type="submit" class="boton" name="RegistrarS" value="ContinueS" ><i class="fa fa-plus"></i> Muestra de Suelo</button>
                            <button type="submit" name="RegistrarF" value="NoContinueF" class="boton" ><i class="fa fa-plus"></i> Muestra de Fitopatologia</button>
                            
                        </form>
                        <?php
                    endif;


                    if(isset($ActualizarS)) ://esta variable verifica si los datos provenientes del formulario son de una muestra de suelo a modificar
                        
                        include 'lib_suelo.php';//libreria que contiene procedimientos para guardar datos en campos especiales de la BD
                        $suelo = new suelo();//Crear el objeto suelo
                        $suelo->modificar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Tipo_sue,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion,$finca);//Llamado la funcion que modificara los datos de la muestra y envio de los parametros correspondientes

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
                        include 'tabla_analisis.php';
                        include 'tabla_suelo.php';
                        
                        ?>
                        <form action="index" method="post">
                            <input type="hidden" name="Cod_suelo" value="<?php echo $Cod_suelo; ?>" />
                            <input type="hidden" name="codi_analisis" value="<?php echo $codi_analisis; ?>" />
                            <input type="hidden" name="Cod_sol" value="<?php echo $Cod_sol; ?>" />
                            <input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />
                            
                            
                            <button class="boton" type="submit" value="ModificarS" name="RegistrarS"><i class="fa fa-edit"></i> Modificar</button>
                            <button type="submit" class="boton" name="RegistrarS" value="ContinueS" ><i class="fa fa-plus"></i> Muestra de Suelo</button>
                            <button type="submit" name="RegistrarF" value="NoContinueF" class="boton" ><i class="fa fa-plus"></i> Muestra de Fitopatologia</button>
                            
                        </form>
                        <?php
                    endif;

//################################################################################################################################
//###########################  #  # ## # __ #  __#     # __ #### ######## __.#     #     #    ####################################
//########################### # # # ## # __##__  ### ### __ ### # ####### __#### ##### ### ## ####################################
//########################### ### #    #    #    ### ### ### # ### ###### ####     ### ###    ####################################
//################################################################################################################################

                    //verificar si la muestra a registrar es de fitopatologia 
                    if(isset($RegistrarF)) :
                        

                        include 'lib_fito.php';
                        $fito = new fito();
                        $fito->registrar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones,$finca);
        
                        if($RegistrarF=='Inicio'):
                            //si la muestra es la primera de la solicitud
        
                        
                        $sol = new solicitud();
                        $sol->registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente);
                        

                        foreach ($_POST['analisis'] as $id){
                            //bucle para asignar los analisis a la muestra

                        $Cod_ana=$id;
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis2($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);
                        }
                        
                        $ayuda = new ayudante();
                        $reg2=$ayuda->consultar_ayudante($mysqli);
                        $fit=$reg2[2]+1;
                        $ayuda->actualizar_fito($mysqli,$fit);
                        
                        $sol=$reg2[0]+1;
                        $ayuda->actualizar_sol($mysqli,$sol);
                        endif;

                        if($RegistrarF=='ContinueF'):
                           //si la muestra ya no es la primera de la solicitud 
        
                       
                        
                        

                        foreach ($_POST['analisis'] as $id){
                            //bucle para asignar los analisis a la muestra

                        $Cod_ana=$id;
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis2($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);
                        }
                        
                        $ayuda = new ayudante();
                        $reg2=$ayuda->consultar_ayudante($mysqli);
                        $fit=$reg2[2]+1;
                        $ayuda->actualizar_fito($mysqli,$fit);
                        
                        endif;
                        //consultar la muestra registrada junto con su finca y analisis asignados

                        $sql="SELECT * FROM finca WHERE Cod_fin='$finca'";
                        $resfin= $mysqli->query($sql);
                        $regis = mysqli_fetch_array($resfin);

                        $codm=$Cod_fito;
                        include 'tabla_analisis.php';
                        include 'tabla_fito.php';
                        
                        ?>
                        <!--  pasar campos ocultos con codigos en caso que se desee modificar la muestra -->
                        <form action="index" method="post">
                            <input type="hidden" name="Cod_fito" value="<?php echo $Cod_fito; ?>" />
                            <input type="hidden" name="codi_analisis" value="<?php echo $codi_analisis; ?>" />
                            <input type="hidden" name="Cod_sol" value="<?php echo $Cod_sol; ?>" />
                            <input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />
                            
                            
                            <button class="boton" type="submit" value="ModificarF" name="RegistrarF"><i class="fa fa-edit"></i> Modificar</button>
                            <button type="submit" class="boton" name="RegistrarS" value="NoContinueS" ><i class="fa fa-plus"></i> Muestra de Suelo</button>
                            <button type="submit" name="RegistrarF" value="ContinueF" class="boton" ><i class="fa fa-plus"></i> Muestra de Fitopatologia</button>
                            
                        </form>


                   <?php endif; 

                    //si se desea modificar una muestra de suelo previamente editada
                    if(isset($ActualizarF)) :
                        
                        include 'lib_fito.php';

                        $fito = new fito();
                        $fito->modificar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones,$finca);
                        
                        $sol_ana = new solicitud_analisis();

                        $sql='SELECT * FROM analisis WHERE analisis.tipo = "2" AND analisis.estatus = "On"';
                        $res5= $mysqli->query($sql);

                        //bucles para la asignacion y desasignacion de anlisis a la muestra modificada
                        while ($resultado = $res5->fetch_array()) :
                            
                            
                                for ($x=0; $x < $temp = count($analisis); $x++)
                                    if ($resultado[0] == $analisis[$x]) :
                                        
                                            $insert = $resultado[0];
                                            $x=$temp;
                                    elseif ($x == ($temp-1)) :

                                            $drop = $resultado[0];
                                    endif;

                                if (isset($insert)) :

                                    
                                    
                                    $sol_ana->eliminar_samf($mysqli,$insert,$Cod_sol,$Cod_fito);
                                    $sol_ana->registrar_solicitud_analisis2($mysqli,$Cod_sol,$insert,$Cod_suelo,$Cod_fito);
                                    
                                elseif (isset($drop)) :
                                    
                                    
                                    $sol_ana->eliminar_samf($mysqli,$drop,$Cod_sol,$Cod_fito);

                                endif;
                                unset($insert, $drop);
                            
                        endwhile;

                        //consultar muestra registrada junto con su finca y analisis asignados
                        $sql="SELECT * FROM finca WHERE Cod_fin='$finca'";
                        $resfin= $mysqli->query($sql);
                        $regis = mysqli_fetch_array($resfin);

                        $codm=$Cod_fito;
                        include 'tabla_analisis.php';
                        include 'tabla_fito.php';
                        
                        ?>

                        <!--  pasar campos ocultos con codigos en caso que se desee modificar la muestra -->
                        <form action="index" method="post">
                            <input type="hidden" name="Cod_fito" value="<?php echo $Cod_fito; ?>" />
                            <input type="hidden" name="codi_analisis" value="<?php echo $codi_analisis; ?>" />
                            <input type="hidden" name="Cod_sol" value="<?php echo $Cod_sol; ?>" />
                            <input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />
                            
                            <button class="boton" type="submit" value="ModificarF" name="RegistrarF"><i class="fa fa-edit"></i> Modificar</button>
                            <button type="submit" class="boton" name="RegistrarS" value="NoContinueS" ><i class="fa fa-plus"></i> Muestra de Suelo</button>
                            <button type="submit" name="RegistrarF" value="ContinueF" class="boton" ><i class="fa fa-plus"></i> Muestra de Fitopatologia</button>
                            
                        </form>
                        


                   <?php endif; ?>


                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>