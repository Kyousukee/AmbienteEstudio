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
   $qpi="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='7';";
   $qpm="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='7';";

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
    $dcurso    = trim($_POST['cbodcurso']);    
    $curso    = trim($_POST['cboletrcurso']);    
    $email        = trim($_POST['txtemail']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $queryIdentificador = "SELECT id_est FROM estudiantes WHERE rut_est='".$rut."' and Id_esta='".$ID_ESTA."';";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Este rut de Alumno ya se encuentra registrado.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     $queryIdentificador = "SELECT id_usu FROM usuarios WHERE log_usu='".$rut."'";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Este usuario de Alumno ya se encuentra registrado como usuario en este sistema.-\\\n";
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


     if($dcurso=="" OR $dcurso=="0" OR $dcurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un Curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($curso=="" OR $curso=="0" OR $curso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un Curso.- \\\n";
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
      $queryInsertar = "INSERT INTO estudiantes(rut_est, nom_est, ape_est, ape2_est, fon_est, email_est, est_est, Id_esta, feccre_est, usucre_est) VALUES ('".$rut."','".$nombre."','".$ape1."','".$ape2."','".$fono."','".$email."','".$estado."','".$ID_ESTA."','".$FechaActual."','".$COD_USU."');";


      
     
 
       if($c->ejecutarConsulta($queryInsertar)==true){
          $c->insertarLog($COD_USU,"estudiantes","id_est","id_est","INSERT","");
          $c->ejecutarConsulta("INSERT INTO usuarios (log_usu, pass_usu, id_tip, est_usu, feccre_usu, usucre_usu) values ('".$rut."','123456',4,'A',now(),'".$COD_USU."');");

          $queryalumno = "SELECT id_est FROM estudiantes order by id_est desc LIMIT 1;";

          $alumno = $c->retornarRegistro($queryalumno,'id_est');

          $c->ejecutarConsulta("INSERT INTO alumnocurso (id_alum, id_curso,Año) values ('".$alumno."','".$curso."',YEAR(NOW()));");

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
    $IdEst= trim($_POST['txtidalumno']);
    $rut= trim($_POST['txtrut']);
    $nombre  = trim($_POST['txtnom']);
    $ape1     = trim($_POST['txtape1']);
    $ape2        = trim($_POST['txtape2']);
    $estado       = trim($_POST['cboestado']);
    $fono    = trim($_POST['txtfono']);    
    $dcurso    = trim($_POST['cbodcurso']);    
    $curso    = trim($_POST['cboletrcurso']);    
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


     if($dcurso=="" OR $dcurso=="0" OR $dcurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un Curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($curso=="" OR $curso=="0" OR $curso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un Curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


 
     if ($CAN_ER=="0"){
         $queryActualizar = "UPDATE estudiantes SET rut_est='".$rut."',nom_est='".$nombre."',ape_est='".$ape1."',ape2_est='".$ape2."',fon_est='".$fono."',email_est='".$email."',est_est='".$estado."' WHERE id_est='".$IdEst."'";


    
          if($c->ejecutarConsulta($queryActualizar)==true){

            $c->insertarLog($COD_USU,"estudiantes","id_est","id_est","UPDATE",$IdEst);
            $c->ejecutarConsulta("UPDATE alumnocurso set id_curso='".$curso."' where id_alum='".$IdEst."' and Año=YEAR(NOW());");
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
           $IdEst = trim($_POST['IdEst']);          
           $RutEst = trim($_POST['RutEst']);          
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;
        
            if($IdEst==""){
                $ERROR=$ERROR."No se esta eliminando ningun registro\\\n";
                $CAN_ER=$CAN_ER+1;
            }
                
            if ($CAN_ER=="0"){
                
                $c->ejecutarConsulta("DELETE from alumnocurso where id_alum='".$IdEst."'");
                $queryDelete = "DELETE from  estudiantes WHERE id_est='".$IdEst."'";
           
                 if($c->ejecutarConsulta($queryDelete)==true){
                   $c->insertarLog($COD_USU,"estudiantes","id_est","id_est","DELETE",$IdEst);
                   $c->ejecutarConsulta("DELETE from usuarios where log_usu='".$RutEst."'");
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
    $IdEst = trim($_POST['IdEst']);
    $query= "SELECT a.*,c.id_curso,c.desc_curso FROM estudiantes a inner join alumnocurso b on a.id_est=b.id_alum inner join cursos c on c.id_curso=b.id_curso WHERE a.id_est='".$IdEst."' and b.Año=YEAR(NOW());";
    echo $c->retornarJSON($query);
    }
   /*FIN DEL TRAER PROVEEDOR*/
    
   /*INICIO DEL LISTADO Y BUSCAR*/
   if(isset($_POST['btn_listar'])){
     $buscar = trim($_POST['txtbuscar']);
     if ($IDTIP_USU==1){
      if ($buscar!="" AND $buscar!='undefined'){ 
         $query="SELECT a.id_est,a.rut_est,a.nom_est,a.ape_est,a.ape2_est,a.fon_est,a.email_est,a.est_est,b.descr_esta,CONCAT(e.des_cd, ' ' , d.let_curso) as curso FROM estudiantes a inner join establecimiento b on a.Id_esta=b.id_esta inner join alumnocurso c on c.id_alum=a.id_est inner join cursos d on d.id_curso=c.id_curso  inner join cursosdescripcion e on e.id_cd=d.desc_curso WHERE (a.rut_est LIKE '%".$buscar."%' OR a.nom_est LIKE '%".$buscar."%' OR b.descr_esta LIKE '%".$buscar."%')  ORDER BY a.id_est,a.nom_est ASC;";    
     }else{
         $query= "SELECT a.id_est,a.rut_est,a.nom_est,a.ape_est,a.ape2_est,a.fon_est,a.email_est,a.est_est,b.descr_esta,CONCAT(e.des_cd, ' ' , d.let_curso) as curso FROM estudiantes a inner join establecimiento b on a.Id_esta=b.id_esta inner join alumnocurso c on c.id_alum=a.id_est inner join cursos d on d.id_curso=c.id_curso  inner join cursosdescripcion e on e.id_cd=d.desc_curso ORDER BY a.id_est,a.nom_est ASC; ";
          }
     }else{
      if ($buscar!="" AND $buscar!='undefined'){
         
         $query="SELECT a.id_est,a.rut_est,a.nom_est,a.ape_est,a.ape2_est,a.fon_est,a.email_est,a.est_est,b.descr_esta,CONCAT(e.des_cd, ' ' , d.let_curso) as curso FROM estudiantes a inner join establecimiento b on a.Id_esta=b.id_esta inner join alumnocurso c on c.id_alum=a.id_est inner join cursos d on d.id_curso=c.id_curso  inner join cursosdescripcion e on e.id_cd=d.desc_curso WHERE (a.rut_est LIKE '%".$buscar."%' OR a.nom_est LIKE '%".$buscar."%' OR b.descr_esta LIKE '%".$buscar."%') AND a.Id_esta=".$ID_ESTA."  ORDER BY a.id_est,a.nom_est ASC;";  

     }else{
         $query= "SELECT a.id_est,a.rut_est,a.nom_est,a.ape_est,a.ape2_est,a.fon_est,a.email_est,a.est_est,b.descr_esta,CONCAT(e.des_cd, ' ' , d.let_curso) as curso FROM estudiantes a inner join establecimiento b on a.Id_esta=b.id_esta inner join alumnocurso c on c.id_alum=a.id_est inner join cursos d on d.id_curso=c.id_curso  inner join cursosdescripcion e on e.id_cd=d.desc_curso WHERE a.Id_esta=".$ID_ESTA." ORDER BY a.id_est,a.nom_est ASC ";
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




