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

            <form action="index" method="POST">
                <div class="buscadores">
                    <input type="text" name="buscador" id="buscador" value="<?php if (isset($_POST['buscador'])) echo $_POST['buscador']; ?>" placeholder="Buscar análisis" />
                    <button type="submit" class="botonmenu"><i class="fa fa-search"></i> Buscar</button>
                    <br>
                    <input type="radio" name="opc" value="1" title="click aquí para seleccionar un método de busqueda" checked />Frase 
                    <input type="radio" name="opc" value="2" title="click aquí para seleccionar un método de busqueda" <?php if (isset($_POST['opc'])){ if ($_POST['opc'] == 2) echo "checked";}?> />Nombre completo
                </div>
            </form>
            <form method="POST" action="formulario">
                <?php
                    extract($_POST);

                    include_once '../../system/class.php';
                    $objlaboratorio = new laboratorio();
                    $objanalisis = new analisis();

                    if (!empty($buscador)) {

                        switch ($opc) {
                            case 1:
                                $result = $objanalisis->buscadorlike($mysqli, $buscador);
                                $result = $result->fetch_array();
                                if (empty($result))
                                    echo "No existe el análisis buscado";
                                else {
                                    echo "
                                        <table class='anapro'>
                                            <tr>
                                                <td><i class='fa fa-chevron-circle-right'></i> Nombre</td>
                                                <td>Precio</td>
                                                <td>Laboratorio</td>
                                                <td>Estatus</td>
                                                <td><i class='fa fa-check-circle'></i></td>
                                            </tr>
                                    ";
                                    $result = $objanalisis->buscadorlike($mysqli, $buscador);
                                    while ($resultado = $result->fetch_array()) {
                                        echo "<tr>
                                            <td>".$resultado[1]."</td>";
                                            echo "<td>".$resultado[2]."</td>";
                                            echo "<td>".$resultado[3]."</td>";
                                            echo "<td>".$resultado[4]."</td>";
                                            echo "<td><input type='radio' name='seleccion' title='click aquí para modificar este análisis' value='$resultado[0]'></td>
                                        </tr>";
                                    }
                                    echo "</table>";
                                }
                                break;
                            case 2:
                                $resultado = $objanalisis->consultar_analisis($mysqli, $buscador);
                                if (empty($resultado))
                                    echo "No existe el análisis buscado";
                                else {
                                    echo "
                                        <table class='anapro'>
                                            <tr>
                                                <td><i class='fa fa-chevron-circle-right'></i> Nombre</td>
                                                <td>Precio</td>
                                                <td>Laboratorio</td>
                                                <td>Estatus</td>
                                                <td><i class='fa fa-check-circle'></i></td>
                                            </tr>
                                    ";
                                    echo "<tr>
                                        <td>".$resultado[1]."</td>";
                                        echo "<td>".$resultado[2]."</td>";
                                        echo "<td>".$resultado[3]."</td>";
                                        echo "<td>".$resultado[4]."</td>";
                                        echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td>
                                        </tr>
                                    </table>";
                                }
                                break;
                            default:
                                echo "Uy! existe un error";
                                break;
                        }

                    } elseif (empty($buscador) OR !isset($buscador)) {
                        echo "
                                <table class='anapro'>
                                    <tr>
                                        <td><i class='fa fa-chevron-circle-right'></i> Nombre</td>
                                        <td>Precio</td>
                                        <td>Laboratorio</td>
                                        <td>Estatus</td>
                                        <td><i class='fa fa-check-circle'></i></td>
                                    </tr>
                            ";
                        $result = $objanalisis->consulta_completo($mysqli);
                        while ($resultado = $result->fetch_array()) {
                            echo "<tr>
                                    <td>".$resultado[1]."</td>";
                                    echo "<td>".$resultado[2]."</td>";
                                    echo "<td>".$resultado[3]."</td>";
                                    echo "<td>".$resultado[4]."</td>";
                                    echo "<td><input type='radio' name='seleccion' value='$resultado[0]' title='click aquí para modificar este análisis'></td>
                                </tr>";
                        }
                        echo "</table>";
                    }
                ?>
                <div>
                    <button type="button" name="insertar" class="boton" onclick=location="formulario"><i class="fa fa-plus"></i> Nuevo análisis</button>
                    <button type="submit" class="boton" name="modificar" value="modificar"><i class="fa fa-pencil"></i> Modificar análisis</button>
                    <button type='button' OnClick=location='../home/inicio' class="boton"><i class="fa fa-home"></i> Inicio</button>
                </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>