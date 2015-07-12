<!DOCTYPE html>
<html>
    <head>
        <title>Registro de muestras de suelo</title>
        <?php include 'layouts/head.php' ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php' ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php' ?>
				<hgroup>
					<h1>Registrar Muestra de fitopatologia</h1>
				</hgroup>
			</div>

				<form class="contact_form" method="post" action="insert.php"  id="">
					
							
							<label for="Cod_fito">Codigo Fitopatologia</label>
									<input type="text" name="Cod_fito" value="RR-MM-AA" id="Cod_fito" title="" maxlength="" placeholder="" disabled/>

									</br></br>
							<label for="Tipo_fito" title="Seleccione el tipo de muestra a registrar">Tipo de muestra</label>
									<select name="Tipo_fito[]" title="Seleccione el tipo de muestra a registrar">
										<option value="">Seleccione</option>
										<option value="Vegetal">Vegetal</option>
										<option value="De Suelo">De Suelo</option>
										<option value="De Sustrato">De Sustrato</option>
										<option value="De Agua">De Agua</option>
										<option value="De Insectos">De Insectos</option>
									</select>
									</br></br>
							<label for="Descrip_fito">Descripcion</label>
									<textarea name="Descrip_fito" id="Descrip_fito" title="" cols="30" rows="5" maxlength="50" placeholder="Por Favor Describa la muestra"></textarea>	 
									</br></br>
							<label for="Cult_fito" title="Especifique el Cultivo, Especie o Variedad por ejemplo 'Uncaria Tomentosa' ">Cultivo, Especie o Variedad</label>
									<input type="text" name="Cult_fito" value="" id="Cult_fito" title="Especifique el Cultivo, Especie o Variedad por ejemplo 'Uncaria Tomentosa' " maxlength="15" placeholder="" />
									</br></br>
							<label for="Edad_fito" title="Edad del cultivo en dias, meses o años">Edad del Cultivo</label>
									<input type="text" name="Edad_fito" value="" id="Edad_fito" title="Edad del cultivo en dias, meses o años" maxlength="11" placeholder="" />
									</br></br>
							<label for="F_coleccion">Fecha de coleccion</label>
									<select name="Dia[]" title="Dia">
										<option value="">Dia</option>
										<?php for($i=01;$i<32;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select name="Mes[]" title="Mes">
										<option value="">Mes</option>
										<?php for($i=01;$i<13;$i++) { ?>
											<option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
										<?php } ?>
									</select>
									<select name="Ano[]" title="Año">
										<option value="">Año</option>
										<?php for($i=1990;$i<2051;$i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>


									</br></br>
							<label for="Pobl_cercana" title="Indique la poblacion mas cercana al lugar del cultivo">Poblacion mas Cercana</label>
									<input type="text" name="Pobl_cercana" value="" id="Pobl_cercana" title="Indique la poblacion mas cercana al lugar del cultivo" maxlength="15" placeholder="" />
									</br></br>
							<label for="Id_microorg">Identificacion del microorganismo</label>
									<input type="text" name="Id_microorg" value="" id="Id_microorg" title="" maxlength="20" placeholder="" />
									</br></br>
							<label for="Sintomas">Sintomas</label>
									<input type="checkbox" name="Sintomas[]" value="Secamiento"/>Secamiento
									<input type="checkbox" name="Sintomas[]" value="Callos"/>Callos
									<input type="checkbox" name="Sintomas[]" value="defoliacion"/>Defoliacion
									<input type="checkbox" name="Sintomas[]" value="Moteado"/>Moteado
									<input type="checkbox" name="Sintomas[]" value="Enanismo"/>Enanismo
									<input type="checkbox" name="Sintomas[]" value="Amarillamiento"/>Amarillamiento
									<input type="checkbox" name="Sintomas[]" value="Malformacion"/>Malformacion
									<input type="checkbox" name="Sintomas[]" value="Mancha"/>Mancha
									<input type="checkbox" name="Sintomas[]" value="Marchitamiento"/>Marchitamiento
									<input type="checkbox" name="Sintomas[]" value="Muerte regresiva"/>Muerte regresiva
									<input type="checkbox" name="Sintomas[]" value="Gomosis"/>Gomosis
									<input type="checkbox" name="Sintomas[]" value="Otros"/>Otros
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
									<input type="text" name="Causa" value="" id="Causas" title="" maxlength="30" placeholder="" />
									</br></br>
							<label for="Tipo_plant">Tipo de Plantacion</label>
								<select name="Tipo_plant[]">
									<option value="">Seleccione</option>
									<option value="1"/>Campo</option>
									<option value="2"/>Semillero</option>
									<option value="3"/>Invernadero</option>
									<option value="4"/>Vivero</option>
								</select>
									Otros
									<input type="text" name="Otro_tipo" value="" id="Otro_tipo" title="" maxlength="" placeholder="" />
									</br></br>
							<label for="Tam_lote">Tamaño de Plantacion/lote</label>
									<input type="text" name="Tam_lote" value="" id="Tam_lote" title="" maxlength="11" placeholder="" />
									</br></br>
							<label for="Nro_plant">Nro de Plantas</label>
									<input type="num" name="Nro_plant" value="" id="Nro_plant" title="" maxlength="11" placeholder="" />		
									</br></br>
							<label for="Nro_subm">Nro de Submuestra</label>
									<input type="num" name="Nro_subm" value="" id="Nro_subm" title="" maxlength="11" placeholder="" />		
									</br></br>
							<label for="dist_f">Distancia</label>
									<input type="text" name="dist_f" value="" id="dist_f" title="" maxlength="11" placeholder="" />		
									</br></br>
							<label for="Origen_sem">Fuente de la semilla</label>
									<input type="radio" id="Origen_sem" name="Origen_sem" value="1"/>Artesanal
									<input type="radio" id="Origen_sem" name="Origen_sem" value="2"/>Certificada
								    </br></br>
									<label for="otros">Otros</label>
									<input type="text" name="Origen" value="" id="Origen" title="" maxlength="" placeholder="" />
									</br></br>
							<label for="Pres_microorg">Presentacion del microorganismo</label>
								<select name="Pres_microorg[]">
									<option value="">Seleccione</option>
									<option value="1" >Liquido</option>
									<option value="2" >Biopreparado</option>
									<option value="3" >Polvo mojable</option>
									<option value="4" >Tubo</option>
									<option value="5" >Caja de petri</option>
								</select>
									</br></br>
							<label for="Dist_planafect">Distribucion de las plantas afectadas</label>
								<select name="Dist_planafect[]">
									<option value="">Seleccione</option>
									<option value="1" />Generalizado</option>
									<option value="2" />Disperso</option>
									<option value="3" />Sectorizaddo</option>
									<option value="4" />Zona Baja</option>
									<option value="5" />Zona Alta</option>
									<option value="6" />Orillas</option>
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
							<label for"Riego">Riego</label>
								<select name="Riego[]">
									<option value="">Seleccione</option>
									<option value="1"/>Aspersion</option>
									<option value="2"/>Goteo</option>
									<option value="3"/>Gravedad</option>
									<option value="4"/>No tiene</option>
								</select>
									</br></br>
							<label for="Topografia">Topografia del terreno</label>
								<select name="Topografia[]">
									<option value="">Seleccione</option>
									<option value="1" />Plano</option>
									<option value="2" />Semiplano</option>
									<option value="3" />Ladera</option>
									<option value="4" />Quebrada</option>
									<option value="5" />Cima</option>
								</select>
									</br></br>
							<label for="Text_sue">Textura de suelo</label>
								<select name="Text_sue[]">
									<option value="">Seleccione</option>
									<option value="1" />Fino</option>
									<option value="2" />Medio</option>
									<option value="3" />Grueso</option>
								</select>
									</br></br>
							<label for="Composicion">Composicion del suelo</label>
								<select name="Composicion[]">
									<option value="">Seleccione</option>
									<option value="1" />Fino</option>
									<option value="2" />Medio</option>
									<option value="3" />Grueso</option>
								</select>
									</br></br>
							<label for="Hum_sue">Humedad del suelo</label>
								<select name="Hum_sue[]">
									<option value="">Seleccione</option>
									<option value="1" />Excesiva</option>
									<option value="2" />Deficiente</option>
									<option value="3" />Adecuada</option>
								</select>
									</br></br>
							<label for="Drenaje">Drenaje</label>
								<select name="Drenaje[]">
									<option value="">Seleccione</option>
									<option value="1" />Bueno</option>
									<option value="2" />Regular</option>
									<option value="3" />Deficiente</option>
								</select>
									</br></br>
							<label for="Practicas">Practicas realizadas</label>
									<input type="checkbox" name="Practicas[]" value="1"/>Quimico
									<input type="checkbox" name="Practicas[]" value="2"/>Fertilizacion
									<input type="checkbox" name="Practicas[]" value="3"/>Organico
								</br></br>
							<label for="Produc_dosis" title="">Productos ultilizados y dosis</label>
									<input type="text" name="Produc_dosis" value="" id="Produc_dosis" title="" maxlength="60" placeholder="" />
									</br></br>
							<label for="Control">Control de</label>
									<input type="checkbox" name="Control[]" value="1"/>Malezas
									<input type="checkbox" name="Control[]" value="2"/>Plagas
									<input type="checkbox" name="Control[]" value="3"/>Emfermedades
									<input type="checkbox" name="Control[]" value="4"/>Agroquimicos
									<input type="checkbox" name="Control[]" value="5"/>Biologicos
								</br></br>
							<label for="Produc_dosisb" title="">Productos ultilizados y dosis</label>
									<input type="text" name="Produc_dosisb" value="" id="Produc_dosisb" title="" maxlength="50" placeholder="" />
									</br></br>
							<label for="Cult_ant" title="">Cultivo anterior</label>
									<input type="text" name="Cult_ant" value="" id="Cult_ant" title="" maxlength="20" placeholder="" />
									</br></br>
							<label for="Cond_agroclima" title="">Condiciones Agroclimaticas</label>
									<input type="text" name="Cond_agroclima" value="" id="Cond_agroclima" title="" maxlength="20" placeholder="" />
									</br></br>
							<label for="Observaciones">Observaciones</label>
									<textarea name="Observaciones" id="Observaciones" title="" cols="30" rows="5" maxlength="50" placeholder=""></textarea>	 
									</br></br>


							
								<input type="hidden" name="tipo" value="4" />
								<input type="hidden" name="Cod_lab" value="1" />
								<button class="boton" type="reset" value="Borrar" name="reset" id="reset">Limpiar</button>
								<button class="boton" type="submit" value="Listo" name="submit" id="submit">siguiente --></button></br>
								
					
				</form>
			<?php include 'layouts/layout_p.php' ?>
			</section>

	</body>
</html>