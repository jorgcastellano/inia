<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Detalles</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
				<hgroup>
					<h1>Detalles de la muestra</h1>
				</hgroup>
			</div>
            <?php
                    extract($_POST);//extraer variables del formulario de muestras
                    require_once '../../system/class.php';//Libreria que contiene las clases con sus procedimientos
                    //guardar analisis asignados en una cadena para posteriormente mostralos
                    foreach ($_POST['Cod_muestra'] as $valor) {  }
                    $Cod_muestra=$valor;
                    $muestra= new muestra();
                    $reg=$muestra->consultar_muestra($mysqli,$Cod_muestra);
                    $sa= new solicitud_analisis();
                    $reg2=$sa-> consultar_sam($mysqli,$Cod_muestra);
                    $analisis1='';
                    $j=", ";
                    while ($res2 = $reg2->fetch_array()) :
                            if(empty($analisis1))
                                $analisis1=$res2[5];
                            else
                                $analisis1 .= $j.$res2[5];
                    endwhile;
                    //Consultar la muestra registrada, convertirlos los datos extraidos en informacion entendible al usuario y  ordenarlos en una tabla
                    if ($reg[2]=='1') { $tip='Vegetal';     }
                    if ($reg[2]=='2') { $tip='De suelo';    }
                    if ($reg[2]=='3') { $tip='De sustrato'; }
                    if ($reg[2]=='4') { $tip='Lixiviado';   }
                    if ($reg[2]=='5') { $tip='De agua';     }
                    if ($reg[2]=='6') { $tip='De insectos'; }
                    if ($reg[2]=='7') { $tip='otros';       }

                    if ($reg[7]=='1') { $topo='Plano';      }
                    if ($reg[7]=='2') { $topo='Semi Plano'; }
                    if ($reg[7]=='3') { $topo='Ladera';     }
                    if ($reg[7]=='4') { $topo='Quebrada';   }
                    if ($reg[7]=='5') { $topo='Cima';       }

                    if ($reg[9]=='1') { $rie='Aspersion';   }
                    if ($reg[9]=='2') { $rie='Goteo';       }
                    if ($reg[9]=='3') { $rie='Gravedad';    }
                    if ($reg[9]=='4') { $rie='No tiene';    }

                    $pr = explode("|", $reg[12]);
                    $pra="";
                    $c=", ";
                    foreach($pr as $id){ if($id=='1') { $pra='Quimico'; }}
                    foreach($pr as $id){ if($id=='2') { if($pra == ''){ $pra='Fertilizacion'; }else{ $pra .=$c.'Fertilizacion'; }}}
                    foreach($pr as $id){ if($id=='3') { if($pra == ''){ $pra='Órganico'; }else{ $pra .=$c.'Órganico'; }}}


                    if ($reg[18]=='1') { $ries='Si'; }
                    if ($reg[18]=='0') { $ries='No'; }

                    if ($reg[20]=='B') { $ren='Bueno';    }
                    if ($reg[20]=='R') { $ren='Regular';  }
                    if ($reg[20]=='M') { $ren='Malo';     }

                    if ($reg[21]=='1') { $rest='Si'; }
                    if ($reg[21]=='0') { $rest='No'; }

                    $sint = explode("|", $reg[24]);
                    $sin="";

                    foreach($sint as $id){ if($id=='1') { $sin='Secamiento'; }}
                    foreach($sint as $id){ if($id=='2') { if($sin == ''){ $sin='Callos'; }else{ $sin .=$c.'Callos';                       }}}
                    foreach($sint as $id){ if($id=='3') { if($sin == ''){ $sin='Defoliacion'; }else{ $sin .=$c.'Defoliacion';             }}}
                    foreach($sint as $id){ if($id=='4') { if($sin == ''){ $sin='Moteado'; }else{ $sin .=$c.'Moteado';                     }}}
                    foreach($sint as $id){ if($id=='5') { if($sin == ''){ $sin='Enanismo'; }else{ $sin .=$c.'Enanismo';                   }}}
                    foreach($sint as $id){ if($id=='6') { if($sin == ''){ $sin='Amarillamiento'; }else{ $sin .=$c.'Amarillamiento';       }}}
                    foreach($sint as $id){ if($id=='7') { if($sin == ''){ $sin='Malformacion'; }else{ $sin .=$c.'Malformacion';           }}}
                    foreach($sint as $id){ if($id=='8') { if($sin == ''){ $sin='Mancha'; }else{ $sin .=$c.'Mancha';                       }}}
                    foreach($sint as $id){ if($id=='9') { if($sin == ''){ $sin='Marchitamiento'; }else{ $sin .=$c.'Marchitamiento';       }}}
                    foreach($sint as $id){ if($id=='10') { if($sin == ''){ $sin='Muerte regresiva'; }else{ $sin .=$c.'Muerte regresiva';  }}}
                    foreach($sint as $id){ if($id=='11') { if($sin == ''){ $sin='Gomosis'; }else{ $sin .=$c.'Gomosis';                    }}}
                    foreach($sint as $id){ if($id=='12') { if($sin == ''){ $sin='Otros'; }else{ $sin .=$c.'Otros';                        }}}

                    if ($reg[27]=='1') { $pla='Campo';        }
                    if ($reg[27]=='2') { $pla='Semillero';    }
                    if ($reg[27]=='3') { $pla='Invernadero';  }
                    if ($reg[27]=='4') { $pla='Vivero';       }

                    if ($reg[29]=='1') { $fue='Artesanal';    }
                    if ($reg[29]=='2') { $fue='Certificada';  }

                    if ($reg[30]=='1') { $pre='Liquido';        }
                    if ($reg[30]=='2') { $pre='Biopreparado';   }
                    if ($reg[30]=='3') { $pre='Polvo mojable';  }
                    if ($reg[30]=='4') { $pre='Tubo';           }
                    if ($reg[30]=='5') { $pre='Caja de petri';  }

                    if ($reg[31]=='1') { $dis='Generalizado'; }
                    if ($reg[31]=='2') { $dis='Disperso';     }
                    if ($reg[31]=='3') { $dis='Sectorizado';  }
                    if ($reg[31]=='4') { $dis='Zona baja';    }
                    if ($reg[31]=='5') { $dis='Zona alta';    }
                    if ($reg[31]=='6') { $dis='Orillas';      }

                    $pa = explode("|", $reg[32]);
                    $par="";
                    foreach($pa as $id){ if($id=='1') { $par='Tallos o Ramas';                                                  }}
                    foreach($pa as $id){ if($id=='2') { if($par == ''){ $par='Bulbos'; }else{ $par .=$c.'Bulbos';               }}}
                    foreach($pa as $id){ if($id=='3') { if($par == ''){ $par='Raices'; }else{ $par .=$c.'Raices';               }}}
                    foreach($pa as $id){ if($id=='4') { if($par == ''){ $par='Hojas'; }else{ $par .=$c.'Hojas';                 }}}
                    foreach($pa as $id){ if($id=='5') { if($par == ''){ $par='Flores'; }else{ $par .=$c.'Flores';               }}}
                    foreach($pa as $id){ if($id=='6') { if($par == ''){ $par='Semillas'; }else{ $par .=$c.'Semillas';           }}}
                    foreach($pa as $id){ if($id=='7') { if($par == ''){ $par='Frutos'; }else{ $par .=$c.'Frutos';               }}}
                    foreach($pa as $id){ if($id=='8') { if($par == ''){ $par='Planta entera'; }else{ $par .=$c.'Planta entera'; }}}

                    if ($reg[33]=='1') { $tex='Fino';   }
                    if ($reg[33]=='2') { $tex='Medio';  }
                    if ($reg[33]=='3') { $tex='Grueso'; }


                    if ($reg[34]=='1') { $com='Mineral';  }
                    if ($reg[34]=='2') { $com='Orgánico'; }
                    if ($reg[34]=='3') { $com='Sustrato'; }


                    if ($reg[35]=='1') { $hum='Excesiva';   }
                    if ($reg[35]=='2') { $hum='Deficiente'; }
                    if ($reg[35]=='3') { $hum='Adecuada';   }

                    if ($reg[36]=='1') { $dre='Bueno';      }
                    if ($reg[36]=='2') { $dre='Regular';    }
                    if ($reg[36]=='3') { $dre='Deficiente'; }

                    $co = explode("|", $reg[37]);
                    $con="";
                    foreach($co as $id){ if($id=='1') { $con='Malezas'; }}
                    foreach($co as $id){ if($id=='2') { if($con == ''){ $con='Plagas'; }else{ $con .=$c.'Plagas';             }}}
                    foreach($co as $id){ if($id=='3') { if($con == ''){ $con='Enfermedades'; }else{ $con .=$c.'Enfermedades'; }}}
                    foreach($co as $id){ if($id=='4') { if($con == ''){ $con='Agroquimicos'; }else{ $con .=$c.'Agroquimicos'; }}}
                    foreach($co as $id){ if($id=='5') { if($con == ''){ $con='Biologicos'; }else{ $con .=$c.'Biologicos';     }}}




                    echo "<table class='tcliente'>
                            <tr><th colspan='2'><i class='fa fa-edit'></i> Datos de la muestra</th></tr>
                            <tr><th>Codigo: </th><td>".$reg[1]."</td></tr>
                            <tr><th>Tipo de muestra: </th><td>".$tip."</td></tr>
                            <tr><th>Cultivo, especie ó variedad: </th><td>".$reg[3]."</td></tr>
                            <tr><th>Nro de plantas: </th><td>".$reg[4]."</td></tr>
                            <tr><th>Edad del cultivo: </th><td>".$reg[5]."</td></tr>
                            <tr><th>Tamaño del lote: </th><td>".$reg[6]."</td></tr>
                            <tr><th>Topografia del terreno: </th><td>".$topo."</td></tr>
                            <tr><th>Distancia siembra: </th><td>".$reg[8]."</td></tr>
                            <tr><th>Riego: </th><td>".$rie."</td></tr>
                            <tr><th>Cultivo anterior: </th><td>".$reg[10]."</td></tr>
                            <tr><th>Fecha de toma de la muestra: </th><td>".$reg[11]."</td></tr>
                            <tr><th>Practicas realizadas: </th><td>".$pra."</td></tr>
                            <tr><th>Productos utilizados y dosis: </th><td>".$reg[13]."</td></tr>
                            <tr><th>Epoca de aplicacion: </th><td>".$reg[14]."</td></tr>
                            <tr><th>Modo de aplicacion: </th><td>".$reg[15]."</td></tr>
                            <tr><th>Poblacion más cercana: </th><td>".$reg[16]."</td></tr>
                    ";
                  if(!empty($reg[17])):

                    echo   "<tr><th>Profundidad de la Muestra: </th><td>".$reg[17]."</td></tr>
                            <tr><th>Riesgo de inundacion: </th><td>".$ries."</td></tr>
                            <tr><th>Tipo de vegetacion: </th><td>".$reg[19]."</td></tr>
                            <tr><th>Rendimiento del cultivo: </th><td>".$ren."</td></tr>
                            <tr><th>Restos de cosecha: </th><td>".$rest."</td></tr>
                    ";
                  endif;
                  if(!empty($reg[22])):

                    echo   "<tr><th>Descripcion: </th><td>".$reg[22]."</td></tr>
                            <tr><th>Identificacion del microorganismo: </th><td>".$reg[23]."</td></tr>
                            <tr><th>Sintomas: </th><td>".$sin."</td></tr>
                            <tr><th>Fecha de inicio de la sintomatologia: </th><td>".$reg[25]."</td></tr>
                            <tr><th>Daños causados por: </th><td>".$reg[26]."</td></tr>
                            <tr><th>Tipo de plantacion: </th><td>".$pla."</td></tr>
                            <tr><th>Nro de submuestra: </th><td>".$reg[28]."</td></tr>
                            <tr><th>Fuente de la semilla: </th><td>".$fue."</td></tr>
                            <tr><th>presentacion del microorganismo: </th><td>".$pre."</td></tr>
                            <tr><th>distribucion de las plantas afectadas: </th><td>".$dis."</td></tr>
                            <tr><th>Partes afectadas: </th><td>".$par."</td></tr>
                            <tr><th>Textura de suelo: </th><td>".$tex."</td></tr>
                            <tr><th>Composicion del suelo: </th><td>".$com."</td></tr>
                            <tr><th>Humedad del suelo: </th><td>".$hum."</td></tr>
                            <tr><th>Drenaje: </th><td>".$dre."</td></tr>
                            <tr><th>Control de: </th><td>".$con."</td></tr>
                            <tr><th>Productos utilizados y dosis: </th><td>".$reg[38]."</td></tr>
                            <tr><th>Condiciones agroclimaticas: </th><td>".$reg[39]."</td></tr>
                    ";
                  endif;

                    echo   "<tr><th>Observaciones: </th><td>".$reg[40]."</td></tr>
                            <tr><th>Condiciones agroclimaticas: </th><td>".$reg[2]."</td></tr>
                    ";
                  if(!empty($analisis1)):
                    echo   "<tr><th>Análisis a realizar: </th><td>".$analisis1."</td></tr>";
                  endif;
                    echo "</table>
                      <form action='carga_suelo' method='POST'>
                        <input type='hidden' name='Cod_muestra' value='$Cod_muestra' />
                        <input type='hidden' name='id' value='$reg[0]' />
                        <button class='boton' type='button' onclick=location='inicio' ><i class='fa fa-arrow-left'></i> Volver a inicio</button>
                        <button type='submit' name='Cargar' value='Cargar' class='boton' ><i class='fa fa-check'></i> Cargar resultados</button>
                      </form>
                    ";


                 include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>
