<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo Cliente</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Nuevo Cliente</h1>
			</hgroup>
		</div>
		<?php
			if (isset($_GET['var1']))
				$var1=$_GET["var1"];

	        if(isset($_POST['Modificar'])) :
	    		extract($_POST);
	            $Ced_cliente=$Modificar;
	            require_once '../../system/class.php';
				$client = new cliente();
				$reg = $client->consultar_cliente($mysqli,$Ced_cliente);
				if ($_SESSION['privilegios'] == 1) :
		            $fin = new finca();
		            $reg2=$fin->consultar_finca_all($mysqli,$Ced_cliente);
	            endif;
	        endif;
		?>

			<form class="contact_form" method="post" action="resultados">

				<br>
        <label for="Ced_cliente">Cédula / RIF</label>
          <select class="opc-min" name="">
            <option value="V">V</option>
            <option value="E">E</option>
            <option value="J">J</option>
            <option value="G">G</option>
          </select>
          <input required type="text" name="Ced_cliente" id="Ced_cliente" value="<?php echo $reg[1].$var1; ?>" title="Introduzca la cédula " maxlength="8" placeholder="" pattern="\d{6,}" />
          <span class="form_hint">Debe contener solo caracteres númericos</span><br />
				<label for="Nom_cliente">Nombres</label>
					<input required type="text" name="Nom_cliente" id="Nom_cliente" value="<?php echo $reg[2]?>" title="Introduzca los nombres " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-zÑñáéíóú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener siempre la primera letra en "Mayúscula"</span><br />
				<label for="Apelli_cliente">Apellidos</label>
					<input required type="text" name="Apelli_cliente" id="Apelli_cliente" value="<?php echo $reg[3]?>" title="Introduzca los apellidos  " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-zñáéíóú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener siempre la primera letra en "Mayúscula"</span><br />
				<label for="Contacto">Referido por</label>
					<input type="text" name="Contacto" id="Contacto" value="<?php echo $reg[4]?>" title="Introduzca los nombres de la persona de contacto" maxlength="50" placeholder="" pattern="([A-Z]{1}[a-z,ñ,á,é,í,ó,ú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener siempre la primera letra en "Mayúscula"</span><br />
				<label for="Telf_cliente">Teléfono</label>
					<input required type="text" name="Telf_cliente" id="Telf_cliente" value="<?php echo $reg[5]?>" title="Introduzca un número de teléfono" maxlength="12" placeholder="0000-0000000" pattern="\d{4}-\d{7}" />
                    <span class="form_hint">Debe ingresar su teléfono de la siguiente manera 0000- 0000000"</span><br />
				<label for="Dire_cliente">Dirección</label>
					<textarea class="areatexto" required name="Dire_cliente" id="Dire_cliente"  title="" cols="30" rows="5" maxlength="100" placeholder="Por Favor Especifique aqui la dirección del cliente"><?php echo $reg[6]?></textarea>
          <br><label for="tipoUsuario">Tipo de usuario</label>
          <select class="opcion4" name="tipoUsuario">
            <option value="1" <?php if($reg[8] == 1) echo "selected"; ?>>Productor</option>
          </select><br>
          <label for="tipoUsuario">Tipo de organización</label>
          <select class="opcion4" name="tipoOrg">
            <option value="1" <?php if($reg[9] == 1) echo "selected"; ?> >Productor independiente</option>
            <option value="2" <?php if($reg[9] == 2) echo "selected"; ?> >Empresas públicas</option>
            <option value="3" <?php if($reg[9] == 3) echo "selected"; ?> >Empresas privadas</option>
            <option value="4" <?php if($reg[9] == 4) echo "selected"; ?> >Cooperativas</option>
            <option value="5" <?php if($reg[9] == 5) echo "selected"; ?> >Organismos bases</option>
            <option value="6" <?php if($reg[9] == 6) echo "selected"; ?> >Instituciones educativas</option>
            <option value="7" <?php if($reg[9] == 7) echo "selected"; ?> >Universidades</option>
            <option value="8" <?php if($reg[9] == 8) echo "selected"; ?> >Otros</option>
          </select>
          <br />
                <?php
                if ($_SESSION['privilegios'] == 1) :
                  $j = 0;
                  if (!empty($reg2)) {
                    while($reg3 = $reg2->fetch_array()) :
                      $j++;
                      echo "<h3>Finca $j</h3><hr>";
                  		include 'lib_finca.php';
                  		echo "<input type='hidden' name='cod_finca[]' value='$reg3[0]'>";
                  	endwhile;
                  }
                	else{
                    echo "<h3>Datos de la finca</h3><hr>";
                    include 'lib_finca.php';
                  }
                endif;

                //<label for="persona" title="Seleccione si es una persona juridica">Persona juridica</label>
				//<input type="checkbox" name="Nat_jur[]" value="1" title="Seleccione si es una persona juridica"/>


                ?>
                <div class="grupobotones">
					<button type="reset" class="boton" name="reset" title="Click aquí para quitar todos los datos que fueron llenados en el formulario"><i class="fa fa-eraser" ></i> Limpiar formulario</button>
					<?php if(isset($Modificar)): ?><button type="submit" formaction="resultados" name="Actualizar" value="<?php echo $reg[0]?>" class="boton" ><i class="fa fa-check"></i> Guardar cambios</button>
          <?php else : ?><button type="submit" name="Registrar" value="Registrar" class="boton" ><i class="fa fa-check"></i> Registrar</button><?php endif; ?>
				</div>
			</form>
		<?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
