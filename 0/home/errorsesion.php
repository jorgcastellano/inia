<?php
    $error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
     
    if (! $error)
        $error = “Ocurrió un error desconocido”;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Error404</title>
         <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
                <?php include_once '../../layouts/cabecera-body.php' ?>
            </div>
            
            <h1>Hubo un problema.</h1>
            <p class="error"><?php echo $error; ?></p>  


            <button type='button' OnClick=location='../home/inicio' class="boton"><i class="fa fa-home"></i> Página principal</button>
            <?php include 'layouts/layout_p.php' ?>
            <?php include_once '../../layouts/layout_p.php' ?>

        </section>
    </body>
</html>