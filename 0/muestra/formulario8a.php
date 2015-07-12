<!DOCTYPE html>
<html>
    <head>
        <title>Registro de muestras de suelo</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Registrar Muestra de Suelo</h1>
				</hgroup>
			</div>

				<?php
					include_once '../includes/conexion_bd.php';
					$sql='SELECT * FROM laboratorio';
					$res= $conex->query($sql);

				?>

				<form class="contact_form" method="POST" action="insert8a.php"  id="f_suelo">
				
					<label for="Cod_suelo">Codigo Suelo</label>
							<input type="text" name="Cod_suelo" value="rr-ww-aa" id="Cod_suelo" title="Este campo esta protegido" maxlength="18" placeholder="" />
							</br></br>
					<label for="Cod_lab" title="Selecione el laboratorio al que asignara esta muestra">Laboratorio</label>
							<select name="Cod_lab[]" title="Selecione el laboratorio al que asignara esta muestra">
								<option value="">Seleccione</option>
								<?php while ($reg = $res->fetch_array(MYSQLI_ASSOC)) { ?>
								<option value="<?php echo $reg["Cod_lab"]; ?>"><?php echo $reg["Nom_lab"]; ?></option>
								<?php } ?>
							</select>
							</br></br>	
					<label for="Tam_lote">Tamaño del lote  (Ha)</label>
							<input type="num" name="Tam_lote" value="" id="Tam_lote" title="Indique el tamaño del terreno en hectareas" maxlength="12" placeholder="0000" />
							</br></br>
					<label for="Profundidad" title="Indique en Centimetros a que profundidad tomo la muestra">Profundidad de la muestra  (Cm)</label>
							<input type="num" name="Profundidad" value="" id="Profundidad" title="Indique en Centimetros a que profundidad tomo la muestra" maxlength="11" placeholder="" />
							</br></br>	
					<label for="Carac_terreno" title="Selecione que caracteristica tiene el terreno">Caracteristicas del Terreno</label>
							<select name="Carac_terreno[]" title="Selecione que caracteristica tiene el terreno">
								<option value="">Seleccione</option>
								<option value="p">Plano</option>
								<option value="s">Semi plano</option>
								<option value="i">Inclinado</option>
								<option value="x">Pendiente</option>
							</select>
							</br></br>
					<label for="Inundacion" title="¿Existe riesgo de inundacion para el terreno?">Riesgo de inundacion</label>
							<input type="radio" id="Inundacion" name="Inundacion" value="1" title="Si tiene riesgo"/>Si
							<input type="radio" id="Inundacion" name="Inundacion" value="0"title="No tiene riesgo"/>No
							</br></br>
					<label for="Riego" title="¿Tiene riego este terreno?">Riego</label>
							<input type="radio" name="Riego" value="1"/>Si
							<input type="radio" name="Riego" value="0"/>No
							<label for="cual">¿cual?</label> <input type="text" name="Criego" value="" id="Riego" title="Indique que tipo de riego se le aplica al terreno" maxlength="40" placeholder="" >
							</br></br>
					<label for="F_toma">Fecha de toma de la muestra</label>
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
					<label for="T_vege">Tipo de vegetacion</label>
							<textarea name="T_vege" id="T_vege" title="" cols="30" rows="5" maxlength="15" title="Por Favor Especifique aqui el tipo de vegetacion" placeholder="Por Favor Especifique aqui el tipo de vegetacion"></textarea>
							</br></br>
					<label for="Cultivo" title="Indique que cultivo tiene este terreno en la actualidad">Cultivo Actual</label>
							<input type="text" name="Cultivo" value="" id="Cultivo" title="Indique que cultivo tiene este terreno en la actualidad" maxlength="15" placeholder="" />
							</br></br>
					<label for="Edad_cult" title="Indique la edad del cultivo y especifique si son meses o años">Edad</label>
							<input type="text" name="Edad_cult" value="" id="Edad_cult" title="Indique la edad del cultivo y especifique si son meses o años" maxlength="11" placeholder="" />
							</br></br>
					<label for="Dis_siembra" title="">Distancia Siembra</label>
							<input type="num" name="Dis_siembra" value="" id="Dis_siembra" title="" maxlength="11" placeholder="" />
							</br></br>
					<label for="Nro_pl" title="Indique el numero de plantas que tiene cultivadas">Nro de plantas</label>
							<input type="num" name="Nro_pl" value="" id="Nro_pl" title="Indique el numero de plantas que tiene cultivadas" maxlength="10" placeholder="" />
							</br></br>
					<label for="Cult_antes" title="Indique el cultivo anterior de este terreno">Cultivo anterior</label>
							<input type="text" name="Cult_antes" value="" id="Cult_antes" title="Indique el cultivo anterior de este terreno" maxlength="20" placeholder="" />
							</br></br>
					<label for="Rend_cult" title="¿Como fue el rendimiento BUENO, REGULAR O MALO? ">Rendimiento del cultivo</label>
							<input type="radio" name="Rend_cult" value="B" title="Bueno" />Bueno
							<input type="radio" name="Rend_cult" value="R" title="Regular"/>Regular
							<input type="radio" name="Rend_cult" value="M" title="Malo"/>Malo
							</br></br>
					<label for="Restos" title="¿Hay restos de cosecha del cultivo anterior?">Restos de Cosecha</label>
							<input type="radio" id="Restos" name="Restos" value="1" title="Si hay restos de cosecha"/>Si
							<input type="radio" id="Restos" name="Restos" value="0" title="No hay restos de cosecha"/>No
							</br></br>	
					<label for="Fertilizante" title="Seleccione que tipo de fertilizante uso">Fertilizante usado</label>
							<input type="checkbox" name="Fertilizante[]" value="E" title="Estiercol"/>Estiercol
							<input type="checkbox" name="Fertilizante[]" value="F" title="Fertilizante"/>Fertilizante
							<input type="checkbox" name="Fertilizante[]" value="C" title="Cal"/>Cal
							</br></br>
					<label for="Fert_cantidad" title="">Cantidad de Fertilizante</label>
							<input type="text" name="Fert_cantidad" value="" id="Fert_cantidad" title="" maxlength="11" placeholder="" />
							</br></br>
					<label for="Epoca_aplic" title="">Epoca de Aplicacion</label>
							<input type="text" name="Epoca_aplic" value="" id="Epoca_aplic" title="" maxlength="10" placeholder="" />
							</br></br>	
					<label for="Aplicacion" title="">Modo de aplicacion</label>
							<textarea name="Aplicacion" id="Aplicacion" title="" cols="30" rows="5" maxlength="30" placeholder="Por Favor Especifique aqui el modo de aplicacion del fertilizante"></textarea>

						</br></br>
						<input type="hidden" name="Cod_sol" value="002" />
						<input type="hidden" name="tipo" value="3" />
						<button  type="reset" name="reset" class="boton">Limpiar</button>
						<button class="boton" type="submit" name="submit">Siguiente –></button>					
				</form>
			<?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>