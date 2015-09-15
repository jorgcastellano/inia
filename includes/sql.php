<?php
	$result = mysqli_query($mysqli, $command_sql);
	
	if(mysqli_errno ($mysqli) > 0)
	{
		printf
		(
			"<h2>Error en la base de datos</h2>
			<b>Número de error: </b>%d<br />
			<b>Mensaje de error: </b>%s<br />",
			mysqli_errno($mysqli),
			mysqli_error($mysqli)
		);
		exit();
	}
?>