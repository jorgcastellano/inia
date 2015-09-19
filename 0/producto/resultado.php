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
                if (isset($modificar)) :
                    $Cod_produ=$modificar;
                    require_once '../../system/class.php';
                    $producto = new producto();
                    $producto->modificar_produ($mysqli,$Cod_produ,$Nom_produ,$Existencia,$Precio_produ, $iva);
                    if($mysqli->affected_rows>0){ echo "<span class='notify'>El nuevo producto se ha registrado con exito</span> <i class='fa fa-check-square'></i>";} 
                    else { echo "<span class='notify_f'>No se ha podido registrar el nuevo producto</span> <i class='fa fa-times'></i>";}
                    $reg = $producto->consultar_produc($mysqli,$Cod_produ);
                endif;

                if (isset($submit)) :
                    require_once '../../system/class.php';
                    $producto = new producto();
                    $producto -> registrar_produ($mysqli,$Nom_produ,$Existencia,$Precio_produ, $iva);
                    $reg = $producto->consultar_ultimo_registro($mysqli);
                endif;
            ?>

            <form class="contact_form" method="post" action="index">
                <table class="anapro" border=0 align="center">
                    <tr>
                        <td>NOMBRE</td>
                        <td>CANTIDAD</td>
                        <td>PRECIO</td>
                    </tr>
                    <tr>
                        <td><?php if(isset($reg)) echo $reg[1]?></td>
                        <td><?php if(isset($reg)) echo $reg[2]?></td>
                        <td><?php if(isset($reg)) echo $reg[3]?></td>
                    </tr>

                </table>
                <div align="center">
                    <button name="atras" type="button" onclick=location="inve" class="boton"><i class="fa fa-arrow-left"></i> Ir a Inventario</button>
                    <button type='button' OnClick=location='index' class="boton"><i class="fa fa-plus"></i> Nuevo Producto</button>
                    <button type="submit" class="boton" name="Modificar1" value="<?php if(isset($reg)) echo $reg[0]?>"><i class="fa fa-pencil"></i> Modificar Producto</button>
                    <button type='button' OnClick=location='../home/inicio' class="boton"> Página principal</button>
                </div>
            </form>

             <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>