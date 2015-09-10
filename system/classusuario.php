<?php

    require_once '../../includes/is-conexion_bd.php';

    class inicio_seguro{

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
    }
?>