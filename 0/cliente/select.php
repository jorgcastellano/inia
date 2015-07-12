<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Buscar Cliente</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include_once '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include_once '../../layouts/cabecera-body.php' ?>
				<hgroup> 
					<h1>Buscar Cliente</h1>
				</hgroup>
			</div>
                <?php
                    extract($_POST);
                    include_once '../../system/class.php';
                    $client = new cliente();
                    $client->consultar_cliente($conex,$Ced_cliente);
                    $reg = $client->consultar_cliente($conex,$Ced_cliente);
                if (empty($reg)) : ?>
          
            <form class="contact_form" method="post" action="index">
                    </br></br>
                    <label>Cliente no existe!!</label>
                    </br></br>

                    <button type="submit" name="submit" class="boton" >registrar</button>
            </form>

                <?php else : ?>

                    <form class="contact_form" method="post" action="../../system/switch"  id="">
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
                            <button type="submit" name="Modificar" value="Modificar" class="boton" >Modificar</button>
                            

                            
                    </form>

                <?php  endif;
                include_once '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>