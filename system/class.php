<?php       

require_once '../../includes/conexion_bd.php';



class producto 
  {
     public function registrar_produ($mysqli, $Nom_produ, $Existencia, $Precio_produ)
      {
        $sql="INSERT INTO producto(Cod_produ,Nom_produ,Existencia,Precio_produ)
        VALUES ('$Cod_produ','$Nom_produ','$Existencia','$Precio_produ')";
      $mysqli->query($sql);
      require_once 'error_insert.php';
      if($mysqli->affected_rows>0){echo "El nuevo producto se ha registrado con exito";} else { echo "No se ha podido registrar el nuevo producto";}
      }

    public function consultar_produ($mysqli,$Nom_produ)
    {
      $sql="SELECT * FROM producto WHERE producto.Nom_produ ='$Nom_produ'";
      $res= $mysqli->query($sql);
      return $res->fetch_array();
    }
    

    public function consultar_produc($mysqli,$Cod_produ)
    {
      $sql="SELECT * FROM producto WHERE Cod_produ ='$Cod_produ'";
      $res= $mysqli->query($sql);
      return $res->fetch_array();

    }

      public function consulta_completo($mysqli)
      {
      $sql = "SELECT * FROM producto";
      return $mysqli->query($sql);
      }

    public function buscadorlike($mysqli, $var){
      $sql = "SELECT * FROM producto WHERE Nom_produ LIKE ('%$var%')";
      return $mysqli->query($sql);
    }
 public function modificar_produ($mysqli,$Cod_produ, $Nom_produ, $Existencia, $Precio_produ)
    {
      $sql="UPDATE producto SET Nom_produ='$Nom_produ', Existencia='$Existencia', Precio_produ='$Precio_produ' WHERE Cod_produ='$Cod_produ' ";
      $mysqli->query($sql);
      require_once 'error_update.php';
      if($mysqli->affected_rows > 0){echo "Los datos del producto se han modificado con exito";} else { echo "No se ha podido moificar los datos del producto";}
    }
  }

class laboratorio {
  
    private $reg;
   
    public function registrar_laboratorio($mysqli,$Nom_lab)
    {
      $sql="INSERT INTO laboratorio (Cod_lab,Nom_lab)
            VALUES ('$Cod_lab','$Nom_lab')";
      $mysqli->query($sql);
      require_once 'error_insert.php';      
    }

    public function modificar_laboratorio($mysqli,$Cod_lab,$Nom_lab) 
    {
      $sql="UPDATE laboratorio SET Nom_lab='$Nom_lab' WHERE Cod_lab='$Cod_lab'";
      $mysqli->query($sql);
      require_once 'error_update.php';
    }
    public function consultar_completa($mysqli)
    {
      $sql="SELECT * FROM laboratorio";
      return $res = $mysqli->query($sql);
    }

