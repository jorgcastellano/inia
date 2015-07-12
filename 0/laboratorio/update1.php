<!DOCTYPE html>
<html>
    <head>
        <title>Modificar Laboratorio</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Modificar Laboratorio</h1>
				</hgroup>
			</div>
                <?php
                extract($_POST);
                require_once './system/class.php';
                $lab = new laboratorio();
                $lab->modificar_laboratorio($conex,$Cod_lab,$Nom_lab);
                ?>

                    <button type='button' OnClick=location='formulario1.php' class="boton">Nuevo laboratorio</button>
                    <button type='button' OnClick=location='' class="boton">Pagina Principal</button>

                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>