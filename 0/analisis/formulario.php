<?php
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
                    //Seleccion viene desde la pagina index de analisis
                    $seleccion = $_POST['seleccion'];
                    $ana = new analisis();
                    $reg = $ana->consultar_analisis($mysqli,$seleccion);
                elseif (isset($_POST['ana'])) :
                    //Recibe analisis desde resultados
                    $Cod = $_POST['ana'];
                    $ana = new analisis();
                    $reg = $ana->consultar_analisis($mysqli,$Cod);
                endif;
                $lab = new laboratorio();
                $reg2 = $lab->cEstatus($mysqli);
            ?>
            <form class="contact_form" action="resultados" method="post">
                <label for="Nom_ana">Nombre del analisis</label>
                    <input type="text" name="Nom_ana" value="<?php if(isset($reg)) echo $reg[1]; ?>" />
                    <br>
                <label for="Precio_ana">Costo del analisis</label>
                    <input type="text" name="Precio_ana" value="<?php if(isset($reg)) echo $reg[2]; ?>" />
                    <br>
                <label for="Tipo"> Laboratorio</label>
                <select name="Tipo">
                    <option value="">Seleccione</option>
                    <?php while ($resultado = $reg2->fetch_array()) : ?>
                        <option value="<?php echo $resultado[0]; ?>" <?php if(isset($reg)) if ($resultado[0] == $reg[3]) echo "selected"; echo ">".$resultado[1]; ?></option>
                    <?php endwhile; ?>
                </select>
                <br>
                <div align="center">
                    <button name="atras" type="button" onclick=location="index" class="boton"><i class="fa fa-arrow-left"></i> Página anterior</button>
                    <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                    <?php if (isset($_POST['seleccion']) OR isset($_POST['ana'])) : ?>
                        <button class="boton" type="submit" name="modificar" value="<?php echo $reg[0] ?>"><i class="fa fa-check"></i> Guardar cambios</button> 
                        <?php else : ?>
                        <button class="boton" type="submit" name="submit"><i class="fa fa-check"></i> Registrar análisis</button> 
                </div>
                <?php endif; ?>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>