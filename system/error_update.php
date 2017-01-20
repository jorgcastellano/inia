<?php
            if (mysqli_errno($mysqli) > 0) {
              printf("<h2>Error en la modificacion de datos en la bd</h2>
               <b>Error #:</b> %d <br />
               <b>Mensaje del error:</b> %s",
               mysqli_errno($mysqli),
               mysqli_error($mysqli));

            }         

?>