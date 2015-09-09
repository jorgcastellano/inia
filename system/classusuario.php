<?php       

require_once '../../includes/is-conexion_bd.php';

class miembro {

    public function consultar_miembro($mysqli)


     { 

      $sql="SELECT * FROM miembros WHERE miembros.aprobacion ='$Off'";
      $res=$mysqli->query($sql);
      return $res->fetch_array();
    }


    public function modificar_miembros($mysqli,$Off,$var)
    {
        $sql = "UPDATE miembros SET estatus='$Off' WHERE id='$var'";
        $mysqli->query($sql);
        require_once 'error_update.php';
    }
   
  }

  ?>