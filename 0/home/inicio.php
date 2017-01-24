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
            <?php
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
