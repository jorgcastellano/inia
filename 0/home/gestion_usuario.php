<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
    	<?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Gestión de usuarios</h1>
                </hgroup>
            </div>
            <?php
                require_once '../../includes/conexion.php';
                require_once '../../system/classusuario.php';

                extract($_POST);
                $objinicio = new inicio_seguro();

                if (isset($eliminar)) :
                    echo $eliminar;
                    if (isset($dos)) :
                        $especialista = new especialista();
                        $especialista->eliminar($mysqli2, $eliminar);
                    else :
                        $objinicio -> eliminar_miembros($mysqli, $eliminar);                        
                    endif;
                elseif (isset($guardar)) :
                    for ($i=0; $i < count($codigos); $i++) :
                        if (!empty($privilegios[$i])) :
                            $objinicio -> modificar_privilegios($mysqli, $privilegios[$i], $codigos[$i]);
                        else :
                            echo "<br>Debe seleccionar un privilegio";
                        endif;
                    endfor;
                endif;
                $reg = $objinicio->consultar_miembro($mysqli);

                echo "<form action='gestion_usuario' method='POST'>
                <table class='usuario'>
                    <tr>
                        <td><i class='fa fa-chevron-circle-right'></i> Cédula</td>
                        <td>Usuario</td>
                        <td>Email</td>
                        <td>Aceptación</td>
                        <td>Privilegios</td>
                        <td><i class='fa fa-trash-o'></i></td>
                    </tr>";

                while ($resultado = $reg->fetch_array()) :

                    //Verificacion de los seleccionados para ser almacenados
                    if (isset($guardar)) :
                        for ($x=0; $x < $temp = count($cod); $x++)
                            if ($resultado[0] == $cod[$x]) :
                                if ($resultado[9] == "On")
                                    $x=$temp;
                                else
                                    $on = $resultado[0];
                                    $x=$temp;
                            elseif ($x == ($temp-1)) :
                                if ($resultado[9] == "On")
                                    $off = $resultado[0];
                            endif;

                        if (isset($on)) :
                            $objinicio->modificar_miembros_estatus($mysqli, "On", $on);
                            $resultado[9] = "On";
                        elseif (isset($off)) :
                            $objinicio->modificar_miembros_estatus($mysqli, "Off", $off);
                            $resultado[9] = "Off";
                        endif;
                        unset($off, $on);
                    endif;
                    if (isset($guardar) AND !isset($cod)) {
                        $objinicio->modificar_miembros_estatus_all($mysqli, "Off");
                        $resultado[9] = "Off";
                    }
                    if ($resultado[9] == "On") :
                        $checked = "checked";
                    elseif ($resultado[9] == "Off") :
                        $checked = "";
                    endif;

                    if ($resultado[10] == 1) :
                        $uno = "selected";
                    elseif ($resultado[10] == 2) :
                        $dos = "selected";
                    elseif ($resultado[10] == 3) :
                        $tres = "selected";
                    endif;
                    echo "<tr>
                            <td>$resultado[1]
                            <input type='hidden' name='codigos[]' value='$resultado[0]' /></td>
                            <td>$resultado[2] $resultado[3]</td>
                            <td>$resultado[4]</td>
                            <td>
                                <input type='checkbox' name='cod[]' value='$resultado[0]' title='click para seleccionar los usuarios que desea aceptar' $checked/>
                            </td>
                            <td><select name='privilegios[]'>
                            <option value=''        >-seleccione-</option>
                            <option value='1' $uno  >Gerente</option>
                            <option value='2' $dos  >Especialista</option>
                            <option value='3' $tres >Factura</option>
                        </select></td>
                        <td><button class='sinboton' type='submit' name='eliminar' value='$resultado[1]' ><i class='fa fa-trash-o'></button></i></td>
                    </tr>";
                    unset($uno, $dos, $tres);
                endwhile;
                echo "</table>";
            ?>
            <div class="grupobotones">
                <button type="button" name="regresar" onclick=location="inicio" class="boton"><i class="fa fa-home"></i> Regresar a inicio</button>
                <button type="submit" name="guardar" value="guardar" class="boton"><i class="fa fa-check"></i> Guardar cambios</button>
            </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>