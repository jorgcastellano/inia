 <?php       

require_once '../../includes/conexion_bd.php';

class laboratorio {

    //private $res;
    private $reg;
   
    public function registrar_laboratorio($mysqli,$Nom_lab)
    {
      $sql="INSERT INTO laboratorio (Cod_lab,Nom_lab)
            VALUES ('$Cod_lab','$Nom_lab')";
      $mysqli->query($sql);
      require_once 'error_insert.php';
      if($mysqli->affected_rows>0){echo "El nuevo laboratorio se ha registrado con exito";} else { echo "No se ha podido registrar el nuevo laboratorio";}

    }

    public function modificar_laboratorio($mysqli,$Cod_lab,$Nom_lab)
    {
      $sql="UPDATE laboratorio SET laboratorio.Nom_lab='$Nom_lab' WHERE laboratorio.Cod_lab ='$Cod_lab'";
      $mysqli->query($sql);
      require_once 'error_update.php';
      if($mysqli->affected_rows > 0){echo "Los datos del laboratorio se han modificado con exito";} else { echo "No se ha podido modificar los datos del laboratorio";}

    }

    public function consultar_laboratorio($mysqli,$Nom_la)
    {

      $sql="SELECT * FROM laboratorio WHERE laboratorio.Nom_lab ='$Nom_la'";
      $res = $mysqli->query($sql);
      return $res->fetch_array();
    }

    public function cEstatus($mysqli)
    {

      $sql="SELECT * FROM laboratorio";
      return $mysqli->query($sql);
    }

    public function modificar_estatus_laboratorio($mysqli,$off,$var)
    {
        $sql = "UPDATE laboratorio SET estatus='$off' WHERE Cod_lab='$var'";
        $mysqli->query($sql);
        require_once 'error_update.php';
    }
        
    }


class analisis {

    public function registrar_analisis($mysqli,$Nom_ana,$Precio_ana,$Tipo)
    {

      $sql="INSERT INTO analisis (Nom_ana,Precio_ana,Tipo, estatus)
            VALUES ('$Nom_ana','$Precio_ana','$Tipo', 'On')";
      $mysqli->query($sql);
      require_once 'error_insert.php';
      if($mysqli->affected_rows>0){echo "El nuevo analisis se ha registrado con exito";} else { echo "No se ha podido registrar el nuevo analisis";}

    }

    public function modificar_analisis($mysqli,$Cod_ana,$Nom_ana,$Precio_ana,$Tipo)
    {

      $sql="UPDATE analisis SET analisis.Nom_ana='$Nom_ana', analisis.Precio_ana='$Precio_ana', analisis.Tipo='$Tipo' WHERE analisis.Cod_ana ='$Cod_ana'";
      $mysqli->query($sql);
      require_once 'error_update.php';
      if($mysqli->affected_rows>0){echo "El analisis se ha modificado con exito";} else { echo "No se ha podido modificar el analisis";}

    }

    public function consultar_analisis($mysqli,$Nom_ana)
    {
      $sql="SELECT * FROM analisis WHERE analisis.Nom_ana ='$Nom_ana'";
      $res= $mysqli->query($sql);
      return $res->fetch_array();

    }

    public function cEstatus($mysqli, $v)
    {
      $sql="SELECT * FROM analisis WHERE Tipo = '$v' ORDER BY Nom_ana ASC";
      return $mysqli->query($sql);
    }

    public function consultar_estatus_analisis($mysqli){
        $sql = "SELECT Cod_ana, estatus FROM analisis ORDER BY Tipo ASC, Nom_ana ASC";
        return $mysqli->query($sql);
    }

    public function modificar_estatus_analisis($mysqli, $variable, $variable1) {
        $sql = "UPDATE analisis SET estatus='$variable' WHERE Cod_ana='$variable1'";
        $mysqli->query($sql);
        require_once 'error_update.php';
    }

