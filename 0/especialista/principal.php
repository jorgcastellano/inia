<?php

	 $suelo = new suelo();
	 $reg=$suelo->consultar_espera($mysqli);


	 echo "<form action='gestion_usuario' method='POST'>
                <table class='usuario'>
                    <tr>
                        <td><i class='fa fa-chevron-circle-right'></i> Codigo</td>
                        <td>Fecha</td>
                        <td>Parroquia</td>
                        <td>Sector</td>
                        <td><i class='fa fa-trash-o'></i> </td>
                    </tr>";

                while ($resultado = $reg->fetch_array()) :
                    
                    echo "<tr>
                        <td>$resultado[1]
                        <input type='hidden' name='codigos[]' value='$resultado[0]' /></td>
                        <td>$resultado[2]</td>
                        <td>$resultado[3]</td>
                        <td>$resultado[0]</td>
                        <td><button class='sinboton' type='submit' name='eliminar' value='$resultado[0]' /><i class='fa fa-trash-o'></button></i></td>
                    </tr>";
                    
                endwhile;
                echo "</table>";
?>