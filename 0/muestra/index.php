 <?php
    session_start();
    include_once '../../system/check.php';
?>
<!--Los siguientes formularios son utilizados para el registro  de una muestra y en caso de querer modificar una muestra previa
    mente registrada estos seran precargados con datos extraidos de la BD-->
<!DOCTYPE html>
<html>
    <head>
        <title>Registro de muestras</title>
        <?php include '../../layouts/head.php'; ?>
	<script type="text/javascript">
	//scrip de selección que determina cual formulario se desea cargar.

	function mostrarformulario(){

		if (document.getElementById('formulario1').checked == true) {

			document.getElementById('ambos').style.display='block';
			document.getElementById('ambos2').style.display='block';
		

		} 
		
		if (document.getElementById('formulario2').checked == true) {

			document.getElementById('ambos').style.display='block';
			document.getElementById('ambos2').style.display='block';

		} 

		if (document.getElementById('formulario1').checked == false&&document.getElementById('formulario2').checked == false) {

			document.getElementById('ambos').style.display='none';
			document.getElementById('ambos2').style.display='none';

		} 

		if (document.getElementById('formulario1').checked == true&&document.getElementById('formulario2').checked == true) {

			document.getElementById('AuxCode').style.display='block';

		}

		



		if (document.getElementById('formulario1').checked == true) {

			document.getElementById('codigo1').style.display='block';

		} else {

			document.getElementById('codigo1').style.display='none';
		  }

		if (document.getElementById('formulario2').checked == true) {

			document.getElementById('codigo2').style.display='block';

		} else {

			document.getElementById('codigo2').style.display='none';
		}

		

		if (document.getElementById('formulario1').checked == true) {

			document.getElementById('primero1').style.display='block';
			document.getElementById('analisis1').style.display='block';

		} else {

			document.getElementById('primero1').style.display='none';
			document.getElementById('analisis1').style.display='none';
		}

		if (document.getElementById('formulario2').checked == true) {

			document.getElementById('segundo2').style.display='block';
			document.getElementById('analisis2').style.display='block';

		} else {

			document.getElementById('segundo2').style.display='none';
			document.getElementById('analisis2').style.display='none';
		}

	}

