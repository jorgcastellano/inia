<?php
    include_once '../../system/check.php';

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

    header('location: ../../0/caja/procesar.php?codigo='.$id[0]);
?>