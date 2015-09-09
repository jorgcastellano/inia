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
 
        <form action="index" method="POST">
    		<?php
        		extract($_POST);
                require_once '../../system/class.php';
                $lab = new laboratorio();
                if ($Registrar) :
                    $lab->registrar_laboratorio($mysqli,$Nom_lab);
                else :
                    $reg = $lab->modificar_laboratorio($mysqli,$Cod_lab,$Nom_lab);
                    $reg = $lab->consultar_completa($mysqli, $Nom_lab);
                endif;
                $lab = new laboratorio();
                $reg = $lab->consultar_completa($mysqli, $Nom_lab);
                echo "  <table class='tstatus'>
                        <tr>
                            <th>Nombre</th>
                            <th><i class='fa fa-check-circle'></i></th>
                         </tr> ";
                while ($resultado = $reg->fetch_array()) {
                    echo "<tr>
                            <td>".$resultado[1]."</td>";
                    echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td></tr>";
                }
                echo "</table>";
            ?>
            <br>
            <label for="Nom_lab">Nombre del laboratorio</label>
            <input required type="text" name="Nom_lab" id="Nom_lab" value="<?php if (isset($Modificar)) echo $seleccion; ?>" />
            <?php if(isset($Modificar)): ?><button type="submit" name="Actualizar" value="Actualizar" class="boton" formaction="update" ><i class="fa fa-check"></i> Guardar cambios</button>
            <?php else : ?><button type="submit" name="Registrar" value="Registrar" class="boton" ><i class="fa fa-check"></i> Registrar laboratorio</button><?php endif; ?>
            <div>
                <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                <button type="submit" name="Modificar" value="<?php echo seleccion?>" class="boton" >Modificar Laboratorio</button>
            </div>
        </form>
           <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>