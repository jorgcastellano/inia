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
				<h1>Registrar Laboratorio</h1>
			</hgroup>
		</div>
		
		<?php  
            extract($_POST);
            require_once '../../system/class.php';
            $lab = new laboratorio();
            $lab->registrar_laboratorio($mysqli,$Nom_lab);
            $reg = $lab->consultar_completa($mysqli, $Nom_lab);
        ?>

        <form class="contact_form" method="post" action="index" id="">
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
                <button type="submit" name="Modificar" value="<?php echo $reg[1]?>" class="boton" >Modificar</button>
                <button type='button' OnClick=location='index' class="boton">Nuevo laboratorio</button>
                <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>
        </form>

        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>