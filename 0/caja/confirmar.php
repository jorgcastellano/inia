<?php

include_once '../../system/check.php';

extract($_POST);
include_once '../../system/class.php';

$objfactura=new factura();
$objfactura->modificar_factura($mysqli,$codigo,$exento,$base,$iva,$retencion,$alicuota,$total);
echo "aqui se modifico la factura con los nuevos datos, se hace la consulta y se envia al pdf";





?>