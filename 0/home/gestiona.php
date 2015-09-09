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
                    <h1>Activar/Desactivar solicitud de usuarios</h1>
                </hgroup>
                </div>
                <?php
                require_once '../../system/classusuario.php';

                $mysqli = new miembro();
                $reg=$mysqli-> consultar_miembro($mysqli);

                ?>
            
            
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>