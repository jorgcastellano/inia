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
    <?php
        extract($_POST);
        if (isset($registro)) :

          $sql=("SELECT correo FROM user WHERE correo='$correo'");
          $consulta=(mysqli_query($mysqli,$sql));
            if(mysqli_num_rows($consulta) == false):
      ?>
            <script type="text/javascript">
              alert("El correo no esta registrado en nuestra base de datos!");
              window.location="recuperar_contrasena.php";
            </script>
      <?php
          endif;
          $sql=("SELECT pregunta FROM user WHERE correo='$correo'");
          $consulta=mysqli_query($mysqli,$sql);
          $pregunta=mysqli_fetch_array($consulta);

          if ($pregunta[0] == 1 )
            $mensaje="Nombre de su madre";
          else if($pregunta[0] == 2)
            $mensaje="Su mejor amigo de la infancia";
          else if($pregunta[0] == 3)
            $mensaje="Su personaje favorito";
          else if($pregunta[0] == 4)
            $mensaje="Su profesor de primaria";
          else if($pregunta[0] == 5)
            $mensaje="Año de promocion de los bomberos";
          else if($pregunta[0] == 6)
            $mensaje="Nombre de su padre";
          else if($pregunta[0] == 7)
            $mensaje="Su equipo de futbol favorito";
          else if($pregunta[0] == 8)
            $mensaje="Su color favorito";
          else
            $mensaje="Lugar de nacimiento";

          if (isset($respuesta)) :
          $respuesta=md5($respuesta);
          $sql=("SELECT respuesta FROM user WHERE correo='$correo'");
          $consulta=mysqli_query($mysqli,$sql);
          $respuesta1=mysqli_fetch_array($consulta);
            if($respuesta1[0] != $respuesta):
      ?>
            <script type="text/javascript">
              alert("La respuesta ingresada en incorrecta!");
              window.location="recuperar_contrasena.php";
            </script>
      <?php
          	else :
      				$cambiar_contrasena = true;
      			endif; //fin de comparacion de respuesta
      		endif; //fin si existe respuesta
      		if (isset($cambio_contrasena)) :
      			if ($repita_contrasena == $cambio_contrasena) :
      				$cambio_contrasena=md5($cambio_contrasena);
      				$sql="UPDATE user SET clave='$cambio_contrasena' WHERE correo='$correo'";
      				$consulta=(mysqli_query($mysqli,$sql));
      		?>
      		      <script type="text/javascript">
      		        alert("Se ha recuperado la contraseña satisfactoriamente!");
      		        window.location="home.php";
      		      </script>
      		<?php
      			else :
      				?>
      							<script type="text/javascript">
      								alert("Las contraseñas ingresadas no coinciden!");
      								window.location="recuperar_contrasena.php";
      							</script>
      				<?php
      			endif; // fin de comparacion de contraseñas
      		endif;
        endif;
      ?>

      <section class="container">
        <div class="rows">
          <div class="col-md-5 col-md-offset-3">
            <form  method="POST" action="recuperar_contrasena.php">
           <input class="form-control" type="text" name="correo" value="<?php if (isset($correo)) echo $correo; ?>" required size="30" placeholder="Ingrese su correo"/>
           <?php
      			if($cambiar_contrasena  == true) :
      		?>
      		<input class="form-control" type="password" name="cambio_contrasena" required size="30" placeholder="Ingrese su nueva contraseña"/>
      		<input class="form-control" type="password" name="repita_contrasena" required size="30" placeholder="Repita su nueva contraseña"/>
      		<?php
      			elseif (isset($correo)) :?>
      				<label><?php echo $mensaje; ?></label>
      				<input class="form-control" type="password" name="respuesta" required size="30" placeholder="Ingrese su respuesta"/>
             <?php
      			endif;
      		?>
           <div class="text-center">
             <button class="btn btn-sistema" type="reset" title="volver" onclick=location="home.php"> <span class="glyphicon glyphicon-hand-left"></span> Volver al inicio</button>
             <button class="btn btn-sistema" type="reset" title="Haga clic para limpiar formulario"> <span class="glyphicon glyphicon-repeat"> </span> Limpiar Formulario</button>
             <button type="submit" name="registro" value="registro" title="Haga clic para Registrarse" class="btn btn-sistema"><span class="glyphicon glyphicon-hand-up"></span> Recuperar</button>
           </div><br>
         </form>

			</section>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
