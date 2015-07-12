<!DOCTYPE html>
<html>
    <head>
        <title>Modificar analisis</title>
        <?php include '../../layouts/head.php'; ?>
    </head>
    <body>
        <?php include '../../layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/logo.php'; ?>
				<hgroup>
					<h1>Modificar analisis</h1>
				</hgroup>
			</div>
                <?php
                extract($_POST);
                require_once '../../system/class.php';
                for ($i=0;$i<count($Tipo);$i++){ $Tipo=$Tipo[$i]; }
                $ana = new analisis();
                $ana->modificar_analisis($conex,$Cod_ana,$Nom_ana,$Precio_ana,$Tipo);

                ?>
                    </br></br>
                    <button type='button' OnClick=location='formulario1.php' class="boton">Nuevo laboratorio</button>
                    <button type='button' OnClick=location='' class="boton">Pagina Principal</button>
                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>