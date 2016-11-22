<?php

        $estatus="procesando";
        $objmuestra = new muestra();
        $reg = $objmuestra -> consultar_muestras($mysqli,$estatus);

      echo "<form action='' method='POST' onsubmit=''>
              <table class='usuario'>
                <tr>
                    <td><i class='fa fa-chevron-circle-right'></i> Código </td>
                    <td>Tipo</td>
                    <td>Fecha inicio</td>
                    <td>Fecha final </td>
                    <td>Asignar</td>
                </tr>";

    while ($res = $reg->fetch_array()) :

        echo "    <tr>
                      <td>$res[]</td>
                      <td>$res[]</td>
                      <td>$res[]</td>
                      <td>$res[]</td>
                      <td></td>
                  </tr>";
    endwhile;

 ?>
