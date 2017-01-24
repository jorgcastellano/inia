<?php
  include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Restaurar base de datos</title>
		 <?php include_once '../../layouts/head.php' ?>
	</head>
	<body>
    <?php include '../../system/menu.php' ?>
	 	<section class="bloque">
			<header>
					<section>
					<img src="../../imgs/logo_new.jpg" />
					</section>
			</header>

      <?php
      include ("../../includes/conexion.php");
      if (!isset ($_FILES["ficheroDeCopia"])) {
        $contenidoDeFormulario="<form action='restaurar' method='post' enctype='multipart/form-data' name='formularioDeRestauracion'";
        $contenidoDeFormulario.="id='formularioDeRestauracion'>\n";
        $contenidoDeFormulario.="<table width='360' border='0' align='center' class='normal' cellspacing='7'>\n";
        $contenidoDeFormulario.="<tr>\n";
        $contenidoDeFormulario.="<td colspan='4' align=center>Indique el origen del archivo de copia: </td>\n";
        $contenidoDeFormulario.="</tr>\n";
        $contenidoDeFormulario.="<td colspan='2' align=center><input type='file' name='ficheroDeCopia' id='ficheroDeCopia'";
        $contenidoDeFormulario.="size='30'></td>\n";
        $contenidoDeFormulario.="<tr>\n";
        $contenidoDeFormulario.="<td colspan='3' align='center'><input name='envio' type='submit' ";
        $contenidoDeFormulario.="id='envio' value='Aceptar'></td>\n";
        $contenidoDeFormulario.="</tr>\n";
        $contenidoDeFormulario.="</tbody>\n";
        $contenidoDeFormulario.="</table>\n";
        $contenidoDeFormulario.="</form>\n";
        echo ($contenidoDeFormulario);
      } else {
         $archivoRecibido = $_FILES["ficheroDeCopia"]["tmp_name"];
         $destino = "../restorebd.sql";

        if (!move_uploaded_file($archivoRecibido, $destino)) {
          $mensaje='El proceso ha fallado';
          echo $mensaje;
        }

        $host = "localhost";
        $user = "root";
        $pass = "jorgejac";
        $db = "admin_rally";

        $mysqli = new mysqli($host, $user, $pass, $db);

        if($mysqli->connect_errno){
          printf(
            "<h2>No se ha podido conectar a la base de datos</h2>
            <b>Numero de error: </b>%d<br />
            <b>Mensaje de error: </b>%s",
            $mysqli->connect_errno,
            $mysqli->connect_error
          );
          exit();
        }

        //Por si es winodws o linux el comando o la ruta de mysqldump cambia
        $sql = "SHOW variables WHERE variable_name='basedir'";
        $consulta = $mysqli->query($sql);
        $resultado = $consulta->fetch_array();
        $DirBase = $resultado[1];
        $primero = substr($DirBase,0,1);
        if ($primero == "/") //Esto es Linux
            $DirBase = "mysql";
        else //Significa que esto es windows
            $DirBase = $DirBase."/bin/mysql";

        $executa = "$DirBase --host=$host --user=$user --password=$pass $db < $destino";
        system($executa, $resultado);

        if ($resultado) {
          echo "<h3>Error ejecutando comando: $executa</h3>\n";
          $mensaje = "ERROR. La copia de seguridad no se ha restaurado.";
          $cabecera = "COPIA DE SEGURIDAD NO RESTAURADA";
          echo $mensaje;
        } else {
          $mensaje2 = "La copia de seguridad se ha restaurado correctamente.";
          $cabecera2 = "COPIA DE SEGURIDAD RESTAURADA";
          echo $mensaje2;
        }
        //Eliminar el archivo subido
        unlink($destino);
      }
      ?>
        <button type='button' onclick=location='../../0/home/inicio' class="boton"><i class="fa fa-home"></i> Página principal</button>
        <?php include_once '../../layouts/layout_p.php' ?>
    </section>
	</body>
</html>
