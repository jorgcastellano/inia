<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Producto</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
            <hgroup>
                <h1>Producto</h1>
            </hgroup>
        </div>

                <?php
                extract($_POST);
                require_once '../../system/class.php';
                $producto = new producto();
                $producto -> registrar_produ($mysqli,$Nom_produ,$Existencia,$Precio_produ);
                $reg = $producto->consultar_produ($mysqli,$Nom_produ); 
                ?>

            <form class="contact_form" method="post" action="index">
                <table border=0 align="center">
                                <tr>
                                    <th>Nombre: </th>
                                    <td><?php echo $reg[1]?></td>
                                </tr>
                                <tr>
                                    <th>cantidad: </th>
                                    <td><?php echo $reg[2]?></td>
                                </tr>
                                <tr>
                                    <th>precio: </th>
                                    <td><?php echo $reg[3]?></td>
                                </tr>

                </table>
               <button type="submit" class="boton" name="Modificar1" value="<?php echo $reg[0]?>"><i class="fa fa-pencil"></i> Modificar Producto</button>
                    <button type='button' OnClick=location='index' class="boton">Nuevo Producto</button>
                <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>
          
            </form>

             <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>