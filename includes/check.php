<?php
	if(isset($_SESSION['usuario'])) :
		$logged = 'On';
	else :
		$logged = 'Off';
	endif;
?>