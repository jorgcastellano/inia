<?php
        if($_SESSION['tipoLab']==2):
          $tipo="SUE";
          $tipo2=2;
        else:
          $tipo="FITO";
          $tipo2=1;
        endif;
        $estatus="esper_espec";
        $objmuestra = new muestra();
        $reg = $objmuestra -> consultar_muestras($mysqli,$estatus,$tipo);
        $objespecialista = new especialista();

      echo "
              <table class='usuario'>
                <tr>
                    <td>Código</td>
                    <td>Tipo</td>
                    <td>Cultivo</td>
                    <td>Especialista</td>
                    <td><i class='fa fa-trash-o'></i></td>
                    <td>Asignar</td>
                </tr>";

    while ($res = $reg -> fetch_array()) :
      $reg2 = $objespecialista -> consulta_lab($mysqli,$tipo2);
      if ($res[2]=='1') { $tip='Vegetal'; }
      if ($res[2]=='2') { $tip='Suelo'; }
      if ($res[2]=='3') { $tip='Sustrato'; }
      if ($res[2]=='4') { $tip='Lixiviado'; }
      if ($res[2]=='5') { $tip='Agua'; }
      if ($res[2]=='6') { $tip='Insectos'; }
      if ($res[2]=='7') { $tip='Otros'; }
        echo "
                  <tr>
                      <td>$res[1]</td>
                      <td>$tip</td>
                      <td>$res[3]</td>
                      <td>
                        <select name='Ced_esp[]'>
                            <option value=''>--Seleccione--</option>";
                          while($res2 = $reg2 -> fetch_array()):

        echo "
                          <option value='$res2[0]'>".$res2[2]." ".$res2[3]." (".$res2[5].")"."</option>";
                          endwhile;
        echo "          </select>
                      </td>
                <form action='../laboratorio/asig_especialista' method='POST'>
                      <input type='hidden' name='idm' value='$res[0]' />
                      <td><button class='sinboton' type='submit' name='eliminar' value='' id='accion_buttom' ><i class='fa fa-trash-o'></button></i></td>
                      <td><button class='sinboton' type='submit' name='Asignar' value='' id='accion_buttom' style='color:#2C872C;' ><i class='fa fa-arrow-right'></button></i></td>
                  </tr>

                </form>";
    endwhile;
    echo "  </table>


          ";

 ?>
