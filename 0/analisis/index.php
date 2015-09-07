<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro de análisis</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Registro de análisis</h1>
                </hgroup>
            </div>
            <?php
                extract($_POST);
                require_once '../../system/class.php';
                $ana = new analisis();
                $reg = $ana->consultar_analisis($mysqli,$Nom_ana); 
            ?>
            <form class="contact_form" action="resultados" method="post">
                <label for="Nom_ana">Nombre del analisis</label>
                    <input type="text" name="Nom_ana" value="" maxlength="" title"" />
                    <br>
                <label for="Precio_ana">Costo del analisis</label>
                    <input type="text" name="Precio_ana" value="" maxlength="" title"" />
                    <br>
                <label for="Tipo">Tipo de analisis</label>
                <select name="Tipo[]">
                    <option value="">Seleccione</option>
                    <option value="1">De suelo</option>
                    <option value="2">De fitopatologia</option>
                </select>
                <br>
                <button name="atras" type="button" onclick=location="consulta" class="boton"><i class="fa fa-arrow-left"></i> Página anterior</button>
                <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                <button class="boton" type="submit" name="submit"><i class="fa fa-floppy-o"></i> Registrar</button> 

            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>