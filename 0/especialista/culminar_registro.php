<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>¡Te se han otorgado privilegios de especialista!</h1>
                </hgroup>
            </div>
            <p><b>Atención</b></p>
            <ol>
                <li>Debes completar tu registro en el formulario que se te muestra a continuación</li>
                <li>Rellena los campos de forma correcta, ya que, este se te mostrara solo la primera vez para cada especialista</li>
                <li>Muchas gracias</li>
            </ol>
            <?php $ci = $_SESSION['ci'];
            $nombre = $_SESSION['nombre'];
            $apellido =  $_SESSION['apellido']?>
            <form class="contact_form" method="POST" action="registro">
                <label>Cédula: </label>
            	<input type="text" name="1" value="<?php echo $ci ?>" disabled><br>
                <input type="hidden" name="ci" value="<?php echo $ci ?>">
                <label>Nombre: </label>
                <input type="text" name="2" value="<?php echo $nombre ?>" disabled><br>
                <input type="hidden" name="name" value="<?php echo $nombre ?>">
                <label>Apellido: </label>
                <input type="text" name="3" value="<?php echo $apellido ?>" disabled><br>
                <input type="hidden" name="apel" value="<?php echo $apellido ?>">
                <label>Teléfono: </label>
                <input required type="text" name="telefono" value="" placeholder="0000-0000000">
                <span class="form_hint">Número de contácto</span><br />
                <label>Laboratorio: </label>
                <select name="laboratorio" required>
                    <option value=""> -- Seleccione -- </option>
                <?php
                    include_once '../../system/class.php'; 
                    $objlab = new laboratorio();
                    $res = $objlab->consultar_completa($mysqli);
                    while ($resultado = $res->fetch_array()){
                        echo "<option value='$resultado[0]'>$resultado[1]</option>";
                    }
                ?>
                </select><br>
                <label>Especialidad: </label>
                <input required type="text" name="especialidad" value="" placeholder="Solo de contener letras">
                <span class="form_hint">Especialidad en los análisis</span><br /> 
                <div align="center">
                    <button type="button" class="boton" name="cancelar" onclick=location="../home/cerrar_sesion"><i class="fa fa-ban"></i> Cancelar</button>
                    <button type="submit" class="boton" name="submit"><i class="fa fa-check"></i> Completar registro</button>
                </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>