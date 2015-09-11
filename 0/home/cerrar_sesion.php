<?php
include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <?php
            include ("seguridad.php");
            session_unset();
            session_destroy();
        ?>
        <section class="bloque">
            <div>
                <?php include_once '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Sistema de Procesos Internos del INIA Mérida (SPIIM)</h1>
                </hgroup>
            </div>
            <h3>¡Has cerrado sesión!</h3>
            <p>Si desea volver a logearse regrese al inicio</p>
            <button style="margin-left: 5%" class="boton" type="button" onclick="location.href='index'" name="index"><– Páquina principal </button>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>