<?php


        require_once '../../system/class.php';
        $cod='SUE-MER-2015-36';
        $sa= new solicitud_analisis();
        $reg4=$sa-> consultar_sam($mysqli,$cod);
        echo "string";

        while ($reg5 = $reg4->fetch_array()) { echo $reg5[0]; }

        echo "string";

?>    

   