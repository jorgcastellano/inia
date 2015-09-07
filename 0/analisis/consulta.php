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

            <form action="consulta" method="POST">
                <div class="buscadores">
                    <input type="text" name="buscador" id="buscador" placeholder="Buscar análisis" />
                    <button type="button" class="botonmenu"><i class="fa fa-search"></i></button>
                    <br>
                    <input type="radio" name="1" value="1" checked />Frase
                    <input type="radio" name="1" value="2"> Nombre completo
                </div>
            </form>

            <table class="anapro">
                <tr>
                    <td><i class="fa fa-chevron-circle-right"></i> Nombre</td>
                    <td>Precio</td>
                    <td>Laboratorio</td>
                    <td>Estatus</td>
                    <td><i class="fa fa-check-circle"></i></td>
                </tr>
            <?php
                if (isset($buscador)) :
            ?>
                <tr>
                    <td></td>
                </tr>
            <?php
                else :
                    include_once '../../system/class.php';
                    $objlaboratorio = new laboratorio();
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
                endif;
                ?>
            </table>            
            
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>