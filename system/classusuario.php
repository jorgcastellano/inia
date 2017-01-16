<?php

    class inicio_seguro{

        //Funciones para la tabla miembros
        public function consultar_miembro($mysqli) {
            $sql = "SELECT * FROM miembros";
            return $mysqli->query($sql);
        }
        public function modificar_miembros_estatus($mysqli,$estatus,$cod) {
            $sql = "UPDATE miembros SET aprobacion='$estatus' WHERE id='$cod'";
            $mysqli->query($sql);
            require_once 'error_update.php';
        }
        public function modificar_miembros_estatus_all($mysqli,$estatus) {
            $sql = "UPDATE miembros SET aprobacion='$estatus'";
            $mysqli->query($sql);
            require_once 'error_update.php';
        }
        public function consultar_miembro_on($mysqli) {
            $sql = "SELECT * FROM miembros WHERE aprobacion = 'On'";
            return $mysqli->query($sql);
        }
        public function modificar_privilegios($mysqli, $privilegio, $cod) {
            $sql = "UPDATE miembros SET privilegios = '$privilegio' WHERE id = '$cod'";
            $mysqli->query($sql);
            require_once 'error_update.php';
        }
        public function eliminar_miembros($mysqli, $cod) {
            $sql = "DELETE FROM miembros WHERE ci = '$cod'";
            $mysqli->query($sql);
            require_once 'error_update.php';
        }
        public function bloquear_usuario($mysqli, $email){
            $sql = "UPDATE miembros SET block = '1' WHERE email='$email'";
            $mysqli->query($sql);
            require_once 'error_update.php';
        }
        public function consultar_bloqueo($mysqli, $email){
            $sql = "SELECT block FROM miembros WHERE email='$email'";
            return $mysqli->query($sql);
        }
        public function consultar_mi_usuario($mysqli, $id) {
          $sql = "SELECT * FROM miembros WHERE id='$id'";
          return $mysqli->query($sql);
        }
        public function modificar_usuario($mysqli, $id, $email, $pass, $pregunta, $respuesta) {
          $sql = "UPDATE miembros SET email='$email', password='$pass', pregunta='$pregunta', respuesta='$respuesta' WHERE id='$id'";
          $mysqli->query($sql);
          require_once 'error_update.php';
        }
        public function modificar_usuario_no_pregunta($mysqli, $id, $email, $pass ) {
          $sql = "UPDATE miembros SET email='$email', password='$pass' WHERE id='$id'";
          $mysqli->query($sql);
          require_once 'error_update.php';
        }
        public function modificar_usuario_pregunta($mysqli, $id, $email, $pregunta, $respuesta) {
          $sql = "UPDATE miembros SET email='$email', pregunta='$pregunta', respuesta='$respuesta' WHERE id='$id'";
          $mysqli->query($sql);
          require_once 'error_update.php';
        }

        //Funciones para los intentos
        public function reg_intentos_fallidos($mysqli, $cod){
            $sql = "INSERT INTO intentos(user_id) VALUES ('$cod')";
            $mysqli -> query($sql);
        }
        public function chequeo_intentos($mysqli, $email){
            $sql = "SELECT COUNT(*) FROM intentos WHERE user_id = '$email'";
            return $mysqli->query($sql);
        }
        public function eliminar_intentos($mysqli, $email){
            $sql = "DELETE FROM intentos WHERE user_id = '$email'";
            $mysqli->query($sql);
            require_once 'error_update.php';
        }
    }
?>
