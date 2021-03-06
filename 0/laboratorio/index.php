<?php
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
 
	        <form action="index" method="post">
	    	<?php
				extract($_POST);
                require_once '../../system/class.php';


                $lab = new laboratorio();  
                if (isset($seleccion) AND isset($modificar)) :
                    $reg1 = $lab->consultar_laboratorio($mysqli,$seleccion);
                    $reg = $lab->consultar_completa($mysqli);
                elseif (isset($Registrar)) :
                    $lab->registrar_laboratorio($mysqli,$Nom_lab);
                    $reg = $lab->consultar_completa($mysqli);
                //if($mysqli->affected_rows>0){echo "<span class='notify'>El nuevo laboratorio se ha registrado con exito <i class='fa fa-check-square'</i></span>";} else { echo "<span class='notify_f'>No se ha podido registrar el nuevo laboratorio</span> <i class='fa fa-times'></i>";}
                elseif (isset($Actualizar)) :
                     $cap = $lab->modificar_laboratorio($mysqli, $Actualizar, $Nom_lab);
                 if($mysqli->affected_rows>0){ echo "<span class='notify'><i class='fa fa-check-square'></i>El laboratorio se ha modificado con exito</span> ";} 
                 else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se ha podido modificar el loboratorio</span> ";}
                        //include_once '../../0/notificaciones/libreria_noti.php';
                     $reg = $lab->consultar_completa($mysqli);
                else :
                    $reg = $lab->consultar_completa($mysqli);
                endif;
	            echo "  <table class='tstatus'>
	                    <tr>
	                        <td>Nombre</td>
	                        <td><i class='fa fa-check-circle'></i></td>
	                     </tr> ";
                while ($resultado = $reg->fetch_array()) {
                    echo "<tr>
                        <td>".$resultado[1]." </td>";
                    echo "<td><input type='radio' name='seleccion' value='$resultado[0]' title='click aquí para seleccionar y modificar un laboratorio'></td>
                    </tr>";
                }
                echo "</table>";
            ?>
            <br>
            <div align="center">
                <label for="Nom_lab">Nombre del laboratorio</label>
                <input  type="text" name="Nom_lab" id="Nom_lab" value="<?php if(isset($reg1)) echo $reg1[1]?>" title="Introduzca el nombre del laboratorio para buscar o modificar" />
                <?php if(isset($modificar)): ?><button type="submit" name="Actualizar" value="<?php if(isset($reg1)) echo $reg1[0]?>" class="boton" ><i class="fa fa-check"></i> Guardar cambios</button>
                <?php else : ?><button type="submit" name="Registrar" value="Registrar" class="boton" ><i class="fa fa-check"></i> Registrar laboratorio</button><?php endif; ?>
            </div>
            <div class="grupobotones">
                <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                <button type="submit" class="boton" name="modificar" value="modificar"><i class="fa fa-pencil"></i> Modificar laboratorio</button>
                <button type='button' OnClick=location='../home/inicio' class="boton"><i class="fa fa-home" ></i> Página principal</button>
            </div>
        </form>
           <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>