<?php
  require_once("dompdf/dompdf_config.inc.php");
$html='
<html>'.
'	<body>
<link rel="stylesheet" type="text/css" href="reco.css">
<header>
<img src="logosInfo/img.jpg">

   <div class="tres">
      <p>INFORME  TECNICO DE RECOMENDACIONES<br/>
       LABORATORIO DE SUELO<br/>
       INIA-MÉRIDA</p>
</div>
<div class="reco1">

    <p><b>Recomendaciones al Item de ensayo Nº VARIABLE</b><p>
    <div class="reco2">

        <p><b>Recomendaciones:</b><p>
          <textarea></textarea>
        </div>
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
