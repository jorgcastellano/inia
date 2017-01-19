<?php

require_once '../../includes/conexion.php';

class producto
  {
  public function registrar_produ($mysqli, $Nom_produ, $Existencia, $Precio_produ, $iva, $um)
  {
    $sql="INSERT INTO producto(Cod_produ,Nom_produ,Existencia,Precio_produ, I_E, um)
    VALUES ('$Cod_produ','$Nom_produ','$Existencia','$Precio_produ', '$iva', '$um')";
  $mysqli->query($sql);
  require_once 'error_insert.php';

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

    public function consulta_completo($mysqli) {
      $sql = "SELECT * FROM producto";
      return $mysqli->query($sql);
    }

  public function buscadorlike($mysqli, $var){
    $sql = "SELECT * FROM producto WHERE Nom_produ LIKE ('%$var%')";
    return $mysqli->query($sql);
  }
  public function modificar_produ($mysqli,$Cod_produ, $Nom_produ, $Existencia, $Precio_produ, $iva, $um)
  {
    $sql="UPDATE producto SET Nom_produ='$Nom_produ', Existencia='$Existencia', Precio_produ='$Precio_produ', I_E='$iva', um='$um' WHERE Cod_produ='$Cod_produ'";
    $mysqli->query($sql);
    require_once 'error_update.php';

  }
  public function actualizar_existencia($mysqli, $Existencia, $cod){
    $sql = "UPDATE producto SET Existencia='$Existencia' WHERE Cod_produ='$cod'";
    $mysqli->query($sql);
    require_once 'error_update.php';
    if($mysqli->affected_rows>0){echo "<span class='notify'><i class='fa fa-check-square'></i>Los datos del producto se han modificado con éxito<br /></span> ";}
    else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se ha podido modificar los datos del producto<br /></span> ";}
  }
    public function consultar_ultimo_registro($mysqli) {
      //Ultimo producto insertado
      $sql="SELECT * FROM producto WHERE Cod_produ=(SELECT MAX(Cod_produ) FROM producto)";
      $res= $mysqli->query($sql);
      return $res->fetch_array();
    }
    public function eliminar($mysqli, $codigo){
      $sql = "DELETE FROM producto WHERE Cod_produ = '$codigo'";
      $mysqli->query($sql);
      require_once 'error_update.php';
    if($mysqli->affected_rows>0){echo "<span class='notify'><i class='fa fa-check-square'></i>El producto seleccionado se ha eliminado con éxito<br /></span> ";}
    else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se ha podido eliminar el producto seleccionado<br /></span> ";}
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

    }

    public function modificar_analisis($mysqli,$Cod_ana,$Nom_ana,$Precio_ana,$Tipo)
    {
      $sql="UPDATE analisis SET Nom_ana='$Nom_ana', Precio_ana='$Precio_ana', Tipo='$Tipo' WHERE Cod_ana ='$Cod_ana'";
      $mysqli->query($sql);
      require_once 'error_update.php';
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


    public function consultar_analisis_muestra($mysqli,$Tipo){
      //buscador para formulario de muestra
      $sql="SELECT * FROM analisis WHERE analisis.tipo = '$Tipo' AND analisis.estatus = 'On'";
      return $mysqli->query($sql);

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
    public function eliminar($mysqli, $codigo){
      $sql = "DELETE FROM analisis WHERE Cod_ana = '$codigo'";
      $mysqli->query($sql);
    }
}

class cliente {

      private $reg;

      public function registrar_cliente($mysqli,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente, $tipoUser, $tipOrg, $naturalidad)
      {
         $sql="INSERT INTO cliente (Ced_cliente,Nom_cliente,Apelli_cliente,Contacto,Telf_cliente,Dire_cliente,tipoUser,tipOrg,Nat_jur)
               VALUES ('$Ced_cliente','$Nom_cliente','$Apelli_cliente','$Contacto','$Telf_cliente','$Dire_cliente', '$tipoUser', '$tipOrg', '$naturalidad')";
         $mysqli->query($sql);
         include_once 'error_insert.php';
         if($mysqli->affected_rows>0){echo "<span class='notify'><i class='fa fa-check-square'></i>El nuevo cliente se ha registrado con éxito<br /></span> ";}
         else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se ha podido registrar el nuevo cliente<br /></span> ";}
      }

     public function consultar_cliente($mysqli,$Ced_cliente)
     {

      $sql="SELECT * FROM cliente WHERE cliente.Ced_cliente ='$Ced_cliente'";
      $res=$mysqli->query($sql);
      return $this -> reg = mysqli_fetch_array($res);

      }

     public function consultar_clientes($mysqli,$reg,$lim)
     {
      $sql="SELECT * FROM cliente LIMIT $reg,$lim ";
      return $res=$mysqli->query($sql);
     }

     public function modificar_cliente($mysqli,$Id_cliente,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente, $tipoUser, $tipOrg)
     {

      $sql="UPDATE cliente SET cliente.Ced_cliente='$Ced_cliente',cliente.Nom_cliente='$Nom_cliente',cliente.Apelli_cliente='$Apelli_cliente',cliente.Contacto='$Contacto',cliente.Telf_cliente='$Telf_cliente',cliente.Dire_cliente='$Dire_cliente', cliente.tipoUser='$tipoUser', cliente.tipOrg='$tipOrg' WHERE cliente.Id_cliente='$Id_cliente'";
      $res=$mysqli->query($sql);
      include_once 'error_update.php';
      if($mysqli->affected_rows>0){echo "<span class='notify'><i class='fa fa-check-square'></i>El cliente se ha modificado con éxito<br /></span> ";}
      else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se realizó ningún cambio en el cliente<br /></span> ";}
      }
}

class finca {

    private $reg;

    public function registrar_finca($mysqli,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Parroquia) {
      $sql="INSERT INTO finca (Ced_cliente,Nom_fin,Estado,Municipio,Parroquia)
            VALUES ('$Ced_cliente','$Nom_fin','$Estado','$Municipio','$Parroquia')";
      $mysqli->query($sql);
      require_once 'error_insert.php';
      if($mysqli->affected_rows>0){echo "<span class='notify'><i class='fa fa-check-square'></i>La nueva finca se ha registrado con éxito<br /></span> ";}
      else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se ha podido registrar la nueva finca<br /></span> ";}
    }
    public function consultar_finca($mysqli,$Cod_fin) {

      $sql="SELECT * FROM finca WHERE finca.Cod_fin ='$Cod_fin'";
      $res=$mysqli->query($sql);
      return  $res->fetch_array();

    }
    public function consultar_finca_all($mysqli,$Ced_cliente) {

      $sql="SELECT * FROM finca WHERE finca.Ced_cliente ='$Ced_cliente'";
      return $mysqli->query($sql);

    }
    public function modificar_finca($mysqli, $Ced_cliente, $cod_finca, $Nom_fin, $Estado, $Municipio,$Parroquia) {

      $sql="UPDATE finca SET finca.Nom_fin='$Nom_fin',finca.Estado='$Estado',finca.Municipio='$Municipio',finca.Parroquia='$Parroquia'  WHERE finca.Ced_cliente='$Ced_cliente' AND finca.Cod_fin='$cod_finca'";
      $res=$mysqli->query($sql);
      if($mysqli->affected_rows>0){echo "<span class='notify'><i class='fa fa-check-square'></i>La Finca se modificó con éxito<br /></span> ";}
      else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se modificó la finca<br /></span> ";}
    }

    public function eliminar($mysqli, $codigo){
      $sql = "DELETE FROM finca WHERE Cod_fin = '$codigo'";
      $mysqli->query($sql);
      require_once 'error_update.php';
    }
}

class solicitud {

    public function registrar_solicitud($mysqli,$Cod_sol,$Ced_cliente)
    {
      $sql="INSERT INTO solicitud (Cod_sol,Cod_cliente)
            VALUES ('$Cod_sol','$Ced_cliente')";
      $res=$mysqli->query($sql);
      require_once 'error_insert.php';
      if($mysqli->affected_rows>0){echo "<span class='notify'><i class='fa fa-check-square'></i>La solicitud se ha registrado con éxito<br /></span> ";}
      else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se ha podido registrar la nueva solicitud<br /></span> ";}
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

    public function actualizar_iva($mysqli,$iva)
    {
    $sql="UPDATE ayudante SET iva='$iva'";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';

    }
}

class muestra {

    private $reg;

    public function registrar_muestra($mysqli,$Cod_muestra,$Tipo_m,$Cult_act,$Nro_pl,$Edad_cul,$Tam_lote,$Topografia,$Dist_siembra,$Riego,$Cult_ant,$F_toma,$Practicas,$Produc_dosis,$Epoca_aplic,$Modo_aplic,$Pobl_cercana,$Profundidad,$Inundacion,$T_vege,$Rend_cult,$Restos,$Descrip_fito,$Id_microorg,$Sintomas,$F_sintomas,$Causa,$Tipo_plant,$Nro_subm,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parts_afect,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$Controles,$Produc_dosisb,$Cond_agroclima,$Observaciones,$Finca)
    {


      $sql="INSERT INTO muestra(Cod_muestra,Tipo_m,Cult_act,Nro_pl,Edad_cul,Tam_lote,Topografia,Dist_siembra,Riego,Cult_ant,F_toma,Practicas,Produc_dosis,Epoca_aplic,Modo_aplic,Pobl_cercana,Profundidad,
        Inundacion,T_vege,Rend_cult,Restos,Descrip_fito,Id_microorg,Sintomas,F_sintomas,Causa,Tipo_plant,Nro_subm,Origen_sem,Pres_microorg,Dist_planafect,Parts_afect,Text_sue,Composicion,Hum_sue,
        Drenaje,Controles,Produc_dosisb,Cond_agroclima,Observaciones,Finca)
            VALUES ('$Cod_muestra','$Tipo_m','$Cult_act','$Nro_pl','$Edad_cul','$Tam_lote','$Topografia','$Dist_siembra','$Riego','$Cult_ant','$F_toma','$Practicas','$Produc_dosis','$Epoca_aplic',
              '$Modo_aplic','$Pobl_cercana','$Profundidad','$Inundacion','$T_vege','$Rend_cult','$Restos','$Descrip_fito','$Id_microorg','$Sintomas','$F_sintomas','$Causa','$Tipo_plant','$Nro_subm',
              '$Origen_sem','$Pres_microorg','$Dist_planafect','$Parts_afect','$Text_sue','$Composicion','$Hum_sue','$Drenaje','$Controles','$Produc_dosisb','$Cond_agroclima','$Observaciones','$Finca')";
      $mysqli->query($sql);
      require_once 'error_insert.php';


    }
    public function consultar_muestra($mysqli,$Cod_muestra)
    {

      $sql="SELECT * FROM muestra WHERE muestra.Cod_muestra ='$Cod_muestra'";
      $res=$mysqli->query($sql);
      return $res->fetch_array();

    }


    public function modificar_muestra($mysqli,$Cod_muestra,$Tipo_m,$Cult_act,$Nro_pl,$Edad_cul,$Tam_lote,$Topografia,$Dist_siembra,$Riego,$Cult_ant,$F_toma,$Practicas,$Produc_dosis,$Epoca_aplic,$Modo_aplic,$Pobl_cercana,$Profundidad,$Inundacion,$T_vege,$Rend_cult,$Restos,$Descrip_fito,$Id_microorg,$Sintomas,$F_sintomas,$Causa,$Tipo_plant,$Nro_subm,$Origen_sem,$Pres_microorg,$Dist_planafect,$Parts_afect,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$Controles,$Produc_dosisb,$Cond_agroclima,$Observaciones,$Finca)
    {

      $sql="UPDATE muestra SET Tipo_m='$Tipo_m',Cult_act='$Cult_act',Nro_pl='$Nro_pl',Edad_cul='$Edad_cul',Tam_lote='$Tam_lote',Topografia='$Topografia',Dist_siembra='$Dist_siembra',Riego='$Riego',Cult_ant='$Cult_ant',F_toma='$F_toma',Practicas='$Practicas',Produc_dosis='$Produc_dosis',Epoca_aplic='$Epoca_aplic',Modo_aplic='$Modo_aplic',Pobl_cercana='$Pobl_cercana',Profundidad='$Profundidad',Inundacion='$Inundacion',T_vege='$T_vege',Rend_cult='$Rend_cult',Restos='$Restos',Descrip_fito='$Descrip_fito',Id_microorg='$Id_microorg',Sintomas='$Sintomas',F_sintomas='$F_sintomas',Causa='$Causa',Tipo_plant='$Tipo_plant',Nro_subm='$Nro_subm',Origen_sem='$Origen_sem',Pres_microorg='$Pres_microorg',Dist_planafect='$Dist_planafect',Parts_afect='$Parts_afect',Text_sue='$Text_sue',Composicion='$Composicion',Hum_sue='$Hum_sue',Drenaje='$Drenaje',Controles='$Controles',Produc_dosisb='$Produc_dosisb',Cond_agroclima='$Cond_agroclima',Observaciones='$Observaciones',Finca='$Finca' WHERE Cod_muestra='$Cod_muestra'";
      $res=$mysqli->query($sql);
      include_once 'error_update.php';

    }
    public function consultar_muestras($mysqli,$estatus)
    {

      $sql="SELECT * FROM muestra WHERE muestra.Estatus ='$estatus'";
      return $mysqli->query($sql);

    }

    public function cambiar_estatus($mysqli,$estatus,$idm)
    {

      $sql="UPDATE muestra SET Estatus='$estatus' WHERE id='$idm'";
      return $mysqli->query($sql);

    }

    public function asignar_especialista($mysqli,$idm,$Ced_esp)
    {
      $sql="INSERT INTO muestra_especialista(id,idm,Ced_esp) VALUES (NULL, '$idm', '$Ced_esp')";
      return $mysqli->query($sql);
    }
    public function consultar_muestra_especialista($mysqli,$idm)
    {
      $sql="SELECT * FROM muestra_especialista WHERE muestra_especialista.idm='$idm'";
      return $mysqli->query($sql);
    }

    public function consultar_muestra_id($mysqli,$idm)
    {

      $sql="SELECT * FROM muestra WHERE muestra.id ='$idm'";
      return $mysqli->query($sql);


    }




}

class solicitud_analisis {



    public function registrar_solicitud_analisis($mysqli,$Cod_sol,$Cod_ana,$Cod_muestra)
    {


      $sql="INSERT INTO solicitud_analisis(Id_sa,Cod_sol,Cod_ana,Cod_muestra) VALUES (NULL, '$Cod_sol', '$Cod_ana', '$Cod_muestra')";
      $res=$mysqli->query($sql);
      //$res=$mysqli_query($mysqli,$sql);
      include_once 'error_insert.php';


    }



    public function consultar_sam($mysqli,$Cod_muestra)
    {

      $sql="SELECT * FROM solicitud_analisis, analisis WHERE Cod_muestra ='$Cod_muestra'  AND solicitud_analisis.Cod_ana=analisis.Cod_ana";
      return $mysqli->query($sql);


    }


    public function eliminar_sam($mysqli,$insert,$Cod_sol,$Cod_muestra)
    {


      $sql="DELETE FROM solicitud_analisis WHERE Cod_sol='$Cod_sol' AND Cod_ana='$insert' AND Cod_muestra='$Cod_muestra'";
      $res=$mysqli->query($sql);

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

  public function consultar_r_fito($mysqli) {
    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_select.php';

  }

  public function modificar_r_fito($mysqli) {
    $sql="";
    $res=$mysqli->query($sql);
    include_once 'error_update.php';
  }

}

class factura {
  public function facturar($mysqli, $cedula, $subtotal) {
    $fecha = date('Y-m-d');
    $sql = "INSERT INTO factura(Ced_cliente, Fecha, subtotal) VALUES ('$cedula', '$fecha', '$subtotal')";
    $mysqli->query($sql);
    include_once 'error_insert.php';
  }
  public function consultar_factura_insertada($mysqli,$ci) {
    //Buscdor por cedula
    $sql="SELECT * FROM factura WHERE Cod_fact=(SELECT MAX(Cod_fact) FROM factura WHERE Ced_cliente='$ci')";
    $res= $mysqli->query($sql);
    return $res->fetch_array();
  }
     public function buscador_cedula($mysqli, $ci){
    $sql="SELECT cliente.Ced_cliente, cliente.Nom_cliente, cliente.Apelli_cliente, factura.Cod_fact, factura.Fecha, factura.subtotal FROM cliente, factura WHERE cliente.Ced_cliente=factura.Ced_cliente  AND factura.Ced_cliente='$ci' AND factura.Estatus='impaga'";
    return $mysqli->query($sql);
  }

  public function consultar_facturas($mysqli) {
    $sql="SELECT cliente.Ced_cliente, cliente.Nom_cliente, cliente.Apelli_cliente, factura.Cod_fact, factura.Fecha, factura.subtotal FROM cliente, factura WHERE cliente.Ced_cliente=factura.Ced_cliente AND Estatus='impaga'";
    return $res= $mysqli->query($sql);
  }
   public function consultar_factu($mysqli, $codigo) {
    $sql="SELECT cliente.Ced_cliente, cliente.Nom_cliente, cliente.Apelli_cliente, factura.Cod_fact, factura.Fecha, factura.subtotal FROM cliente, factura WHERE cliente.Ced_cliente=factura.Ced_cliente AND Estatus='impaga'";
    return $res= $mysqli->query($sql);
  }


  public function consultar_factura($mysqli, $codigo) {
    $sql="SELECT * FROM factura WHERE Cod_fact='$codigo'";
    $res= $mysqli->query($sql);
    return $res->fetch_array();
  }

  public function modificar_factura($mysqli,$codigo,$exento,$base,$iva,$retencion,$alicuota,$total, $observacion, $ivaporciento, $retencionporciento, $tipofactura, $metodo, $bauche) {
    if ($bauche == 0){
    $sql="UPDATE factura SET Tipo_pago='$tipofactura', Forma_pago='$metodo', Bauche=NULL, exento='$exento',
                              base='$base', iva='$iva', retencion='$retencion', alicuota='$alicuota',Total='$total', observacion='$observacion',
                              ivaporc='$ivaporciento', exentoporc='$retencionporciento', Estatus='paga' WHERE Cod_fact='$codigo'";
    } else {
          $sql="UPDATE factura SET Tipo_pago='$tipofactura', Forma_pago='$metodo', Bauche='$bauche', exento='$exento',
                              base='$base', iva='$iva', retencion='$retencion', alicuota='$alicuota',Total='$total', observacion='$observacion',
                              ivaporc='$ivaporciento', exentoporc='$retencionporciento', Estatus='paga' WHERE Cod_fact='$codigo'";
    }
    $res=$mysqli->query($sql);
  }

  public function consultar_ventas_anual($mysqli,$Tipo_pago,$Fecha)
  {
    $sql="SELECT factura.total FROM factura WHERE factura.Estatus='paga' AND factura.Tipo_pago='$Tipo_pago' AND Fecha LIKE '%$Fecha%'";
    return $res= $mysqli->query($sql);
  }
  public function eliminar_factura($mysqli, $cod){
    $sql = "DELETE FROM factura WHERE Cod_fact = '$cod'";
    $mysqli->query($sql);
  }
}

class factura_descripcion {

  public function facturar_productos($mysqli, $id, $descripcion, $cantidad, $costo, $precio, $cod_produ) {
    $sql = "INSERT INTO fact_descripcion (Cod_fact, Descripcion, Cantidad, Costo_unidad, Precio, Cod_produ) VALUES ('$id', '$descripcion', '$cantidad', '$costo', '$precio', '$cod_produ')";
    $mysqli->query($sql);
    include_once 'error_insert.php';
  }

  public function consultar_factura($mysqli, $codigo)
  {
    $sql="SELECT fact_descripcion.Id_fact_produc, fact_descripcion.Cod_fact, fact_descripcion.Descripcion, fact_descripcion.Cantidad, fact_descripcion.Costo_unidad, fact_descripcion.Precio, producto.I_E FROM fact_descripcion, producto WHERE fact_descripcion.Cod_produ=producto.Cod_produ AND fact_descripcion.Cod_fact='$codigo'";
    return $res= $mysqli->query($sql);
  }

  public function consultar_producto_cantidad($mysqli, $codigo, $fecha)
  {
    $sql="SELECT factura.Fecha, factura.ivaporc, fact_descripcion.Descripcion, fact_descripcion.Cantidad, fact_descripcion.Costo_unidad FROM factura, fact_descripcion WHERE factura.Cod_fact=fact_descripcion.Cod_fact AND factura.Fecha LIKE '%$fecha%' AND fact_descripcion.Cod_produ = '$codigo'";
    return $res= $mysqli->query($sql);
  }
}

class iva{

  //Esta funcion hay q modificarla por el estado del iva
  public function consultar_iva_actual($mysqli){
    $sql = "SELECT iva FROM iva WHERE id=(SELECT MAX(id) AS id FROM iva)";
    return $mysqli->query($sql);
  }

  public function insertar_iva($mysqli,$iva,$Dia,$Mes,$Ano,$reten){
    $sql="INSERT INTO iva (iva, Dia, Mes, Ano, Reten) VALUES ('$iva','$Dia','$Mes','$Ano','$reten')";
    $mysqli->query($sql);
    include_once 'error_insert.php';
  }
}

?>
