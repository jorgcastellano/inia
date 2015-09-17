<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
          <div>
              <?php include '../../layouts/cabecera-body.php' ?>
      			<hgroup>
      				<h1>Compra procesada con éxito</h1>
      			</hgroup>
      		</div>
          <?php

            extract($_POST);
            include_once '../../system/class.php';
            //Invocacion de los objetos
            $objcliente = new cliente();
            $objproducto = new producto();
            $objfactura = new factura();
            $objfactdescrip = new factura_descripcion();

            //Consulta de clientes y productos
            $ress = $objcliente->consultar_cliente($mysqli, $comprado);
            $result = $objproducto->consulta_completo($mysqli);

            //Proceso de compra
            //Primero hacer la factura básica
            $objfactura -> facturar($mysqli, $ress[1], $total);
            $id = $objfactura -> consultar_factura_insertada($mysqli, $ress[1]);
            //Luego la descripcion o compras
            $i = 0;
            while ($resultado = $result->fetch_array()) :
              if (!empty($cantidad[$i])) :
                $precio = ($resultado[3] * $cantidad[$i]);
                $objfactdescrip->facturar_productos($mysqli, $id[0], $resultado[1], $cantidad[$i], $resultado[3], $precio, $resultado[0]);
              endif;
              $i++;
            endwhile;

          ?>
        <div align="center">
          <button type="submit" name="comprado" value="<?php if(isset($compra)) echo $compra; ?>" class="boton"><i class="fa fa-check"></i> Confirmar compra</button>
        </div>
        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
