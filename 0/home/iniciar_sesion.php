<?php
    session_start();

	if(isset($_SESSION['id'])) :
		$logeado = 'On';
	else :
		$logeado = 'Off';
	endif;
    $indexes = "No";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
            	<?php include_once '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Ingrese los datos corretamente</h1>
                </hgroup>
            </div>
			<section class="cuadro" align="center">
				<h3>Iniciar sesión</h3>
				<form class="contact_form" method="post" action="../../includes/proceso_login.php">
					<div align="center">
						<input required type="email" name="correo" placeholder="Correo electrónico" >
						<br>
						<input required type="password" name="password" placeholder="Contraseña" >
					</div>
					<a href="">¿Olvidó su contraseña?</a><br>
					<button type="submit" name="Entrar" value="<?php echo seleccion?>" class="boton" >Entrar al sistema</button>
				</form>
			</section>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>