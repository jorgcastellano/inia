<!DOCTYPE html>
<html>
    <head>
        <title>Modificar Cliente</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Modificar Cliente</h1>
				</hgroup>
			</div>
                <?php
                extract($_POST);
                require_once './system/class.php';
                $ana = new cliente();
                $ana->modificar_cliente($conex,$Id_cliente,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente);

                ?>
                    </br></br>
                    <button type='button' OnClick=location='formulario6.php' class="boton">registrar finca</button>
                    <button type='button' OnClick=location='' class="boton">Pagina Principal</button>
                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>