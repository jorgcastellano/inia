<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
        			<hgroup>
        				<h1>Listado de Productos</h1>
        			</hgroup>
        		</div>
            <?php 
                  extract($_POST);
                  echo $cantidad[0];
                  echo $cantidad[1];

                  $costo='';
                  $i=0;
                  foreach ($_POST['precio'] as $id)
                  {
                    
                    $calculado='';
                    echo $i;
                    $calculado=$id*$cantidad[$i];
                    $i++;

                    if($costo == ''){ $costo =$calculado; }else{ $costo .= $s.$calculado; } }
                  }


                 echo $costo;



            ?>




        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>