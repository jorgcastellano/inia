<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cliente</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Cliente</h1>
                </hgroup>
            </div>

            <?php
                extract($_POST);
                require_once '../../system/class.php';

                for ($i=0;$i<count($Tipo);$i++){ $Tipo=$Tipo[$i]; }

                $ana = new analisis();
                $ana -> registrar_analisis($mysqli,$Nom_ana,$Precio_ana,$Tipo);
                $reg = $ana->consultar_analisis($mysqli,$Nom_ana);                
            ?>

            <form class="contact_form" method="post" action="modificar"  id="">
                <table border=0 align="center">
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
                <input type="hidden" name="Nom_ana" value="<?php echo $reg[1]?>" />
                <button type="submit" name="submit" class="boton" >Modificar</button>
                <button type='button' OnClick=location='formulario1.php' class="boton">Nuevo laboratorio</button>
                <button type='button' OnClick=location='' class="boton">Pagina Principal</button>
            </form>

             <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>