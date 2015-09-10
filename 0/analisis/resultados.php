<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Analisis</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Analisis</h1>
                </hgroup>
            </div>

            <?php
             
                extract($_POST);
                 if (isset($_POST['modificar'])) :
                $Cod_ana=$modificar;
                require_once '../../system/class.php';
                $ana = new analisis();
                $ana->modificar_analisis($mysqli,$Cod_ana,$Nom_ana,$Precio_ana,$Tipo);
                $reg=$ana->consultar_analisis($mysqli,$Cod_ana);
                endif;

                require_once '../../system/class.php';
                $ana = new analisis();  
                if (isset($submit)) :
                    $ana -> registrar_analisis($mysqli,$Nom_ana,$Precio_ana,$Tipo);
                    $reg=$ana->consultar_analisis_Cod($mysqli, $Tipo);
                endif;


            ?>

            <form method="post" action="formulario">
                <table class="">
                    <tr>
                        <td>Nombre del análisis</td>
                        <td>Precio</td>
                        <td>Laboratorio</td>
                    </tr>
                    <tr>
                        <td><?php echo $reg[1]?></td>
                        <td><?php echo $reg[2]?></td>
                        <td><?php echo $reg[3]?></td>
                    </tr>
                </table>
                <button type="button" name="insertar" class="boton" onclick=location="formulario"><i class="fa fa-plus"></i> Nuevo análisis</button>
                <button type="submit" name="ana" value="<?php echo $reg[0]?>" class="boton"><i class="fa fa-pencil"></i> Modificar</button>
                <button type='button' OnClick=location='index' class="boton"><i class="fa fa-home"></i> Página Principal</button>
            </form>
             <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>