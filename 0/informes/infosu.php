<?php
  require_once("dompdf/dompdf_config.inc.php");
$html='
<html>'.
'	<body>
    <link rel="stylesheet" type="text/css" href="info.css">
    <header>
   <div class="prin">
   <img src="logosInfo/logo.png">
   </div>
       <div class="tres">
          <p>INFORME DE RESULTADOS DE ENSAYOS-LABORATORIO DE SUELOS INIA MÉRIDA</p>
   </div>
 </header>
 <table class="info"  border="1">
      <tr>
          <td colspan="6">Datos del Cliente</td>
          <td colspan="12" >Datos del Iinforme</td>
      </tr>
			<tr>
			    <td >Nombre:</td>
			    <td colspan="3">Variable</td>
			    <td colspan="2">Fecha de Recepción de Ítem(s):</td>
			    <td colspan="7">Variable fecha</td>
			</tr>
			<tr>
			    <td >Dirección:</td>
			    <td colspan="3">Variable</td>
			    <td>Código:</td>
			    <td colspan="7">IRE-Variable codigo</td>
			</tr>
			<tr>
			    <td>Persona Contacto:</td>
			    <td>Variable</td>
			    <td >CI/RIF:</td>
			    <td>Variable</td>
			    <td >Centro:</td>
			    <td colspan="7">Mérida</td>
			</tr>
			<tr>
			    <td>Teléfono:</td>
			    <td>Variable</td>
			    <td>FAX:</td>
			    <td>Variable</td>
			    <td>Laboratorio(s):</td>
			    <td colspan="7">Variable</td>
			</tr>
			<tr>
			    <td>Correo Electrónico:</td>
			    <td colspan="3">Variable</td>
			    <td>Contrato:</td>
			    <td colspan="7">Variable</td>
			</tr>
			<tr>
			    <td colspan="12">ENSAYOS</td>
			</tr>
			<tr>
			    <td rowspan="5" >ENSAYOS</td>
			    <td rowspan="5" >INSTRUTIVO</td>
			    <td colspan="10">Resultados</td>
			</tr>
			<tr>
			    <td colspan="10">Muestra (descripción/identificación del cliente/identificacion de Ítem(s))</td>
			</tr>
			<tr>
			    <td>fefes</td>
			    <td>fsfs</td>
			    <td>fsffs</td>
			    <td colspan="6">fsff</td>
			    <td>fssfsff</td>
			</tr>
			<tr>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td colspan="6"></td>
			    <td></td>
			</tr>
			<tr>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td colspan="6"></td>
			    <td></td>
			</tr>
			<tr>
			    <td colspan="12">ANALISIS FISICO</td>
			</tr>
			<tr>
			    <td>%Arena</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td colspan="10"></td>
			</tr>
			<tr>
			    <td>%Limo</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td colspan="10"></td>
			</tr>
			<tr>
			    <td>%Arcilla</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td colspan="10"></td>
			</tr>
			<tr>
			    <td>Textura (Bouyoucos)</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td colspan="10"></td>
			</tr>
			<tr>
			    <td colspan="12">ANÁLISIS QUÍMICO</td>
			</tr>
			<tr>
			    <td>Fósforo Olsen (ppm)</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td>Potasio Olsen (ppm)</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td>Calcio Morgan  (ppm)</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td>Magnesio Morgan (ppm)</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td>%  Materia Orgánica (Walkley-Black)</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td>pH 1:2,5</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td>Conductividad Eléctrica dS*m-1</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td>Aluminio (meq/100 g suelo)</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td colspan="2">Cultivo</td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td colspan="8"></td>
			</tr>
			<tr>
			    <td colspan="2">FECHA DE REALIZACIÓN DE ENSAYOS:</td>
			    <td>Inicio:</td>
			    <td>Variable Fecha</td>
			    <td>Final</td>
			    <td colspan="10">Variable Fecha</td>
			</tr>
			<tr>
			    <td colspan="2">NOMBRE Y APELLIDO DEL JEFE DEL LABORATORIO:</td>
			    <td colspan="12">Variable</td>
			</tr>
			<tr>
			    <td colspan="2">FIRMA DEL JEFE DEL LABORATORIO:</td>
			    <td colspan="12"></td>
			</tr>
			<tr>
			    <td colspan="12"><b>Nota</b>:  Estos resultados se refieren únicamente
			     a los ítems de ensayos suministrados por el usuario, de igual forma,
			     solo se autoriza la reproducción del informe en su totalidad con la
			      autorización del Laboratorio emisor.</td>
			</tr>
 </table>
 </br>
 <table class="info2" border="1">
        <tr>
            <td>LEYENDA</td>
        </tr>
        <tr>
            <td>Textura Gruesa:     a: arenoso, aF: arena-francosa, Fa: franco-arenoso.</td>
        </tr>
        <tr>
            <td>Textura Media: FAa: franco-arcillo-arenoso, F: franco, FL: franco-limoso, FA: franco-arcilloso, Aa: arcillo-arenoso, L: limoso.</td>
        </tr>
        <tr>
            <td>Textura Fina: A: arcilloso, AL: arcillo-limoso, FAL: franco-arcillo-limoso.</td>
        </tr>
        <tr>
            <td>Rangos: A: alto,  M: medio,  B: bajo.</td>
        </tr>
        <tr>
            <td>pH: a: ácido, ma: moderadamente ácido, N: neutro, mA: moderadamente alcalino, A: alcalino.</td>
        </tr>
        <tr>
            <td>Conductividad Eléctrica (CE):  n: normal, an: anormal.</td>
        </tr>
 </table>
 <p><center>DIRECCIÓN: Av. URDANETA EDIFICIO INIA-MÉRIDA, MÉRIDA EDO. MÉRIDA. TELEFAX: (58 274) 2630090 / 2637941. www.inia.gob.ve</center></p>
</body>
</html>';
$html=utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper("A4","portrait");
$dompdf->render();
$dompdf->stream("archivo.pdf",array("Attachment" => 0));
 ?>
