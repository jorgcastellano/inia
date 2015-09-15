<?php
include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Error404</title>
		 <?php include_once '../../layouts/head.php' ?>
	</head>
	<body>
	 	<section class="bloque">
            <div> <?php include_once '../../layouts/cabecera-body.php' ?>
            </div>
            <h1>ERROR</h1>
           <h1>¡Pagina no encontrada!</h1>
            <button type='button' OnClick=location='../../0/home/inicio' class="boton"><i class="fa fa-home"></i> Página principal</button>
 			<?php include 'layouts/layout_p.php' ?>
            <?php include_once '../../layouts/layout_p.php' ?>

        </section>
	</body>
</html>