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
            $lab = new laboratorio();
            $lab->modificar_laboratorio($mysqli,$cod,$Nom_lab);
        ?>

        <br /><br />
        <button type='button' OnClick=location='index' class="boton">Nuevo laboratorio</button>
        <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>

        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
