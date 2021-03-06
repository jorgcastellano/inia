<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
                <?php
                    echo '
                        <header>
                            <section>
                                <img src="../../imgs/logo_new.jpg" />
                            </section>
                        </header>
                    ';
                ?>
                <hgroup>
                    <h1>Procesar factura</h1>
                </hgroup>
            </div>
            <?php

              extract($_POST);
              include_once '../../system/class.php';
              $objfactdescrip = new factura_descripcion();

              //IVA actual, facilitado por el sitema
              $iva_actual = new iva();
              $actual_iva = $iva_actual->consultar_iva_actual($mysqli);
              $actual_iva = $actual_iva->fetch_array();
              $impuesto = $actual_iva[0];

              if (isset($comprado)) :

                  //Invocacion de los objetos
                  $objcliente = new cliente();
                  $objproducto = new producto();
                  $objfactura = new factura();

                  //Consulta de clientes y productos
                  $ress = $objcliente->consultar_cliente($mysqli, $comprado);
                  $result = $objproducto->consulta_completo($mysqli);

                  //Proceso de compra
                  //Primero hacer la factura básica
                  $objfactura -> facturar($mysqli, $ress[1], $total);
                  $id = $objfactura -> consultar_factura_insertada($mysqli, $ress[1]);

                  //Luego la descripcion o compras actualizando el inventario de una vez
                  $i = 0;
                  while ($resultado = $result->fetch_array()) :
                    if (!empty($cantidad[$i])) :
                      $precio = ($resultado[3] * $cantidad[$i]);
                      $objfactdescrip->facturar_productos($mysqli, $id[0], $resultado[1], $cantidad[$i], $resultado[3], $precio, $resultado[0]);
                      $nuevaexistencia = $resultado[2] - $cantidad[$i];
                      $objproducto->actualizar_existencia($mysqli, $nuevaexistencia, $resultado[0]);
                    endif;
                    $i++;
                  endwhile;
                  $codigoListado = $id[0];
            elseif(isset($codigoListado)) :
              $id[0] = $codigoListado;
            endif;

            $res2=$objfactdescrip->consultar_factura($mysqli, $id[0]);
            $res22=$objfactdescrip->consultar_factura($mysqli, $id[0]);

            ?>

            <form method="POST" action="procesar" onsubmit=""<?php if (isset($funcionsalir)) {echo $funcionsalir;} ?>"">
              <table class="factura2">
                <tr>
                    <td>CANTIDAD</td>
                    <td>DESCRIPCION</td>
                    <td>P. UNIT</td>
                    <td>I.V.A.</td>
                    <td>TOTAL</td>
                </tr>

            <?php

            $iva = 0;
            $exe = 0;
            $res22 = $res22->fetch_array();
            if(!empty($res22[7])) {
              while($resultado = $res2->fetch_array()) {
                  if($resultado[6]=='I') {
                      $iva+=$resultado[5];
                      $ivad = "Si";
                  }
                  elseif($resultado[6]=='E') {
                      $exe+=$resultado[5];
                      $ivad = "No";
                  }
                  echo "
                    <tr>
                      <td>".$resultado[3]."</td>
                      <td>".$resultado[2]."</td>
                      <td>".$resultado[4]."</td>
                      <td>".$ivad."</td>
                      <td>".$resultado[5]."</td>
                    </tr>";
                    unset($ivad);
              }
            } else {
              $res2=$objfactdescrip->consultar_factura_para_analisis($mysqli, $id[0]);

              $factAnalisisOn = "<input type='hidden' name='$factAnalisisOn' value='Yes' >";

              while($resultado = $res2->fetch_array()) {

                  $iva+=$resultado[5];
                  $ivad = "Si";

                  echo "
                    <tr>
                      <td>".$resultado[3]."</td>
                      <td>".$resultado[2]."</td>
                      <td>".$resultado[4]."</td>
                      <td>".$ivad."</td>
                      <td>".$resultado[5]."</td>
                    </tr>";
                    unset($ivad);
              }
            }

            $subtotal=$iva+$exe;
            $impuestos=($iva*$impuesto)/100;
            $retencion=($impuestos*$retencionporciento)/100;
            $alicuota=$impuestos-$retencion;
            $total=$subtotal+$alicuota;

            //Esto a futuro no va
            if (isset($retencionporciento))
                if (empty($retencionporciento))
                    $retencionporciento = 0;

            if(isset($procesar)) {

                $hidden="<input type='hidden' name='codigo' value='".$id[0]."'/>
                    <input type='hidden' name='exento' value='".$exe."'/>
                    <input type='hidden' name='base' value='".$iva."'/>
                    <input type='hidden' name='iva' value='".$impuestos."'/>
                    <input type='hidden' name='retencion' value='".$retencion."'/>
                    <input type='hidden' name='alicuota' value='".$alicuota."'/>
                    <input type='hidden' name='total' value='".$total."'/>
                    <input type='hidden' name='observacion' value='".$observacion."'/>
                    <input type='hidden' name='ivaporciento' value='".$ivaporciento."'/>
                    <input type='hidden' name='retencionporciento' value='".$retencionporciento."'/>
                    <input type='hidden' name='funcionsalir' value='salirpagina()'/>
                    ";

                $formulario2='
                <div class="contact_form"><br>
                    <label for="tipofactura">Tipo de factura</label>
                    <select required id="tipofactura" name="tipofactura" class="opcion4">
                        <option value="COMPRA">Compra</option>
                        <option value="DONACION">Donación</option>
                    </select><br>

                    <label for="metodo">Método de pago</label>
                    <select id="metodo" name="metodo" class="opcion4">
                        <option value="NINGUNO">Ninguno</option>
                        <option value="EFECTIVO">Efectivo</option>
                        <option value="T/DEBITO">Débito</option>
                        <option value="T/CREDITO">Crédito</option>
                        <option value="DEPOSITO">Depósito</option>
                        <option value="CHEQUE">Cheque</option>
                    </select><br>

                    <label for="bauche">Bauche/nro. de referencia</label>
                    <input type="text" id="bauche" name="bauche" maxlength="10" pattern="^\d{6,10}$" />
                </div>
                ';

                $boton="
                <button type='submit' id='botonCancelar' name='borrar' value='".$id[0]."' formaction='cancel.php' class='boton'><i class='fa fa-ban'></i> Cancelar factura</button>
                <button type='submit' id='modificarFactura' name='codigoListado' value='".$id[0]."' formaction='../../0/caja/procesar' class='boton'><i class='fa fa-pencil'></i> Modificar factura</button>
                <button onclick='cambioBotones()' id='botonPagado' type='submit' name='confirmar' value='confirmar' formtarget='_blank' formaction='../../0/factura/factu.php' class='boton'><i class='fa fa-check'></i> Pagado</button>
                ";

            }else{
                $observacion="<textarea cols='25' rows='10' name='observacion' value='' placeholder='Observacion' ></textarea>";

                $hidden="<input type='hidden' name='codigoListado' value='".$id[0]."'/>
                <input type='hidden' name='impuesto' value='".$impuesto."' />";

                $boton="<button type='submit' name='borrar' value='".$id[0]."' formaction='cancel.php' class='boton'><i class='fa fa-ban'></i> Cancelar factura</button>
                    <button type='submit' name='procesar' value='procesar' class='boton'><i class='fa fa-check'></i> Guardar cambios</button>";
            }
            echo "</table>
                  <table class='factura3'>
                        <tr>
                            <td rowspan='8'>".$observacion."</td>
                            <td colspan='2' id='espaciosubtotal'>Sub-total</td>
                            <td>".$subtotal."</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Adiciones, descuentos:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan='2'>Monto total exento o exonerado</td>
                            <td>".$exe."</td>
                        </tr>
                        <tr>
                            <td colspan='2'>I.V.A. base</td>
                            <td>".$iva."</td>
                        </tr>
                        <tr>
                            <td colspan='2'>I.V.A.</td>
                            <td>".$impuesto." %</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Retencion</td>
                            <td>".$retencion." %</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Monto total del impuesto segun alicuota</td>
                            <td>".$alicuota."</td>
                        </tr>
                        <tr>
                            <td colspan='2'><b>MONTO TOTAL</b></td>
                            <td><b>".$total."</b></td>
                        </tr>
                    </table>

                    ".$hidden."

                    ".$formulario2."

                    <div align='center'>
                       ".$boton."
                    </div>
                </form>
              ";
              ?>

            <?php include '../../layouts/layout_p.php' ?>
        </section>
        <script type="text/javascript">
          function cambioBotones() {
            var botonCancelar = document.getElementById('botonCancelar');
            var modificarFactura = document.getElementById('modificarFactura');
            var pagado = document.getElementById('botonPagado');
            modificarFactura.style.display="none";
            pagado.style.display="none";
            botonCancelar.formAction="../home/inicio";
            botonCancelar.innerHTML="Regresar al inicio";
          }
        </script>
    </body>
</html>
