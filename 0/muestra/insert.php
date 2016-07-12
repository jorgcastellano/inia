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
                    

                    if(isset($RegistrarM)) ://Condicion que verifica si los datos obtenidos son para registrar una muestra de suelo
                        
                        include 'lib_muestra.php';//libreria que contiene procedimientos para guardar datos en campos especiales de la BD
                        $suelo = new muestra();
                        $suelo->registrar_muestra($mysqli,$Cod_suelo,$Cod_fito,$Tipo_m,$Cult_act,$Nro_pl,$Edad_cul,$Tam_lote,$Topografia,$dist_siembra,$Riego,$Cult_ant,$F_toma,$Pract,$Produc_dosis,$Epoca_aplic,$Modo_aplic,$Pobl_cercana,$Profundidad,$Inundacion,$T_vege,$Rend_cult,$Restos,$Descrip_fito,$Id_microorg,$Sintomas,$F_sintomas,$Causa,$Tipo_plant,$Nro_subm,$Origen_sem,$Pres_microorg,$Dist_planafect,$Part_afect,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$Contro,$Produc_dosisb,$Cond_agroclima,$Observaciones);

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
 ?>


                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>