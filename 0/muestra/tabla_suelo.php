<?php

   //Consultar la muestra registrada, convertirlos los datos extraidos en informacion entendible al usuario y  ordenarlos en una tabla
   $reg=$suelo->consultar_suelo($mysqli,$Cod_suelo);

   if ($reg[]=='1') { $tip='Suelo'; }
    if ($reg[]=='2') { $tip='Sustrato'; }
    if ($reg[]=='3') { $tip='Lixiviado'; }
    if ($reg[]=='4') { $tip='Otros'; }
    


    
    if ($reg[]=='p') { $car='Plano'; }
    if ($reg[]=='s') { $car='Semi Plano'; }
    if ($reg[]=='i') { $car='Inclinado'; }
    if ($reg[]=='x') { $car='Pendiente'; }

    if ($reg[]=='1') { $ries='Si'; }
    if ($reg[]=='0') { $ries='No'; }

    if ($reg[]=='1') { $rie='Si'; }
    if ($reg[]=='0') { $rie='No'; }

    if ($reg[]=='B') { $ren='Bueno'; }
    if ($reg[]=='R') { $ren='Regular'; }
    if ($reg[]=='M') { $ren='Malo'; }

    if ($reg[]=='1') { $rest='Si'; }
    if ($reg[]=='0') { $rest='No'; }

    $fertili = explode("|", $reg[]);

    $fer="";
    $c=", ";
    foreach($fertili as $id){ if($id=='E') { $fer='Estiercol'; }}
    foreach($fertili as $id){ if($id=='F') { if($fer == ''){ $fer='Fertilizante'; }else{ $fer .=$c.'Fertilizante'; }}}
    foreach($fertili as $id){ if($id=='C') { if($fer == ''){ $fer='Cal'; }else{ $fer .=$c.'Cal'; } }}
    
    ?>
    <table class="tcliente">
    <tr><th colspan="2"><i class="fa fa-edit"></i> Datos de la muestra de suelo</th></tr>
    <tr><th>Codigo: </th><td><?php echo $reg[0] ?></td></tr>
    <tr><th>Laboratorio: </th><td><?php echo $reg[1] ?></td></tr>
    <tr><th>Tipo: </th><td><?php echo $tip ?></td></tr>
    <tr><th>Tamaño del lote: </th><td><?php echo $reg[3] ?></td></tr>
    <tr><th>Profundidad de la Muestra: </th><td><?php echo $reg[4] ?></td></tr>
    <tr><th>Caracteristicas del terreno: </th><td><?php echo $car; ?></td></tr>
    
    <tr><th>Riego: </th><td><?php echo $rie; ?></td></tr>
    <tr><th>Cual: </th><td><?php echo $reg[8] ?></td></tr>
    <tr><th>Fecha de toma de la muestra: </th><td><?php echo $reg[9] ?></td></tr>
    
    <tr><th>Cultivo actual: </th><td><?php echo $reg[11] ?></td></tr>
    <tr><th>Edad: </th><td><?php echo $reg[12] ?></td></tr>
    <tr><th>Distancia siembra: </th><td><?php echo $reg[13] ?></td></tr>
    <tr><th>Nro de plantas: </th><td><?php echo $reg[14] ?></td></tr>
    <tr><th>Cultivo anterior: </th><td><?php echo $reg[15] ?></td></tr>
    
    
    <tr><th>Fertilizante usado: </th><td><?php echo $fer; ?></td></tr>
    <tr><th>Cantidad de fertilizante: </th><td><?php echo $reg[19] ?></td></tr>
    
    <tr><th>Finca: </th><td><?php echo $regis[2] ?></td></tr>
    <tr><th>Análisis a realizar: </th><td><?php echo $analisis; ?></td></tr>
    </table>