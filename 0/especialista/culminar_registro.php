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
            </ol>
            <form class="contact_form" method="POST" action=""><br>
                <label>Cédula: </label>
            	<input type="text" name="cedula" value="<?php echo $_SESSION['ci'] ?>" disabled><br>
                <label>Nombre: </label>
                <input type="text" name="nombre" value="<?php echo $_SESSION['nombre'] ?>" disabled><br>
                <label>Apellido: </label>
                <input type="text" name="apellido" value="<?php echo $_SESSION['apellido'] ?>" disabled><br>
                <label>Teléfono: </label>
                <input required type="text" name="telefono" value="" placeholder="0000-0000000">
                <span class="form_hint">Número de contácto</span><br />
                <label>Laboratorio: </label>
                <select name="laboratorio" required>
                    <option></option>
                </select><br>
                <label>Especialidad: </label>
                <input required type="text" name="especialidad" value="" placeholder="Solo de contener letras">
                <span class="form_hint">Especialidad en los análisis</span><br /> 
                <div align="center">
                    <button type="button" class="boton" name="cancelar" onclick=location="../home/cerrar_sesion"><i class="fa fa-cancel"></i> Cancelar</button>
                    <button type="submit" class="boton" name="submit"><i class="fa fa-check"></i> Completar registro</button>
                </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>