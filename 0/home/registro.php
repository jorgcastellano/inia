<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de registro - S.P.I.I. Sede Mérida</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
                <hgroup>
                    <h1>Panel de registro del SPIIM</h1>
                </hgroup>
            </div>
            <label><b>Instrucciones</b></label>
            <ol>
                <li> Los nombres de usuario podrían contener solo dígitos, letras mayúsculas, minúsculas y guiones bajos.</li>
                <li> Los correos electrónicos deberán tener un formato válido. </li>
                <li> Las contraseñas deberán tener al menos 6 caracteres.</li>
                <li>Las contraseñas deberán estar compuestas por:
                    <ol type="a">
                        <li> Por lo menos una letra mayúscula (A-Z)</li>
                        <li> Por lo menos una letra minúscula (a-z)</li>
                        <li> Por lo menos un número (0-9)</li>
                    </ol>
                </li>
                <li> La contraseña y la confirmación deberán coincidir exactamente.</li>
            </ol>
            <form class="contact_form" id="contact_form" action="register_success" method="post" name="form_registro">
                <span class="required_notification"><i class="fa fa-asterisk" ></i> Datos requeridos</span><br /><br />
                <div>
                    <label>Cédula: </label>
                    <input required type="text" name="cedula" id="cedula" placeholder="00 000 000" pattern="\d{6,}" maxlength="8" >
                    <span class="form_hint">Debe contener al menos 6 dígitos</span><br />
                    <label>Primer nombre: </label>
                    <input required type='text' name='nombre' id='nombre' placeholder="Primer nombre" pattern="([A-Z]{1}[a-zÑñáéíóú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener la primera letra en "Mayúscula"</span><br />
                    <label>Primer apellido</label>
                    <input required type='text' name='apellido' id='apellido' placeholder="Primer apellido" pattern="([A-Z]{1}[a-zÑñáéíóú]{1,}\s{0,1})+" />
                    <span class="form_hint">Debe tener la primera letra en "Mayúscula"</span><br />
                    <label>Correo electrónico: </label>
                    <input required type="email" name="email" id="email" placeholder="usuario@ejemplo.com" />
                    <span class="form_hint">Formato correcto: "name@inia.gob.ve"</span><br />
                    <label>Contraseña: </label>
                    <input required type="password" name="password" id="password" placeholder="Contraseña" /><br>
                    <label>Confirmar contraseña: </label>
                    <input required type="password" name="confirmpwd" id="confirmpwd" placeholder="Reescriba la contraseña" /><br>
                    <label>Pregunta de seguridad:</label>
                    <select required name="pregunta" id="pregunta">
                        <option value="0"> -- seleccione una pregunta -- </option>
                        <option value="1">¿Nombre de su primera mascota?</option>
                        <option value="2">¿Cuál fué su apellido de soltera?</option>
                        <option value="3">¿Quién fué su superhéroe de niño(a)?</option>
                        <option value="4">¿Cuál es su comida favorita?</option>
                        <option value="5">¿Cuál es su pasatiempo?</option>
                        <option value="6">¿Como se llama su primer hijo(a)?</option>
                        <option value="7">¿Dónde nació?</option>
                        <option value="8">¿Dónde fué su bautizo?</option>
                        <option value="9">¿Dónde cursó el primer año escolar?</option>
                    </select>
                    <input required type="password" name="resp" id="resp" placeholder="Respuesta" />
                </div>
                 <div class="grupobotones">
                        <button class="boton" type="button" onclick=location="index" ><i class="fa fa-arrow-left"></i> Página principal</button>
                        <button class="boton" type="submit"><i class='fa fa-check'></i> Registrarse</button>
                 </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
