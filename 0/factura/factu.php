<?php
    require_once("pdf/dompdf/dompdf_config.inc.php");
    require ("../../system/class.php");
    extract($_POST);
    $objfactura = new factura();

    if (!isset($bauche))
        $bauche = "";

    $objfactura->modificar_factura($mysqli,$codigo,$exento,$base,$iva,$retencion,$alicuota,$total, $observacion, $ivaporciento, $retencionporciento, $tipofactura, $metodo, $bauche);

    $factura = $objfactura->consultar_factura($mysqli, $codigo);

    $objcliente = new cliente();
    $cliente = $objcliente->consultar_cliente($mysqli, $factura[1]);

    $objfactura_des = new factura_descripcion();
    $resultado = $objfactura_des->consultar_factura($mysqli, $codigo);

    $result0 = $resultado->fetch_array();
    $result1 = $resultado->fetch_array();
    $result2 = $resultado->fetch_array();
    $result3 = $resultado->fetch_array();
    $result4 = $resultado->fetch_array();
    $result5 = $resultado->fetch_array();
    $result6 = $resultado->fetch_array();

    if (!empty($factura[5]))
        $compra123 = $factura[4].', Nro. '.$factura[5];
    else
        $compra123 = $factura[4];
$html='
<html>'.
	'<body>
	 <link rel="stylesheet" type="text/css" href="pdf/factura.css">
	 <header>
     <div class="imaprin">
	 		    <img src="pdf/logos/factura.png">
	 		</div>
	 	<div class="prin">
        <p id="uno">REPÚBLICA BOLIVARIANA DE VENEZUELA<br /> MINISTERIO DEL PODER POPULAR PARA LA AGRICULTURA Y TIERRAS <br /> INSTITUTO NACIONAL DE INVESTIGACIONES AGRÍCOLAS</p>
        <p id="dos"><b>Dirección Fiscal:</b> Av. Universidad vía El Limón Edif. Sede Gcia. Gral. INIA, Maracay- Edo. Aragua <br /> <b>Sucursal:</b> Av. Urdaneta, Edificio INIA, Piso Nº02, Mérida Edo. Mérida</p>
        <p  id="tres">www.inia.gov.ve<br /><b>RIF:G-20000095-3</p>  
		</div>
        <div class="tres">
           <p><b>FACTURA</b><br /> <b>Nª: '.$codigo.'</b></p>
    </div>
	</header>
    <div class="margenes">
        <table class="factura" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <td>Nombre ó Razón Social: '.$cliente[2].' '.$cliente[3].'</td>
                <td>Fecha: '.$factura[2].'</td>
            </tr>
            <tr>
                <td >Dirección: '.$cliente[6].'</td>
                <td align="left">C.I./RIF: '.$cliente[1].'</td>
            </tr>
         </table>
         <table class="facturat" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <td ><p id="cuatro">CANTIDAD</p></td>
                <td><p id="cuatro">DESCRICIÓN</p></td>
                <td><p id="cuatro"> P. UNIT</p></td>
                <td colspan="2"><p id="cuatro">TOTAL</p></td>
            </tr>
            <tr>
                <td text-align="left">'.$result0[3].'</td>
                <td>'.$result0[2].'</td>
                <td align="center">'.$result0[4].'</td>
                <td align="right">'.$result0[5].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>'.$result1[3].'</td>
                <td>'.$result1[2].'</td>
                <td align="center">'.$result1[4].'</td>
                <td align="right">'.$result1[5].'</td>
               <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>'.$result2[3].'</td>
                <td>'.$result2[2].'</td>
                <td align="center">'.$result2[4].'</td>
                <td align="right">'.$result2[5].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>'.$result3[3].'</td>
                <td>'.$result3[2].'</td>
                <td align="center">'.$result3[4].'</td>
                <td align="right">'.$result3[5].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>'.$result4[3].'</td>
                <td>'.$result4[2].'</td>
                <td align="center">'.$result4[4].'</td>
                <td align="right">'.$result4[5].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>'.$result5[3].'</td>
                <td>'.$result5[2].'</td>
                <td align="center">'.$result5[4].'</td>
                <td align="right">'.$result5[5].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>'.$result6[3].'</td>
                <td>'.$result6[2].'</td>
                <td align="center">'.$result6[4].'</td>
                <td align="right">'.$result6[5].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            </table>
            <table class="facturat2" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <td rowspan="8" margin="0"><p>OBSERVACION: <br>'.$factura[3].': '.$compra123.'<br>'.$factura[13].'</p></td>
                <td colspan="2"><i><b>Sub-total</b></i></td>
                <td align="right">'.$factura[6].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td colspan="2"><i><b>Adiciones, Descuentos, Bonificaciones al precio</b></i></td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td colspan="2"><i><b>Monto Total Exento o Exonerado</b></i></td>
                <td align="right">'.$factura[7].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td align="center"><i><b>I.V.A</b></i></td>
                <td align="center"><b><i>Base</i></b></td>
                <td align="right">'.$factura[8].'</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td align="right"><b>'.$factura[14].'%</b></td>
                <td></td>
                <td align="right">'.$factura[9].'</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td align="right"><b>'.$factura[15].'%</b></td>
                <td></td>
                <td align="right">'.$factura[10].'</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td colspan="2"><i><b>Monto Total del Impuesto según Alicuota</b></i></td>
                <td align="right">'.$factura[11].'</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td colspan="2"><i><b>MONTO TOTAL DE LA VENTA</b></i></td>
                <td align="right"><b>'.$factura[12].'</b></td>
                <td align="center"><i></i>00</td>
            </tr>
         </table>
    </div>
	</body>
</html>';

$html=utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->load_html($html);

$dompdf->set_paper(array(0,0,400,500), 'landscape');

$dompdf->render();
$fecha = date("ymd");
//Para visualizar en pantalla
$dompdf->stream("$tipofactura$cliente[1]_$fecha.pdf",array("Attachment" => 0));
//Para Descargas
//$dompdf->stream("$tipofactura$cliente[1].pdf");
?>
