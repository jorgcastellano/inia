<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cliente</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Cliente</h1>
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
            $fin = new finca();
            $reg2=$fin->consultar_finca($mysqli,$Ced_cliente);

        endif;
				?>

			<form class="contact_form" method="post" action="resultados">
				
				<label for="Ced_cliente">Cedula</label>
                <input required type="num" name="Ced_cliente" id="Ced_cliente" value="<?php echo $reg[1].$var1; ?>" title="Introduzca la cedula " maxlength="8" placeholder="" pattern="\d{6,}" />
                <span class="form_hint">Debe contener solo caracteres númericos"</span><br />
				<label for="Nom_cliente">Nombres</label>
					<input required type="text" name="Nom_cliente" id="Nom_cliente" value="<?php echo $reg[2]?>" title="Introdusca los nombres " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener siempre la primera letra en "Mayúscula"</span><br />
				<label for="Apelli_cliente">Apellidos</label>
					<input required type="text" name="Apelli_cliente" id="Apelli_cliente" value="<?php echo $reg[3]?>" title="Introdusca los apellidos  " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener siempre la primera letra en "Mayúscula"</span><br />
				<label for="Contacto">Contacto</label>
					<input type="text" name="Contacto" id="Contacto" value="<?php echo $reg[4]?>" title="Introduzca los nombres de la persona de contacto" maxlength="50" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener siempre la primera letra en "Mayúscula"</span><br />
				<label for="Telf_cliente">Telefono</label>
					<input required type="text" name="Telf_cliente" id="Telf_cliente" value="<?php echo $reg[5]?>" title="Introduzca un numero de telefono" maxlength="12" placeholder="0000-0000000" pattern="\d{4}-\d{7}" />
                    <span class="form_hint">Debe ingresar su telefono de la siguiente manera 0000- 0000000"</span><br />
				<label for="Dire_cliente">Direccion</label>
					<textarea required name="Dire_cliente" id="Dire_cliente"  title="" cols="30" rows="5" maxlength="100" placeholder="Por Favor Especifique aqui la direccion del cliente"><?php echo $reg[6]?></textarea>
					</br>
                 
                <?php include_once 'lib_finca.php' ?>
                
					
					<button type="reset" class="boton" name="reset"><i class="fa fa-eraser"></i> Limpiar formulario</button>
					<?php if(isset($Modificar)): ?><button type="submit" formaction="resultados" name="Actualizar" value="<?php echo $reg[0]?>" class="boton" ><i class="fa fa-check"></i> Guardar cambios</button>
                    <?php else : ?><button type="submit" name="Registrar" value="Registrar" class="boton" ><i class="fa fa-check"></i> Registrar</button><?php endif; ?>
			</form>
		<?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>