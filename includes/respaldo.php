<?php
     include_once 'conexion_bd.php';
    $fechaDeLaCopia = "-".date("d-l-F-Y");     
	$ficheroDeLaCopia =$dbname.$fechaDeLaCopia.".sql"; 
	$sistema="show variables where variable_name= 'basedir'"; 
	$restore=mysql_query($sistema); 
	$DirBase=mysql_result($restore,0,"value"); 
	$primero=substr($DirBase,0,1); 
	if ($primero=="/") { 
    	$DirBase="mysqldump"; 
     }  
	else  
	{ 
    	$DirBase=$DirBase."bin\mysqldump"; 
    } 
	$executa="$DirBase --host=inia.jorgcastellano.net.ve --user=gproyecto --password=123456    proyecto3 > $ficheroDeLaCopia"; 
	system($executa); 
	header( "Content-Disposition: attachment; filename=".$ficheroDeLaCopia.""); 
	header("Content-type: application/force-download"); 
	@readfile($ficheroDeLaCopia); 
	unlink($ficheroDeLaCopia); 
?>