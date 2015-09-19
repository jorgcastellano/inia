<?php
require_once("dompdf/dompdf_config.inc.php");
include_once '../../../system/class.php';
extract($_POST);
$objfactura=new factura();
$objfactura->modificar_factura($mysqli,$codigo,$exento,$base,$iva,$retencion,$alicuota,$total);


if(isset($codigo)):
$objfactura= new factura();
$reg1=$objfactura->consultar_factura($mysqli, $codigo);

$objcliente= new cliente();
$reg2=$objcliente->consultar_cliente($mysqli,$reg1[2]);

$objfactura_des= new factura_descripcion();
$reg3=$objfactura_des->consultar_factura($mysqli, $codigo);
     
$html='
<html>'.
	'<body>
	 <link rel="stylesheet" type="text/css" href="factura.css">
	 <header>
     <div class="imaprin">
	 		    <img src="logos/factura.png">
	 		</div>
	 	<div class="prin">
        <p id="uno">REPÚBLICA BOLIVARIANA DE VENEZUELA<br /> MINISTERIO DEL PODER POPULAR PARA LA AGRICULTURA Y TIERRAS <br /> INSTITUTO NACIONAL DE INVESTIGACIONES AGRÍCOLAS</p>
        <p id="dos"><b>Dirección Fiscal:</b> Av. Universidad vía El Limón Edif. Sede Gcia. Gral. INIA, Maracay- Edo. Aragua <br /> <b>Sucursal:</b> Av. Urdaneta, Edificio INIA, Piso Nº02, Mérida Edo. Mérida</p>
        <p  id="tres">www.inia.gov.ve<br /><b>RIF:G-20000095-3</p>  
		</div>
        <div class="tres">
           <p><b>FACTURA</b><br /> <b>Nª:'.$reg1[0].'</b></p>
    </div>
	</header>
    <div class="margenes">
        <table class="factura" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <td>Nombre ó Razón Social:</td>
                <td>Fecha:'.$reg1[2].'</td>
            </tr>
            <tr>
                <td >Dirección:    </td>
                <td align="left">C.I./RIF:'.$reg1[1].'</td>
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
                <td text-align="left">0</td>
                <td>0</td>
                <td align="center">0</td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>0</td>
                <td>0</td>
                <td align="center">0</td>
                <td align="right">0</td>
               <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>0</td>
                <td>0</td>
                <td align="center">0</td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>0</td>
                <td>0</td>
                <td align="center">0</td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>0</td>
                <td>0</td>
                <td align="center">0</td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>0</td>
                <td>0</td>
                <td align="center">0</td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td>0</td>
                <td>0</td>
                <td align="center">0</td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
            </table>
            <table class="facturat2" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <td rowspan="8" margin="0"><p>OBSERVACION:</p></td>
                <td colspan="2"><i><b>Sub-total</b></i></td>
                <td align="right"></td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td colspan="2"><i><b>Adiciones, Descuentos, Bonificaciones al precio</b></i></td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td colspan="2"><i><b>Monto Total Exento o Exonerado</b></i></td>
                <td align="right"></td> 
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td align="center"><i><b>I.V.A</b></i></td>
                <td align="center"><b><i>Base</i></b></td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td align="right"><b>%</b></td>
                <td></td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td align="right"><b>%</b></td>
                <td></td>
                <td align="right">0</td>
                <td align="center"><i>00</i></td>
            </tr>
             <tr>
                <td colspan="2"><i><b>Monto Total del Impuesto según Alicuota</b></i></td>
                <td align="right"></td>
                <td align="center"><i>00</i></td>
            </tr>
            <tr>
                <td colspan="2"><i><b>MONTO TOTAL DE LA VENTA</b></i></td>
                <td align="right"></td>
                <td align="center"><i></i></td>
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
$dompdf->stream("factura.php",array("Attachment" => 0));
?>
