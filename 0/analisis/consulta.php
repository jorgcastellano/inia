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
                    <h1>Listado de análisis</h1>
                </hgroup>
            </div>

            <table class="anapro">
                <tr>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Tipo</td>
                    <td>Estatus</td>
                    <td>Selección</td>
                </tr>
                <?php
                    include_once '../../system/class.php';
                    $objanalisis = new analisis();
                    $result = $objanalisis->consulta_completo($mysqli);
                    while ($resultado = $result->fetch_array()) {
                        echo "<tr>
                            <td>".$resultado[1]."</td>";
                            echo "<td>".$resultado[2]."</td>";
                            echo "<td>".$resultado[3]."</td>";
                            echo "<td>".$resultado[4]."</td>";
                            echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td>
                        </tr>";
                    }
                ?>
            </table>            
            
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>