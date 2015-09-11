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
                require_once '../../system/class.php';

                $laboratorios = new laboratorio();
                $reg=$laboratorios->cEstatus($mysqli);

                ?>
            <form action="cambioestado" method="POST">

                <?php 
                $v=0;
                while ($lab = $reg->fetch_array()) {?>
                    <table class="tstatus">
                        <tr>
                            <th><i class="fa fa-chevron-circle-right"></i> <?php echo $lab[1]; ?></th>
                            <td><input type="checkbox" name="laboratorio[]" <?php echo "value='$lab[0]'"; if($lab[2]=='On'){ echo 'checked';}?> title="click aquí para desactivar todos los servicios de este laboratorio" /></td>
                        </tr>
                        <?php
                            $v++;
                            $analisis = new analisis(); 
                            $reg2=$analisis->cEstatus($mysqli,$v);

                            while($ana = $reg2->fetch_array())
                                if ($ana[3] == $lab[0]) {
                                ?>  <tr>
                                        <td><?php echo $ana[1]; ?></td>
                                        <td><input type="checkbox" name="analisis[]" <?php echo "value='$ana[0]'"; if($ana['estatus']=='On') echo 'checked'; ?> title="click aquí para desactivar este servicio" />
                                    </tr>
                        <?php   }
                    echo "</table>";
                }
                $mysqli->close();?>
                <button type="button" name="Regresar atras" class="boton" onclick=location="inicio"><i class="fa fa-arrow-left"></i> Página principal</button>
                <button type="submit" name="ActualizarEstado" class="boton"><i class="fa fa-check"></i> Guardar cambios</button>
            </form>
            
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>