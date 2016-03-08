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
                extract($_POST);
                    require_once '../../system/class.php';

//####################################################################################################################################################
//###########################  #  # ## # __ #  __#     # __ #### #######  __# ## # __ # ####    ######################################################
//########################### # # # ## # __##__  ### ### __ ### # ######__  # ## # __## #### ## ######################################################
//########################### ### #    #    #    ### ### ### # ### #####    #    #    #    #    ######################################################
//####################################################################################################################################################

                    if(isset($RegistrarS)) :
                        
                        include 'lib_suelo.php';
                        $suelo = new suelo();
                        $suelo->registrar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Tipo_sue,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion,$finca);

                       if($RegistrarS=='Inicio'): 
                        
                        
                        
                        $sol = new solicitud();
                        $sol->registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente);
                       

                        foreach ($_POST['analisis'] as $id){

                        $Cod_ana=$id;
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis1($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);
                        }

                        
                        $ayuda = new ayudante();
                        $reg2=$ayuda->consultar_ayudante($mysqli);
                        $sue=$reg2[1]+1;
                        $ayuda->actualizar_sue($mysqli,$sue);
            
                        $sol=$reg2[0]+1;
                        $ayuda->actualizar_sol($mysqli,$sol);
                        endif;

                        if($RegistrarS=='ContinueS'): 
                        
                        
                        
                       
                       

                        foreach ($_POST['analisis'] as $id){

                        $Cod_ana=$id;
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis1($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);
                        }

                        
                        $ayuda = new ayudante();
                        $reg2=$ayuda->consultar_ayudante($mysqli);
                        $sue=$reg2[1]+1;
                        $ayuda->actualizar_sue($mysqli,$sue);
            
                        endif;

                        $sql="SELECT * FROM finca WHERE Cod_fin='$finca'";
                        $resfin= $mysqli->query($sql);
                        $regis = mysqli_fetch_array($resfin);

                        $codm=$Cod_suelo;
                        include 'tabla_analisis.php';
                        include 'tabla_suelo.php';
                        
                        ?>
                        
                        <form action="index" method="post">
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


                    if(isset($ActualizarS)) :
                        
                        include 'lib_suelo.php';
                        $suelo = new suelo();
                        $suelo->modificar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Tipo_sue,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion,$finca);
                        
                        $sol_ana = new solicitud_analisis();

                        $sql='SELECT * FROM analisis WHERE analisis.tipo = "1" AND analisis.estatus = "On"';
                        $res5= $mysqli->query($sql);

                        while ($resultado = $res5->fetch_array()) :
                            //Verificacion de los seleccionados para ser almacenados
                            
                                for ($x=0; $x < $temp = count($analisis); $x++)
                                    if ($resultado[0] == $analisis[$x]) :
                                        
                                            $insert = $resultado[0];
                                            $x=$temp;
                                    elseif ($x == ($temp-1)) :

                                            $drop = $resultado[0];
                                    endif;

                                if (isset($insert)) :

                                    
                                    
                                    $sol_ana->eliminar_sams($mysqli,$insert,$Cod_sol,$Cod_suelo);
                                    $sol_ana->registrar_solicitud_analisis1($mysqli,$Cod_sol,$insert,$Cod_suelo,$Cod_fito);
                                    
                                elseif (isset($drop)) :
                                    
                                    
                                    $sol_ana->eliminar_sams($mysqli,$drop,$Cod_sol,$Cod_suelo);

                                endif;
                                unset($insert, $drop);
                            
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


                    if(isset($RegistrarF)) :
                        

                        include 'lib_fito.php';
                        $fito = new fito();
                        $fito->registrar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones,$finca);
        
                        if($RegistrarF=='Inicio'):
        
                        
                        $sol = new solicitud();
                        $sol->registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente);
                        

                        foreach ($_POST['analisis'] as $id){

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
        
                       
                        
                        

                        foreach ($_POST['analisis'] as $id){

                        $Cod_ana=$id;
                        $sol_ana = new solicitud_analisis();
                        $sol_ana->registrar_solicitud_analisis2($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito);
                        }
                        
                        $ayuda = new ayudante();
                        $reg2=$ayuda->consultar_ayudante($mysqli);
                        $fit=$reg2[2]+1;
                        $ayuda->actualizar_fito($mysqli,$fit);
                        
                        endif;

                        $sql="SELECT * FROM finca WHERE Cod_fin='$finca'";
                        $resfin= $mysqli->query($sql);
                        $regis = mysqli_fetch_array($resfin);

                        $codm=$Cod_fito;
                        include 'tabla_analisis.php';
                        include 'tabla_fito.php';
                        
                        ?>

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


                    if(isset($ActualizarF)) :
                        
                        include 'lib_fito.php';

                        $fito = new fito();
                        $fito->modificar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones,$finca);
                        
                        $sol_ana = new solicitud_analisis();

                        $sql='SELECT * FROM analisis WHERE analisis.tipo = "2" AND analisis.estatus = "On"';
                        $res5= $mysqli->query($sql);

                        while ($resultado = $res5->fetch_array()) :
                            //Verificacion de los seleccionados para ser almacenados
                            
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

                        $sql="SELECT * FROM finca WHERE Cod_fin='$finca'";
                        $resfin= $mysqli->query($sql);
                        $regis = mysqli_fetch_array($resfin);

                        $codm=$Cod_fito;
                        include 'tabla_analisis.php';
                        include 'tabla_fito.php';
                        
                        ?>

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