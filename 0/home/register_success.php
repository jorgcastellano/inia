<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
            <?php include_once '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>¡Felicidades! - Registro exitoso</h1>
                </hgroup>
            </div>
            <?php 
                include '../../layouts/logo.php';

                extract($_POST);
                include_once '../../includes/is-conexion_bd.php';

                if ($password == $confirmpwd) :
                    $checksum = hash("sha512", $password);
                    $resp = hash("sha512", $resp);

                    $command_sql = "INSERT INTO miembros (ci, usuario, apellido, email, password, pregunta, respuesta) VALUES ('$cedula', '$nombre', '$apellido', '$email', '$checksum', '$pregunta', '$resp')";
                    require_once '../../includes/sql.php';

                    echo "<p>Se ha registrado con éxito</p>
                    <p>Ahora debes indicarle al gerente del sistema que te has registrado, para que seas aprobado y puedes disfrutar de nuestros servicios.</p>";
                else :
                    header('location: registro');
                endif;
            ?>
            <button style="margin-left: 75%" class="boton" type="button" onclick=location="index"><i class="fa fa-arrow-left"> Ir a la página principal</i></button>
            <?php include_once '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
