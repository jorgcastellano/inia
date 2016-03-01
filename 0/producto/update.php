<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Producto</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include_once '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include_once '../../layouts/cabecera-body.php' ?>
            <hgroup>
                <h1>Producto</h1>
            </hgroup>
        </div>

            <?php
                extract($_POST);
                if (isset($submit)) :
                    require_once '../../system/class.php';
                    $iva = new  iva();
                    $iva -> insertar_iva($mysqli,$nuevoiva2,$Dia,$Mes,$Ano,$reten);
                    endif;
            ?>

                <div align="center">
                    <button name="atras" type="button" onclick=location="inve" class="boton"><i class="fa fa-arrow-left"></i> Ir a Inventario</button>
                    <button type='button' OnClick=location='index' class="boton"><i class="fa fa-plus"></i> Nuevo Producto</button>
                    <button type="submit" class="boton" name="Modificar1" value="<?php if(isset($reg)) echo $reg[0]?>"><i class="fa fa-pencil"></i> Modificar Producto</button>
                    <button type='button' OnClick=location='../home/inicio' class="boton"><i class='fa fa-home'></i> Página principal</button>
                </div>
            </form>

             <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>