<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar Cliente</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Modificar Cliente</h1>
			</hgroup>
		</div>
				<?php
                $Ced_cliente=$_GET['var'];
                require_once '../../system/class.php';
				$client = new cliente();
				$reg = $client->consultar_cliente($conex,$Ced_cliente);
				

				?>

			<form class="contact_form" method="post" action="update5.php"  id="">
				
				<label for="Ced_cliente">Cedula</label>
					<input required type="num" name="Ced_cliente" id="Ced_cliente" value="<?php echo $reg[1]?>" title="Introduzca la cedula " maxlength="8" placeholder="" pattern="\d{6,}" />
					</br>
				<label for="Nom_cliente">Nombres</label>
					<input required type="text" name="Nom_cliente" id="Nom_cliente" value="<?php echo $reg[2]?>" title="Introdusca los nombres " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
					</br>
				<label for="Apelli_cliente">Apellidos</label>
					<input required type="text" name="Apelli_cliente" id="Apelli_cliente" value="<?php echo $reg[3]?>" title="Introdusca los apellidos  " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
					</br>	
				<label for="Contacto">Contacto</label>
					<input required type="text" name="Contacto" id="Contacto" value="<?php echo $reg[4]?>" title="Introduzca los nombres de la persona de contacto" maxlength="50" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
					</br>
				<label for="Telf_cliente">Telefono</label>
					<input required type="text" name="Telf_cliente" id="Telf_cliente" value="<?php echo $reg[5]?>" title="Introduzca un numero de telefono" maxlength="12" placeholder="0000-0000000" pattern="\d{4}-\d{7}" />
					</br>
				<label for="Dire_cliente">Direccion</label>
					<textarea required name="Dire_cliente" id="Dire_cliente"  title="" cols="30" rows="5" maxlength="50" placeholder="Por Favor Especifique aqui la direccion del cliente"><?php echo $reg[6]?></textarea>
					</br></br>

					<input type="hidden" name="Id_cliente" value="<?php echo $reg[0]?>" />
					<button type="reset" class="boton" name="reset">Limpiar formulario</button>
					<button type="submit" name="submit" class="boton" >Listo</button>
			</form>
		<?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>