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
                    <h1>Aceptación de usuarios</h1>
                </hgroup>
            </div>
            <?php
                require_once '../../system/classusuario.php';

                extract($_POST);
                $objinicio = new inicio_seguro();
                $reg = $objinicio->consultar_miembro($mysqli);

                echo "<form action='aceptacion_usuario' method='POST'>
                <table class='usuario'>
                    <tr>
                        <td><i class='fa fa-chevron-circle-right'></i> Cédula</td>
                        <td>Usuario</td>
                        <td>Email</td>
                        <td><i class='fa fa-check-square'></i></td>
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
                    echo "<tr>
                        <td>$resultado[1]</td>
                        <td>$resultado[2] $resultado[3]</td>
                        <td>$resultado[4]</td>
                        <td><input type='checkbox' name='cod[]' value='$resultado[0]' title='click para seleccionar los usuarios que desea aceptar' $checked/></td>
                    </tr>";
                endwhile;
                echo "</table>";
            ?>
            <div>
                <button type="button" name="regresar" onclick=location="inicio" class="boton"><i class="fa fa-home"></i> Regresar a inicio</button>
                <button type="submit" name="guardar" value="guardar" class="boton"><i class="fa fa-check"></i> Guardar cambios</button>
            </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>