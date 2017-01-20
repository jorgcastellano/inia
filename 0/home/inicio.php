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
                    <h1>Sistema de Procesos Internos del INIA Mérida (SPIIM)</h1>
                </hgroup>
            </div>

            <?php
            if ($_SESSION['privilegios'] == 1) :
                echo "<span <i class='fa fa-user-plus'> Gerente del sistema</i><br /></span> ";
            elseif ($_SESSION['privilegios'] == 2) :
              if($_SESSION['jefe'] == 1)
                include '../laboratorio/principal.php';
              else
                include '../laboratorio/inicio.php';
            elseif ($_SESSION['privilegios'] == 3) :  //Caja
                include '../../0/caja/listado.php';
            endif;
            ?>

            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
