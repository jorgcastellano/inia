<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro de muestras</title>
        <?php include '../../layouts/head.php'; ?>
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

					
                    require_once '../../system/class.php';
                    extract($_POST);

//####################################################################################################################################################
//###########################  #  # ## # __ #  __#     # __ #### #######  __# ## # __ # ####    ######################################################
//########################### # # # ## # __##__  ### ### __ ### # ######__  # ## # __## #### ## ######################################################
//########################### ### #    #    #    ### ### ### # ### #####    #    #    #    #    ######################################################
//####################################################################################################################################################

                    
                    if(isset($ModificarS)) :
                    $muestra = new suelo();
                    $reg = $muestra->consultar_suelo($mysqli,$Cod_suelo);

                    $fertilizante = explode("|", $reg[17]);
                    /*echo $fertilizante[0];
                    echo $fertilizante[1];
                    echo $fertilizante[2];*/
                    
                    else:
                    $sql='SELECT * FROM analisis WHERE analisis.tipo = "1"';
                    $res3= $mysqli->query($sql);

                    endif;
                    if(isset($RegistrarS)) :

                    include '../../system/gcodigo.php';
                	$x=2;
                	$y=1;
                    $generar = new controllerCodigo();
                    $code1=$generar->generarCodigo($x);
                    $code2=$generar->generarCodigo($y);

					
					$sql='SELECT * FROM laboratorio';
					$res= $mysqli->query($sql);
				?>

				<form class="contact_form" method="POST" action="insert"  id="f_suelo">
				
					<label for="Codigo">Codigo Suelo</label>
							<input type="text" name="Codigo" value="<?php echo $code1; ?>" id="Codigo" title="Este campo esta protegido" maxlength="18" placeholder="" disabled/>
                            
							</br></br>
					<label for="Cod_lab" title="Selecione el laboratorio al que asignara esta muestra">Laboratorio</label>
							<select name="Cod_lab" title="Selecione el laboratorio al que asignara esta muestra">
								<option value="">Seleccione</option>
								<?php while ($reg1 = $res->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $reg1["Cod_lab"]; ?>"<?php /*if($reg[1]=='$reg1["Cod_lab"]'){ echo 'selected'; }*/ ?>><?php echo $reg1["Nom_lab"]; ?></option>
								<?php } ?>
							</select>
                            <span class="form_hint">Debe seleccionar un laboratorio"</span><br />
							</br></br>	
					<label for="Tam_lote">Tamaño del lote  (Ha)</label>
							<input type="num" name="Tam_lote" value="<?php echo $reg[2] ?>" id="Tam_lote" title="Indique el tamaño del terreno en hectareas" maxlength="12" placeholder="0000" />
							<span class="form_hint">Debe ingresar el tamaño del lote en hectáreas de forma numerica"</span><br />
                            </br></br>
					<label for="Profundidad" title="Indique en Centimetros a que profundidad tomo la muestra">Profundidad de la muestra  (Cm)</label>
							<input type="num" name="Profundidad" value="<?php echo $reg[3] ?>" id="Profundidad" title="Indique en Centimetros a que profundidad tomo la muestra" maxlength="11" placeholder="" />
							<span class="form_hint">Debe ingresar de forma numrica la profundidad de la cual tomo la muestra"</span><br />
                            </br></br>	
					<label for="Carac_terreno" title="Selecione que caracteristica tiene el terreno">Caracteristicas del Terreno</label>
							<select name="Carac_terreno" title="Selecione que caracteristica tiene el terreno">
								<option value="">Seleccione</option>
								<option value="p"<?php if($reg[4]=='p'){ echo 'selected'; } ?>>Plano</option>
								<option value="s"<?php if($reg[4]=='s'){ echo 'selected'; } ?>>Semi plano</option>
								<option value="i"<?php if($reg[4]=='i'){ echo 'selected'; } ?>>Inclinado</option>
								<option value="x"<?php if($reg[4]=='x'){ echo 'selected'; } ?>>Pendiente</option>
							</select>
                                <span class="form_hint">Debe seleccionar un elemento"</span><br />
							</br></br>
					<label for="Inundacion" title="¿Existe riesgo de inundacion para el terreno?">Riesgo de inundacion</label>
							<input type="radio" id="Inundacion" name="Inundacion" value="1" title="Si tiene riesgo"<?php if($reg[5]=='1'){ echo 'checked'; } ?>/>Si
							<input type="radio" id="Inundacion" name="Inundacion" value="0"title="No tiene riesgo"<?php if($reg[5]=='0'){ echo 'checked'; } ?>/>No
							</br></br>
					<label for="Riego" title="¿Tiene riego este terreno?">Riego</label>
							<input type="radio" name="Riego" value="1"<?php if($reg[6]=='1'){ echo 'checked'; } ?>/>Si
							<input type="radio" name="Riego" value="0"<?php if($reg[6]=='0'){ echo 'checked'; } ?>/>No</br>
							<label for="cual">¿cual?</label> <input type="text" name="Criego" value="<?php echo $reg[7] ?>" id="Riego" title="Indique que tipo de riego se le aplica al terreno" maxlength="40" placeholder="" >
							</br></br>
					<label for="F_toma">Fecha de toma de la muestra</label>
							<select name="Dia" title="Dia">
								<option value="">Dia</option>
								<?php for($i=01;$i<32;$i++) { ?>
									<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
								<?php } ?>
							</select>
							<select name="Mes" title="Mes">
								<option value="">Mes</option>
								<?php for($i=01;$i<13;$i++) { ?>
									<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
								<?php } ?>
							</select>
							<select name="Ano" title="Año">
								<option value="">Año</option>
								<?php for($i=1990;$i<2051;$i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>


							</br></br>
					<label for="T_vege">Tipo de vegetacion</label>
							<textarea name="T_vege" id="T_vege" title="" cols="30" rows="5" maxlength="15" title="Por Favor Especifique aqui el tipo de vegetacion" placeholder="Por Favor Especifique aqui el tipo de vegetacion"><?php echo $reg[9] ?></textarea>
							</br></br>
					<label for="Cultivo" title="Indique que cultivo tiene este terreno en la actualidad">Cultivo Actual</label>
							<input type="text" name="Cultivo" value="<?php echo $reg[10] ?>" id="Cultivo" title="Indique que cultivo tiene este terreno en la actualidad" maxlength="15" placeholder="" />
							</br></br>
					<label for="Edad_cult" title="Indique la edad del cultivo y especifique si son meses o años">Edad</label>
							<input type="text" name="Edad_cult" value="<?php echo $reg[11] ?>" id="Edad_cult" title="Indique la edad del cultivo y especifique si son meses o años" maxlength="11" placeholder="" />
							</br></br>
					<label for="Dis_siembra" title="">Distancia Siembra</label>
							<input type="num" name="Dis_siembra" value="<?php echo $reg[12] ?>" id="Dis_siembra" title="" maxlength="11" placeholder="" />
							</br></br>
					<label for="Nro_pl" title="Indique el numero de plantas que tiene cultivadas">Nro de plantas</label>
							<input type="num" name="Nro_pl" value="<?php echo $reg[13] ?>" id="Nro_pl" title="Indique el numero de plantas que tiene cultivadas" maxlength="10" placeholder="" />
							</br></br>
					<label for="Cult_antes" title="Indique el cultivo anterior de este terreno">Cultivo anterior</label>
							<input type="text" name="Cult_antes" value="<?php echo $reg[14] ?>" id="Cult_antes" title="Indique el cultivo anterior de este terreno" maxlength="20" placeholder="" />
							</br></br>
					<label for="Rend_cult" title="¿Como fue el rendimiento BUENO, REGULAR O MALO? ">Rendimiento del cultivo</label>
							<input type="radio" name="Rend_cult" value="B" title="Bueno"<?php if($reg[15]=='B'){ echo 'checked'; } ?>/>Bueno
							<input type="radio" name="Rend_cult" value="R" title="Regular"<?php if($reg[15]=='R'){ echo 'checked'; } ?>/>Regular
							<input type="radio" name="Rend_cult" value="M" title="Malo"<?php if($reg[15]=='M'){ echo 'checked'; } ?>/>Malo
							</br></br>
					<label for="Restos" title="¿Hay restos de cosecha del cultivo anterior?">Restos de Cosecha</label>
							<input type="radio" id="Restos" name="Restos" value="1" title="Si hay restos de cosecha"<?php if($reg[16]=='1'){ echo 'checked'; } ?>/>Si
							<input type="radio" id="Restos" name="Restos" value="0" title="No hay restos de cosecha"<?php if($reg[16]=='0'){ echo 'checked'; } ?>/>No
							</br></br>	
					<label for="Fertilizante" title="Seleccione que tipo de fertilizante uso">Fertilizante usado</label>
							<input type="checkbox" name="Fertilizante[]" value="E" title="Estiercol"<?php foreach($fertilizante as $id){ if($id=='E'){echo 'checked';} }?>/>Estiercol
							<input type="checkbox" name="Fertilizante[]" value="F" title="Fertilizante"<?php foreach($fertilizante as $id){ if($id=='F'){echo 'checked';} }?>/>Fertilizante
							<input type="checkbox" name="Fertilizante[]" value="C" title="Cal"<?php foreach($fertilizante as $id){ if($id=='C'){echo 'checked';} }?>/>Cal
							</br></br>
					<label for="Fert_cantidad" title="">Cantidad de Fertilizante</label>
							<input type="text" name="Fert_cantidad" value="<?php echo $reg[18] ?>" id="Fert_cantidad" title="" maxlength="11" placeholder="" />
							</br></br>
					<label for="Epoca_aplic" title="">Epoca de Aplicacion</label>
							<input type="text" name="Epoca_aplic" value="<?php echo $reg[19] ?>" id="Epoca_aplic" title="" maxlength="10" placeholder="" />
							</br></br>	
					<label for="Aplicacion" title="">Modo de aplicacion</label>
							<textarea name="Aplicacion" id="Aplicacion" title="" cols="30" rows="5" maxlength="30" placeholder="Por Favor Especifique aqui el modo de aplicacion del fertilizante"><?php echo $reg[20] ?></textarea>
                            </br></br>

					<label for="analisis" title=""><b>Analisis disponibles</b></label></br></br>
						<?php while ($reg2 = $res3->fetch_array(MYSQLI_ASSOC)) { ?>
							<input type="checkbox" name="analisis[]" value="<?php echo $reg2['Cod_ana']; ?>"/><?php echo $reg2['Nom_ana']; ?>
						<?php } ?>


                        </br></br>
						<input type="hidden" name="Cod_sol" value="<?php echo $code2; ?>" />
                        <input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />
						<input type="hidden" name="Cod_suelo" value="<?php echo $code1; ?>" />
						<button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
						<button class="boton" type="submit" value="RegistrarS" name="RegistrarS"><i class="fa fa-check"></i> Registrar</button>					
				</form>
                <?php  endif; 
//################################################################################################################################
//###########################  #  # ## # __ #  __#     # __ #### ######## __.#     #     #    ####################################
//########################### # # # ## # __##__  ### ### __ ### # ####### __#### ##### ### ## ####################################
//########################### ### #    #    #    ### ### ### # ### ###### ####     ### ###    ####################################
//################################################################################################################################
     
                    

                	if(isset($ModificarF)) :
                    $muestra = new fito();
                    $reg = $muestra->consultar_fito($mysqli,$Cod_fito);

                    $fertilizante = explode("|", $reg[17]);
                    
                    
                    else:
                    $sql='SELECT * FROM analisis WHERE analisis.tipo = "2"';
                    $res3= $mysqli->query($sql);

                    endif;

                    if(isset($RegistrarF)) :

                   	include '../../system/gcodigo.php';
                	$x=3;
                	$y=1;
                    $generar = new controllerCodigo();
                    $code1=$generar->generarCodigo($x);
                    $code2=$generar->generarCodigo($y);
                    
                                   
                ?>
                
                
                <form class="contact_form" method="post" action="insert"  id="">
						
							<label for="Cod">Codigo Fitopatologia</label>
									<input type="text" name="Cod" value="<?php echo $code1; ?>" id="Cod_fito" title="" maxlength="" placeholder="" disabled/>

									</br></br>
							<label for="Tipo_fito" title="Seleccione el tipo de muestra a registrar">Tipo de muestra</label>
									<select name="Tipo_fito" title="Seleccione el tipo de muestra a registrar">
										<option value="">Seleccione</option>
										<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Vegetal</option>
										<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>De Suelo</option>
										<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>De Sustrato</option>
										<option value="4"<?php if($reg[0]==''){ echo 'selected'; } ?>>De Agua</option>
										<option value="5"<?php if($reg[0]==''){ echo 'selected'; } ?>>De Insectos</option>
									</select>
									</br></br>
							<label for="Descrip_fito">Descripcion</label>
									<textarea name="Descrip_fito" id="Descrip_fito" title="" cols="30" rows="5" maxlength="50" placeholder="Por Favor Describa la muestra"><?php echo $reg[0] ?></textarea>	 
									</br></br>
							<label for="Cult_fito" title="Especifique el Cultivo, Especie o Variedad por ejemplo 'Uncaria Tomentosa' ">Cultivo, Especie o Variedad</label>
									<input type="text" name="Cult_fito" value="<?php echo $reg[0] ?>" id="Cult_fito" title="Especifique el Cultivo, Especie o Variedad por ejemplo 'Uncaria Tomentosa' " maxlength="15" placeholder="" />
									</br></br>
							<label for="Edad_fito" title="Edad del cultivo en dias, meses o años">Edad del Cultivo</label>
									<input type="text" name="Edad_fito" value="<?php echo $reg[0] ?>" id="Edad_fito" title="Edad del cultivo en dias, meses o años" maxlength="11" placeholder="" />
									</br></br>
							<label for="F_coleccion">Fecha de coleccion</label>
									<select name="Dia" title="Dia">
										<option value="">Dia</option>
										<?php for($i=01;$i<32;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select name="Mes" title="Mes">
										<option value="">Mes</option>
										<?php for($i=01;$i<13;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select name="Ano" title="Año">
										<option value="">Año</option>
										<?php for($i=1990;$i<2051;$i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
									</br></br>
							<label for="Pobl_cercana" title="Indique la poblacion mas cercana al lugar del cultivo">Poblacion mas Cercana</label>
									<input type="text" name="Pobl_cercana" value="<?php echo $reg[0] ?>" id="Pobl_cercana" title="Indique la poblacion mas cercana al lugar del cultivo" maxlength="15" placeholder="" />
									</br></br>
							<label for="Id_microorg">Identificacion del microorganismo</label>
									<input type="text" name="Id_microorg" value="<?php echo $reg[0] ?>" id="Id_microorg" title="" maxlength="20" placeholder="" />
									</br></br>
							<label for="Sintomas">Sintomas</label>
									<input type="checkbox" name="Sintomas[]" value="1"/>Secamiento
									<input type="checkbox" name="Sintomas[]" value="2"/>Callos
									<input type="checkbox" name="Sintomas[]" value="3"/>Defoliacion
									<input type="checkbox" name="Sintomas[]" value="4"/>Moteado
									<input type="checkbox" name="Sintomas[]" value="5"/>Enanismo
									<input type="checkbox" name="Sintomas[]" value="6"/>Amarillamiento
									<input type="checkbox" name="Sintomas[]" value="7"/>Malformacion
									<input type="checkbox" name="Sintomas[]" value="8"/>Mancha
									<input type="checkbox" name="Sintomas[]" value="9"/>Marchitamiento
									<input type="checkbox" name="Sintomas[]" value="10"/>Muerte regresiva
									<input type="checkbox" name="Sintomas[]" value="11"/>Gomosis
									<input type="checkbox" name="Sintomas[]" value="12"/>Otros
									</br></br>
							<label for="F_sintomas">Fecha de inicio de la sintomatologia</label>
									<select name="Dia2" title="Dia">
										<option value="">Dia</option>
										<?php for($i=01;$i<32;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select name="Mes2" title="Mes">
										<option value="">Mes</option>
										<?php for($i=01;$i<13;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select name="Ano2" title="Año">
										<option value="">Año</option>
										<?php for($i=1990;$i<2051;$i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
									</br></br>
							<label for="Causa">Daños causados por</label>
									<input type="text" name="Causa" value="<?php echo $reg[0] ?>" id="Causas" title="" maxlength="30" placeholder="" />
									</br></br>
							<label for="Tipo_plant">Tipo de Plantacion</label>
								<select name="Tipo_plant">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Campo</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Semillero</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Invernadero</option>
									<option value="4"<?php if($reg[0]==''){ echo 'selected'; } ?>>Vivero</option>
								</select>
									
							<label for="Tam_lote">Tamaño de Plantacion/lote</label>
									<input type="text" name="Tam_lote" value="<?php echo $reg[0] ?>" id="Tam_lote" title="" maxlength="11" placeholder="" />
									</br></br>
							<label for="Nro_plant">Nro de Plantas</label>
									<input type="num" name="Nro_plant" value="<?php echo $reg[0] ?>" id="Nro_plant" title="" maxlength="11" placeholder="" />		
									</br></br>
							<label for="Nro_subm">Nro de Submuestra</label>
									<input type="num" name="Nro_subm" value="<?php echo $reg[0] ?>" id="Nro_subm" title="" maxlength="11" placeholder="" />		
									</br></br>
							<label for="dist_f">Distancia</label>
									<input type="text" name="dist_f" value="<?php echo $reg[0] ?>" id="dist_f" title="" maxlength="11" placeholder="" />		
									</br></br>
							<label for="Origen_sem">Fuente de la semilla</label>
									<input type="radio" id="Origen_sem" name="Origen_sem" value="1"/>Artesanal
									<input type="radio" id="Origen_sem" name="Origen_sem" value="2"/>Certificada
								    </br></br>
									
							<label for="Pres_microorg">Presentacion del microorganismo</label>
								<select name="Pres_microorg">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Liquido</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Biopreparado</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Polvo mojable</option>
									<option value="4"<?php if($reg[0]==''){ echo 'selected'; } ?>>Tubo</option>
									<option value="5"<?php if($reg[0]==''){ echo 'selected'; } ?>>Caja de petri</option>
								</select>
									</br></br>
							<label for="Dist_planafect">Distribucion de las plantas afectadas</label>
								<select name="Dist_planafect">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Generalizado</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Disperso</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Sectorizaddo</option>
									<option value="4"<?php if($reg[0]==''){ echo 'selected'; } ?>>Zona Baja</option>
									<option value="5"<?php if($reg[0]==''){ echo 'selected'; } ?>>Zona Alta</option>
									<option value="6"<?php if($reg[0]==''){ echo 'selected'; } ?>>Orillas</option>
								</select>
									</br></br>
							<label for="Part_afect">Partes afectadas</label>
									<input type="checkbox" name="Part_afect[]" value="1"/>Tallos o Ramas
									<input type="checkbox" name="Part_afect[]" value="2"/>Bulbos
									<input type="checkbox" name="Part_afect[]" value="3"/>Raices
									<input type="checkbox" name="Part_afect[]" value="4"/>Hojas
									<input type="checkbox" name="Part_afect[]" value="5"/>Flores
									<input type="checkbox" name="Part_afect[]" value="6"/>Semillas
									<input type="checkbox" name="Part_afect[]" value="7"/>Frutos
									<input type="checkbox" name="Part_afect[]" value="8"/>Planta entera
									</br></br>
							<label for="Riego">Riego</label>
								<select name="Riego">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Aspersion</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Goteo</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Gravedad</option>
									<option value="4"<?php if($reg[0]==''){ echo 'selected'; } ?>>No tiene</option>
								</select>
									</br></br>
							<label for="Topografia">Topografia del terreno</label>
								<select name="Topografia">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Plano</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Semiplano</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Ladera</option>
									<option value="4"<?php if($reg[0]==''){ echo 'selected'; } ?>>Quebrada</option>
									<option value="5"<?php if($reg[0]==''){ echo 'selected'; } ?>>Cima</option>
								</select>
									</br></br>
							<label for="Text_sue">Textura de suelo</label>
								<select name="Text_sue">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Fino</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Medio</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Grueso</option>
								</select>
									</br></br>
							<label for="Composicion">Composicion del suelo</label>
								<select name="Composicion">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Fino</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Medio</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Grueso</option>
								</select>
									</br></br>
							<label for="Hum_sue">Humedad del suelo</label>
								<select name="Hum_sue">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Excesiva</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Deficiente</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Adecuada</option>
								</select>
									</br></br>
							<label for="Drenaje">Drenaje</label>
								<select name="Drenaje">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[0]==''){ echo 'selected'; } ?>>Bueno</option>
									<option value="2"<?php if($reg[0]==''){ echo 'selected'; } ?>>Regular</option>
									<option value="3"<?php if($reg[0]==''){ echo 'selected'; } ?>>Deficiente</option>
								</select>
									</br></br>
							<label for="Practicas">Practicas realizadas</label>
									<input type="checkbox" name="Practicas[]" value="1"/>Quimico
									<input type="checkbox" name="Practicas[]" value="2"/>Fertilizacion
									<input type="checkbox" name="Practicas[]" value="3"/>Organico
								</br></br>
							<label for="Produc_dosis" title="">Productos ultilizados y dosis</label>
									<input type="text" name="Produc_dosis" value="<?php echo $reg[0] ?>" id="Produc_dosis" title="" maxlength="60" placeholder="" />
									</br></br>
							<label for="Control">Control de</label>
									<input type="checkbox" name="Control[]" value="1"/>Malezas
									<input type="checkbox" name="Control[]" value="2"/>Plagas
									<input type="checkbox" name="Control[]" value="3"/>Emfermedades
									<input type="checkbox" name="Control[]" value="4"/>Agroquimicos
									<input type="checkbox" name="Control[]" value="5"/>Biologicos
								</br></br>
							<label for="Produc_dosisb" title="">Productos ultilizados y dosis</label>
									<input type="text" name="Produc_dosisb" value="<?php echo $reg[0] ?>" id="Produc_dosisb" title="" maxlength="50" placeholder="" />
									</br></br>
							<label for="Cult_ant" title="">Cultivo anterior</label>
									<input type="text" name="Cult_ant" value="<?php echo $reg[0] ?>" id="Cult_ant" title="" maxlength="20" placeholder="" />
									</br></br>
							<label for="Cond_agroclima" title="">Condiciones Agroclimaticas</label>
									<input type="text" name="Cond_agroclima" value="<?php echo $reg[0] ?>" id="Cond_agroclima" title="" maxlength="20" placeholder="" />
									</br></br>
							<label for="Observaciones">Observaciones</label>
									<textarea name="Observaciones" id="Observaciones" title="" cols="30" rows="5" maxlength="50" placeholder=""><?php echo $reg[0] ?></textarea>	 
									</br></br>

							<label for="analisis" title=""><b>Analisis disponibles</b></label></br></br>
						<?php while ($reg2 = $res3->fetch_array(MYSQLI_ASSOC)) { ?>
							<input type="checkbox" name="analisis[]" value="<?php echo $reg2['Cod_ana']; ?>"/><?php echo $reg2['Nom_ana']; ?>
						<?php } ?>


							     </br></br>
								<input type="hidden" name="Cod_sol" value="<?php echo $code2; ?>" />
								<input type="hidden" name="Cod_lab" value="1" />
                                <input type="hidden" name="Cod_fito" value="<?php echo $code1; ?>" />
								<button class="boton" type="reset" value="Borrar" name="reset" id="reset">Limpiar</button>
								<button class="boton" type="submit" value="RegistrarF" name="RegistrarF" id="submit">siguiente --></button></br>						
				</form>
                <?php endif; ?>
            
			<?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>