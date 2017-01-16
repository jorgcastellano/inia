<?php

       $estatus="esper_espec";
        $objmuestra = new muestra();
        $reg = $objmuestra -> consultar_muestras($mysqli,$estatus);
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
      $reg2 = $objespecialista -> consulta_completo($mysqli);
        echo "  <form action='asig_especialista' method='POST'>
                  <tr>
                      <td>$res[1]</td>
                      <td>$res[2]</td>
                      <td>$res[3]</td>
                      <td>
                        <select name='Ced_esp[]'>
                            <option value=''>--Seleccione--</option>";
                          while($res2 = $reg2 -> fetch_array()):

        echo "
                          <option value='$res2[0]'>$res2[2]</option>";
                          endwhile;
        echo "          </select>
                      </td>
                      <input type='hidden' name='idm' value='$res[0]' />
                      <td><button class='sinboton' type='submit' name='eliminar' value='' id='accion_buttom' ><i class='fa fa-trash-o'></button></i></td>
                      <td><button class='sinboton' type='submit' name='Asignar' value='' id='accion_buttom' ><i class='fa fa-arrow-right'></button></i></td>
                  </tr>

                  </form>";
    endwhile;
    echo "  </table>


          ";

 ?>
