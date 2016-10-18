<?php

    session_start();

	if(isset($_SESSION['id'])) :
		$logeado = 'On';
	else :
		$logeado = 'Off';
		header("location: ../../0/home/index");
	endif;
  $indexes = "No";
?>
