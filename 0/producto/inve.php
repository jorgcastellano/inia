<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Modificar Laboratorio</h1>
			</hgroup>
		</div>
              <?php
                extract($_POST);
                require_once '../../system/class.php';
                $producto = new producto();
                $reg = $producto->consultar_produc($mysqli); 
                ?>
		     <table border=0 align="center">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Exsistencia</th>
                                    <th>Precio</th>
                                </tr>
                        <?php    ?>
                            

                </table>
	
        <br /><br />
        <button type='button' OnClick=location='index' class="boton">Nuevo laboratorio</button>
        <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>

        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
