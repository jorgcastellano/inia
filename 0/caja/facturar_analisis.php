<?php
  //IVA actual, facilitado por el sitema
  $iva_actual = new iva();
  $actual_iva = $iva_actual->consultar_iva_actual($mysqli);
  $actual_iva = $actual_iva->fetch_array();
  $impuesto = $actual_iva[0];

  if (isset($comprado)) :

      //Invocacion de los objetos
      $objcliente = new cliente();
      $objproducto = new producto();
      $objfactura = new factura();

      //Consulta de clientes y productos
      $ress = $objcliente->consultar_cliente($mysqli, $comprado);
      $result = $objproducto->consulta_completo($mysqli);

      //Proceso de compra
      //Primero hacer la factura básica
      $objfactura -> facturar($mysqli, $ress[1], $total);
      $id = $objfactura -> consultar_factura_insertada($mysqli, $ress[1]);

      //Luego la descripcion o compras actualizando el inventario de una vez
      $i = 0;
      while ($resultado = $result->fetch_array()) :
        if (!empty($cantidad[$i])) :
          $precio = ($resultado[3] * $cantidad[$i]);
          $objfactdescrip->facturar_productos($mysqli, $id[0], $resultado[1], $cantidad[$i], $resultado[3], $precio, $resultado[0]);
          $nuevaexistencia = $resultado[2] - $cantidad[$i];
          $objproducto->actualizar_existencia($mysqli, $nuevaexistencia, $resultado[0]);
        endif;
        $i++;
      endwhile;
      $codigoListado = $id[0];
  elseif(isset($codigoListado)) :
  $id[0] = $codigoListado;
  endif;
?>
