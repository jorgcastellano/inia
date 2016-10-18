<?php

    $host = "localhost";
    $user = "root";
    $pass = "jorgejac";
    $db = "admin_rally";

    $mysqli = new mysqli($host, $user, $pass, $db);

    if($mysqli->connect_errno){
    printf(
      "<h2>No se ha podido conectar a la base de datos</h2>
      <b>Numero de error: </b>%d<br />
      <b>Mensaje de error: </b>%s",
      $mysqli->connect_errno,
      $mysqli->connect_error
    );
    exit();
  }

  //Con el hosting de desarrollo no se permite el comando mysqldump por lo que se usara en local
  //include_once 'conexion.php';

  $fechaDeLaCopia = "-".date("d-l-F-Y");
  $nombreBackup = $db.$fechaDeLaCopia.".sql";

  //Por si es winodws o linux el comando o la ruta de mysqldump cambia
  $sql = "SHOW variables WHERE variable_name='basedir'";
  $consulta = $mysqli->query($sql);
  $resultado = $consulta->fetch_array();
  $DirBase = $resultado[1];
  $primero = substr($DirBase,0,1);
  if ($primero == "/") //Esto es Linux
      $DirBase = "mysqldump";
  else //Significa que esto es windows
      $DirBase = $DirBase."/bin/mysqldump";

  //Seguimos con el backup
  $executa = "$DirBase --host=$host --user=$user --password=$pass -R -c --add-drop-table $db > $nombreBackup";
  system($executa);

  header("Content-Disposition: attachment; filename=".$nombreBackup."");
  header("Content-type: application/force-download");
  @readfile($nombreBackup);

  unlink($nombreBackup);

?>
