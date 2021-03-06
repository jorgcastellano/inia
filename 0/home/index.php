<!-- PAGINA DE BIENVENIDA | ENTRADA AL SISTEMA -->
<?php

    session_start();

    if(isset($_SESSION['id'])) :
        $logeado = 'On';
    else :
        $logeado = 'Off';
    endif;
    $indexes = "Yes";
    if ($logeado == "On")
        header("location: ../../0/home/cerrar_sesion");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
            <?php include_once '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Sistema de Procesos IntErnos del INIA Mérida (SPIIM)</h1>
                </hgroup>
            </div>
            <article>
                <p><b>Visión:</b> Ser una institución componente del sistema agrario nacional, dedicado a la innovación agroalimentaria, que fortalece los valores éticos socialista del modelo agrario vigente como instrumento para la nueva sociedad; que reconoce y promueve la cultura ancestral, tradicional, formal e informal en consolidación revolucionaria, científica y bolivariana (INIA, 2011).</p>
                <p><b>Misión:</b> Impulsar la innovación tecnológica agroalimentaria para optimizar la función producción en el sistema agroalimentario nacional, bajo la estructura social  comunal, en el marco del modelo agrario socialista (INIA,  2011).</p>
                <p><b>Objetivo:</b> El Instituto Nacional de Investigaciones Agrícolas (INIA) es un organismo público descentralizado del Ministerio de Agricultura y Tierras, cuyo objetivo prioritario es contribuir a la tecnificación del agro-nacional promoviendo el aumento de su rentabilidad, bajo condiciones de competitividad; con la participación de los sectores público y privado, nacional e internacional.</p>

            </article> <!-- FINALIZACION DEL CUERPO O CONTENEDOR DE LA PAGINA -->

            <?php
                include_once '../../includes/conexion.php';
                $sql = "SELECT * FROM ayudante LIMIT 1";
                $consulta = $mysqli->query($sql);
                $res = $consulta->fetch_array();
                $consulta->close();
            ?>

            <table class="tstatus tstatus-index">
                <tr>
                    <td colspan="2"><i class="fa fa-server"></i> Estado del servidor - <?php echo $res[3] ?></td>
                </tr>
                <tr>
                    <td>Cantidad de solicitudes</td>
                    <td><?php echo $res[0] ?></td>
                </tr>
                <tr>
                    <td>Muestras analizadas en suelo</td>
                    <td><?php echo $res[1] ?></td>
                </tr>
                <tr>
                    <td>Muestras analizadas en fitopatología</td>
                    <td><?php echo $res[2] ?></td>
                </tr>
            </table>

            <button style="margin-left: 75%" class="boton" type="button" onclick=location="../../0/home/registro" name="registro"> Registrese aquí <i class="fa fa-arrow-right"></i></button>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
