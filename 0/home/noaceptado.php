<!DOCTYPE html>
<html>
	<head>
		<title>Usuario no aceptado</title>
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
			<p>Aún no ha sido aprobado</p>
			<p>Contacte al gerente para que sea aprobado su registro y asi disfrutar de nuestros servicios</p>
            <button type='button' OnClick=location='../../0/home/cerrar_sesion' class="boton"><i class="fa fa-home"></i> Página principal</button>
 			<?php include 'layouts/layout_p.php' ?>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
	</body>
</html>