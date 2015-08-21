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
                $reg=$laboratorios-> cEstatus($mysqli);

 
                

                ?>
            <form class="contact_form" action="" method="POST" >

                <table border=0 align="center">

                <?php 
                $v=0;
                while ($res1 = $reg->fetch_array()) {?>
                    <tr>
                        <td><input type="checkbox" name="laboratorio[]" value="<?php echo $res1['estatus']?>" <?php if($res1['estatus']=='On'){ echo 'checked';}?> /><?php echo $res1[1]; ?></td>
                    </tr>
                        <?php 
                        $v++;
                        $analisis = new analisis();
                        $reg2=$analisis->cEstatus($mysqli,$v);

                        while($res2 = $reg2->fetch_array()){?>
                            <tr>
                                <td><input type="checkbox" name="analisis[]" value=""/><?php echo $res2[1]; ?></td>
                            </tr>

                <?php }} ?>
                </table>


            </form>
            
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>