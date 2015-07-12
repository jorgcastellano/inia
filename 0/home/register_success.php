<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
                <?php 
                    include '../../layouts/logo.php';

                    extract($_POST);
                    include_once '../../includes/is-conexion_bd.php';

                    $command_sql = "INSERT INTO miembros (ci, usuario, email, password, pregunta, respuesta) VALUES ('$cedula', '$usuario', '$email', '$password', '$pregunta', '$resp')";
                    require_once '../../includes/sql.php';
                ?>
                <hgroup>
                    <h1>Sistema de Procesos Internos del INIA Mérida (SPIIM)</h1>
                </hgroup>
            </div>
                <h4>¡Registro completado con éxito!</h4>
            <p>Ahora deberá notificar su registro para su aprobación</p><br /><br />
            <button style="margin-left: 75%" class="boton" type="button" onclick="location.href='index'" name="registro"> Página principal</button>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>