    public function consultar_laboratorio($mysqli,$Cod)
    {
      $sql="SELECT * FROM laboratorio WHERE Cod_lab ='$Cod'";
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
    public function modificar_estatus_laboratorio_all($mysqli)
    {
        $sql = "UPDATE laboratorio SET estatus='Off'";
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
      $sql="UPDATE analisis SET Nom_ana='$Nom_ana', Precio_ana='$Precio_ana', Tipo='$Tipo' WHERE Cod_ana ='$Cod_ana'";
      $mysqli->query($sql);
      require_once 'error_update.php';
      if($mysqli->affected_rows>0){echo "El analisis se ha modificado con exito";} else { echo "No se ha podido modificar el analisis";}

    }

    public function consultar_analisis($mysqli,$Cod) {
      //Buscdor por nombre exacto
      $sql="SELECT * FROM analisis WHERE Cod_ana='$Cod'";
      $res= $mysqli->query($sql);
      return $res->fetch_array();
    }
    public function consultar_analisis_cod($mysqli,$Tipo) {
      //Buscdor por codigo
      $sql="SELECT * FROM analisis WHERE Cod_ana=(SELECT MAX(Cod_ana) FROM analisis WHERE Tipo='$Tipo')";
      $res= $mysqli->query($sql);
      return $res->fetch_array();
    }

    public function cEstatus($mysqli, $v) {
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

    public function desactive_all($mysqli,$var)
    {
       $sql = "UPDATE analisis SET estatus='Off' WHERE Tipo='$var'";
        $mysqli->query($sql);
        require_once 'error_update.php';
    }
    public function desactive_all_all($mysqli)
    {
       $sql = "UPDATE analisis SET estatus='Off'";
        $mysqli->query($sql);
        require_once 'error_update.php'; 
    }

    public function consulta_completo($mysqli){
      $sql = "SELECT * FROM analisis ORDER BY Tipo ASC, Nom_ana ASC";
      return $mysqli->query($sql);
    }
    public function buscadorlike($mysqli, $var){
      $sql = "SELECT * FROM analisis WHERE Nom_ana LIKE ('%$var%')";
      return $mysqli->query($sql);
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

class ayudante
{

    public function consultar_ayudante($mysqli)
    {
      $sql="SELECT * FROM ayudante";
      $res=$mysqli->query($sql);
      return  $res->fetch_array();
    }

    public function actualizar_sol($mysqli,$sol)
    {
    $sql="UPDATE ayudante SET aiso='$sol'";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';

    }
    public function actualizar_sue($mysqli,$sue)
    {
    $sql="UPDATE ayudante SET aims='$sue'";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';

    }
    public function actualizar_fito($mysqli,$fit)
    {
    $sql="UPDATE ayudante SET aimf='$fit'";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';

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


    public function modificar_suelo($mysqli,$Cod_suelo,$Cod_lab,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion)
    {       

      $sql="UPDATE m_suelo SET Cod_lab='$Cod_lab',Tam_lote='$Tam_lote',Profundidad='$Profundidad',Carac_terreno='$Carac_terreno',Inundacion='$Inundacion',Riego='$Riego',Criego='$Criego',F_toma='$F_toma',T_vege='$T_vege',Cultivo='$Cultivo',Edad_cult='$Edad_cult',Dis_siembra='$Dis_siembra',Nro_pl='$Nro_pl',Cult_antes='$Cult_antes',Rend_cult='$Rend_cult',Restos='$Restos',Fertilizante='$fertil',Fert_cant='$Fert_cantidad',Epoca_aplic='$Epoca_aplic',Aplicacion='$Aplicacion' WHERE Cod_suelo='$Cod_suelo' ";
      $res=$mysqli->query($sql);
      include_once 'error_update.php';

    }

}  

class solicitud_analisis {



    public function registrar_solicitud_analisis1($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito)
    {


      $sql="INSERT INTO `proyecto3`.`solicitud_analisis` (`Id_sa`, `Cod_sol`, `Cod_ana`, `Cod_suelo`, `Cod_fito`) VALUES (NULL, '$Cod_sol', '$Cod_ana', '$Cod_suelo', NULL)";
      $res=$mysqli->query($sql);
      //$res=$mysqli_query($mysqli,$sql);
      include_once 'error_insert.php';

      
    }

    public function registrar_solicitud_analisis2($mysqli,$Cod_sol,$Cod_ana,$Cod_suelo,$Cod_fito)
    {


      $sql="INSERT INTO `proyecto3`.`solicitud_analisis` (`Id_sa`, `Cod_sol`, `Cod_ana`, `Cod_suelo`, `Cod_fito`) VALUES (NULL, '$Cod_sol', '$Cod_ana', NULL, '$Cod_fito')";
      $res=$mysqli->query($sql);
      //$res=$mysqli_query($mysqli,$sql);
      include_once 'error_insert.php';

      
    }

    public function consultar_sam($mysqli,$codm)
    {

      $sql="SELECT * FROM solicitud_analisis, analisis WHERE Cod_suelo ='$codm'  AND solicitud_analisis.Cod_ana=analisis.Cod_ana OR Cod_fito ='$codm' AND solicitud_analisis.Cod_ana=analisis.Cod_ana";
      return $mysqli->query($sql);
      

    }


    public function eliminar_sams($mysqli,$insert,$Cod_sol,$Cod_suelo)
    {


      $sql="DELETE FROM solicitud_analisis WHERE Cod_sol='$Cod_sol' AND Cod_ana='$insert' AND Cod_suelo='$Cod_suelo'";
      $res=$mysqli->query($sql);

    }

    public function eliminar_samf($mysqli,$insert,$Cod_sol,$Cod_fito)
    {


      $sql="DELETE FROM solicitud_analisis WHERE Cod_sol='$Cod_sol' AND Cod_ana='$insert' AND Cod_fito='$Cod_fito'";
      $res=$mysqli->query($sql);

    }

  }




class fito {

  private $reg;


  public function registrar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones)
  {
     $sql="INSERT INTO m_fito (Cod_fito,Cod_lab,Tipo_fito,Descrip_fito,Cult_fito,Edad_fito,F_coleccion,Pobl_cercana,Id_microorg,Sintomas,F_sintomas,Causa,Tipo_plant,Tam_lote,Nro_plant,Nro_subm,dist_f,Origen_sem,Pres_microorg,Dist_planafect,Part_afect,Riego,Topografia,Text_sue,Composicion,Hum_sue,Drenaje,Practicas,Produc_dosis,Control,Produc_dosisb,Cult_ant,Cond_agroclima,Observaciones) 
           VALUES ('$Cod_fito','$Cod_lab','$Tipo_fito','$Descrip_fito','$Cult_fito','$Edad_fito','$F_coleccion','$Pobl_cercana','$Id_microorg','$sintoma','$F_sintomas','$Causa','$Tipo_plant','$Tam_lote','$Nro_plant','$Nro_subm','$dist_f','$Origen_sem','$Pres_microorg','$Dist_planafect','$Parte','$Riego','$Topografia','$Text_sue','$Composicion','$Hum_sue','$Drenaje','$practicas','$Produc_dosis','$control','$Produc_dosisb','$Cult_ant','$Cond_agroclima','$Observaciones')";
     $res=$mysqli->query($sql);
     include_once 'error_insert.php';

  }
  

  public function consultar_fito($mysqli,$Cod_fito)
  {

    $sql="SELECT * FROM m_fito WHERE m_fito.Cod_fito ='$Cod_fito'";
    $res=$mysqli->query($sql);
    return $this -> reg = mysqli_fetch_array($res);
    include_once 'error_select.php';

  }

  public function modificar_fito($mysqli,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parte,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones)
  {       

    $sql="UPDATE m_fito SET Tipo_fito='$Tipo_fito',Descrip_fito='$Descrip_fito',Cult_fito='$Cult_fito',Edad_fito='$Edad_fito',F_coleccion='$F_coleccion',Pobl_cercana='$Pobl_cercana',Id_microorg='$Id_microorg',Sintomas='$sintoma',F_sintomas='$F_sintomas',Causa='$Causa',Tipo_plant='$Tipo_plant',Tam_lote='$Tam_lote',Nro_plant='$Nro_plant',Nro_subm='$Nro_subm',dist_f='$dist_f',Origen_sem='$Origen_sem',Pres_microorg='$Pres_microorg',Dist_planafect='$Dist_planafect',Part_afect='$Parte',Riego='$Riego',Topografia='$Topografia',Text_sue='$Text_sue',Composicion='$Composicion',Hum_sue='$Hum_sue',Drenaje='$Drenaje',Practicas='$practicas',Produc_dosis='$Produc_dosis',Control='$control',Produc_dosisb='$Produc_dosisb',Cult_ant='$Cult_ant',Cond_agroclima='$Cond_agroclima',Observaciones='$Observaciones' WHERE Cod_fito='$Cod_fito'";
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
