<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro de Muestra</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
				<hgroup>
					<h1>Registrar Muestra</h1>
				</hgroup>
			</div>
            <?php
                extract($_POST);//extraer variables del formulario de muestras

                require_once '../../system/class.php';//Libreria que contiene las clases con sus procedimientos

                $ayudante = new ayudante();//Crear el objeto ayudante
                $reg1=$ayudante->consultar_ayudante($mysqli);//llamado a la funcion que consulta la tabla de la BD "ayudante"
                $solicitud = new solicitud();//Crear  objeto solicitud
                $cliente = new cliente();
                $sa = new solicitud_analisis();
                $analisis = new analisis();

                //consulto las solicitudes
                $solicitud1 = $solicitud->consulta($mysqli, $Cod_sol);
                $solicitud11 = $solicitud1 -> fetch_array();

                $solicitud2 = $solicitud->consulta($mysqli, $CodeAux);
                if ($mysqli->affected_rows > 0) {
                  $existe = "yes";
                  $muestra_analisis1 = $sa -> consultar_sa($mysqli, $CodeAux);
                }

                //Consulto al cliente
                $productor = $cliente -> consultar_cliente($mysqli, $solicitud11[2]);
                $muestra_analisis = $sa -> consultar_sa($mysqli, $Cod_sol);
                ?>

                <table class="tstatus">
                  <tr>
                    <td>CLIENTE</td>
                    <td>CEDULA</td>
                  </tr>
                  <tr>
                    <td><?php echo $productor[2]." ".$productor[3]; ?></td>
                    <td><?php echo $productor[1]; ?></td>
                  </tr>
                </table>

                <table class="anapro">
                  <tr>
                    <td>#</td>
                    <td>MUESTRAS DE SUELO</td>
                    <td>ANALISIS</td>
                    <td>PRECIO</td>
                  </tr>

                <?php
                $x = 0; $acumPrecio1 = 0;
                while ($analisis_muestra = $muestra_analisis -> fetch_array()) {
                  $x++;
                  //Consultar precio de analisis
                  $analisisRealizado = $analisis -> consultar_analisis($mysqli, $analisis_muestra[2]);

                  echo "
                    <tr>
                      <td>".$x."</td>
                      <td>".$analisis_muestra[3]."</td>
                      <td>".$analisisRealizado[1]."</td>
                      <td>".$analisisRealizado[2]."</td>
                    </tr>
                  ";
                  $acumPrecio1 += $analisisRealizado[2];
                }
            ?>
            </table>
            <?php

            if(isset($existe)) {

            ?>
              <table class="anapro">
                <tr>
                  <td>#</td>
                  <td>MUESTRAS DE FITOPATOLOGIA</td>
                  <td>ANALISIS</td>
                  <td>PRECIO</td>
                </tr>

              <?php
              $y = 0; $acumPrecio2 = 0;
              while ($analisis_muestra = $muestra_analisis1 -> fetch_array()) {
                $y++;
                //Consultar precio de analisis
                $analisisRealizado = $analisis -> consultar_analisis($mysqli, $analisis_muestra[2]);

                echo "
                  <tr>
                    <td>".$y."</td>
                    <td>".$analisis_muestra[3]."</td>
                    <td>".$analisisRealizado[1]."</td>
                    <td>".$analisisRealizado[2]."</td>
                  </tr>
                ";
                $acumPrecio2 += $analisisRealizado[2];
              }
          ?>
          </table>
          <?php }

            //IVA actual, facilitado por el sitema
            $iva_actual = new iva();
            $actual_iva = $iva_actual->consultar_iva_actual($mysqli);
            $actual_iva = $actual_iva->fetch_array();
            $impuesto = $actual_iva[0];


                //Invocacion de los objetos
                $objcliente = new cliente();
                $objproducto = new producto();
                $objfactura = new factura();
                $objfactdescrip = new factura_descripcion();

                //Consulta de clientes y productos
                //$ress = $objcliente->consultar_cliente($mysqli, $comprado);
                //$result = $objproducto->consulta_completo($mysqli);

                //Proceso de compra
                //Primero hacer la factura básica
                $total = $acumPrecio1 + $acumPrecio2;
                $objfactura -> facturar($mysqli, $productor[1], $total);
                $id = $objfactura -> consultar_factura_insertada($mysqli, $productor[1]);

                //Luego la descripcion o compras actualizando el inventario de una vez
                $objfactdescrip->facturar_analisis($mysqli, $id[0], "Analisis de Suelo", 1, $acumPrecio1, $acumPrecio1);
                if(isset($existe))
                  $objfactdescrip->facturar_analisis($mysqli, $id[0], "Analisis de Fitopatología", 1, $acumPrecio2, $acumPrecio2);

          //unset($Cod_sol);
          //unset($CodeAux);
          ?>

                <center>
                    <button type="button" class="boton" onclick=location="../../0/home/inicio" name="Inicio" ><i class="fa fa-home"></i> Regresar a inicio</button>
                </center>


                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>
