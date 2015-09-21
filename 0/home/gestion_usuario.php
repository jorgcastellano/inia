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
                require_once '../../system/classusuario.php';

                extract($_POST);
                $objinicio = new inicio_seguro();

                if (isset($eliminar)) :
                    $objinicio -> eliminar_miembros($mysqli, $eliminar);
                elseif (isset($guardar)) :
                    for ($i=0; $i < count($codigos); $i++) :
                        if (!empty($privilegios[$i])) :
                            $objinicio -> modificar_privilegios($mysqli, $privilegios[$i], $codigos[$i]);
                        else :
                            echo "<br>Debe seleccionar un privilegio";
                        endif;
                    endfor;
                endif;
                $reg = $objinicio->consultar_miembro_on($mysqli);

                echo "<form action='gestion_usuario' method='POST'>
                <table class='usuario'>
                    <tr>
                        <td><i class='fa fa-chevron-circle-right'></i> Cédula</td>
                        <td>Usuario</td>
                        <td>Email</td>
                        <td>Privilegios</td>
                        <td><i class='fa fa-trash-o'></i></td>
                    </tr>";

                while ($resultado = $reg->fetch_array()) :
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
                        <td><select name='privilegios[]'>
                            <option value=''        >-seleccione-</option>
                            <option value='1' $uno  >Gerente</option>
                            <option value='2' $dos  >Especialista</option>
                            <option value='3' $tres >Factura</option>
                        </select></td>
                        <td><button class='sinboton' type='submit' name='eliminar' value='$resultado[0]' ><i class='fa fa-trash-o'></button></i></td>
                    </tr>";
                    unset($uno, $dos, $tres);
                endwhile;
                echo "</table>";
            ?>
            <div align="center">
                <button type="button" name="regresar" onclick=location="inicio" class="boton"><i class="fa fa-home"></i> Regresar a inicio</button>
                <button type="submit" name="guardar" class="boton"><i class="fa fa-check"></i> Guardar cambios</button>
            </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>