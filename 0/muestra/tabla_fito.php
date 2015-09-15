<?php
    $reg=$fito->consultar_fito($mysqli,$Cod_fito);

    if ($reg[2]=='1') { $tip='Vegetal'; }
    if ($reg[2]=='2') { $tip='De suelo'; }
    if ($reg[2]=='3') { $tip='De sustrato'; }
    if ($reg[2]=='4') { $tip='De agua'; }
    if ($reg[2]=='5') { $tip='De insectos'; }


    $sint = explode("|", $reg[9]);
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


    if ($reg[12]=='1') { $pla='Campo'; }
    if ($reg[12]=='2') { $pla='Semillero'; }
    if ($reg[12]=='3') { $pla='Invernadero'; }
    if ($reg[12]=='4') { $pla='Vivero'; }


    if ($reg[17]=='1') { $fue='Artesanal'; }
    if ($reg[17]=='2') { $fue='Certificada'; }



    if ($reg[18]=='1') { $pre='Liquido'; }
    if ($reg[18]=='2') { $pre='Biopreparado'; }
    if ($reg[18]=='3') { $pre='Polvo mojable'; }
    if ($reg[18]=='4') { $pre='Tubo'; }
    if ($reg[18]=='5') { $pre='Caja de petri'; }

    if ($reg[19]=='1') { $dis='Generalizado'; }
    if ($reg[19]=='2') { $dis='Disperso'; }
    if ($reg[19]=='3') { $dis='Sectorizado'; }
    if ($reg[19]=='4') { $dis='Zona baja'; }
    if ($reg[19]=='5') { $dis='Zona alta'; }
    if ($reg[19]=='6') { $dis='Orillas'; }
            

    $pa = explode("|", $reg[20]);
    $par="";
    foreach($pa as $id){ if($id=='1') { $par='Tallos o Ramas'; }}
    foreach($pa as $id){ if($id=='2') { if($par == ''){ $par='Bulbos'; }else{ $par .=$c.'Bulbos'; }}}
    foreach($pa as $id){ if($id=='3') { if($par == ''){ $par='Raices'; }else{ $par .=$c.'Raices'; }}}
    foreach($pa as $id){ if($id=='4') { if($par == ''){ $par='Hojas'; }else{ $par .=$c.'Hojas'; }}}
    foreach($pa as $id){ if($id=='5') { if($par == ''){ $par='Flores'; }else{ $par .=$c.'Flores'; }}}
    foreach($pa as $id){ if($id=='6') { if($par == ''){ $par='Semillas'; }else{ $par .=$c.'Semillas'; }}}
    foreach($pa as $id){ if($id=='7') { if($par == ''){ $par='Frutos'; }else{ $par .=$c.'Frutos'; }}}
    foreach($pa as $id){ if($id=='8') { if($par == ''){ $par='Planta entera'; }else{ $par .=$c.'Planta entera'; }}}
            

    if ($reg[21]=='1') { $rie='Aspersion'; }
    if ($reg[21]=='2') { $rie='Goteo'; }
    if ($reg[21]=='3') { $rie='Gravedad'; }
    if ($reg[21]=='4') { $rie='No tiene'; }

    if ($reg[22]=='1') { $topo='Plano'; }
    if ($reg[22]=='2') { $topo='Semiplano'; }
    if ($reg[22]=='3') { $topo='Ladera'; }
    if ($reg[22]=='4') { $topo='Quebrada'; }
    if ($reg[22]=='5') { $topo='Cima'; }


    if ($reg[23]=='1') { $tex='Fino'; }
    if ($reg[23]=='2') { $tex='Medio'; }
    if ($reg[23]=='3') { $tex='Grueso'; }


    if ($reg[24]=='1') { $com='Mineral'; }
    if ($reg[24]=='2') { $com='Orgánico'; }
    if ($reg[24]=='3') { $com='Sustrato'; }


    if ($reg[25]=='1') { $hum='Excesiva'; }
    if ($reg[25]=='2') { $hum='Deficiente'; }
    if ($reg[25]=='3') { $hum='Adecuada'; }


    if ($reg[26]=='1') { $dre='Bueno'; }
    if ($reg[26]=='2') { $dre='Regular'; }
    if ($reg[26]=='3') { $dre='Deficiente'; }


    $pr = explode("|", $reg[27]);
    $pra="";
    foreach($pr as $id){ if($id=='1') { $pra='Quimico'; }}
    foreach($pr as $id){ if($id=='2') { if($pra == ''){ $pra='Fertilizacion'; }else{ $pra .=$c.'Fertilizacion'; }}}
    foreach($pr as $id){ if($id=='3') { if($pra == ''){ $pra='Órganico'; }else{ $pra .=$c.'Órganico'; }}}


    $co = explode("|", $reg[29]);
    $con="";
    foreach($co as $id){ if($id=='1') { $con='Malezas'; }}
    foreach($co as $id){ if($id=='2') { if($con == ''){ $con='Plagas'; }else{ $con .=$c.'Plagas'; }}}
    foreach($co as $id){ if($id=='3') { if($con == ''){ $con='Enfermedades'; }else{ $con .=$c.'Enfermedades'; }}}
    foreach($co as $id){ if($id=='4') { if($con == ''){ $con='Agroquimicos'; }else{ $con .=$c.'Agroquimicos'; }}}
    foreach($co as $id){ if($id=='5') { if($con == ''){ $con='Biologicos'; }else{ $con .=$c.'Biologicos'; }}}
            

    ?>

    <table class="tcliente">
    <tr><th colspan="2"><i class="fa fa-edit"></i> Datos de la muestra de Fitopatologia</th></tr>
    <tr><th>Codigo: </th><td><?php echo $reg[0] ?></td></tr>
    <tr><th>Tipo de muestra: </th><td><?php echo $tip ?></td></tr>
    <tr><th>Descripcion: </th><td><?php echo $reg[3] ?></td></tr>
    <tr><th>Cultivo, especie ó variedad: </th><td><?php echo $reg[4] ?></td></tr>
    <tr><th>Edad del cultivo: </th><td><?php echo $reg[5] ?></td></tr>
    <tr><th>Fecha de coleccion: </th><td><?php echo $reg[6] ?></td></tr>
    <tr><th>Poblacion más cercana: </th><td><?php echo $reg[7] ?></td></tr>
    <tr><th>Identificacion del microorganismo: </th><td><?php echo $reg[8] ?></td></tr>
    <tr><th>Sintomas: </th><td><?php echo $sin ?></td></tr>
    <tr><th>Fecha de inicio de la sintomatologia: </th><td><?php echo $reg[10] ?></td></tr>
    <tr><th>Daños causados por: </th><td><?php echo $reg[11] ?></td></tr>
    <tr><th>Tipo de plantacion: </th><td><?php echo $pla ?></td></tr>
    <tr><th>Tamaño de plantacion: </th><td><?php echo $reg[13] ?></td></tr>
    <tr><th>Nro de plantas: </th><td><?php echo $reg[14] ?></td></tr>
    <tr><th>Nro de submuestra: </th><td><?php echo $reg[15] ?></td></tr>
    <tr><th>Distancia: </th><td><?php echo $reg[16] ?></td></tr>
    <tr><th>Fuente de la semilla: </th><td><?php echo $fue ?></td></tr>
    <tr><th>presentacion del microorganismo: </th><td><?php echo $pre ?></td></tr>
    <tr><th>distribucion de las plantas afectadas: </th><td><?php echo $dis ?></td></tr>
    <tr><th>Partes afectadas: </th><td><?php echo $par ?></td></tr>
    <tr><th>Riego: </th><td><?php echo $rie ?></td></tr>
    <tr><th>Topografia del terreno: </th><td><?php echo $topo ?></td></tr>
    <tr><th>Textura de suelo: </th><td><?php echo $tex ?></td></tr>
    <tr><th>Composicion del suelo: </th><td><?php echo $com ?></td></tr>
    <tr><th>Humedad del suelo: </th><td><?php echo $hum ?></td></tr>
    <tr><th>Drenaje: </th><td><?php echo $dre ?></td></tr>
    <tr><th>Practicas realizadas: </th><td><?php echo $pra ?></td></tr>
    <tr><th>Productos utilizados y dosis: </th><td><?php echo $reg[28] ?></td></tr>
    <tr><th>Control de: </th><td><?php echo $con ?></td></tr>
    <tr><th>Productos utilizados y dosis: </th><td><?php echo $reg[30] ?></td></tr>
    <tr><th>Cultivo anterior: </th><td><?php echo $reg[31] ?></td></tr>
    <tr><th>Condiciones agroclimaticas: </th><td><?php echo $reg[32] ?></td></tr>
    <tr><th>Observaciones: </th><td><?php echo $reg[33] ?></td></tr>
    <tr><th>Análisis a realizar: </th><td><?php echo $analisis; ?></td></tr>
    </table>