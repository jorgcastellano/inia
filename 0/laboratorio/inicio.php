

      <?php
          extract($_POST);
          require_once '../../system/class.php';
            $estatus="esp_ana";
            $Ced_esp=$_SESSION['ci'];
            $objmuestra = new muestra();
            $reg = $objmuestra -> consultar_muestra_asignadas($mysqli,$Ced_esp,$estatus);

      echo "
                  <table class='usuario'>
                   <tr>
                       <td>Código</td>
                       <td>Tipo</td>
                       <td>Cultivo</td>
                       <td>Fecha inicio</td>
                       <td>Analizar</td>
                   </tr>";

          while ($res = $reg -> fetch_array()) :
      echo "
                  <tr>
                      <td>$res[0]</td>
                      <td>$res[1]</td>
                      <td>$res[2]</td>
                      <td>$res[3]</td>
                      <form action='../laboratorio/consultar_detalles' method='POST'>
                      <input type='hidden' name='Cod_muestra[]' value='$res[0]' />
                    <td><button class='sinboton' type='submit' name='Asignar' value='' id='accion_buttom' ><i class='fa fa-arrow-right'></button></i></td>
                    </tr>
              </form>";
  endwhile;
  echo "        </table>";
  ?>
