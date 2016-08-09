<?php
       


    //Consultar la muestra registrada, convertirlos los datos extraidos en informacion entendible al usuario y  ordenarlos en una tabla
    $reg=$muestra->consultar_muestra($mysqli,$Cod_muestra);

    if ($reg[2]=='1') { $tip='Vegetal'; }
    if ($reg[2]=='2') { $tip='De suelo'; }
    if ($reg[2]=='3') { $tip='De sustrato'; }
    if ($reg[2]=='4') { $tip='Lixiviado'; }
    if ($reg[2]=='5') { $tip='De agua'; }
    if ($reg[2]=='6') { $tip='De insectos'; }
    if ($reg[2]=='7') { $tip='otros'; }
    
    if ($reg[7]=='1') { $topo='Plano'; }
    if ($reg[7]=='2') { $topo='Semi Plano'; }
    if ($reg[7]=='3') { $topo='Ladera'; }
    if ($reg[7]=='4') { $topo='Quebrada'; }
    if ($reg[7]=='5') { $topo='Cima'; }

    if ($reg[9]=='1') { $rie='Aspersion'; }
    if ($reg[9]=='2') { $rie='Goteo'; }
    if ($reg[9]=='3') { $rie='Gravedad'; }
    if ($reg[9]=='4') { $rie='No tiene'; }

    $pr = explode("|", $reg[12]);
    $pra="";
    foreach($pr as $id){ if($id=='1') { $pra='Quimico'; }}
    foreach($pr as $id){ if($id=='2') { if($pra == ''){ $pra='Fertilizacion'; }else{ $pra .=$c.'Fertilizacion'; }}}
    foreach($pr as $id){ if($id=='3') { if($pra == ''){ $pra='Órganico'; }else{ $pra .=$c.'Órganico'; }}}


    if ($reg[18]=='1') { $ries='Si'; }
    if ($reg[18]=='0') { $ries='No'; }

    if ($reg[20]=='B') { $ren='Bueno'; }
    if ($reg[20]=='R') { $ren='Regular'; }
    if ($reg[20]=='M') { $ren='Malo'; }

    if ($reg[21]=='1') { $rest='Si'; }
    if ($reg[21]=='0') { $rest='No'; }

    $sint = explode("|", $reg[24]);
    $sin="";
    $c=", ";
    foreach($sint as $id){ if($id=='1') { $sin='Secamiento'; }}
    foreach($sint as $id){ if($id=='2') { if($sin == ''){ $sin='Callos'; }else{ $sin .=$c.'Callos'; }}}
    foreach($sint as $id){ if($id=='3') { if($sin == ''){ $sin='Defoliacion'; }else{ $sin .=$c.'Defoliacion'; }}}
    foreach($sint as $id){ if($id=='4') { if($sin == ''){ $sin='Moteado'; }else{ $sin .=$c.'Moteado'; }}}
    foreach($sint as $id){ if($id=='5') { if($sin == ''){ $sin='Enanismo'; }else{ $sin .=$c.'Enanismo'; }}}
    foreach($sint as $id){ if($id=='6') { if($sin == ''){ $sin='Amarillamiento'; }else{ $sin .=$c.'Amarillamiento'; }}}
    foreach($sint as $id){ if($id=='7') { if($sin == ''){ $sin='Malformacion'; }else{ $sin .=$c.'Malformacion'; }}}
    foreach($sint as $id){ if($id=='8') { if($sin == ''){ $sin='Mancha'; }else{ $sin .=$c.'Mancha'; }}}
    foreach($sint as $id){ if($id=='9') { if($sin == ''){ $sin='Marchitamiento'; }else{ $sin .=$c.'Marchitamiento'; }}}
    foreach($sint as $id){ if($id=='10') { if($sin == ''){ $sin='Muerte regresiva'; }else{ $sin .=$c.'Muerte regresiva'; }}}
    foreach($sint as $id){ if($id=='11') { if($sin == ''){ $sin='Gomosis'; }else{ $sin .=$c.'Gomosis'; }}}
    foreach($sint as $id){ if($id=='12') { if($sin == ''){ $sin='Otros'; }else{ $sin .=$c.'Otros'; }}}

    if ($reg[27]=='1') { $pla='Campo'; }
    if ($reg[27]=='2') { $pla='Semillero'; }
    if ($reg[27]=='3') { $pla='Invernadero'; }
    if ($reg[27]=='4') { $pla='Vivero'; }

    if ($reg[29]=='1') { $fue='Artesanal'; }
    if ($reg[29]=='2') { $fue='Certificada'; }

    if ($reg[30]=='1') { $pre='Liquido'; }
    if ($reg[30]=='2') { $pre='Biopreparado'; }
    if ($reg[30]=='3') { $pre='Polvo mojable'; }
    if ($reg[30]=='4') { $pre='Tubo'; }
    if ($reg[30]=='5') { $pre='Caja de petri'; }

    if ($reg[31]=='1') { $dis='Generalizado'; }
    if ($reg[31]=='2') { $dis='Disperso'; }
    if ($reg[31]=='3') { $dis='Sectorizado'; }
    if ($reg[31]=='4') { $dis='Zona baja'; }
    if ($reg[31]=='5') { $dis='Zona alta'; }
    if ($reg[31]=='6') { $dis='Orillas'; }

    $pa = explode("|", $reg[32]);
    $par="";
    foreach($pa as $id){ if($id=='1') { $par='Tallos o Ramas'; }}
    foreach($pa as $id){ if($id=='2') { if($par == ''){ $par='Bulbos'; }else{ $par .=$c.'Bulbos'; }}}
    foreach($pa as $id){ if($id=='3') { if($par == ''){ $par='Raices'; }else{ $par .=$c.'Raices'; }}}
    foreach($pa as $id){ if($id=='4') { if($par == ''){ $par='Hojas'; }else{ $par .=$c.'Hojas'; }}}
    foreach($pa as $id){ if($id=='5') { if($par == ''){ $par='Flores'; }else{ $par .=$c.'Flores'; }}}
    foreach($pa as $id){ if($id=='6') { if($par == ''){ $par='Semillas'; }else{ $par .=$c.'Semillas'; }}}
    foreach($pa as $id){ if($id=='7') { if($par == ''){ $par='Frutos'; }else{ $par .=$c.'Frutos'; }}}
    foreach($pa as $id){ if($id=='8') { if($par == ''){ $par='Planta entera'; }else{ $par .=$c.'Planta entera'; }}}

    if ($reg[33]=='1') { $tex='Fino'; }
    if ($reg[33]=='2') { $tex='Medio'; }
    if ($reg[33]=='3') { $tex='Grueso'; }


    if ($reg[34]=='1') { $com='Mineral'; }
    if ($reg[34]=='2') { $com='Orgánico'; }
    if ($reg[34]=='3') { $com='Sustrato'; }


    if ($reg[35]=='1') { $hum='Excesiva'; }
    if ($reg[35]=='2') { $hum='Deficiente'; }
    if ($reg[35]=='3') { $hum='Adecuada'; }

    if ($reg[36]=='1') { $dre='Bueno'; }
    if ($reg[36]=='2') { $dre='Regular'; }
    if ($reg[36]=='3') { $dre='Deficiente'; }

    $co = explode("|", $reg[37]);
    $con="";
    foreach($co as $id){ if($id=='1') { $con='Malezas'; }}
    foreach($co as $id){ if($id=='2') { if($con == ''){ $con='Plagas'; }else{ $con .=$c.'Plagas'; }}}
    foreach($co as $id){ if($id=='3') { if($con == ''){ $con='Enfermedades'; }else{ $con .=$c.'Enfermedades'; }}}
    foreach($co as $id){ if($id=='4') { if($con == ''){ $con='Agroquimicos'; }else{ $con .=$c.'Agroquimicos'; }}}
    foreach($co as $id){ if($id=='5') { if($con == ''){ $con='Biologicos'; }else{ $con .=$c.'Biologicos'; }}}
            

    ?>

    <table class="tcliente">
    <tr><th colspan="2"><i class="fa fa-edit"></i> Datos de la muestra</th></tr>
    <tr><th>Codigo: </th><td><?php echo $reg[1] ?></td></tr>
    <tr><th>Tipo de muestra: </th><td><?php echo $tip ?></td></tr>
    <tr><th>Cultivo, especie ó variedad: </th><td><?php echo $reg[3] ?></td></tr>
    <tr><th>Nro de plantas: </th><td><?php echo $reg[4] ?></td></tr>
    <tr><th>Edad del cultivo: </th><td><?php echo $reg[5] ?></td></tr>
    <tr><th>Tamaño del lote: </th><td><?php echo $reg[6] ?></td></tr>
    <tr><th>Topografia del terreno: </th><td><?php echo $topo ?></td></tr>
    <tr><th>Distancia siembra: </th><td><?php echo $reg[8] ?></td></tr>
    <tr><th>Riego: </th><td><?php echo $rie ?></td></tr>
    <tr><th>Cultivo anterior: </th><td><?php echo $reg[10] ?></td></tr>
    <tr><th>Fecha de toma de la muestra: </th><td><?php echo $reg[11] ?></td></tr>
    <tr><th>Practicas realizadas: </th><td><?php echo $pra ?></td></tr>
    <tr><th>Productos utilizados y dosis: </th><td><?php echo $reg[13] ?></td></tr>
    <tr><th>Epoca de aplicacion: </th><td><?php echo $reg[14] ?></td></tr>
    <tr><th>Modo de aplicacion: </th><td><?php echo $reg[15] ?></td></tr>
    <tr><th>Poblacion más cercana: </th><td><?php echo $reg[16] ?></td></tr>
    <tr><th>Profundidad de la Muestra: </th><td><?php echo $reg[17] ?></td></tr>
    <tr><th>Riesgo de inundacion: </th><td><?php echo $ries; ?></td></tr>
    <tr><th>Tipo de vegetacion: </th><td><?php echo $reg[19] ?></td></tr>
    <tr><th>Rendimiento del cultivo: </th><td><?php echo $ren; ?></td></tr>
    <tr><th>Restos de cosecha: </th><td><?php echo $rest; ?></td></tr>
    <tr><th>Descripcion: </th><td><?php echo $reg[22] ?></td></tr>
    <tr><th>Identificacion del microorganismo: </th><td><?php echo $reg[23] ?></td></tr>
    <tr><th>Sintomas: </th><td><?php echo $sin ?></td></tr>   
    <tr><th>Fecha de inicio de la sintomatologia: </th><td><?php echo $reg[25] ?></td></tr>
    <tr><th>Daños causados por: </th><td><?php echo $reg[26] ?></td></tr>
    <tr><th>Tipo de plantacion: </th><td><?php echo $pla ?></td></tr>
    <tr><th>Nro de submuestra: </th><td><?php echo $reg[28] ?></td></tr>    
    <tr><th>Fuente de la semilla: </th><td><?php echo $fue ?></td></tr>
    <tr><th>presentacion del microorganismo: </th><td><?php echo $pre ?></td></tr>
    <tr><th>distribucion de las plantas afectadas: </th><td><?php echo $dis ?></td></tr>
    <tr><th>Partes afectadas: </th><td><?php echo $par ?></td></tr>    
    <tr><th>Textura de suelo: </th><td><?php echo $tex ?></td></tr>
    <tr><th>Composicion del suelo: </th><td><?php echo $com ?></td></tr>
    <tr><th>Humedad del suelo: </th><td><?php echo $hum ?></td></tr>
    <tr><th>Drenaje: </th><td><?php echo $dre ?></td></tr>
    <tr><th>Control de: </th><td><?php echo $con ?></td></tr>
    <tr><th>Productos utilizados y dosis: </th><td><?php echo $reg[38] ?></td></tr>
    <tr><th>Condiciones agroclimaticas: </th><td><?php echo $reg[39] ?></td></tr>
    <tr><th>Observaciones: </th><td><?php echo $reg[40] ?></td></tr>
    <tr><th>Análisis a realizar para suelo: </th><td><?php echo $analisis1; ?></td></tr>
    <tr><th>Análisis a realizar fitopatologia: </th><td><?php echo $analisis2; ?></td></tr>

    </table>