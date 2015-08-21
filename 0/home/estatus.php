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
                $reg=$laboratorios-> cEstatus($mysqli,$estatus);

 
                

                ?>
            <form class="contact_form" action="" method="POST">

                <?php 
                $v=0;
                while ($res1 = $reg->fetch_array()) {?>
                    <table class="tstatus">
                    <tr>
                        <th><?php echo $res1[1]; ?></th>
                        <td><input type="checkbox" name="laboratorio[]" value="<?php echo $res1['estatus']?>" <?php if($res1['estatus']=='On'){ echo 'checked';}?> /></td>
                    </tr>
                        <?php 
                        $v++;
                        $analisis = new analisis();
                        $reg2=$analisis->cEstatus($mysqli,$v);

                        while($res2 = $reg2->fetch_array()){?>
                            <tr>
                                <td><?php echo $res2[1]; ?></td>
                                <td><input type="checkbox" name="analisis[]" value="" <?php if($res2['estatus']=='On'){ echo 'checked';}?> />
                            </tr>

                <?php }
                    echo "</table>";
                } ?>
                    
            </form>
            
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>