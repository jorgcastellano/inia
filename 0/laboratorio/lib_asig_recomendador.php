<?php
        if($_SESSION['tipoLab'] == 2) :
          $tipo = "SUE";
          $tipo2 = 2;
        else:
          $tipo = "FITO";
          $tipo2 = 1;
        endif;
        $estatus = "esp_rec";
        $objmuestra = new muestra();
        $reg = $objmuestra -> consultar_muestras($mysqli,$estatus,$tipo);
        if($mysqli->affected_rows > 0) {
        $objespecialista = new especialista();

          echo "
                  <table class='usuario'>
                    <tr>
                        <td>Código</td>
                        <td>Cultivo actual</td>
                        <td>Cultivo a realizar</td>
                        <td>Especialista</td>
                        <td>Asignar</td>
                    </tr>";

        while ($res = $reg -> fetch_array()) :
          $reg2 = $objespecialista -> consulta_lab($mysqli,$tipo2);
            echo "
                      <tr>
                        <form action='../laboratorio/asig_recomendador' method='POST'>
                          <td>$res[1]</td>
                          <td>$res[3]</td>
                          <td></td>
                          <td>
                            <select name='Ced_esp[]' required>
                                <option value=''>--Seleccione--</option>";
                              while($res21 = $reg2 -> fetch_array())
                                echo "<option value='".$res21[0]."'>".$res21[2]." ".$res21[3]."</option>";
            echo "          </select>
                          </td>

                          <input type='hidden' name='idm' value='$res[0]' />
                          <td><button class='sinboton' type='submit' name='Asignar' value='' id='accion_buttom' style='color:#2C872C;' ><i class='fa fa-arrow-right'></button></i></td>
                        </form>
                      </tr>";
        endwhile;
        echo "  </table>
              ";
    } else {
      echo "<div class='notify_f'>No hay muestras para recomendar</div>";
    }
 ?>
