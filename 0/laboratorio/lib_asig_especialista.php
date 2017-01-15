<?php
  echo "string";
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
                    <td>cultivo</td>
                    <td>tamaño</td>
                    <td>Asignar</td>
                </tr>";

    while ($res = $reg -> fetch_array()) :

        echo "    <tr>
                      <td>$res[1]</td>
                      <td>$res[2]</td>
                      <td>$res[3]</td>
                      <td>$res[6]</td>
                      <td>
                        <select>
                            <option value='' ></option>"
                          while($res2 = $reg2 -> fetch_array()):
        echo "              <option value=''>$res2[2]</option>";
                          endwhile;
        echo "          </select>
                      </td>
                  </tr>";
    endwhile;
    echo "</table> "

 ?>
