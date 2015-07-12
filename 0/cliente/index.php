<?php
    session_start();
    include_once 'system/check.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registro para nuevos clientes</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Registrar Cliente</h1>
			</hgroup>
		</div>

			<form class="contact_form" method="post" action="insert.php"  id="">
				
				<label for="Ced_cliente">Cedula</label>
					<input required type="num" name="Ced_cliente" id="Ced_cliente" title="Introduzca la cedula " maxlength="8" placeholder="" pattern="\d{6,}" />
					</br>
				<label for="Nom_cliente">Nombres</label>
					<input required type="text" name="Nom_cliente" id="Nom_cliente" title="Introdusca los nombres " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
					</br>
				<label for="Apelli_cliente">Apellidos</label>
					<input required type="text" name="Apelli_cliente" id="Apelli_cliente" title="Introdusca los apellidos  " maxlength="30" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
					</br>	
				<label for="Contacto">Contacto</label>
					<input required type="text" name="Contacto" value="" id="Contacto" title="Introduzca los nombres de la persona de contacto" maxlength="50" placeholder="" pattern="([A-Z]{1}[a-z,á,é,í,ó,ú]{1,}\s{0,1})+" />
					</br>
				<label for="Telf_cliente">Telefono</label>
					<input required type="text" name="Telf_cliente" value="" id="Telf_cliente" title="Introduzca un numero de telefono" maxlength="12" placeholder="0000-0000000" pattern="\d{4}-\d{7}" />
					</br>
				<label for="Dire_cliente">Direccion</label>
					<textarea required name="Dire_cliente" id="Dire_cliente" title="" cols="30" rows="5" maxlength="50" placeholder="Por Favor Especifique aqui la direccion del cliente"></textarea>
					</br></br>

					<input type="hidden" name="tipo" value="2" />
					<button type="reset" class="boton" name="reset">Limpiar formulario</button>
					<button type="submit" name="submit" class="boton" >Registrar cliente</button>
			</form>
		<?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>