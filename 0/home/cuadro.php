<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sistema de registro - S.P.I.I. Sede Mérida</title>
        <?php include_once '../../layouts/head.php' ?>
	</head>
		<body>
		<section class="bloque">
		<div>
			<?php include '../../layouts/cabecera-body.php'; ?>
			</div>
			<section class="cuadro">
			<hgroup>
				<center> <h3>Iniciar secion</h3> </center>
			</hgroup>
			
		<form class="logearse" id="cuadro" method="post" name="form_logeo">
			<div><center>
		
			 <input required type="text" name="email" id="email" placeholder="email" >
			 </br> </br>
			
			 <input required type="text" name="pasword" id="pasword" placeholder="pasword" >
			</div>
			<a href="">¿Olvido su Contraseña?</a>
			<button type="submit" name="Entrar" value="<?php echo seleccion?>" class="boton" >Entrar</button>
			
			</center>
			</section>
		</form>
			<?php include '../../layouts/layout_p.php' ?>
			</section>
	</body>
	
</html>