<?php

require_once("dompdf/dompdf_config.inc.php");

$html='
<html>'. 	
	'<body>
	 <link rel="stylesheet" type="text/css" href="tablas.css">
	 <header>
	 	<div class="ima">
	 		<img src="logos/logo2.png">
		</div>
	 </header>
  	 <p class="ti">INFORME  TECNICO DE RESULTADOS Y RECOMENDACIONES <br />
   	 LABORATORIO DE FITOPATOLOGÌA <br />
    	SERVICIO DE DIAGNOSTICO DE  ENFERMEDADES INIA-MÉRIDA</p>
		<table class="uno"  border="1" cellpadding="0" cellspacing="0">
			<tr>
				<th>  DATOS DEL USUARIO/ CONTRATANTE       </th>
				<th>SOLICITUD/ CONTRATO   </th>
			</tr>
			<tr>
				<td rowspan="2">NOMBRE Y APELLIDOS: Variable</td>
					<td>FECHA: Variable</td>
			</tr>
			<tr>
				<td>CODIGO: VAriable</td>
			</tr>
			<tr>
				<td>DIRECCION: Variable</td>
				<td>CENTRO: Variable</td>
			</tr>
	 		<tr>
	 			<td>NOMBRE DE LA FINCA: VAriable</td>
				<td>LABORATORIO: VAriable</td>
			</tr>
			<tr>
				<td> PERSONA DE CONTACTO: Variable  </td>
				<td>FACT. CONTROL: variable jorge   </td>
			</tr>
			<tr>
				<td> C.I: Variable  </td>
				<td>TElEFONO: variable</td>
			</tr>
			<tr><td colspan="2">CORREO ELECTRONICO:</td> </tr>
		</table >
		<br />
		<div class="ine">
				<p>Material analisado<p>	
			
					<table class="tab"  border="1" cellpadding="0" cellspacing="0">
						<tr>
							
								<th >Tipo de Muestra</th>	
								<th>Identificacion</th>	
								<th>Item de Ensayo</th>	
								<th>Cultivo</th>
								<th>Edad</th>
								
						</tr>
						<tr>
							
								<td>Variable</td>	
								<td>Variable</td>	
								<td>Variable</td>	
								<td>Variable</td>
								<td>Variable</td>
								
						</tr>
						
					</table>
					<br />
				<p>Metodo Utilizado: VARIABLE<p>
				<p>Fecha de Recepcion:  VARIABLE<p>
				<p>Fecha de Analisis: Variable<p>
		</div>
		<br />
			<div class="ine">
				<p>Resultados<p>	
			</div>
			<br /> 
					<table class="ope" >
						<tr>
							
								<th>TAI: Variable UrbinaCoordinadora del 
								Laboratorio de Fitopatologìa</th>	
								<th>Inv. Variable</th>	
								<th>Inv. Variable</th>	
						</tr>
						<tr>
							
								<th>Inv. Zunilde LugoNematología</th>	
								<td></td>
							<td></td>
								
						</tr>
						<tr>
								<td>Recibido por: </td>	
								<td>C.I</td>
								<td>Fecha</td>
						</tr>
						
						<tr>
						<td  align= "center" colspan="3">Los resultados del análisis corresponden únicamente a las muestras consignadas. El presente informe no presenta enmienda ni tachadura</td>
  					</tr>
					</table>
						<br /><br />
					<p>Recomendaciones al Item de ensayo Nº VARIABLE</p>
					<br /><br />	<br /><br />	<br /><br />
					<section>
					<p>Recomendaciones para el cultivo de cambur  cobrero establecido:</p>
					<br />
					<p>VARIABLE</p>
					</section>

					<p align="center"> Nombre del ing</p>
					<br />
					<p align="center">Los resultados del análisis corresponden únicamente a las muestras consignadas.
 <br />El presente informe no presenta enmienda ni tachadura.</p>
</body>
</html>';

$html=utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$canvas = $dompdf->get_canvas();
   $footer = $canvas->open_object();
   		$w = $canvas->get_width();
		$h = $canvas->get_height();
		$font = Font_Metrics::get_font("arial", "bold");
		$canvas->page_text($w - 553, $h - 78, "____________________________________________________________________________________________________________________________________________________________________", $font, 6, array(0,0,0)); 
		$canvas->page_text($w - 550, $h - 70, "El Instituto Nacional de Investigaciones Agrícolas, antes FONAIAP,  es un instituto autónomo adscrito al Ministerio del Poder Popular para la Agricultura y Tierras,  dedicado a la investigación científica", $font, 6, array(0,0,0)); 
		$canvas->page_text($w - 530, $h - 63, " agrícola, desarrollo tecnológico, asesoramiento y prestación de servicios especializados.  Dirección: Presidencia: Av. Universidad. Esquina El Chorro. Torre MCT. Piso 08. La Hoyada. Caracas -", $font, 6, array(0,0,0)); 
		$canvas->page_text($w - 530, $h - 56, "Venezuela. Teléfonos (58 212) 5646466 - 5640355 - 5643862. Fax (58 212) 2103681.  Gerencia General: Av. Universidad, vía El Limón, Maracay, Estado Aragua, Teléfonos (58 243) 2404911 -", $font, 6, array(0,0,0)); 
		$canvas->page_text($w - 500, $h - 49, " 2404642 - 2404772 – 2404762. Fax (58 243) 2404732. INIA Mérida: Av Urdaneta Edif. INIA-Mérida, Mérida estado Mérida. Telefax: (58 274) 2630090 / 2637941 ", $font, 6, array(0,0,0)); 
	 $canvas->close_object();
    $canvas->add_object($footer, "all");

$dompdf->stream("ejemplo.php",array("Attachment" => 0));
?>
