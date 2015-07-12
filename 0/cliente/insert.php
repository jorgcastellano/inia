<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Cliente</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Registrar Cliente</h1>
				</hgroup>
			</div>

				<?php
                extract($_POST);

                require_once './system/class.php';
				$client = new cliente();
				$client->registrar_cliente($conex,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente);
				$reg = $client->consultar_cliente($conex,$Ced_cliente);
				
				?>

            <form class="contact_form" method="post" action="modificar5.php"  id="">
				<table border=0 align="center">
								<tr>
									<th>CI:</th>
									<td><?php echo $reg[1]?></td>
								</tr>
								<tr>
									<th>Nombre:</th>
									<td><?php echo $reg[2]?></td>
								</tr>
								<tr>
									<th>Apellido:</th>
									<td><?php echo $reg[3]?></td>
								</tr>
								<tr>
									<th>Contacto:</th>
									<td><?php echo $reg[4]?></td>
								</tr>
								<tr>
									<th>Telefono:</th>
									<td><?php echo $reg[5]?></td>
								</tr>
								<tr>
									<th>Direccion:</th>
									<td><?php echo $reg[6]?></td>
								</tr>

				</table>
              
                    <input type="hidden" name="Ced_cliente" value="<?php echo $reg[1]?>" />
                    <button type="submit" name="submit" class="boton" >Modificar</button>
                    <button type='button' OnClick=location='' class="boton">Pagina Principal</button>
          
			</form>

                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>