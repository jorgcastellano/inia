<?php

    session_start();
    include_once 'check.php';

	if ($_POST[Modificar]) 
		{
			header('Location: ../0/cliente/modificar.php?var='.$_POST['Ced_cliente']);
		}

?>