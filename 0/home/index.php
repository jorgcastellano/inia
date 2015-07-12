<!-- PAGINA DE BIENVENIDA | ENTRADA AL SISTEMA -->
<?php
    session_start();
    include_once '../../system/check.php';
    $indexes = "Yes";
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
                    <h1>Sistema de Procesos Internos del INIA Mérida (SPIIM)</h1>
                </hgroup>
            </div>
            <article>
                <p><b>Visión:</b> Ser una institución componente del sistema agrario nacional, dedicado a la innovación agroalimentaria, que fortalece los valores éticos socialista del modelo agrario vigente como instrumento para la nueva sociedad; que reconoce y promueve la cultura ancestral, tradicional, formal e informal en consolidación revolucionaria, científica y bolivariana (INIA, 2011).</p>
                <p><b>Misión:</b> Impulsar la innovación tecnológica agroalimentaria para optimizar la función producción en el sistema agroalimentario nacional, bajo la estructura social  comunal, en el marco del modelo agrario socialista (INIA,  2011).</p>
                <p><b>Objetivo:</b> El Instituto Nacional de Investigaciones Agrícolas (INIA) es un organismo público descentralizado del Ministerio de Agricultura y Tierras, cuyo objetivo prioritario es contribuir a la tecnificación del agro-nacional promoviendo el aumento de su rentabilidad, bajo condiciones de competitividad; con la participación de los sectores público y privado, nacional e internacional.</p>
            </article> <!-- FINALIZACION DEL CUERPO O CONTENEDOR DE LA PAGINA -->
            <button style="margin-left: 75%" class="boton" type="button" onclick="location.href='registro'" name="registro"> Registrese aquí –></button>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>



<!--
Username: administrador
Email: test@example.com
Password: 6ZaxN2Vzm9NUJT2y
 -->