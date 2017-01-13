<?php

        $estatus="esper_espec";
        $objmuestra = new muestra();
        $reg = $objmuestra -> consultar_muestras($mysqli,$estatus);
        $objespecialista = new especialista();
        $reg2 = $objespecialista -> consulta_completo($mysqli);

      echo "<form action='' method='POST' onsubmit=''>
              <table class='usuario'>
                <tr>
                    <td><i class='fa fa-chevron-circle-right'></i> Código </td>
                    <td>Tipo</td>
                    <td>Fecha inicio</td>
                    <td>Fecha final </td>
                    <td>Asignar</td>
                </tr>";

    while ($res = $reg -> fetch_array()) :

        echo "    <tr>
                      <td>$res[]</td>
                      <td>$res[]</td>
                      <td>$res[]</td>
                      <td>$res[]</td>
                      <td>
                        <select>
                            <option value='' ></option>"
                          while($res2 = $reg2 -> fetch_array()):
        echo "              <option value=''></option>";
                          endwhile;
        echo "          </select>
                      </td>
                  </tr>";
    endwhile;

 ?>
