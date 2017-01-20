<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">

          <?php
            include_once '../../includes/conexion.php';
            include '../../system/classusuario.php';
            $usuario = new inicio_seguro();

            $user = $usuario -> consultar_mi_usuario($mysqli, $_SESSION['id']);
            $user = $user -> fetch_array();

            extract($_POST);
            if(isset($actualizarPerfil)) {
              if(hash("sha512", $passwordAct) == $user[5]) { //Verificacion de password actual con la base de datos
                if(isset($password)) {
                  if($password == $confirmpwd) { //Verifica si son iguales
                    $password = hash("sha512", $password);
                    $resp = hash("sha512", $resp);
                    if (isset($resp))
                      $usuario -> modificar_usuario($mysqli, $_SESSION['id'], $email, $password, $pregunta, $resp);
                    else
                      $usuario -> modificar_usuario_no_pregunta($mysqli, $_SESSION['id'], $email, $password);
                  } else {
                    ?> <script type="text/javascript">
                      alert("Las contraseñas no coinciden, vuelve a intentarlo");
                    </script> <?php
                  }
                } else if (isset($resp)) {
                  $resp = hash("sha512", $resp);
                  $usuario -> modificar_usuario_pregunta($mysqli, $_SESSION['id'], $email, $pregunta, $resp);
                }
              } else {
                ?> <script type="text/javascript">
                  alert("Contraseña actual incorrecta");
                  window.location="../home/index";
                </script> <?php
              }
            }

            $user = $usuario -> consultar_mi_usuario($mysqli, $_SESSION['id']);
            $user = $user -> fetch_array();

            if ($user[7] == 1)
              $pregunta = "¿Nombre de su primera mascota?";
            else if ($user[7] == 2)
              $pregunta = "¿Cuál fué su apellido de soltera?";
            else if ($user[7] == 3)
              $pregunta = "¿Quién fué su superhéroe de niño(a)?";
            else if ($user[7] == 4)
              $pregunta = "¿Cuál es su comida favorita?";
            else if ($user[7] == 5)
              $pregunta = "¿Cuál es su pasatiempo?";
            else if ($user[7] == 6)
              $pregunta = "¿Como se llama su primer hijo(a)?";
            else if ($user[7] == 7)
              $pregunta = "¿Dónde nació?";
            else if ($user[7] == 8)
              $pregunta = "¿Dónde fué su bautizo?";
            else
              $pregunta = "¿Dónde cursó el primer año escolar?";

            if($user[10] == 1)
              $privilegios = "Gerente del sistema";
            else if($user[10] == 2)
              $privilegios = "Especialista";
            else if($user[10] == 3)
              $privilegios = "Facturación";

          ?>

            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Mi perfil - <?php echo $privilegios ?></h1>
                </hgroup>
            </div>

            <div class=""><br>
              <label><b>Instrucciones</b></label>
              <ol>
                <li>Para realizar cualquier cambio en su perfil debe ingresar su clave actual</li>
                <li>Si desea realizar cambio de contraseña recuerda confirmar la contraseña</li>
                <li>Si desea actualizar la pregunta y respuesta de seguridad no requiere cambiar la clave actual</li>
              </ol>
            </div>

            <section id="section1" class="section1" style="display: block">
              <div class="columna1">
                <label for=""><b>Cédula:</b> <?php echo $user[1]; ?></label><br>
                <label for=""><b>Correo electrónico: </b><?php echo $user[4]; ?></label><br>
                <label for=""><b>Pregunta de seguridad: </b><?php echo $pregunta ?></label><br>
              </div>
              <div class="columna2">
                <label for=""><b>Nombre completo: </b><?php echo $user[2]." ".$user[3]; ?></label><br>
                <label for=""><b>Contraseña: </b>**********</label><br>
                <label for=""><b>Respuesta de seguridad: </b>**********</label><br>
              </div>
            </section>
            <form class="contact_form" id="contact_form" action="perfil" method="post" name="form_registro">
              <section id="section2" class="section2" style="display: none">
                <span class="required_notification"><i class="fa fa-asterisk" ></i> Datos requeridos</span><br /><br />
                <div class="columna1">
                  <label>Contraseña actual: </label>
                  <input required type="password" name="passwordAct" id="passwordAct" placeholder="Contraseña" /><br>
                  <label>Nueva contraseña: </label>
                  <input type="password" name="password" id="password" placeholder="Contraseña" /><br>
                  <label>Pregunta de seguridad:</label>
                  <select name="pregunta" id="pregunta" class="opcion4">
                      <option value="1" <?php if($user[7] == 1) echo "selected" ?> >¿Nombre de su primera mascota?</option>
                      <option value="2" <?php if($user[7] == 2) echo "selected" ?> >¿Cuál fué su apellido de soltera?</option>
                      <option value="3" <?php if($user[7] == 3) echo "selected" ?> >¿Quién fué su superhéroe de niño(a)?</option>
                      <option value="4" <?php if($user[7] == 4) echo "selected" ?> >¿Cuál es su comida favorita?</option>
                      <option value="5" <?php if($user[7] == 5) echo "selected" ?> >¿Cuál es su pasatiempo?</option>
                      <option value="6" <?php if($user[7] == 6) echo "selected" ?> >¿Como se llama su primer hijo(a)?</option>
                      <option value="7" <?php if($user[7] == 7) echo "selected" ?> >¿Dónde nació?</option>
                      <option value="8" <?php if($user[7] == 8) echo "selected" ?> >¿Dónde fué su bautizo?</option>
                      <option value="9" <?php if($user[7] == 9) echo "selected" ?> >¿Dónde cursó el primer año escolar?</option>
                  </select>
                </div>
                <div class="columna2">
                  <label>Correo electrónico: </label>
                  <input required type="email" value="<?php echo $user[4]; ?>" name="email" id="email" placeholder="usuario@ejemplo.com" />
                  <span class="form_hint">Formato correcto: "name@inia.gob.ve"</span><br />
                  <label>Ingresa de nuevo la contraseña: </label>
                  <input type="password" name="confirmpwd" id="confirmpwd" placeholder="Reescriba la contraseña" /><br>
                  <label for="">Respuesta:</label>
                  <input type="password" name="resp" id="resp" placeholder="Respuesta" />
                </div>
              </section>

              <div class="grupobotones">
                <button type="button" name="regresar" onclick=location="inicio" class="boton"><i class="fa fa-home"></i> Regresar a inicio</button>
                <button class="boton" type="button" onclick="cambio1();" id="boton1"><i class='fa fa-pencil'></i> Editar</button>
                <button class="boton" type="button" onclick="cambio2();" id="boton2" style="display:none"><i class='fa fa-pencil'></i> Cancelar</button>
                <button name="actualizarPerfil" class="boton" type="submit" id="boton3" style="display:none"><i class='fa fa-check'></i> Guardar cambios</button>
              </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
        <script type="text/javascript">
          function cambio1() {
            var section1 = document.getElementById('section1');
            section1.style.display="none";
            var section2 = document.getElementById('section2');
            section2.style.display="block";
            var boton1 = document.getElementById('boton1');
            boton1.style.display="none";
            var boton2 = document.getElementById('boton2');
            boton2.style.display="block";
            var boton3 = document.getElementById('boton3');
            boton3.style.display="block";
          }
          function cambio2() {
            var section1 = document.getElementById('section1');
            section1.style.display="block";
            var section2 = document.getElementById('section2');
            section2.style.display="none";
            var boton1 = document.getElementById('boton1');
            boton1.style.display="block";
            var boton2 = document.getElementById('boton2');
            boton2.style.display="none";
            var boton3 = document.getElementById('boton3');
            boton3.style.display="none";
          }
        </script>
    </body>
</html>
