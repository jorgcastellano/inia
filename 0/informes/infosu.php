<?php
  require_once("dompdf/dompdf_config.inc.php");
  include_once '../../system/class.php';

  extract($_POST);

  $objinformes = new solicitud();
  $datosSolicitud = $objinformes -> consulta($mysqli, $cod_sol_final);
  $datosSolicitud = $datosSolicitud->fetch_array();

  $objcliente = new cliente();
  $datosCliente = $objcliente->consultar_cliente($mysqli,$datosSolicitud[2]);

$html='
<html><body>
    <link rel="stylesheet" type="text/css" href="info.css">
    <header>
   <div class="prin">
   <img src="logosInfo/logo.png">
   </div>
       <div class="tres">
          <p>INFORME DE RESULTADOS DE ENSAYOS-LABORATORIO DE SUELOS INIA MÉRIDA</p>
   </div>
 </header>
 <table class="info" border="1">
      <tr>
          <td colspan="4">Datos del Cliente</td>
          <td colspan="8" >Datos del Iinforme</td>
      </tr>
      <tr>
          <td >Nombre:</td>
          <td colspan="3">'.$datosCliente[2].' '.$datosCliente[3].'</td>
          <td colspan="4">Fecha de Recepción de Ítem(s):</td>
          <td colspan="4">'.$datosSolicitud[4].'</td>
      </tr>
      <tr>
          <td>Dirección:</td>
          <td colspan="3">'.$datosCliente[6].'</td>
          <td colspan="4">Código:</td>
          <td colspan="4">IRE-'.$cod_sol_final.'</td>
      </tr>
      <tr>
          <td>Telefono:</td>
          <td>'.$datosCliente[5].'</td>
          <td >CI/RIF:</td>
          <td>'.$datosCliente[7].'-'.$datosCliente[1].'</td>
          <td  colspan="3">Centro:</td>
          <td colspan="5">Mérida</td>
      </tr>
      <tr>
          <td>Persona de contacto:</td>
          <td colspan="3">'.$datosCliente[4].'</td>
          <td colspan="2">Laboratorio:</td>
          <td colspan="6">SUELO</td>
      </tr>
      <tr>
          <td>Correo Electrónico:</td>
          <td colspan="3"> - - </td>
          <td colspan="2">Contrato:</td>
          <td colspan="6"> - - </td>
      </tr>
      <tr>
          <td colspan="12">Análisis con fines de fertilidad</td>
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
          <td colspan="2">SUELO</td>
          <td colspan="2">SUELO</td>
          <td colspan="2">SUELO</td>
          <td colspan="2">SUELO</td>
          <td colspan="2">SUELO</td>
      </tr>
      <tr>
          <td colspan="2">M-1</td>
          <td colspan="2">M-2</td>
          <td colspan="2">M-3</td>
          <td colspan="2">M-4</td>
          <td colspan="2">M-5</td>
      </tr>
      <tr>';

      $objmuestras = new solicitud_analisis();
      $listadoMuestras = $objmuestras -> consultar_sa($mysqli, $cod_sol_final);
      $j=0;
      $temp = "";
      $muestrasUnicas = array();
      while($result111 = $listadoMuestras -> fetch_array()) {
        if($result111[3] != $temp) {
          $html .= '<td colspan="2">'.$result111[3].'</td>';
          $muestrasUnicas[$j] = $result111[3];
          $j++;
        }
        $temp = $result111[3];
      }
      for($i = 0; $i < (5 - $j); $i++)
        $html .= '<td colspan="2"></td>';

      $html .= '
      </tr>
      <tr>
          <td colspan="12">ANALISIS FISICO</td>
      </tr>
      <tr>';

      $objmuestra = new muestra();
      $datosMuestra = $objmuestra -> consultar_muestra($mysqli, $muestrasUnicas[0]); //Con el codigo de la muestra
      $espAsignado = $objmuestra -> consultar_muestra_especialista($mysqli, $datosMuestra[0], 2); //Tenemos la id de la muestra|
      $espAsignado = $espAsignado -> fetch_array();

      $objespecialista = new especialista();
      $datosEsp = $objespecialista -> consulta($mysqli, $espAsignado[2]);
      $datosEsp = $datosEsp -> fetch_array();

      $rMuestras = new r_suelo();
      $m1 = $rMuestras -> consultar_r_muestra_s($mysqli, $muestrasUnicas[0]);
      $m2 = $rMuestras -> consultar_r_muestra_s($mysqli, $muestrasUnicas[1]);
      $m3 = $rMuestras -> consultar_r_muestra_s($mysqli, $muestrasUnicas[2]);
      $m4 = $rMuestras -> consultar_r_muestra_s($mysqli, $muestrasUnicas[3]);
      $m5 = $rMuestras -> consultar_r_muestra_s($mysqli, $muestrasUnicas[4]);
      $html .= '
          <td>%Arena</td>
          <td>SGCL-IA-009</td>
          <td colspan="2">'.$m1[3].'</td>
          <td colspan="2">'.$m2[3].'</td>
          <td colspan="2">'.$m3[3].'</td>
          <td colspan="2">'.$m4[3].'</td>
          <td colspan="2">'.$m5[3].'</td>
      </tr>
      <tr>
          <td>%Limo</td>
          <td >SGCL-IA-009</td>
          <td colspan="2">'.$m1[4].'</td>
          <td colspan="2">'.$m2[4].'</td>
          <td colspan="2">'.$m3[4].'</td>
          <td colspan="2">'.$m4[4].'</td>
          <td colspan="2">'.$m5[4].'</td>
      </tr>
      <tr>
          <td>%Arcilla</td>
          <td>SGCL-IA-009</td>
          <td colspan="2">'.$m1[5].'</td>
          <td colspan="2">'.$m2[5].'</td>
          <td colspan="2">'.$m3[5].'</td>
          <td colspan="2">'.$m4[5].'</td>
          <td colspan="2">'.$m5[5].'</td>
      </tr>
      <tr>
          <td>Textura (Bouyoucos)</td>
          <td>SGCL-IA-009</td>
          <td colspan="2">'.$m1[6].'</td>
          <td colspan="2">'.$m2[6].'</td>
          <td colspan="2">'.$m3[6].'</td>
          <td colspan="2">'.$m4[6].'</td>
          <td colspan="2">'.$m5[6].'</td>
      </tr>
      <tr>
          <td colspan="12">ANÁLISIS QUÍMICO</td>
      </tr>
      <tr>
          <td>Fósforo Olsen (ppm)</td>
          <td>SGCL-IA-001</td>
          <td>'.$m1[8].'</td>
          <td>'.$m1[9].'</td>
          <td>'.$m2[8].'</td>
          <td>'.$m2[9].'</td>
          <td>'.$m3[8].'</td>
          <td>'.$m3[9].'</td>
          <td>'.$m4[8].'</td>
          <td>'.$m4[9].'</td>
          <td>'.$m5[8].'</td>
          <td>'.$m5[9].'</td>
      </tr>
      <tr>
          <td>Potasio Olsen (ppm)</td>
          <td>SGCL-IA-005</td>
          <td>'.$m1[10].'</td>
          <td>'.$m1[11].'</td>
          <td>'.$m2[10].'</td>
          <td>'.$m2[11].'</td>
          <td>'.$m3[10].'</td>
          <td>'.$m3[11].'</td>
          <td>'.$m4[10].'</td>
          <td>'.$m4[11].'</td>
          <td>'.$m5[10].'</td>
          <td>'.$m5[11].'</td>
      </tr>
      <tr>
          <td>Calcio Morgan  (ppm)</td>
          <td>SGCL-IA-007</td>
          <td>'.$m1[12].'</td>
          <td>'.$m1[13].'</td>
          <td>'.$m2[12].'</td>
          <td>'.$m2[13].'</td>
          <td>'.$m3[12].'</td>
          <td>'.$m3[13].'</td>
          <td>'.$m4[12].'</td>
          <td>'.$m4[13].'</td>
          <td>'.$m5[12].'</td>
          <td>'.$m5[13].'</td>
      </tr>
      <tr>
          <td>Magnesio Morgan (ppm)</td>
          <td>SGCL-IA-006</td>
          <td>'.$m1[14].'</td>
          <td>'.$m1[15].'</td>
          <td>'.$m2[14].'</td>
          <td>'.$m2[15].'</td>
          <td>'.$m3[14].'</td>
          <td>'.$m3[15].'</td>
          <td>'.$m4[14].'</td>
          <td>'.$m4[15].'</td>
          <td>'.$m5[14].'</td>
          <td>'.$m5[15].'</td>
      </tr>
      <tr>
          <td>%  Materia Orgánica (Walkley-Black)</td>
          <td>SGCL-IA-010</td>
          <td>'.$m1[16].'</td>
          <td>'.$m1[17].'</td>
          <td>'.$m2[16].'</td>
          <td>'.$m2[17].'</td>
          <td>'.$m3[16].'</td>
          <td>'.$m3[17].'</td>
          <td>'.$m4[16].'</td>
          <td>'.$m4[17].'</td>
          <td>'.$m5[16].'</td>
          <td>'.$m5[17].'</td>
      </tr>
      <tr>
          <td>pH 1:2,5</td>
          <td>SGCL-IA-002</td>
          <td>'.$m1[18].'</td>
          <td>'.$m1[19].'</td>
          <td>'.$m2[18].'</td>
          <td>'.$m2[19].'</td>
          <td>'.$m3[18].'</td>
          <td>'.$m3[19].'</td>
          <td>'.$m4[18].'</td>
          <td>'.$m4[19].'</td>
          <td>'.$m5[18].'</td>
          <td>'.$m5[19].'</td>
      </tr>
      <tr>
          <td>Conductividad Eléctrica dS*m-1</td>
          <td>SGCL-IA-008</td>
          <td>'.$m1[20].'</td>
          <td>'.$m1[21].'</td>
          <td>'.$m2[20].'</td>
          <td>'.$m2[21].'</td>
          <td>'.$m3[20].'</td>
          <td>'.$m3[21].'</td>
          <td>'.$m4[20].'</td>
          <td>'.$m4[21].'</td>
          <td>'.$m5[20].'</td>
          <td>'.$m5[21].'</td>
      </tr>
      <tr>
          <td>Aluminio (meq/100 g suelo)</td>
          <td>Manual de Laboratorio</td>
          <td>'.$m1[22].'</td>
          <td>'.$m1[23].'</td>
          <td>'.$m2[22].'</td>
          <td>'.$m2[23].'</td>
          <td>'.$m3[22].'</td>
          <td>'.$m3[23].'</td>
          <td>'.$m4[22].'</td>
          <td>'.$m4[23].'</td>
          <td>'.$m5[22].'</td>
          <td>'.$m5[23].'</td>
      </tr>
      <tr>
          <td colspan="2">Cultivo</td>
          <td colspan="10">'.$datosMuestra[3].'</td>
      </tr>
      <tr>
          <td colspan="3"><b>FECHA DE REALIZACIÓN DE ENSAYOS:</b></td>
          <td><b>Inicio:</b></td>
          <td colspan="2"></td>
          <td><b>Final</b></td>
          <td colspan="5"></td>
      </tr>
      <tr>
          <td colspan="3"><b>NOMBRE Y APELLIDO DEL JEFE DEL LABORATORIO:</b></td>
          <td colspan="9">'.$datosEsp[2].' '.$datosEsp[3].'</td>
      </tr>
      <tr>
          <td colspan="3"><b>FIRMA DEL JEFE DEL LABORATORIO:</b></td>
          <td colspan="9"></td>
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
            <td><b>Textura Gruesa:</b>     a: arenoso, aF: arena-francosa, Fa: franco-arenoso.</td>
        </tr>
        <tr>
            <td><b>Textura Media:</b> FAa: franco-arcillo-arenoso, F: franco, FL: franco-limoso, FA: franco-arcilloso, Aa: arcillo-arenoso, L: limoso.</td>
        </tr>
        <tr>
            <td><b>Textura Fina:</b> A: arcilloso, AL: arcillo-limoso, FAL: franco-arcillo-limoso.</td>
        </tr>
        <tr>
            <td><b>Rangos:</b> A: alto,  M: medio,  B: bajo.</td>
        </tr>
        <tr>
            <td><b>pH:</b> a: ácido, ma: moderadamente ácido, N: neutro, mA: moderadamente alcalino, A: alcalino.</td>
        </tr>
        <tr>
            <td><b>Conductividad Eléctrica (CE):</b>  n: normal, an: anormal.</td>
        </tr>
 </table>
 <div class="ulti">
 <p><center>DIRECCIÓN: Av. URDANETA EDIFICIO INIA-MÉRIDA, MÉRIDA EDO. MÉRIDA. TELEFAX: (58 274) 2630090 / 2637941. www.inia.gob.ve</center></p>
</div>
</body>
</html>';
$html=utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper("A4","portrait");
$dompdf->render();
$dompdf->stream("archivo.pdf",array("Attachment" => 0));
 ?>
