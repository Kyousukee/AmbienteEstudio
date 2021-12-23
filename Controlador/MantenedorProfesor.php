<?php session_start(); 
require("../Modelo/conexion.php");
$c = new baseDatos();


$NOM_USU  = $_SESSION["NOMBRE"];
$COD_USU  = $_SESSION["COD_USU"];      
$IDTIP_USU  = $_SESSION['IDTIP_USU'];
$TIP_USU  = $_SESSION['TIPO_Usu'];
$USU_USU  = $_SESSION['Usuario'];
$EST_USU  = $_SESSION['Establecimiento'];
$ID_ESTA  = $_SESSION['ID_Esta'];


if (trim($COD_USU)!="" AND trim($NOM_USU)!=""){
   
   /*SE CONSULTA POR LOS PRIVILEGIOS DEL USUARIO PARA REALIZAR LAS DISTINTAS OPERACIONES*/
   $qpi="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='3';";
   $qpm="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='3';";

   $insertar  = $c->retornarRegistro($qpi,"ID"); //INSERTAR PROVEEDORES
   $modificar = $c->retornarRegistro($qpm,"ID"); //MODIFICAR PROVEEDORES



   
   /*INICIO DEL BOTON DE GRABAR*/
   if(isset($_POST['btn_grabar'])){
    if($insertar!=""){
    //recibo datos
    $rut= trim($_POST['txtrut']);
    $nombre  = trim($_POST['txtnom']);
    $ape1     = trim($_POST['txtape1']);
    $ape2        = trim($_POST['txtape2']);
    $estado       = trim($_POST['cboestado']);
    $fono    = trim($_POST['txtfono']);    
    $email        = trim($_POST['txtemail']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $queryIdentificador = "SELECT id_doce FROM docentes WHERE rut_doce='".$rut."' and Id_esta='".$ID_ESTA."';";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Este rut de Docente ya se encuentra registrado.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     $queryIdentificador = "SELECT id_usu FROM usuarios WHERE log_usu='".$rut."'";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Este usuario de Docente ya se encuentra registrado como usuario en este sisema.-\\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($rut=="" OR $rut=='undefined'){
         $ERROR=$ERROR."Debe ingresar un Rut de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($nombre=="" OR $nombre=='undefined'){
         $ERROR=$ERROR."Debe ingresar un Nombre de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     if($ape1=="" OR $ape1=='undefined'){
         $ERROR=$ERROR."Debe ingresar Apellido Materno de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($email=="" OR $email=='undefined'){
         $ERROR=$ERROR."Debe ingresar un correo del Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($c->comprobar_email($email)=="0"){
         $ERROR=$ERROR."Debe ingresar un email valido.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if($estado=="" OR $estado=="0" OR $estado=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un estado.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }




     if($ape2=="" OR $ape2=='undefined'){
         $ERROR=$ERROR."Debe ingresar un Apellido Paterno de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 if($fono=="" OR $fono=='undefined'){
         $ERROR=$ERROR."Debe ingresar Telefono o celular de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if ($CAN_ER=="0"){
      $queryInsertar = "INSERT INTO docentes(rut_doce, nom_doce, ape_doce, ape2_doce, fon_doce, email_doce, est_doce, Id_esta, feccre_doce, usucre_doce) VALUES ('".$rut."','".$nombre."','".$ape1."','".$ape2."','".$fono."','".$email."','".$estado."','".$ID_ESTA."','".$FechaActual."','".$COD_USU."');";


      
     
 
       if($c->ejecutarConsulta($queryInsertar)==true){
          $c->insertarLog($COD_USU,"docentes","id_doce","id_doce","INSERT","");
          $c->ejecutarConsulta("INSERT INTO usuarios (log_usu, pass_usu, id_tip, est_usu, feccre_usu, usucre_usu) values ('".$rut."','123456',3,'A',now(),'".$COD_USU."');");
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


    /*INICIO DEL BOTON DE ACTIVAR/DESACTIVAR*/
   if(isset($_POST['btn_asigjefe'])){
    if($modificar!=""){   
           //recibo datos
           $iddoc = trim($_POST['IdDoc']);           
           $iddcurso = trim($_POST['iddcurso']);           
           $idcurso = trim($_POST['idcurso']);           
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;

            $queryIdentificador1 = "SELECT a.id_docc FROM docentecurso a inner join docentes b on b.id_doce = a.id_doc where b.Id_esta='".$ID_ESTA."' and a.id_doc='".$iddoc."' order by a.id_docc desc LIMIT 1;";

          if($c->buscarRegistro($queryIdentificador1)==true){
               $ERROR=$ERROR."Este docente ya se encuentra como profesor jefe de otro curso.-\\\n";
                $CAN_ER=$CAN_ER+1;
          }


          $queryIdentificador1 = "SELECT a.id_docc FROM docentecurso a where a.id_curso='".$idcurso."' order by a.id_docc desc LIMIT 1;";

          if($c->buscarRegistro($queryIdentificador1)==true){
               $ERROR=$ERROR."Este curso ya se tiene un profesor jefe asignado.-\\\n";
                $CAN_ER=$CAN_ER+1;
          }
          
          if($iddoc=="" OR $iddoc=="0" OR $iddoc=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     if($idcurso=="" OR $idcurso=="0" OR $idcurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un Letra curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($iddcurso=="" OR $iddcurso=="0" OR $iddcurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }




                
            if ($CAN_ER=="0"){
                

                $queryDelete = "INSERT into docentecurso (id_doc,id_curso) values ('".$iddoc."','".$idcurso."');";
           
                 if($c->ejecutarConsulta($queryDelete)==true){
                   $c->insertarLog($COD_USU,"docentecurso","id_docc","id_docc","INSERT","");
                    echo "Docente Asignado correctamente";
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

   /*INICIO DEL BOTON DE ACTIVAR/DESACTIVAR*/
   if(isset($_POST['btn_Desasigjefe'])){
    if($modificar!=""){   
           //recibo datos
           $iddoc = trim($_POST['IdDoc']);           
           $iddcurso = trim($_POST['iddcurso']);           
           $idcurso = trim($_POST['idcurso']);           
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;

            


          
          
          if($iddoc=="" OR $iddoc=="0" OR $iddoc=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     if($idcurso=="" OR $idcurso=="0" OR $idcurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un Letra curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($iddcurso=="" OR $iddcurso=="0" OR $iddcurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }




                
            if ($CAN_ER=="0"){
                

                $queryDelete = "DELETE from docentecurso where id_doc='".$iddoc."' and id_curso='".$idcurso."';";
           
                 if($c->ejecutarConsulta($queryDelete)==true){
                   $c->insertarLog($COD_USU,"docentecurso","id_docc","id_docc","DELETE","");
                    echo "Designacion procesada correctamente";
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

   
   /*INICIO DEL BOTON DE ACTUALIZAR*/
   if(isset($_POST['btn_actualizar'])){
    if($modificar!=""){
    //recibo datos
    $IdDoc= trim($_POST['txtidprofe']);
    $rut= trim($_POST['txtrut']);
    $nombre  = trim(strtoupper($_POST['txtnom']));
    $ape1     = trim($_POST['txtape1']);
    $ape2        = trim($_POST['txtape2']);
    $estado       = trim($_POST['cboestado']);
    $fono    = trim($_POST['txtfono']);    
    $email        = trim($_POST['txtemail']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;



     if($rut=="" OR $rut=='undefined'){
         $ERROR=$ERROR."Debe ingresar un Rut de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($nombre=="" OR $nombre=='undefined'){
         $ERROR=$ERROR."Debe ingresar un Nombre de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     if($ape1=="" OR $ape1=='undefined'){
         $ERROR=$ERROR."Debe ingresar Apellido Materno de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($email=="" OR $email=='undefined'){
         $ERROR=$ERROR."Debe ingresar un correo del Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($c->comprobar_email($email)=="0"){
         $ERROR=$ERROR."Debe ingresar un email valido.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if($estado=="" OR $estado=="0" OR $estado=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un estado.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }




     if($ape2=="" OR $ape2=='undefined'){
         $ERROR=$ERROR."Debe ingresar un Apellido Paterno de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 if($fono=="" OR $fono=='undefined'){
         $ERROR=$ERROR."Debe ingresar Telefono o celular de Docente.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }
 
     if ($CAN_ER=="0"){
         $queryActualizar = "UPDATE docentes SET rut_doce='".$rut."',nom_doce='".$nombre."',ape_doce='".$ape1."',ape2_doce='".$ape2."',fon_doce='".$fono."',email_doce='".$email."',est_doce='".$estado."' WHERE id_doce='".$IdDoc."'";


    
          if($c->ejecutarConsulta($queryActualizar)==true){

            $c->insertarLog($COD_USU,"docentes","id_doce","id_doce","UPDATE",$IdDoc);
             echo "Registro Actualizado.";
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
           $iddocente = trim($_POST['IdDoc']);          
           $rut = trim($_POST['RutDoc']);          
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;
        
            if($iddocente==""){
                $ERROR=$ERROR."No se esta eliminando ningun registro\\\n";
                $CAN_ER=$CAN_ER+1;
            }
                
            if ($CAN_ER=="0"){
                

                $queryDelete = "DELETE from  docentes WHERE id_doce='".$iddocente."'";
           
                 if($c->ejecutarConsulta($queryDelete)==true){
                   $c->insertarLog($COD_USU,"docentes","id_doce","id_doce","DELETE",$iddocente);
                   $c->ejecutarConsulta("Delete from usuarios where log_usu='".$rut."'");
                   $c->ejecutarConsulta("Delete from docentecurso where id_doc='".$iddocente."'");
                    echo "Docente Eliminado";
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
    $IdDoc = trim($_POST['IdDoc']);
    $query= "SELECT * FROM docentes WHERE id_doce='".$IdDoc."'";
    echo $c->retornarJSON($query);
    }
   /*FIN DEL TRAER PROVEEDOR*/
    
   /*INICIO DEL LISTADO Y BUSCAR*/
   if(isset($_POST['btn_listar'])){
     $buscar = trim($_POST['txtbuscar']);
     if ($IDTIP_USU==1){
      if ($buscar!="" AND $buscar!='undefined'){
         $query="SELECT a.id_doce,a.rut_doce,a.nom_doce,a.ape_doce,a.ape2_doce,a.fon_doce,a.email_doce,a.est_doce,b.descr_esta FROM docentes a inner join establecimiento b on a.Id_esta=b.id_esta   
         WHERE (a.nom_doce LIKE '%".$buscar."%' OR a.ape_doce LIKE '%".$buscar."%' OR b.descr_esta LIKE '%".$buscar."%') 
         ORDER BY a.id_doce,a.nom_doce ASC LIMIT 0 , 40";    
     }else{
         $query= "SELECT a.id_doce,a.rut_doce,a.nom_doce,a.ape_doce,a.ape2_doce,a.fon_doce,a.email_doce,a.est_doce,b.descr_esta FROM docentes a inner join establecimiento b on a.Id_esta=b.id_esta  ORDER BY a.id_doce,a.nom_doce ASC LIMIT 0 , 40";
          }
     }else{
      if ($buscar!="" AND $buscar!='undefined'){
         
         $query="SELECT a.id_doce,a.rut_doce,a.nom_doce,a.ape_doce,a.ape2_doce,a.fon_doce,a.email_doce,a.est_doce,b.descr_esta FROM docentes a inner join establecimiento b on a.Id_esta=b.id_esta   
         WHERE (a.nom_doce LIKE '%".$buscar."%' OR a.ape_doce LIKE '%".$buscar."%' OR b.descr_esta LIKE '%".$buscar."%') AND a.Id_esta=".$ID_ESTA." 
         ORDER BY a.id_doce,a.nom_doce ASC LIMIT 0 , 40";     
     }else{
         $query= "SELECT a.id_doce,a.rut_doce,a.nom_doce,a.ape_doce,a.ape2_doce,a.fon_doce,a.email_doce,a.est_doce,b.descr_esta FROM docentes a inner join establecimiento b on a.Id_esta=b.id_esta WHERE a.Id_esta=".$ID_ESTA."  ORDER BY a.id_doce,a.nom_doce ASC LIMIT 0 , 40";
     }
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

    /*INICIO DEL CARGAR CURSOS*/
   if(isset($_POST['btn_cargCurpro'])){
        $Doc=$_POST['idprofe'];
        $query="SELECT a.id_doc,a.id_curso,b.desc_curso FROM docentecurso a inner join cursos b on b.id_curso=a.id_curso WHERE id_doc='".$Doc."';";
        echo $c->retornarJSON($query);
        }
   /*FIN DEL CARGAR CURSOS*/

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




