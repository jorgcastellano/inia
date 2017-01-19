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

                $mensaje1="";
                $mensaje2="";
                if (isset($eliminar)) : //Eliminar un usuario

                    if (isset($dos)) :
                        $especialista = new especialista();
                        $especialista->eliminar($mysqli, $eliminar);
                    else :
                        echo "<div class='notify'><i class='fa fa-check-square'></i>El usuario ha sido eliminado de forma exitosa<br /></div> ";
                        $objinicio -> eliminar_miembros($mysqli, $eliminar);
                    endif;
                elseif (isset($guardar)) : //
                    for ($i=0; $i < count($codigos); $i++) :
                        if (!empty($privilegios[$i])) :
                            $objinicio -> modificar_privilegios($mysqli, $privilegios[$i], $codigos[$i]);
                            $mensaje1="<div class='notify'><i class='fa fa-check-circle-o'></i> Los privilegios fueron cambiados</div>";
                        else :
                         $mensaje2="Debe seleccionar un privilegio para el usuario elegido";
                        endif;
                    endfor;
                elseif(isset($reinicio)) :
                    $pass = hash("sha512", "123456");
                    $objinicio -> reinicio($mysqli, $reinicio, $pass);
                    $mensaje2="Se reinicio la contraseña del usuario seleccionado con la clave \"123456\"";
                    $user = $objinicio -> consultar_mi_usuario_ci($mysqli, $reinicio);
                    $user = $user -> fetch_array();
                    $objinicio -> eliminar_intentos($mysqli, $user[4]);
                endif;
                $reg = $objinicio->consultar_miembro($mysqli);

                echo "<form action='gestion_usuario' method='POST' onsubmit=''>
                <table class='usuario'>
                    <tr>
                        <td><i class='fa fa-chevron-circle-right'></i> Cédula </td>
                        <td>Usuario</td>
                        <td>Reinicio</td>
                        <td>Aceptación</td>
                        <td>Privilegios</td>
                        <td><i class='fa fa-trash-o'></i></td>

                    </tr>";
                        $mensaje="";
                        $mensaje0="";
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
                             $mensaje="<div class='notify'><i class='fa fa-check-circle-o'></i> Se activo Usuario</div>";
                        elseif (isset($off)) :
                            $objinicio->modificar_miembros_estatus($mysqli, "Off", $off);
                            $resultado[9] = "Off";
                            $mensaje0="<div class='notify_f'><i class='fa fa-times'></i>Usuario desactivado </div>";
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
                            <td><button class='sinboton' type='submit' name='reinicio' value='$resultado[1]' id='' ><i class='fa fa-repeat'></i></button></td>
                            <td>
                                <input type='checkbox' name='cod[]' value='$resultado[0]' title='click para seleccionar los usuarios que desea aceptar' $checked/>
                            </td>
                            <td><select name='privilegios[]'>
                            <option value=''        >-seleccione-</option>
                            <option value='1' $uno  >Gerente</option>
                            <option value='2' $dos  >Especialista</option>
                            <option value='3' $tres >Factura</option>
                        </select></td>
                        <td><button class='sinboton' type='submit' name='eliminar' value='$resultado[1]' id='accion_buttom' ><i class='fa fa-trash-o'></i></button></td>
                    </tr>";
                    unset($uno, $dos, $tres);
                endwhile;

                if (!empty($mensaje0)AND !empty($mensaje1))
                    echo "Se desastivo un usuario y se cambiaron los privilegios";
                else{
                 if (!empty($mensaje))
                    echo "$mensaje ";
                if (!empty($mensaje0))
                    echo "$mensaje0 ";
                if (!empty($mensaje1))
                    echo "$mensaje1";
                 if (!empty($mensaje2))
                 echo "$mensaje2";
                }
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
