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
   $qpi="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='4';";
   $qpm="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='4';";

   $insertar  = $c->retornarRegistro($qpi,"ID"); //INSERTAR PROVEEDORES
   $modificar = $c->retornarRegistro($qpm,"ID"); //MODIFICAR PROVEEDORES


/*INICIO DEL CARGAR CURSOS*/
   if(isset($_POST['btn_crgcur'])){
        $query="SELECT 0 as id_cd ,'Seleccione' as des_cd
union all
SELECT DISTINCT id_cd,des_cd FROM cursosdescripcion inner join cursos on desc_curso=id_cd where Id_esta='".$ID_ESTA."' order by id_cd asc;";
        echo $c->retornarJSON($query);
        }
   /*FIN DEL CARGAR CURSOS*/

   /*INICIO DEL CARGAR CURSOS*/
   if(isset($_POST['btn_crgcur2'])){
        $query="SELECT 0 as id_cd ,'Todos' as des_cd
union all
SELECT DISTINCT id_cd,des_cd FROM cursosdescripcion inner join cursos on desc_curso=id_cd where Id_esta='".$ID_ESTA."' order by id_cd asc;";
        echo $c->retornarJSON($query);
        }
   /*FIN DEL CARGAR CURSOS*/
   
   /*INICIO DEL CARGAR LETRA*/
   if(isset($_POST['btn_crgLet'])){
        $curso= trim($_POST['txtcurso']);
        if ($curso=="" OR $curso=='undefined') {
          $queryIdentificador = "SELECT MIN(desc_curso) as curso FROM cursos where Id_esta='".$ID_ESTA."' and Est_curso='A';";
          $curso2 = $c->retornarRegistro($queryIdentificador,'curso');
          $query="SELECT id_curso,let_curso from cursos where Id_esta='".$ID_ESTA."' and desc_curso='".$curso2."' and Est_curso='A';";
          echo $c->retornarJSON($query);
        }else{
          $query="SELECT id_curso,let_curso from cursos where Id_esta='".$ID_ESTA."' and desc_curso='".$curso."' and Est_curso='A';";
          echo $c->retornarJSON($query);
        }
        
        }
   /*FIN DEL CARGAR LETRA*/

   /*INICIO DEL BOTON DE GRABAR*/
   if(isset($_POST['btn_grabar'])){
    if($insertar!=""){
    //recibo datos
    $cbocurso= trim($_POST['cbocurso']);
    //$cboletra  = trim($_POST['cboletra']);
    $descripcion     = trim($_POST['txtdescripcion']);
    $estado       = trim($_POST['cboestado']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $queryIdentificador = "SELECT a.id_asig FROM asignaturas a WHERE a.desc_asig='".$descripcion."' and a.id_dcurso='".$cbocurso."' and a.Id_esta='".$ID_ESTA."' and a.Est_asig='A' ;";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Esta descripcion ya se encuentra registrado en su establecimiento y para este Curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     

     if($cbocurso=="" OR $cbocurso=='undefined' OR $cbocurso=="0"){
         $ERROR=$ERROR."Debe seleccionar un curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     /*if($cboletra=="" OR $cboletra=='undefined'){
         $ERROR=$ERROR."Debe seleccionar una letra de curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }*/




     if($descripcion=="" OR $descripcion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una descripcion de la Asignatura.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($estado=="" OR $estado=="0" OR $estado=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un estado.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }



 
     if ($CAN_ER=="0"){


      


      /*$queryIdentificador = "SELECT a.id_asig FROM asignaturas a WHERE a.desc_asig='".$descripcion."' and a.id_dcurso='".$cbocurso."' and a.Id_esta='".$ID_ESTA."' and a.Est_asig='A';";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $queryInsertar = "SELECT * from asignaturas where Id_esta='".$ID_ESTA."';";
     }else{
        $queryInsertar = "INSERT INTO asignaturas(desc_asig, Est_asig, usu_cre, fec_cre, Id_esta, id_dcurso) VALUES ('".$descripcion."','A','".$COD_USU."','".$FechaActual."','".$ID_ESTA."','".$cbocurso."');";
     }*/
     
     $queryInsertar = "INSERT INTO asignaturas(desc_asig, Est_asig, usu_cre, fec_cre, Id_esta, id_dcurso) VALUES ('".$descripcion."','A','".$COD_USU."','".$FechaActual."','".$ID_ESTA."','".$cbocurso."');";

 
       if($c->ejecutarConsulta($queryInsertar)==true){
          $c->insertarLog($COD_USU,"asignaturas","id_asig","id_asig","INSERT","");

          /*$queryIdentificador1 = "SELECT id_asig FROM asignaturas where Id_esta='".$ID_ESTA."' and id_dcurso='".$cbocurso."' order by id_asig desc LIMIT 1;";
          $asignatura = $c->retornarRegistro($queryIdentificador1,'id_asig');

          $c->ejecutarConsulta("INSERT asignaturascursos (id_asignatura,id_curso,id_esta) values ('".$asignatura."','".$cboletra."','".$ID_ESTA."');");*/


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
    $cbocurso= trim($_POST['cbocurso']);
    //$cboletra  = trim($_POST['cboletra']);
    $idasig     = trim($_POST['txtidasig']);
    $descripcion     = trim($_POST['txtdescripcion']);
    $estado       = trim($_POST['cboestado']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;



     if($cbocurso=="" OR $cbocurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     /*if($cboletra=="" OR $cboletra=='undefined'){
         $ERROR=$ERROR."Debe seleccionar una letra de curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }*/


     if($descripcion=="" OR $descripcion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una descripcion de la Asignatura.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($estado=="" OR $estado=="0" OR $estado=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un estado.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if ($CAN_ER=="0"){
         $queryActualizar = "UPDATE asignaturas SET desc_asig='".$descripcion."',Est_asig='".$estado."' WHERE id_asig ='".$idasig."'";


    
          if($c->ejecutarConsulta($queryActualizar)==true){

            $c->insertarLog($COD_USU,"asignaturas","idasig","idasig","UPDATE",$idasig);
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
           $IdAsig = trim($_POST['IdAsig']);           
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;

            $queryIdentificador1 = "SELECT Est_asig FROM asignaturas where Id_esta='".$ID_ESTA."' and id_asig='".$IdAsig."' order by id_asig desc LIMIT 1;";
          $estado = $c->retornarRegistro($queryIdentificador1,'Est_asig');

          if($estado=="A"){
                $ERROR=$ERROR."Registro debe estar en estado Inactivo para poder eliminarlo.\\\n";
                $CAN_ER=$CAN_ER+1;
            }
        
            if($IdAsig==""){
                $ERROR=$ERROR."No se esta eliminando ningun registro\\\n";
                $CAN_ER=$CAN_ER+1;
            }


                
            if ($CAN_ER=="0"){
                

                $queryDelete = "DELETE from  asignaturas WHERE id_asig ='".$IdAsig."'";
           
                 if($c->ejecutarConsulta($queryDelete)==true){
                   $c->insertarLog($COD_USU,"asignaturas","id_asig","id_asig","DELETE",$IdAsig);
                    echo "Asignatura Eliminada";
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
    $IdASig = trim($_POST['IdASig']);
    $query= "SELECT * FROM asignaturas WHERE id_asig ='".$IdASig."'";
    echo $c->retornarJSON($query);
    }
   /*FIN DEL TRAER PROVEEDOR*/
    
   /*INICIO DEL LISTADO Y BUSCAR*/
   if(isset($_POST['btn_listar'])){
     $buscar = trim($_POST['txtbuscar']);
     $curso = trim($_POST['cbocurso2']);

     if ($curso == 0 || $curso=='undefined' ) {
       $where = " ";
     }else{
        $where = " AND id_dcurso='".$curso."' ";
     }

     if ($IDTIP_USU==1){
      if ($buscar!="" AND $buscar!='undefined'){
         $query= "SELECT a.id_asig ,a.desc_asig,c.des_cd,b.descr_esta,a.Est_asig FROM asignaturas a inner join establecimiento b on a.Id_esta=b.id_esta inner join cursosdescripcion c on a.id_dcurso=c.id_cd WHERE (a.desc_asig LIKE '%".$buscar."%' OR b.descr_esta LIKE '%".$buscar."%' OR c.des_cd LIKE '%".$buscar."%') ".$where."   ORDER BY a.id_asig,a.desc_asig ASC LIMIT 0 , 40";   
     }else{
         $query= "SELECT a.id_asig ,a.desc_asig,c.des_cd,b.descr_esta,a.Est_asig FROM asignaturas a inner join establecimiento b on a.Id_esta=b.id_esta inner join cursosdescripcion c on a.id_dcurso=c.id_cd ".$where."  ORDER BY a.id_asig,a.desc_asig ASC LIMIT 0 , 40";
          }
     }else{
      if ($buscar!="" AND $buscar!='undefined'){
         $query= "SELECT a.id_asig ,a.desc_asig,c.des_cd,b.descr_esta,a.Est_asig FROM asignaturas a inner join establecimiento b on a.Id_esta=b.id_esta inner join cursosdescripcion c on a.id_dcurso=c.id_cd WHERE (a.desc_asig LIKE '%".$buscar."%' OR b.descr_esta LIKE '%".$buscar."%' OR c.des_cd LIKE '%".$buscar."%') and  a.Id_esta=".$ID_ESTA." ".$where."  ORDER BY a.id_asig,a.desc_asig ASC LIMIT 0 , 40";
            
     }else{
         $query= "SELECT a.id_asig ,a.desc_asig,c.des_cd,b.descr_esta,a.Est_asig FROM asignaturas a inner join establecimiento b on a.Id_esta=b.id_esta inner join cursosdescripcion c on a.id_dcurso=c.id_cd WHERE a.Id_esta=".$ID_ESTA." ".$where."  ORDER BY a.id_asig,a.desc_asig ASC LIMIT 0 , 40";
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