</script>
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

                    require_once '../../system/class.php';//Libreria que contiene las clases.
                    include '../../system/gcodigo.php'; //Libreria que contiene el generador de codigos correspondientes a solicitudes y muestras.
                    extract($_POST);


                    if(isset($RegistrarM)): //Condición que verifica si el formulario anteriormente llenado es de fitopatología($RegistrarS=='NoContinueS') y desea llenar uno de suelo ó no ha llenado un formulario anteriormente.
                                                                           //Para generar nuevos códigos de solicitud y de muestra para esa solicitud.

	                	$x=3; 
	                	$y=2;
	                	$z=1;
	                    $generar = new controllerCodigo();
	                    $code1=$generar->generarCodigo($x); 
	                    $code2=$generar->generarCodigo($y);
	                    
	                    if($RegistrarM=='Inicio'):	
		                    $code3=$generar->generarCodigo($z); 
		                    $Cod_sol=''; 
		                    $VarAux = explode("-", $code3);
		                    $VarAux[3]=$VarAux[3]+1;
		                    $CodeAux = '';
							$s = '-';
							foreach ($VarAux as $id){  if($CodeAux == ''){ $CodeAux =$id; }else{ $CodeAux .= $s.$id; } }
						endif;

						if($RegistrarM=='ContinueM'):
							//if(isset($suelo)&&!isset($fito)):
							//	$CodeAux=$generar->generarCodigo($z);
							//endif;
							//if(isset($fito)&&!isset($suelo))
							//	$CodeAux=$generar->generarCodigo($z);
							//endif;
						endif;
                    

	                    $tipo1=1;
	                    $tipo2=2;
	                    //$Ced_cliente=$RegistrarM;
	                	$objfinca = new finca();
	                	$finca=$objfinca->consultar_finca_all($mysqli,$Ced_cliente);
	                	$objanalisis = new analisis();
	                	$analisis=$objanalisis->consultar_analisis_muestra($mysqli,$tipo2);
	                	$analisis2=$objanalisis->consultar_analisis_muestra($mysqli,$tipo1);
                    
                    
				?>

			


				<form class="contact_form" method="POST" action="insert"  id="" name="principal1"> <!--Formulario de suelo-->


					<center>
             			<input type="checkbox" name="formulario[]" value="suelo" id="formulario1" onclick="mostrarformulario();" />suelo
           				<input type="checkbox" name="formulario[]" value="fito" id="formulario2" onclick="mostrarformulario();" />fitopatologia
             		</center>
             		</br></br>

					<div id="ambos" style="display:none;">
							<label for="Codig1">Código de Solicitud</label> 
								<input type="text" name="Codig1" value="<?php echo $code3.$Cod_sol; //Imprimir en este campo el código de la solicitud creado previamente por el generador de código. ?>" id="Codig" title="Este campo esta protegido" maxlength="18" placeholder="" disabled/> <!--Este campo se encuentra deshabilitado (disabled) para que no pueda ser modificado o alterado el código de la solicitud-->
	                    			</br></br>
	                    <div id="AuxCode" style="display:none;">        	
	                    	
	                    	<label for="Codig2">Código Auxiliar</label> 
								<input type="text" name="Codig2" value="<?php echo $CodeAux; //Imprimir en este campo el código de la solicitud creado previamente por el generador de código. ?>" id="Codig" title="Este campo esta protegido" maxlength="18" placeholder="" disabled/> <!--Este campo se encuentra deshabilitado (disabled) para que no pueda ser modificado o alterado el código de la solicitud-->
	                            	</br></br> 
	                    </div>       

	                    <div id="codigo1" style="display:none;">
							<label for="Codigo">Código Suelo</label>
								<input type="text" name="Codigo" value="<?php echo $code2.$reg[0]; //Imprimir en este campo el código de muestra de suelo creado previamente por el generador de código. ?>" id="Codigo" title="Este campo esta protegido" maxlength="18" placeholder="" disabled/> <!--Este campo se encuentra deshabilitado (disabled) para que no pueda ser modificado o alterado el código de muestra de suelo-->
									</br></br>
						</div>
						<div id="codigo2" style="display:none;">
							<label for="Codigo">Código Fitopatologia</label>
									<input type="text" name="Codigo" value="<?php echo $code1.$reg[0]; //Imprimir en este campo el código de muestra de suelo creado previamente por el generador de código. ?>" id="Codigo" title="Este campo esta protegido" maxlength="18" placeholder="" disabled/> <!--Este campo se encuentra deshabilitado (disabled) para que no pueda ser modificado o alterado el código de muestra de suelo-->
										</br></br>
						</div>
						

						<label for="Tipo_m" title="Seleccione el tipo de muestra a registrar">Tipo de muestra</label>
						<!--Listado de los tipos de muestra, la condición if($reg[2]=='x') verifica que tipo precargar en caso de que se este modificando la muestra-->
										<select class="opcion4" name="Tipo_m" title="Seleccione el tipo de muestra a registrar">
											<option value="">Seleccione</option>

											<option value="1"<?php if($reg[2]=='1'){ echo 'selected'; } ?>>Suelo</option>
											<option value="2"<?php if($reg[2]=='1'){ echo 'selected'; } ?>>Vegetal</option>
											<option value="3"<?php if($reg[2]=='2'){ echo 'selected'; } ?>>Sustrato</option>
											<option value="4"<?php if($reg[2]=='3'){ echo 'selected'; } ?>>Lixiviados</option>
											<option value="5"<?php if($reg[2]=='4'){ echo 'selected'; } ?>>De Agua</option>
											<option value="6"<?php if($reg[2]=='5'){ echo 'selected'; } ?>>De Insectos</option>
											<option value="7"<?php if($reg[2]=='6'){ echo 'selected'; } ?>>Otros</option>
										</select>
										</br></br>

						<label for="Cult_act" title="Especifique el Cultivo, Especie o Variedad por ejemplo 'Uncaria Tomentosa' ">Cultivo, Especie o Variedad</label>
								<input type="text" name="Cult_act" value="<?php echo $reg[4] ?>" id="Cult_fito" title="Especifique el Cultivo, Especie o Variedad por ejemplo 'Uncaria Tomentosa' " maxlength="15" placeholder="" />
								</br></br>
						<label for="Nro_pl" title="Indique el número de plantas que tiene cultivadas">Nro de plantas</label>
								<input type="num" name="Nro_pl" value="<?php echo $reg[14] ?>" id="Nro_pl" title="Indique el número de plantas que tiene cultivadas" maxlength="10" placeholder="" />
								</br></br>
						<label for="Edad_cul" title="Edad del cultivo en días, meses o años">Edad del Cultivo</label>
								<input type="text" name="Edad_cul" value="<?php echo $reg[5] ?>" id="Edad_cul" title="Edad del cultivo en días, meses o años" maxlength="11" placeholder="" />
								</br></br>
						<label for="Tam_lote">Tamaño del lote  (Ha)</label>
								<input type="num" name="Tam_lote" value="<?php echo $reg[3] ?>" id="Tam_lote" title="Indique el tamaño del terreno en héctareas" maxlength="12" placeholder="0000" />
								<span class="form_hint">Debe ingresar el tamaño del lote en héctareas de forma numerica"</span><br />
	                            </br></br>
						<label for="Topografia">Topografía del terreno</label>
							<select  class="opcion4" name="Topografia">
								<option value="">Seleccione</option>
								<option value="1"<?php if($reg[22]=='1'){ echo 'selected'; } ?>>Plano</option>
								<option value="2"<?php if($reg[22]=='2'){ echo 'selected'; } ?>>Semiplano</option>
								<option value="3"<?php if($reg[22]=='3'){ echo 'selected'; } ?>>Ladera</option>
								<option value="4"<?php if($reg[22]=='4'){ echo 'selected'; } ?>>Quebrada</option>
								<option value="5"<?php if($reg[22]=='5'){ echo 'selected'; } ?>>Cima</option>
							</select>
								</br></br>
	                     <label for="dist_siembra">Distancia Siembra (cm)</label>
								<input type="text" name="dist_siembra" value="<?php echo $reg[16] ?>" id="dist_f" title="" maxlength="11" placeholder="" />		
								</br></br>
						<label for="Riego">Riego</label>
							<select class="opcion4" name="Riego">
								<option value="">Seleccione</option>
								<option value="1"<?php if($reg[21]=='1'){ echo 'selected'; } ?>>Aspersión</option>
								<option value="2"<?php if($reg[21]=='2'){ echo 'selected'; } ?>>Goteo</option>
								<option value="3"<?php if($reg[21]=='3'){ echo 'selected'; } ?>>Gravedad</option>
								<option value="4"<?php if($reg[21]=='4'){ echo 'selected'; } ?>>No tiene</option>
							</select>
								</br></br>
						<label for="Cult_ant" title="Indique el cultivo anterior de este terreno">Cultivo anterior</label>
								<input type="text" name="Cult_ant" value="<?php echo $reg[15] ?>" id="Cult_antes" title="Indique el cultivo anterior de este terreno" maxlength="20" placeholder="" />
								</br></br>
						<label for="F_toma">Fecha de toma de la muestra</label>
								<select class="opc" name="Dia" title="Dia">
									<option value="">-Día-</option>
									<?php for($i=01;$i<32;$i++) { ?>
										<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"<?php if($fecha[0]==$i){ echo 'selected'; } ?>><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
									<?php } ?>
								</select>
								<select class="opc" name="Mes" title="Mes">
									<option value="">-Mes-</option>
									<?php for($i=01;$i<13;$i++) { ?>
										<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"<?php if($fecha[1]==$i){ echo 'selected'; } ?>><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
									<?php } ?>
								</select>
								<select class="opc" name="Ano" title="Año">
									<option value="">--Año--</option>
									<?php for($i=1990;$i<2051;$i++) { ?>
										<option value="<?php echo $i; ?>"<?php if($fecha[2]==$i){ echo 'selected'; } ?>><?php echo $i; ?></option>
									<?php } ?>
								</select>
								</br></br>
						<label for="Practica">Prácticas realizadas</label>
								<input type="checkbox" name="Practica[]" value="1"<?php if (isset($autocompletado)) foreach($practica as $id){ if($id=='1'){echo 'checked';} }?>/>Quimico
								<input type="checkbox" name="Practica[]" value="2"<?php if (isset($autocompletado)) foreach($practica as $id){ if($id=='2'){echo 'checked';} }?>/>Fertilizacion
								<input type="checkbox" name="Practica[]" value="3"<?php if (isset($autocompletado)) foreach($practica as $id){ if($id=='3'){echo 'checked';} }?>/>Organico
								</br></br>
						<label for="Produc_dosis" title="">Productos ultilizados y dosis</label>
								<input type="text" name="Produc_dosis" value="<?php echo $reg[28] ?>" id="Produc_dosis" title="" maxlength="60" placeholder="" />
								</br></br>
						<label for="Epoca_aplic" title="">Época de Aplicación</label>
								<input type="text" name="Epoca_aplic" value="<?php echo $reg[20] ?>"  id="Epoca_aplic" title="" maxlength="10" placeholder="" />
								</br></br>	
						<label for="Modo_aplic" title="">Modo de aplicación</label>
								<textarea class="areatexto" name="Modo_aplic" id="Aplicacion" title=""  placeholder="Por Favor Especifique aquí el modo de aplicación del fertilizante"><?php echo $reg[21] ?></textarea>
	                            </br></br>
	                    <label for="Pobl_cercana" title="Indique la población mas cercana al lugar del cultivo">Población más Cercana</label>
								<input type="text" name="Pobl_cercana" value="<?php echo $reg[7] ?>" id="Pobl_cercana" title="Indique la población más cercana al lugar del cultivo" maxlength="15" placeholder="" />
								</br></br>
					</div>

				<div id="primero1" style="display:none;">		

					<label for="Profundidad" title="Indique en Centimetros a que profundidad tomo la muestra">Profundidad de la muestra  (Cm)</label>
							<input type="num" name="Profundidad" value="<?php echo $reg[4] ?>" id="Profundidad" title="Indique en Centimetros a que profundidad tomo la muestra" maxlength="11" placeholder="" />
							<span class="form_hint">Debe ingresar de forma numerica la profundidad de la cual tomo la muestra"</span><br />
                            </br></br>	
					
					<label for="Inundacion" title="¿Existe riesgo de inundación para el terreno?">Riesgo de inundación</label>
							<input type="radio" id="Inundacion" name="Inundacion" value="1" title="Si tiene riesgo"<?php if($reg[6]=='1'){ echo 'checked'; } ?>/>Si
							<input type="radio" id="Inundacion" name="Inundacion" value="0"title="No tiene riesgo"<?php if($reg[6]=='0'){ echo 'checked'; } ?>/>No
							</br></br>

					<label for="T_vege">Tipo de vegetación</label>
							<textarea class="areatexto" name="T_vege" id="T_vege" title="" maxlength="15" title="Por Favor Especifique aquí el tipo de vegetación" placeholder="Por Favor Especifique aquí el tipo de vegetación"><?php echo $reg[10] ?></textarea>
							</br></br>

					<label for="Rend_cult" title="¿Cómo fue el rendimiento BUENO, REGULAR O MALO? ">Rendimiento del cultivo</label>
							<input type="radio" name="Rend_cult" value="B" title="Bueno"<?php if($reg[16]=='B'){ echo 'checked'; } ?>/>Bueno
							<input type="radio" name="Rend_cult" value="R" title="Regular"<?php if($reg[16]=='R'){ echo 'checked'; } ?>/>Regular
							<input type="radio" name="Rend_cult" value="M" title="Malo"<?php if($reg[16]=='M'){ echo 'checked'; } ?>/>Malo
							</br></br>
					<label for="Restos" title="¿Hay restos de cosecha del cultivo anterior?">Restos de Cosecha</label>
							<input type="radio" id="Restos" name="Restos" value="1" title="Si hay restos de cosecha"<?php if($reg[17]=='1'){ echo 'checked'; } ?>/>Si
							<input type="radio" id="Restos" name="Restos" value="0" title="No hay restos de cosecha"<?php if($reg[17]=='0'){ echo 'checked'; } ?>/>No
							</br></br>	
					</div>
					
							<div id='segundo2' style='display:none;'>

							<label for="Descrip_fito">Descripción</label>
									<textarea class="areatexto" name="Descrip_fito" id="Descrip_fito" title="" maxlength="50" placeholder="Por Favor Describa la muestra"><?php echo $reg[3] ?></textarea>	 
									</br></br>
							

							
							<label for="Id_microorg">Identificación del microorganismo</label>
									<input type="text" name="Id_microorg" value="<?php echo $reg[8] ?>" id="Id_microorg" title="" maxlength="20" placeholder="" />
									</br></br>
							<label for="Sintoma">Síntomas</label>
									<input type="checkbox" name="Sintoma[]" value="1"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='1'){echo 'checked';} }?>/>Secamiento
									<input type="checkbox" name="Sintoma[]" value="2"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='2'){echo 'checked';} }?>/>Callos
									<input type="checkbox" name="Sintoma[]" value="3"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='3'){echo 'checked';} }?>/>Defoliacion
									<input type="checkbox" name="Sintoma[]" value="4"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='4'){echo 'checked';} }?>/>Moteado
									<input type="checkbox" name="Sintoma[]" value="5"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='5'){echo 'checked';} }?>/>Enanismo
									<input type="checkbox" name="Sintoma[]" value="6"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='6'){echo 'checked';} }?>/>Amarillamiento
									<input type="checkbox" name="Sintoma[]" value="7"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='7'){echo 'checked';} }?>/>Malformacion
									<input type="checkbox" name="Sintoma[]" value="8"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='8'){echo 'checked';} }?>/>Mancha
									<input type="checkbox" name="Sintoma[]" value="9"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='9'){echo 'checked';} }?>/>Marchitamiento
									<input type="checkbox" name="Sintoma[]" value="10"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='10'){echo 'checked';} }?>/>Muerte regresiva
									<input type="checkbox" name="Sintoma[]" value="11"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='11'){echo 'checked';} }?>/>Gomosis
									<input type="checkbox" name="Sintoma[]" value="12"<?php if (isset($autocompletado)) foreach($sintoma as $id){ if($id=='12'){echo 'checked';} }?>/>Otros
									</br></br>
							<label for="F_sintomas">Fecha de inicio de la sintomatología</label>
									<select class="opc" name="Dia2" title="Día">
										<option value="">Dia</option>
										<?php for($i=01;$i<32;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"<?php if($fecha2[0]==$i){ echo 'selected'; } ?>><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select class="opc" name="Mes2" title="Mes">
										<option value="">Mes</option>
										<?php for($i=01;$i<13;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"<?php if($fecha2[1]==$i){ echo 'selected'; } ?>><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select class="opc" name="Ano2" title="Año">
										<option value="">Año</option>
										<?php for($i=1990;$i<2051;$i++) { ?>
											<option value="<?php echo $i; ?>"<?php if($fecha2[2]==$i){ echo 'selected'; } ?>><?php echo $i; ?></option>
										<?php } ?>
									</select>
									</br></br>
							<label for="Causa">Daños causados por</label>
									<input type="text" name="Causa" value="<?php echo $reg[11] ?>" id="Causas" title="" maxlength="30" placeholder="" />
									</br></br>
							<label for="Tipo_plant">Tipo de Plantación</label>
								<select  class="opcion4" name="Tipo_plant">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[12]=='1'){ echo 'selected'; } ?>>Campo</option>
									<option value="2"<?php if($reg[12]=='2'){ echo 'selected'; } ?>>Semillero</option>
									<option value="3"<?php if($reg[12]=='3'){ echo 'selected'; } ?>>Invernadero</option>
									<option value="4"<?php if($reg[12]=='4'){ echo 'selected'; } ?>>Vivero</option>
								</select>
								</br></br>
							<label for="Nro_subm">Nro de Submuestra</label>
									<input type="num" name="Nro_subm" value="<?php echo $reg[15] ?>" id="Nro_subm" title="" maxlength="11" placeholder="" />		
									</br></br>
							
							<label for="Origen_sem">Fuente de la semilla</label>
									<input type="radio" id="Origen_sem" name="Origen_sem" value="1"<?php if($reg[17]=='1'){ echo 'checked'; } ?>/>Artesanal
									<input type="radio" id="Origen_sem" name="Origen_sem" value="2"<?php if($reg[17]=='2'){ echo 'checked'; } ?>/>Certificada
								    </br></br>
									
							<label for="Pres_microorg">Presentación del microorganismo</label>
								<select class="opcion4" name="Pres_microorg">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[18]=='1'){ echo 'selected'; } ?>>Líquido</option>
									<option value="2"<?php if($reg[18]=='2'){ echo 'selected'; } ?>>Biopreparado</option>
									<option value="3"<?php if($reg[18]=='3'){ echo 'selected'; } ?>>Polvo mojable</option>
									<option value="4"<?php if($reg[18]=='4'){ echo 'selected'; } ?>>Tubo</option>
									<option value="5"<?php if($reg[18]=='5'){ echo 'selected'; } ?>>Caja de petri</option>
								</select>
									</br></br>
							<label for="Dist_planafect">Distribución de las plantas afectadas</label>
								<select class="opcion4" name="Dist_planafect">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[19]=='1'){ echo 'selected'; } ?>>Generalizado</option>
									<option value="2"<?php if($reg[19]=='2'){ echo 'selected'; } ?>>Disperso</option>
									<option value="3"<?php if($reg[19]=='3'){ echo 'selected'; } ?>>Sectorizado</option>
									<option value="4"<?php if($reg[19]=='4'){ echo 'selected'; } ?>>Zona Baja</option>
									<option value="5"<?php if($reg[19]=='5'){ echo 'selected'; } ?>>Zona Alta</option>
									<option value="6"<?php if($reg[19]=='6'){ echo 'selected'; } ?>>Orillas</option>
								</select>
									</br></br>
							<label for="Part_afect">Partes afectadas</label>
									<input type="checkbox" name="Part_afect[]" value="1"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='1'){echo 'checked';} }?>/>Tallos o Ramas
									<input type="checkbox" name="Part_afect[]" value="2"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='2'){echo 'checked';} }?>/>Bulbos
									<input type="checkbox" name="Part_afect[]" value="3"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='3'){echo 'checked';} }?>/>Raices
									<input type="checkbox" name="Part_afect[]" value="4"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='4'){echo 'checked';} }?>/>Hojas
									<input type="checkbox" name="Part_afect[]" value="5"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='5'){echo 'checked';} }?>/>Flores
									<input type="checkbox" name="Part_afect[]" value="6"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='6'){echo 'checked';} }?>/>Semillas
									<input type="checkbox" name="Part_afect[]" value="7"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='7'){echo 'checked';} }?>/>Frutos
									<input type="checkbox" name="Part_afect[]" value="8"<?php if (isset($autocompletado)) foreach($partes as $id){ if($id=='8'){echo 'checked';} }?>/>Planta entera
									</br></br>

	
							<label for="Text_sue">Textura de suelo</label>
								<select class="opcion4" name="Text_sue">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[23]=='1'){ echo 'selected'; } ?>>Fino</option>
									<option value="2"<?php if($reg[23]=='2'){ echo 'selected'; } ?>>Medio</option>
									<option value="3"<?php if($reg[23]=='3'){ echo 'selected'; } ?>>Grueso</option>
								</select>
									</br></br>
							<label for="Composicion">Composición del suelo</label>
								<select class="opcion4" name="Composicion">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[24]=='1'){ echo 'selected'; } ?>>Mineral</option>
									<option value="2"<?php if($reg[24]=='2'){ echo 'selected'; } ?>>Orgánico</option>
									<option value="3"<?php if($reg[24]=='3'){ echo 'selected'; } ?>>Sustrato</option>
								</select>
									</br></br>
							<label for="Hum_sue">Humedad del suelo</label>
								<select class="opcion4" name="Hum_sue">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[25]=='1'){ echo 'selected'; } ?>>Excesiva</option>
									<option value="2"<?php if($reg[25]=='2'){ echo 'selected'; } ?>>Deficiente</option>
									<option value="3"<?php if($reg[25]=='3'){ echo 'selected'; } ?>>Adecuada</option>
								</select>
									</br></br>
							<label for="Drenaje">Drenaje</label>
								<select class="opcion4" name="Drenaje">
									<option value="">Seleccione</option>
									<option value="1"<?php if($reg[26]=='1'){ echo 'selected'; } ?>>Bueno</option>
									<option value="2"<?php if($reg[26]=='2'){ echo 'selected'; } ?>>Regular</option>
									<option value="3"<?php if($reg[26]=='3'){ echo 'selected'; } ?>>Deficiente</option>
								</select>
									</br></br>
	
							<label for="Control">Control de</label>
									<input type="checkbox" name="Control[]" value="1"<?php if (isset($autocompletado)) foreach($control as $id){ if($id=='1'){echo 'checked';} }?>/>Malezas
									<input type="checkbox" name="Control[]" value="2"<?php if (isset($autocompletado)) foreach($control as $id){ if($id=='2'){echo 'checked';} }?>/>Plagas
									<input type="checkbox" name="Control[]" value="3"<?php if (isset($autocompletado)) foreach($control as $id){ if($id=='3'){echo 'checked';} }?>/>Emfermedades
									<input type="checkbox" name="Control[]" value="4"<?php if (isset($autocompletado)) foreach($control as $id){ if($id=='4'){echo 'checked';} }?>/>Agroquimicos
									<input type="checkbox" name="Control[]" value="5"<?php if (isset($autocompletado)) foreach($control as $id){ if($id=='5'){echo 'checked';} }?>/>Biologicos
								</br></br>
							<label for="Produc_dosisb" title="">Productos ultilizados y dosis</label>
									<input type="text" name="Produc_dosisb" value="<?php echo $reg[30] ?>" id="Produc_dosisb" title="" maxlength="50" placeholder="" />
									</br></br>

							<label for="Cond_agroclima" title="">Condiciones Agroclimáticas</label>
									<input type="text" name="Cond_agroclima" value="<?php echo $reg[32] ?>" id="Cond_agroclima" title="" maxlength="20" placeholder="" />
									</br></br>


							</div>
							<div id="ambos2" style="display:none;">

							<label for="Observaciones">Observaciones</label>
									<textarea class="areatexto" name="Observaciones" id="Observaciones" title="" maxlength="50" placeholder=""><?php echo $reg[33] ?></textarea>	 
							</br></br>
							
							<!-- consultar fincas del cliente para saber de cual proviene la muestra -->
							<label for="Finca" title="">Finca</label>
                    			<select class="opcion4" name="finca">
                    				<option value="">Seleccione</option>
                    				<?php while ($reg8 = $finca->fetch_array()) { ?>
                    				<option value="<?php echo $reg8[0] ?>" <?php if($reg8[0]==$reg[34]){ echo 'selected'; } ?>><?php echo $reg8[2] ?> </option>
                    				<?php  } ?>

								</select>
                            </br></br>

                           <label for="analisis" title=""><b>Análisis disponibles</b></label></br></br>

                        <div id='analisis1' style='display:none;'>
						<?php while ($reg2 = $analisis->fetch_array()) { ?>
							<input type="checkbox" name="analisis1[]" value="<?php echo $reg2['Cod_ana']; ?>"<?php if (isset($autocompletado)) foreach($pre as $id){ if($id==$reg2[0]){echo 'checked';} }?>/><?php echo $reg2['Nom_ana']; ?>
						<?php } ;?>
						</div>
						<div id='analisis2' style='display:none;'>
						<?php while ($reg5 = $analisis2->fetch_array()) { ?>
							<input type="checkbox" name="analisis2[]" value="<?php echo $reg5['Cod_ana']; ?>"<?php if (isset($autocompletado)) foreach($pre as $id){ if($id==$reg5[0]){echo 'checked';} }?>/><?php echo $reg5['Nom_ana']; ?>
						<?php } ;?>
						</div>


							     </br
                
							     </br></br>
							     <!--pasamos campos ocultos con codigos nesesarios para el registro de la muestra-->
							     <?php if(isset($suelo)&&!isset($fito)){echo "<input type='hidden' name='BackSuelo' value='' />";}?>
								<input type="hidden" name="Cod_sol" value="<?php echo $code3.$Cod_sol; ?>" />
								<input type="hidden" name="CodeAux" value="<?php echo $CodeAux; ?>" />
								<input type="hidden" name="Cod_lab" value="1" />
								<input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />

                                <input type="hidden" name="Cod_muestra1" value="<?php echo $code2.$reg[0]; ?>" />
                                <input type="hidden" name="Cod_muestra2" value="<?php echo $code1.$reg[0]; ?>" />
								<button class="boton" type="reset" value="Borrar" name="reset" id="reset"><i class="fa fa-eraser"></i> Limpiar</button>
								<?php if($RegistrarF=='ModificarF'): ?><button type="submit" name="Actualizar" value="Actualizar" class="boton" ><i class="fa fa-check"></i> Guardar cambios</button><?php endif; ?>
                    			<?php if($RegistrarM=='ContinueM'): ?><button type="submit" name="RegistrarM" value="ContinueM" class="boton" ><i class="fa fa-check"></i> Registrar</button><?php endif; ?>
                    			<?php if($RegistrarM=='Inicio'): ?><button type="submit" name="RegistrarM" value="Inicio" class="boton" ><i class="fa fa-check"></i> Registrar</button><?php endif; ?>




							</div>	
				</form>
			
            
			<?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>
