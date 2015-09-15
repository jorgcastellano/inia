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
            if (isset($_POST['modificar'])) :
            extract($_POST);
            $Cod_produ=$modificar;
            require_once '../../system/class.php';
            $producto = new producto();
            $producto->modificar_produ($mysqli,$Cod_produ,$Nom_produ,$Existencia,$Precio_produ);
            $reg = $producto->consultar_produc($mysqli,$Cod_produ);
            endif; 
            if (isset($_POST['submit'])) :
                extract($_POST);
                require_once '../../system/class.php';
                $producto = new producto();
                $producto -> registrar_produ($mysqli,$Nom_produ,$Existencia,$Precio_produ);
                $reg = $producto->consultar_produ($mysqli,$Nom_produ);
                endif;

                ?>

            <form class="contact_form" method="post" action="index">
                <table border=0 align="center">
                                <tr>
                                    <th>Nombre: </th>
                                    <td><?php if(isset($reg)) echo $reg[1]?></td>
                                </tr>
                                <tr>
                                    <th>cantidad: </th>
                                    <td><?php if(isset($reg)) echo $reg[2]?></td>
                                </tr>
                                <tr>
                                    <th>precio: </th>
                                    <td><?php if(isset($reg)) echo $reg[3]?></td>
                                </tr>

                </table>
                <button name="atras" type="button" onclick=location="inve" class="boton"><i class="fa fa-arrow-left"></i> Ir a Inventario</button>
                <button type='button' OnClick=location='index' class="boton"><i class="fa fa-plus"></i>Nuevo Producto</button>
               <button type="submit" class="boton" name="Modificar1" value="<?php if(isset($reg)) echo $reg[0]?>"><i class="fa fa-pencil"></i> Modificar Producto</button>
                <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>
          
            </form>

             <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>