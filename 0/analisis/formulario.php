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
                if (isset($_POST['modificar']) AND empty($_POST['seleccion']))
                    header('location: index');
                require_once '../../system/class.php';
                if (isset($_POST['seleccion'])) :
                    $seleccion = $_POST['seleccion'];
                    $ana = new analisis();
                    $reg = $ana->consultar_analisis($mysqli,$seleccion);
                elseif (isset($_POST['ana'])) :
                    $Cod = $_POST['ana'];
                    $ana = new analisis();
                    $reg = $ana->consultar_analisis($mysqli,$Cod);
                endif;
                $lab = new laboratorio();
                $reg2 = $lab->cEstatus($mysqli);
            ?>
            <form class="contact_form" action="resultados" method="post">
                <label for="Nom_ana">Nombre del analisis</label>
                    <input type="text" name="Nom_ana" value="<?php echo $reg[1] ?>" maxlength="" title"" />
                    <br>
                <label for="Precio_ana">Costo del analisis</label>
                    <input type="text" name="Precio_ana" value="<?php echo $reg[2] ?>" maxlength="" title"" />
                    <br>
                <label for="Tipo">Tipo de analisis</label>

                <select name="Tipo">
                    <option value="">Seleccione</option>
                    <?php while ($resultado = $reg2->fetch_array()) : ?>
                        <option value="<?php echo $resultado[0]; ?>" <?php if ($resultado[0] == $reg[3]) echo "selected"; echo ">".$resultado[1]; ?></option>
                    <?php endwhile; ?>
                </select>
                <br>
                <button name="atras" type="button" onclick=location="index" class="boton"><i class="fa fa-arrow-left"></i> Página anterior</button>
                <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                <?php if (isset($_POST['seleccion']) OR isset($_POST['ana'])) : ?>
                    <button class="boton" type="submit" name="modificar"><i class="fa fa-floppy-o"></i> Guardar cambios</button> 
                    <?php else : ?>
                    <button class="boton" type="submit" name="submit"><i class="fa fa-floppy-o"></i> Registrar análisis</button> 
                <?php endif; ?>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>