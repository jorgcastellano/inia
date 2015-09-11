<?php


        $sa= new solicitud_analisis();
        $reg4=$sa-> consultar_sam($mysqli,$codm);
        
        $analisis='';
        $l=", ";

        
        while ($reg5 = $reg4->fetch_array()) { 

            if($reg5[3]==""){

                if($analisis == ''){ $analisis =$reg5[6]; }else{ $analisis .= $l.$reg5[6]; } 
            }

            if($reg5[4]==""){

                if($analisis == ''){ $analisis =$reg5[6]; }else{ $analisis .= $l.$reg5[6]; } 
            }

        }



?>    

    <table class="tcliente">
    <tr><th colspan="2"><i class="fa fa-edit"></i>Analisis a realizar</th></tr>
    <tr><td><?php echo $analisis; ?></td></tr>
    </table>