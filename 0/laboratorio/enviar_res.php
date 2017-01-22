<?php

require_once '../../system/class.php';
extract($_POST);
$estatus="esp_rec";
$idm=$id;
$objmuestra = new muestra();
$objmuestra->cambiar_estatus($mysqli,$estatus,$idm);


?>
