<?php session_start(); 
require("../Modelo/conexion.php");
$c = new baseDatos();


$NOM_USU  = $_SESSION["NOMBRE"];
$COD_USU  = $_SESSION["COD_USU"];      
$IDTIP_USU  = $_SESSION['IDTIP_USU'];
$TIP_USU  = $_SESSION['TIPO_Usu'];
$USU_USU  = $_SESSION['Usuario'];
$EST_USU  = $_SESSION['Establecimiento'];


if (trim($COD_USU)!="" AND trim($NOM_USU)!=""){
   
   /*SE CONSULTA POR LOS PRIVILEGIOS DEL USUARIO PARA REALIZAR LAS DISTINTAS OPERACIONES*/
   $qpi="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='1';";
   $qpm="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='1';";

   $insertar  = $c->retornarRegistro($qpi,"ID"); //INSERTAR PROVEEDORES
   $modificar = $c->retornarRegistro($qpm,"ID"); //MODIFICAR PROVEEDORES



   
   /*INICIO DEL BOTON DE GRABAR*/
   if(isset($_POST['btn_grabar'])){
    if($insertar!=""){
    //recibo datos
    $identificador= trim($_POST['txtidentificador']);
    $descripcion  = trim(strtoupper($_POST['txtdescripcion']));
    $telefono     = trim($_POST['txttelefono']);
    $email        = trim($_POST['txtemail']);
    $estado       = trim($_POST['cboestado']);
    $direccion    = trim($_POST['txtdireccion']);
    $basica        = trim($_POST['cbobasica']);
    $media       = trim($_POST['cbomedia']);
    $kinder    = trim($_POST['cbokinder']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $queryIdentificador = "SELECT id_esta FROM establecimiento WHERE rut_esta='".$identificador."'";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Este identificador de Establecimiento ya se encuentra registrado \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($identificador=="" OR $identificador=='undefined'){
         $ERROR=$ERROR."Debe ingresar una identificador \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     $queryDescripcion = "SELECT id_esta FROM establecimiento WHERE descr_esta='".$descripcion."'";
     
     if($c->buscarRegistro($queryDescripcion)==true){
         $ERROR=$ERROR."Esta descripcion de Establecimiento ya se encuentra registrada \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if($descripcion=="" OR $descripcion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una descripcion \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     if($telefono=="" OR $telefono=='undefined'){
         $ERROR=$ERROR."Debe ingresar una telefono \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($c->comprobar_email($email)=="0"){
         $ERROR=$ERROR."Debe ingresar un email valido \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if($estado=="" OR $estado=="0" OR $estado=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un estado \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($basica=="" OR $basica=="2" OR $basica=='undefined'){
         $ERROR=$ERROR."Debe seleccionar si tiene enseñanza Basica \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($media=="" OR $media=="2" OR $media=='undefined'){
         $ERROR=$ERROR."Debe seleccionar si tiene enseñanza Media \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($kinder=="" OR $kinder=="2" OR $kinder=='undefined'){
         $ERROR=$ERROR."Debe seleccionar si tiene enseñanza Pre y/o Kinder \\\n";
         $CAN_ER=$CAN_ER+1;
     }



     if($direccion=="" OR $direccion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una direccion \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if ($CAN_ER=="0"){
      $queryInsertar = "INSERT INTO establecimiento(rut_esta, descr_esta, fon_esta, email_esta, Est_esta, Bas_esta, Med_esta, feccre_esta, usucrec_esta, Kin_esta, dire_esta) VALUES ('".$identificador."','".$descripcion."','".$telefono."','".$email."','".$estado."','".$basica."','".$media."','".$FechaActual."','".$COD_USU."','".$kinder."','".$direccion."');";
 
       if($c->ejecutarConsulta($queryInsertar)==true){
          $c->insertarLog($COD_USU,"establecimiento","id_esta","id_esta","INSERT","");
          echo "Registro almacenado";
       }else{
          echo "Ocurrior un error al guardar el registro";
       }
       
     }else{
          echo $ERROR;
     }
    }else{
      echo "No tiene privilegios para insertar Establecimientos";
    }
    }
   /*FIN DEL BOTON DE GRABAR*/   
   
   /*INICIO DEL BOTON DE ACTUALIZAR*/
   if(isset($_POST['btn_actualizar'])){
    if($modificar!=""){
    //recibo datos
    $IdEsta= trim($_POST['txtidecta']);
    $identificador= trim($_POST['txtidentificador']);
    $descripcion  = trim(strtoupper($_POST['txtdescripcion']));
    $telefono     = trim($_POST['txttelefono']);
    $email        = trim($_POST['txtemail']);
    $estado       = trim($_POST['cboestado']);
    $direccion    = trim($_POST['txtdireccion']);
    $basica        = trim($_POST['cbobasica']);
    $media       = trim($_POST['cbomedia']);
    $kinder    = trim($_POST['cbokinder']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     

     if($identificador=="" OR $identificador=='undefined'){
         $ERROR=$ERROR."Debe ingresar una identificador \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     
 
     if($descripcion=="" OR $descripcion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una descripcion \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     if($telefono=="" OR $telefono=='undefined'){
         $ERROR=$ERROR."Debe ingresar una telefono \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($c->comprobar_email($email)=="0"){
         $ERROR=$ERROR."Debe ingresar un email valido \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if($estado=="" OR $estado=="0" OR $estado=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un estado \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($basica=="" OR $basica=="2" OR $basica=='undefined'){
         $ERROR=$ERROR."Debe seleccionar si tiene enseñanza Basica \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($media=="" OR $media=="2" OR $media=='undefined'){
         $ERROR=$ERROR."Debe seleccionar si tiene enseñanza Media \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($kinder=="" OR $kinder=="2" OR $kinder=='undefined'){
         $ERROR=$ERROR."Debe seleccionar si tiene enseñanza Pre y/o Kinder \\\n";
         $CAN_ER=$CAN_ER+1;
     }



     if($direccion=="" OR $direccion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una direccion \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if ($CAN_ER=="0"){
         $queryActualizar = "UPDATE  establecimiento SET  
                           rut_esta='".$identificador."', descr_esta='".$descripcion."', 
                           fon_esta='".$telefono."', 
                           email_esta= '".$email."', Est_esta='".$estado."', dire_esta='".$direccion."',Bas_esta='".$basica."',Med_esta='".$media."',Kin_esta='".$kinder."'  
                           WHERE id_esta='".$IdEsta."'";
    
          if($c->ejecutarConsulta($queryActualizar)==true){
            $c->insertarLog($COD_USU,"establecimiento","id_esta","id_esta","UPDATE",$IdEsta);
             echo "Registro actualizado";
          }else{
             echo "Ocurrior un error al actualizar el registro";
          }
          
        }else{
             echo $ERROR;
        }
    }else{
      echo "No tiene privilegios para modificar proveedores";
    }
    }
   /*FIN DEL BOTON DE ACTUALIZAR*/  
 

   /*INICIO DEL BOTON DE ACTIVAR/DESACTIVAR*/
   if(isset($_POST['btn_actdes'])){
    if($modificar!=""){   
           //recibo datos
           $idproveedor = trim($_POST['IdProveedor']);          
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;
        
            if($idproveedor==""){
                $ERROR=$ERROR."No se esta editando ningun registro\\\n";
                $CAN_ER=$CAN_ER+1;
            }
                
            if ($CAN_ER=="0"){
                
                $Estado = $c->retornarRegistro("SELECT Estado FROM m_proveedor WHERE IdProveedor='".$idproveedor."'","Estado");
                if ($Estado=="I"){
                 $est_act = "A";
                }else{
                 $est_act = "I"; 
                }

                $queryActualizar = "UPDATE  m_proveedor SET Estado='".$est_act."' WHERE IdProveedor='".$idproveedor."'";
           
                 if($c->ejecutarConsulta($queryActualizar)==true){
                   $c->insertarLog($COD_USU,"m_proveedor","IdProveedor","IdProveedor","UPDATE",$idproveedor);
                    echo "Estado actualizado";
                 }else{
                    echo "Ocurrior un error al actualizar el estado del registro";
                 }
                 
               }else{
                    echo $ERROR;
               }
            }else{
                echo "No tiene privilegios para modificar proveedor";
            }
        }
   /*FIN DEL BOTON DE ACTIVAR/DESACTIVAR*/  

   /*INICIO DEL DEL TRAER PROVEEDOR*/
   if(isset($_POST['btn_editar'])){
    $IdEsta = trim($_POST['IdEsta']);
    $query= "SELECT * FROM establecimiento WHERE id_esta='".$IdEsta."'";
    echo $c->retornarJSON($query);
    }
   /*FIN DEL TRAER PROVEEDOR*/
    
   /*INICIO DEL LISTADO Y BUSCAR*/
   if(isset($_POST['btn_listar'])){
     $buscar = trim($_POST['txtbuscar']);
     if ($buscar!="" AND $buscar!='undefined'){
         $query="SELECT id_esta,rut_esta,descr_esta,fon_esta,email_esta,Est_esta,IF (Kin_esta = 1, 'SI', 'NO') as Kinder,IF (Bas_esta = 1, 'SI', 'NO') as Basica,IF (Med_esta = 1, 'SI', 'NO') as Media,dire_esta FROM establecimiento
         WHERE (rut_esta LIKE '%".$buscar."%' OR 
         descr_esta LIKE '%".$buscar."%')
         ORDER BY id_esta DESC LIMIT 0 , 40";    
     }else{
         $query= "SELECT id_esta,rut_esta,descr_esta,fon_esta,email_esta,Est_esta,IF (Kin_esta = 1, 'SI', 'NO') as Kinder,IF (Bas_esta = 1, 'SI', 'NO') as Basica,IF (Med_esta = 1, 'SI', 'NO') as Media,dire_esta FROM establecimiento ORDER BY id_esta DESC LIMIT 0 , 40";
     }
     echo $c->retornarJSON($query);
     }
   /*FIN DEL LISTADO Y BUSCAR*/

   /*INICIO AGREGAR EMAIL A PROVEEDOR*/
   if(isset($_POST['btn_agr_email'])){
    $identificador=$_POST['Identificador'];
    $email=$_POST['SegundoEmail'];

    $Resp=-1;
    $Err=0;

    if($identificador=='' || $identificador==undefined){
      $Err=$Err+1;
      $Resp=-2;
    }

    if($email=='' || $email==undefined){
      $Err=$Err+1;
      $Resp=-3;
    }

    if($Err==0){
      $query="INSERT into m_proveedor_email(ProRut,Email) values('".$identificador."','".$email."')";

      if($c->ejecutarConsulta($query)){
        $Resp=1;
      }
    }

    echo $Resp;
   }
   /*FIN AGREGAR EMAIL A PROVEEDOR*/

   /*INICIO MODAL Email*/
   if(isset($_POST['btn_lst_em'])){
    $Rut=$_POST['Rut'];

    $query="select IdProEm, ProRut, e.Email from m_proveedor_email e, m_proveedor p where e.ProRut=p.identificador and e.ProRut='".$Rut."' order by e.IdProEm desc";
    echo $c->retornarJSON($query);
   }
   /*FIN MODAL EMAIL*/

   /*INICIO ELIMINAR EMAIL*/
   if(isset($_POST['IDEMA'])){
    $IDEMA=$_POST['IDEMA'];

    $Resp=-1;
    $Err=0;


    if($IDEMA=='' || $IDEMA==undefined){
      $Err=$Err+1;
      $Resp=-3;
    }

    if($Err==0){
      $query="delete from m_proveedor_email where IdProEm='".$IDEMA."';";

      if($c->ejecutarConsulta($query)){
        $Resp=1;
      }
    }

    echo $Resp;
   }
   /*FIN ELIMINAR EMAIL*/

     
}else{
 echo "<h3>404 Forbidden</h3>";   
}  