    public function desactive_all($mysqli,$off,$var)
    {
       $sql = "UPDATE analisis SET estatus='$off' WHERE Tipo='$var'";
        $mysqli->query($sql);
        require_once 'error_update.php'; 
    }

}

class cliente {

      private $reg;

      public function registrar_cliente($mysqli,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente)
      {
         $sql="INSERT INTO cliente (Ced_cliente,Nom_cliente,Apelli_cliente,Contacto,Telf_cliente,Dire_cliente) 
               VALUES ('$Ced_cliente','$Nom_cliente','$Apelli_cliente','$Contacto','$Telf_cliente','$Dire_cliente')";
         $mysqli->query($sql);
         include_once 'error_insert.php';
         if($mysqli->affected_rows>0){echo "El nuevo cliente se ha registrado con éxito<br />";} else { echo "No se ha podido registrar el nuevo cliente<br />";}


      }

     public function consultar_cliente($mysqli,$Ced_cliente)
     {

      $sql="SELECT * FROM cliente WHERE cliente.Ced_cliente ='$Ced_cliente'";
      $res=$mysqli->query($sql);
      return $this -> reg = mysqli_fetch_array($res);

      }

     public function modificar_cliente($mysqli,$Id_cliente,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente)
     {       

      $sql="UPDATE cliente SET cliente.Ced_cliente='$Ced_cliente',cliente.Nom_cliente='$Nom_cliente',cliente.Apelli_cliente='$Apelli_cliente',cliente.Contacto='$Contacto',cliente.Telf_cliente='$Telf_cliente',cliente.Dire_cliente='$Dire_cliente' WHERE cliente.Id_cliente='$Id_cliente'";
      $res=$mysqli->query($sql);
      include_once 'error_update.php';
      if($mysqli->affected_rows>0){echo "El cliente se ha modificado con éxito!!";} else { echo "No se realizó ningún cambio en el cliente";}


      }



}

class finca {
  
    private $reg;

    public function registrar_finca($mysqli,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Parroquia)
    {

      $sql="INSERT INTO finca (Ced_cliente,Nom_fin,Estado,Municipio,Parroquia)
            VALUES ('$Ced_cliente','$Nom_fin','$Estado','$Municipio','$Parroquia')";
      $mysqli->query($sql);
      require_once 'error_insert.php';
       if($mysqli->affected_rows>0){ echo "La nueva finca se ha registrado con éxito";} else { echo "no se ha podido registrar la nueva finca";}

    }
   
    public function consultar_finca($mysqli,$Ced_cliente)
    {

      $sql="SELECT * FROM finca WHERE finca.Ced_cliente ='$Ced_cliente'";
      $res=$mysqli->query($sql);
      return  $res->fetch_array();

    }
    public function modificar_finca($mysqli,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Parroquia)
    {

      $sql="UPDATE finca SET finca.Nom_fin='$Nom_fin',finca.Estado='$Estado',finca.Municipio='$Municipio',finca.Parroquia='$Parroquia'  WHERE finca.Ced_cliente='$Ced_cliente'";
      $res=$mysqli->query($sql);
      if($mysqli->affected_rows>0){echo "La finca se modifico con exito";} else { echo "No se realizó ningún cambio a la finca";}
    }


}

class solicitud {

    public function registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente)
    {
      $sql="INSERT INTO solicitud (Cod_sol,Cod_cliente)
            VALUES ('$Cod_sol','$Ced_cliente')";
      $res=$mysqli->query($sql);
      require_once 'error_insert.php';
      if($mysqli->affected_rows>0){echo "";}
    }
}




class suelo {
  
      private $reg;

