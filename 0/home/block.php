<!DOCTYPE html>
<html>
	<head>
		<title>Usuario bloqueado</title>
		<?php include_once '../../layouts/head.php' ?>
	</head>
	<body>
	 	<section class="bloque">
            <div>
            	<?php include_once '../../layouts/cabecera-body.php' ?>
	            <hgroup>
	                <h1>¡Hay un error! disculpe</h1>
	            </hgroup>
            </div>
			<p>Al parecer su usuario está bloqueado por intentos máximos fallidos para el ingreso del sistema</p>
			<p>Por favor, contacte al gerente para que te elimine el bloqueo y puedas disfrutar de los servicios que ofrecemos</p>
            <div align="center">
            	<button type='button' onclick=location='../../0/home/cerrar_sesion' class="boton"><i class="fa fa-home"></i> Página principal</button>
 			</div>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
	</body>
</html>../