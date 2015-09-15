<?php

    session_start();

	if(isset($_SESSION['id'])) :
		$logeado = 'On';
		if ($_SESSION['aprobacion'] == "Off") :
			header("location: ../../0/home/noaceptado");
		endif;
	else :
		$logeado = 'Off';
		header("location: ../../0/home/index");
	endif;
    $indexes = "No";
?>