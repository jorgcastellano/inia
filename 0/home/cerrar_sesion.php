<?php

    session_start();
    if(isset($_SESSION['id'])) :
		$logeado = 'On';
	else :
		$logeado = 'Off';
	endif;
    session_unset();
    session_destroy();
    $logeado = "Off";

    header("location: ../../0/home/index");

?>