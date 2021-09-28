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
   $qpi="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='5';";
   $qpm="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='5';";

   $insertar  = $c->retornarRegistro($qpi,"ID"); //INSERTAR PROVEEDORES
   $modificar = $c->retornarRegistro($qpm,"ID"); //MODIFICAR PROVEEDORES


/*INICIO DEL CARGAR CURSOS*/
   if(isset($_POST['btn_crgcur'])){
        $query="SELECT '0' as id_cd,'Seleccionar' as des_cd union all SELECT DISTINCT id_cd,des_cd FROM cursosdescripcion inner join cursos on desc_curso=id_cd where Id_esta='".$ID_ESTA."' order by id_cd asc;";
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
   
   /*INICIO DEL CARGAR LETRA
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


/*INICIO DEL CARGAR ASIGNATURAS*/
   if(isset($_POST['btn_crgasig'])){
        $curso= trim($_POST['txtcurso']);
        $query="SELECT id_asig,desc_asig FROM asignaturas WHERE id_dcurso='".$curso."' and Id_esta='".$ID_ESTA."' and Est_asig='A';";
        echo $c->retornarJSON($query);
        }
   /*FIN DEL CARGAR ASIGNATURAS*/

   /*INICIO DEL BOTON DE GRABAR*/
   if(isset($_POST['btn_grabar'])){
    if($insertar!=""){
    //recibo datos
    $cbocurso= trim($_POST['cbocurso']);
    $cboasignatura  = trim($_POST['txtasig']);
    $descripcion     = trim($_POST['txtdescripcion']);
    $numero     = trim($_POST['txtnumero']);
    $estado       = trim($_POST['cboestado']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $queryIdentificador = "SELECT a.id_uni FROM unidades a WHERE a.desc_uni='".$descripcion."' and a.id_asig='".$cboasignatura."' and a.Id_esta='".$ID_ESTA."' and a.Est_uni='A' ;";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Esta descripcion de unidad ya se encuentra registrado en su Asignatura y para este Curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     $queryIdentificador2 = "SELECT a.id_uni FROM unidades a WHERE num_uni='".$numero."' and a.id_asig='".$cboasignatura."' and a.Id_esta='".$ID_ESTA."' and a.Est_uni='A' ;";
     
     if($c->buscarRegistro($queryIdentificador2)==true){
         $ERROR=$ERROR."Esta numero de unidad ya se encuentra registrado en su Asignatura y para este Curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     

     if($cbocurso=="" OR $cbocurso=='undefined' OR $cbocurso==0){
         $ERROR=$ERROR."Debe seleccionar un curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($numero=="" OR $numero=='undefined' or $numero<0){
         $ERROR=$ERROR."Debe seleccionar un numero de Unidad.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($cboasignatura=="" OR $cboasignatura=='undefined'){
         $ERROR=$ERROR."Debe seleccionar una Asignatura.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


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
     
     $queryInsertar = "INSERT INTO unidades(desc_uni, id_asig , usu_cre , fec_cre, Id_esta, num_uni,Est_uni) VALUES ('".$descripcion."','".$cboasignatura."','".$COD_USU."','".$FechaActual."','".$ID_ESTA."','".$numero."','A');";

 
       if($c->ejecutarConsulta($queryInsertar)==true){
          $c->insertarLog($COD_USU,"unidades","id_uni","id_uni","INSERT","");

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
    $idunidad= trim($_POST['txtidunidad']);
    $cbocurso= trim($_POST['cbocurso']);
    $cboasignatura  = trim($_POST['txtasig']);
    $descripcion     = trim($_POST['txtdescripcion']);
    $numero     = trim($_POST['txtnumero']);
    $estado       = trim($_POST['cboestado']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;



     if($cbocurso=="" OR $cbocurso=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un curso.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     if($numero=="" OR $numero=='undefined' or $numero<0){
         $ERROR=$ERROR."Debe seleccionar un numero de Unidad.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($cboasignatura=="" OR $cboasignatura=='undefined'){
         $ERROR=$ERROR."Debe seleccionar una Asignatura.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }


     if($descripcion=="" OR $descripcion=='undefined'){
         $ERROR=$ERROR."Debe ingresar una descripcion de la Asignatura.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if($estado=="" OR $estado=="0" OR $estado=='undefined'){
         $ERROR=$ERROR."Debe seleccionar un estado.- \\\n";
         $CAN_ER=$CAN_ER+1;
     }

 
     if ($CAN_ER=="0"){
         $queryActualizar = "UPDATE unidades SET desc_uni='".$descripcion."',num_uni='".$numero."',Est_uni='".$estado."' WHERE id_uni='".$idunidad."';";


    
          if($c->ejecutarConsulta($queryActualizar)==true){

            $c->insertarLog($COD_USU,"unidades","id_uni","id_uni","UPDATE",$idunidad);
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
           $iduni = trim($_POST['iduni']);           
           //DECLARO VARIABLES PARA ERRORES
               
            $ERROR ="Se encontraron los siguientes errores:\\\n";
            $CAN_ER = 0;

            $queryIdentificador1 = "SELECT Est_uni FROM unidades where Id_esta='".$ID_ESTA."' and id_uni ='".$iduni."' order by id_uni desc LIMIT 1;";
          $estado = $c->retornarRegistro($queryIdentificador1,'Est_uni');

          if($estado=="A"){
                $ERROR=$ERROR."Registro debe estar en estado Inactivo para poder eliminarlo.\\\n";
                $CAN_ER=$CAN_ER+1;
            }
        
            if($iduni==""){
                $ERROR=$ERROR."No se esta eliminando ningun registro\\\n";
                $CAN_ER=$CAN_ER+1;
            }


                
            if ($CAN_ER=="0"){
                

                $queryDelete = "DELETE from  unidades WHERE id_uni ='".$iduni."'";
           
                 if($c->ejecutarConsulta($queryDelete)==true){
                   $c->insertarLog($COD_USU,"unidades","id_uni","id_uni","DELETE",$iduni);
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
    $IdUni = trim($_POST['IdUni']);
    $query= "SELECT a.*,b.id_dcurso FROM unidades a inner join asignaturas b on a.id_asig=b.id_asig WHERE id_uni ='".$IdUni."'";
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
        $where = " AND b.id_dcurso='".$curso."' ";
     }

     if ($IDTIP_USU==1){
      if ($buscar!="" AND $buscar!='undefined'){
         $query= "SELECT a.id_uni,a.num_uni,a.desc_uni,b.desc_asig,a.Est_uni,c.descr_esta,d.des_cd FROM unidades a inner join asignaturas b on a.id_asig=b.id_asig inner join establecimiento c on a.Id_esta=c.id_esta inner join cursosdescripcion d on b.id_dcurso=d.id_cd WHERE (a.desc_uni LIKE '%".$buscar."%' OR b.desc_asig LIKE '%".$buscar."%' OR c.descr_esta LIKE '%".$buscar."%') ".$where." ORDER BY a.id_uni,a.num_uni ASC LIMIT 0 , 40;";
     }else{
         $query= "SELECT a.id_uni,a.num_uni,a.desc_uni,b.desc_asig,a.Est_uni,c.descr_esta,d.des_cd FROM unidades a inner join asignaturas b on a.id_asig=b.id_asig inner join establecimiento c on a.Id_esta=c.id_esta inner join cursosdescripcion d on b.id_dcurso=d.id_cd ".$where."  ORDER BY a.id_uni,a.num_uni ASC LIMIT 0 , 40;";
          }
     }else{
      if ($buscar!="" AND $buscar!='undefined'){
        $query= "SELECT a.id_uni,a.num_uni,a.desc_uni,b.desc_asig,a.Est_uni,c.descr_esta,d.des_cd FROM unidades a inner join asignaturas b on a.id_asig=b.id_asig inner join establecimiento c on a.Id_esta=c.id_esta inner join cursosdescripcion d on b.id_dcurso=d.id_cd WHERE a.Id_esta=".$ID_ESTA." and (a.desc_uni LIKE '%".$buscar."%' OR b.desc_asig LIKE '%".$buscar."%' OR c.descr_esta LIKE '%".$buscar."%') ".$where." ORDER BY a.id_uni,a.num_uni ASC LIMIT 0 , 40;";


     }else{
         $query= "SELECT a.id_uni,a.num_uni,a.desc_uni,b.desc_asig,a.Est_uni,c.descr_esta,d.des_cd FROM unidades a inner join asignaturas b on a.id_asig=b.id_asig inner join establecimiento c on a.Id_esta=c.id_esta inner join cursosdescripcion d on b.id_dcurso=d.id_cd WHERE a.Id_esta=".$ID_ESTA." ".$where."  ORDER BY a.id_uni,a.num_uni ASC LIMIT 0 , 40;";
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




