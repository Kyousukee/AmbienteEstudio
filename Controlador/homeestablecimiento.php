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
   $qpi="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='8';";
   $qpm="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='8';";

   $insertar  = $c->retornarRegistro($qpi,"ID"); //INSERTAR PROVEEDORES
   $modificar = $c->retornarRegistro($qpm,"ID"); //MODIFICAR PROVEEDORES



   
   /*INICIO DEL BOTON DE GRABAR*/
   if(isset($_POST['btn_grabar'])){
    if($insertar!=""){
    //recibo datos
    $titulo  = trim($_POST['txttitulo']);
    $descripcion     = trim($_POST['txtdescripcion']);


    $upload_folder1 ="../Vista/Noticias/Img";
    $upload_folder2 ="../Vista/Noticias/PDF";

    $FechaActual =  date('d-m-Y');

    //variable para controlar si se ejcuto con exito o existe error
    $estado_proceso="ok";

    $nombre_archivo1 = utf8_decode($_FILES["txtarchivo1"]["name"]);
    $file1 = $_FILES["txtarchivo1"]["name"];
    $tmp_archivo1 = $_FILES["txtarchivo1"]["tmp_name"];
    $archivador1 = $upload_folder1 . "/" . $nombre_archivo1;

    $nombre_archivo2 = utf8_decode($_FILES["txtarchivo2"]["name"]);
    $file2  = $_FILES["txtarchivo2"]["name"];
    $tmp_archivo2 = $_FILES["txtarchivo2"]["tmp_name"];
    $archivador2 = $upload_folder2 . "/" . $nombre_archivo2;

 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $cargado1="0";
    $cargado2="0";

    //INICIO ARCHIVO 1
    if($nombre_archivo1!=""){
    $ext1= substr(strrchr($_FILES['txtarchivo1']['name'], '.'), 1);

    if ($ext1!="png" AND $ext1!="PNG" AND  
        $ext1!="jpg" AND $ext1!="JPG" AND $ext1!="jpeg" AND $ext1!="JPEG"){

    if(trim($_FILES['txtarchivo1']['name'])!=""){
       $ERROR=$ERROR."Los primeros archivos deben estar en formato png o jpg (1)\\\n";
       $CAN_ER=$CAN_ER+1;
     }

    }else{

    if(file_exists($archivador1)){
       $ERROR=$ERROR."Ya existe un archivo con este nombre intente con otro (archivo 1)\\\n";
       $CAN_ER=$CAN_ER+1;
    }else{

     if ($_FILES['txtarchivo1']['size']>3072000){
       $ERROR=$ERROR."Los archivos  pueden pesar maximo 3 mb (1)\\\n";
       $CAN_ER=$CAN_ER+1;
     }else{
     
     if (!move_uploaded_file($tmp_archivo1, $archivador1)) {
       $ERROR=$ERROR."Ocurrio un error al cargar  el archivo (1)\\\n";
       $CAN_ER=$CAN_ER+1;
     }else{
      $cargado1="1";
     } 
     
     }

    }
     }
    }
    //FIN ARCHIVO 1
 

    //INICIO ARCHIVO 2
    if($nombre_archivo2!=""){
    $ext2= substr(strrchr($_FILES['txtarchivo2']['name'], '.'), 1);

    if ($ext2!="pdf" AND $ext2!="PDF" AND $ext2!="xlsx" AND $ext2!="XLSX" AND 
        $ext2!="doc" AND $ext2!="DOC" AND $ext2!="docx" AND $ext2!="DOCX" ){

    if(trim($_FILES['txtarchivo2']['name'])!=""){
       $ERROR=$ERROR."Los segundos archivos deben estar en formato word,pdf o excel (2)\\\n";
       $CAN_ER=$CAN_ER+1;
     }

    }else{

    if(file_exists($archivador2)){
       $ERROR=$ERROR."Ya existe un archivo con este nombre intente con otro (archivo 2)\\\n";
       $CAN_ER=$CAN_ER+1;
    }else{

     if ($_FILES['txtarchivo2']['size']>3072000){
       $ERROR=$ERROR."Los archivos  pueden pesar maximo 3 mb (2)\\\n";
       $CAN_ER=$CAN_ER+1;
     }else{
     
     if (!move_uploaded_file($tmp_archivo2, $archivador2)) {
       $ERROR=$ERROR."Ocurrio un error al cargar  el archivo (2)\\\n";
       $CAN_ER=$CAN_ER+1;
     }else{
      $cargado2="1";
     } 
     
     }

    }
     }
    }
    //FIN ARCHIVO 2

     if($titulo=="" OR $titulo=='undefined'){
         $ERROR=$ERROR."Debe ingresar un titulo para la noticia.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($descripcion=="" OR $descripcion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una pequeña descripcion de la noticia.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     
 
     if ($CAN_ER=="0"){
      $queryInsertar = "INSERT INTO noticiasestablecimiento(tit_ne, desc_ne, img_not, usu_cre, fec_cre, Id_esta, arch_not) VALUES ('".$titulo."','".$descripcion."','".$file1."','".$COD_USU."','".$FechaActual."','".$ID_ESTA."','".$file2."');";


      
     
 
       if($c->ejecutarConsulta($queryInsertar)==true){
          $c->insertarLog($COD_USU,"noticiasestablecimiento","id_ne","id_ne","INSERT","");
         

          echo "Registro almacenado";
       }else{
          echo "Ocurrior un error al guardar el registro";
       }
       
     }else{
          if($cargado1=="1"){
            unlink ($archivador1);
          }

          if($cargado2=="1"){
            unlink ($archivador2);
          }
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
           $IdNot = trim($_POST['IdNot']);          
           $ImgNot = trim($_POST['ImgNot']);          
           $ArchNot = trim($_POST['ArchNot']);          
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;
        
            if($IdNot==""){
                $ERROR=$ERROR."No se esta eliminando ningun registro\\\n";
                $CAN_ER=$CAN_ER+1;
            }
                
            if ($CAN_ER=="0"){
                
                $queryDelete = "DELETE from  noticiasestablecimiento WHERE id_ne='".$IdNot."'";
           
                 if($c->ejecutarConsulta($queryDelete)==true){
                   $c->insertarLog($COD_USU,"noticiasestablecimiento","id_ne","id_ne","DELETE",$IdNot);
                  unlink ("../Vista/Noticias/Img/".$ImgNot);
                  unlink ("../Vista/Noticias/PDF/".$ArchNot);
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
      
          
         
         $query= "SELECT a.*,b.descr_esta,IF(a.id_ne=(SELECT id_ne from noticiasestablecimiento order by id_ne desc limit 1), 'active', '') as active FROM noticiasestablecimiento a inner join establecimiento b on a.Id_esta=b.id_esta  ORDER BY a.id_ne desc; ";
          
     }else{
     
         $query= "SELECT a.*,b.descr_esta,IF(a.id_ne=(SELECT id_ne from noticiasestablecimiento where Id_esta=".$ID_ESTA." order by id_ne desc limit 1), 'active', '') as active FROM noticiasestablecimiento a inner join establecimiento b on a.Id_esta=b.id_esta WHERE a.Id_esta=".$ID_ESTA."  ORDER BY a.id_ne desc;";
     
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




