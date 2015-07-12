<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Laboratorio</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup> 
					<h1>Registrar Laboratorio</h1>
				</hgroup>
			</div>
                <?php
                
                extract($_POST);
                require_once './system/class.php';
                $lab = new laboratorio();
                $lab->registrar_laboratorio($conex,$Nom_lab);
                $reg = $lab->consultar_laboratorio($conex,$Nom_lab);               

                ?>

            <form class="contact_form" method="post" action="modificar1.php"  id="">
                <table border=0 align="center">
                                <tr>
                                    <th>Código del laboratorio: </th>
                                    <td><?php echo $reg[0]; ?></td>
                                </tr>
                                <tr>
                                    <th>Nombre del laboratorio: </th>
                                    <td><?php echo $reg[1]; ?></td>
                                </tr>

                </table>
                    <input type="hidden" name="Nom_lab" value="<?php echo $reg[1]?>" />
                    <button type="submit" name="submit" class="boton" >Modificar</button>
                    <button type='button' OnClick=location='formulario1.php' class="boton">Nuevo laboratorio</button>
                    <button type='button' OnClick=location='' class="boton">Pagina Principal</button>
          
            </form>

                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>