<?php
include_once '../includes/conexion_bd.php';
include_once '../includes/functions.php';
 
/*sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}*/
?>

<!DOCTYPE html>
<html>
    <?php include 'layouts/layout.php' ?>
    <head><title>Sistema interno de gestión de productos y servicios - INIA Mérida</title></head>
<body>
    <section class="bloque">
        <header class"margenes">
            <hgroup>
                <h1>Inicio de sesión</h1>
            </hgroup>
        </header>
        <form action="../includes/process_login.php" method="post" name="login_form">
            <label>Correo electrónico: </label>     <input type="text" name="email" />
            <label>Contraseña: </label>             <input type="password" name="password" id="password"/>
                                                    <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
        </form>
        <p> Si no tiene una cuenta, por favor<a href="registro">regístrese.</a></p>
        <p> Si ha terminado, por favor<a href="../includes/logout">cierre la sesión.</a></p>
        <!-- <p>Está conectado.<?php echo $logged ?>.</p> -->
    </section>
    <?php include 'layouts/layout_p.php' ?>
</body>
</html>