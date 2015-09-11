<?php
    session_start();
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
                if (isset($guardar) AND isset($cod)) :
                    for ($i=0; $i < count($cod); $i++)
                        $objinicio -> eliminar_miembros($mysqli, $cod[$i]);
                endif;
                $reg = $objinicio->consultar_miembro_on($mysqli);

                echo "<form action='gestion_usuario' method='POST'>
                <table class='usuario'>
                    <tr>
                        <td><i class='fa fa-chevron-circle-right'></i> Cédula</td>
                        <td>Usuario</td>
                        <td>Email</td>
                        <td>Privilegios</td>
                        <td><i class='fa fa-check-square'></i></td>
                    </tr>";

                while ($resultado = $reg->fetch_array()) :
                    echo "<tr>
                        <td>$resultado[1]</td>
                        <td>$resultado[2]</td>
                        <td>$resultado[3]</td>
                        <td><select name='privilegios'>
                            <option value=''>-seleccione-</option>
                            <option value='1'>Gerente</option>
                            <option value='2'>Especialista</option>
                            <option value='3'>Factura</option>
                        </select></td>
                        <td><input type='checkbox' name='cod[]' value='$resultado[0]' /></td>
                    </tr>";
                endwhile;
                echo "</table>";
            ?>
            <div>
                <button type="button" name="regresar" onclick=location="inicio" class="boton"><i class="fa fa-home"></i> Regresar a inicio</button>
                <button type="submit" name="guardar" value="guardar" class="boton"><i class="fa fa-floppy-o"></i> Guardar cambios</button>
            </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>