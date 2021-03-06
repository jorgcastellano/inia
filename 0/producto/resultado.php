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

                require_once '../../system/class.php';
                $pro = new producto();
                $reg1 = $pro->consulta_completo($mysqli);
                $i=0;
                while ($reg2 = $reg1->fetch_array()):
                  if (isset($submit)&&$Nom_produ==$reg2[1]) { ?>
                    <script type="text/javascript">
                      window.location="index?mensaje";
                    </script>
            <?php
                    exit(1);
                  }

                  if (isset($modificar)&&$Nom_produ!=$Nom_original&&$Nom_produ==$reg2[1]) { ?>
                    <script type="text/javascript">
                      window.location="index?mensaje";
                    </script>
            <?php
                    exit(1);
                  }
                    $i++;
                endwhile;


                if (isset($modificar)) :
                    $Cod_produ=$modificar;
                    $pro->modificar_produ($mysqli,$Cod_produ,$Nom_produ,$Existencia,$Precio_produ, $iva, $um);
                    if($mysqli->affected_rows>0){echo "<div class='notify'><i class='fa fa-check-circle-o'></i> El producto se ha modificado con éxito<br /></div> ";}
                    else { echo "<div class='notify_f'><i class='fa fa-times'></i> No se modificó el producto<br /></div> ";}
                    $reg = $pro->consultar_produc($mysqli,$Cod_produ);
                endif;

                if (isset($submit)) :
                    $pro -> registrar_produ($mysqli,$Nom_produ,$Existencia,$Precio_produ, $iva, $um);
                    if($mysqli->affected_rows>0){echo "<div class='notify'><i class='fa fa-check-circle-o'></i> El nuevo producto se ha registrado con éxito<br /></div> ";}
                    else { echo "<div class='notify_f'><i class='fa fa-times'></i>No se ha podido registrar el nuevo producto<br /></div> ";}
                    $reg = $pro->consultar_ultimo_registro($mysqli);
                endif;
            ?>

            <form class="contact_form" method="post" action="index">
                <table class="anapro" border=0 align="center">
                    <tr>
                        <td>NOMBRE</td>
                        <td>CANTIDAD</td>
                        <td>PRECIO</td>
                    </tr>
                    <?php
                              if($reg[5]==1){ $unidad="C/U"; }
                              if($reg[5]==2){ $unidad="mls"; }
                              if($reg[5]==3){ $unidad="Lts"; }
                              if($reg[5]==4){ $unidad="Galones"; }
                              if($reg[5]==5){ $unidad="Gr"; }
                              if($reg[5]==6){ $unidad="Kg"; }

                    ?>

                    <tr>
                        <td><?php if(isset($reg)) echo $reg[1]?></td>
                        <td><?php if(isset($reg)) echo "".$reg[2]." ".$unidad; ?></td>
                        <td><?php if(isset($reg)) echo $reg[3]." Bs";?></td>
                    </tr>

                </table>
                <div class="grupobotones">
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