    public function registrar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion)
    {

      
      $sql="INSERT INTO m_suelo (Cod_suelo,Cod_lab,Tam_lote,Profundidad,Carac_terreno,Inundacion,Riego,Criego,F_toma,T_vege,Cultivo,Edad_cult,Dis_siembra,Nro_pl,Cult_antes,Rend_cult,Restos,Fertilizante,Fert_cant,Epoca_aplic,Aplicacion) 
            VALUES ('$Cod_suelo','$Cod_lab','$Tam_lote','$Profundidad','$Carac_terreno','$Inundacion','$Riego','$Criego','$F_toma','$T_vege','$Cultivo','$Edad_cult','$Dis_siembra','$Nro_pl','$Cult_antes','$Rend_cult','$Restos','$fertil','$Fert_cantidad','$Epoca_aplic','$Aplicacion')";
      $mysqli->query($sql);
      require_once 'error_insert.php';
      if($mysqli->affected_rows>0){echo "";} else { echo "";}
    }


    public function consultar_suelo($mysqli,$Cod_suelo)
    {

      $sql="SELECT * FROM m_suelo WHERE m_suelo.Cod_suelo ='$Cod_suelo'";
      $res=$mysqli->query($sql);
      return $this -> reg = mysqli_fetch_array($res);

    }


    public function modificar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Cod_rsuelo,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion)
    {       

      $sql="";
      $res=$mysqli->query($sql);
      include_once 'error_update.php';

    }

}  

class solicitud_analisis {



    public function registrar_solicitud_analisis($mysqli,$Cod_sol,$cas,$Cod_suelo,$Cod_fito)
    {


      $sql="INSERT INTO solicitud_analisis (Cod_sol,Cod_ana,Cod_suelo,Cod_fito)
            VALUES ('$Cod_sol','$cas','$Cod_suelo','$Cod_fito')";
      $res=$mysqli_query($mysqli,$sql);
      include_once 'error_insert.php';

      
    }

  }


class fito {


  public function registrar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Otro_tipo,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Part_afect,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones)
  {
     $sql="INSERT INTO m_fito (Cod_fito,Cod_lab,Tipo_fito,Descrip_fito,Cult_fito,Edad_fito,F_coleccion,Pobl_cercana,Id_microorg,Sintomas,F_sintomas,Causa,Tipo_plant,Otro_tipo,Tam_lote,Nro_plant,Nro_subm,dist_f,Origen_sem,Pres_microorg,Dist_planafect,Part_afect,Riego,Topografia,Text_sue,Composicion,Hum_sue,Drenaje,Practicas,Produc_dosis,Control,Produc_dosisb,Cult_ant,Cond_agroclima,Observaciones) 
           VALUES ('$Cod_fito','$Cod_lab','$Tipo_fito','$Descrip_fito','$Cult_fito','$Edad_fito','$F_coleccion','$Pobl_cercana','$Id_microorg','$sintoma','$F_sintomas','$Causa','$Tipo_plant','$Otro_tipo','$Tam_lote','$Nro_plant','$Nro_subm','$dist_f','$Origen_sem','$Pres_microorg','$Dist_planafect','$Part_afect','$Riego','$Topografia','$Text_sue','$Composicion','$Hum_sue','$Drenaje','$practicas','$Produc_dosis','$control','$Produc_dosisb','$Cult_ant','$Cond_agroclima','$Observaciones')";
     $res=$mysqli->query($sql);
     include_once 'error_insert.php';

  }
  

  public function consultar_fito($mysqli,$Cod_fito,$Cod_lab)
  {

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_select.php';

  }

  public function modificar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$Malformacion,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Part_afect,$Riego,$Topografia,$Text_sue,$Hum_sue,$Uso_quimico,$Contrl_male,$Cult_ant,$Cond_agroclima,$Obervaciones)
  {       

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';

  }


}


class r_suelo {

  public function registrar_r_suelo($mysqli)
  {

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_insert.php';

  }

  public function consultar_r_suelo($mysqli)
  {

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_select.php';

  }

  public function modificar_r_suelo($mysqli)
  {

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';

  }

}

class r_fito {

  public function registrar_r_fito($mysqli)
  {

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_insert.php';

  }

  public function consultar_r_fito($mysqli)
  {

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_select.php';

  }

  public function modificar_r_fito($mysqli)
  {

    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';

  }

}

?>        
