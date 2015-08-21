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
                    <h1>Activar/Desactivar laboratorios y análisis</h1>
                </hgroup>
            </div>
                <?php

                $laboratorios = new laboratorio();
                $reg=$laboratorios-> cEstatus($mysqli);

                $analisis = new analisis();
                $reg=$analisis->consultar_analisis($mysqli);




                ?>
            <form class="contact_form" action="" method="POST" >


            </form>
            
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>