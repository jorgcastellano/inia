<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio</title>

        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Laboratorios</h1>
			</hgroup>
		</div>

		<?php
    		extract($_POST);
            require_once '../../system/class.php';
            $lab = new laboratorio();
            $reg = $lab->consultar_completa($mysqli, $Nom_lab);
            echo "  <table class='anapro'>
                    <tr>
                          <td>Nombre</td>
                         <td><i class='fa fa-check-circle'></i></td>
                     </tr> ";
            while ($resultado = $reg->fetch_array()) {
                echo "<tr>
                        <td>".$resultado[1]."</td>";
                echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td></tr>";
            }
            echo "</table>";?>  
          </br></br>
                <form  class="contact_form" action="insert" method="POST">
                <label for="Nom_lab">Nombre del laboratorio</label>
                <input type="text" name="Nom_lab" value="<?php echo $resultado[1]; ?>" />
                </br></br>
                
                <button type="submit" name="Modificar" value="<?php echo seleccion?>" class="boton" >Modificar Laboratorio</button>
                <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                <?php if(isset($Actualizar)): ?><button type="submit" name="Actualizar" value="Actualizar" class="boton" formaction="update" ><i class="fa fa-check"></i> Guardar cambios</button>
                <?php else : ?><button type="submit" name="Registrar" value="Registrar" class="boton" ><i class="fa fa-check"></i> Registrar Laboratorio</button><?php endif; ?>

            </form>
           <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>