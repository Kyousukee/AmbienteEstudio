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
   $qpi="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='2';";
   $qpm="SELECT id_pdu as ID FROM pantallasdetalleusuarios where id_usu='".$IDTIP_USU."' and id_pdet='2';";

   $insertar  = $c->retornarRegistro($qpi,"ID"); //INSERTAR PROVEEDORES
   $modificar = $c->retornarRegistro($qpm,"ID"); //MODIFICAR PROVEEDORES

    /*INICIO DEL CARGAR CURSOS*/
   if(isset($_POST['btn_crgcur'])){
        $query="SELECT id_cd,des_cd FROM cursosdescripcion;";
        echo $c->retornarJSON($query);
        }
   /*FIN DEL CARGAR CURSOS*/

   
   /*INICIO DEL BOTON DE GRABAR*/
   if(isset($_POST['btn_grabar'])){
    if($insertar!=""){
    //recibo datos
    $curso       = trim($_POST['cbocurso']);
    $destintivo    = trim($_POST['cbodestintivo']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $queryIdentificador = "SELECT id_curso FROM cursos WHERE desc_curso='".$curso."' and Est_curso='A' AND Id_esta='".$ID_ESTA."'";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Este Curso ya se encuentra registrado \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     
     if ($CAN_ER=="0"){

      if ($destintivo==0) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Unico');";
        $c->ejecutarConsulta($queryInsertar);
      }    
      if ($destintivo>=1) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','A');";
        $c->ejecutarConsulta($queryInsertar);
      }
      if ($destintivo>=2) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','B');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=3) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','C');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=4) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','D');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=5) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','E');";
        $c->ejecutarConsulta($queryInsertar);
      }      
      if ($destintivo>=6) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','F');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=7) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','G');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=8) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','H');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=9) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','I');";
        $c->ejecutarConsulta($queryInsertar);
      }
      if ($destintivo>=10) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','J');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=11) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','K');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=12) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','L');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=13) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','M');";
        $c->ejecutarConsulta($queryInsertar);
      }      
      if ($destintivo>=14) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','N');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=15) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Ñ');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=16) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','O');";
        $c->ejecutarConsulta($queryInsertar);
      } 
      if ($destintivo>=17) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','P');";
        $c->ejecutarConsulta($queryInsertar);
      }
      if ($destintivo>=18) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Q');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=19) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','R');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=20) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','S');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=21) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','T');";
        $c->ejecutarConsulta($queryInsertar);
      }      
      if ($destintivo>=22) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','U');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=23) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','V');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=24) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','W');";
        $c->ejecutarConsulta($queryInsertar);
      } 
      if ($destintivo>=25) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','X');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=26) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Y');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=27) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Z');";
        $c->ejecutarConsulta($queryInsertar);
      } 
     
          $c->insertarLog($COD_USU,"cursos","id_curso","id_curso","INSERT","");
          echo "Registro almacenado";
       
       
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
  
    $curso       = trim($_POST['cbocurso']);
    $destintivo    = trim($_POST['cbodestintivo']);
    $estado    = trim($_POST['cboestado']);
    $idcurso    = trim($_POST['txtidcurso']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     
     $querycantidadcursos = "SELECT count(*) as cantidad FROM cursos WHERE desc_curso='".$curso."' and Id_esta='".$ID_ESTA."'";
     
        $cantidadcursos = $c->retornarRegistro($querycantidadcursos,"cantidad");

      if ($destintivo<$cantidadcursos and $destintivo!=0) {
         $ERROR=$ERROR."Para descontar cantidad de cursos se requiere desactivarlos y eliminarlos como corresponde. \\\n";
         $CAN_ER=$CAN_ER+1;
      }
     
 
     if ($CAN_ER=="0"){

        
            $queryActualizar = "UPDATE  cursos SET  
                           Est_curso='".$estado."'  
                           WHERE id_curso ='".$idcurso."' and Id_esta='".$ID_ESTA."'";
                           $c->ejecutarConsulta($queryActualizar);


            if ($destintivo>$cantidadcursos) {
              $queryeliminar = "DELETE from  cursos   
                           WHERE desc_curso ='".$curso."'";
                           $c->ejecutarConsulta($queryeliminar);
            if ($destintivo>=1) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','A');";
        $c->ejecutarConsulta($queryInsertar);
      }
      if ($destintivo>=2) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','B');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=3) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','C');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=4) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','D');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=5) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','E');";
        $c->ejecutarConsulta($queryInsertar);
      }      
      if ($destintivo>=6) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','F');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=7) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','G');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=8) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','H');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=9) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','I');";
        $c->ejecutarConsulta($queryInsertar);
      }
      if ($destintivo>=10) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','J');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=11) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','K');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=12) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','L');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=13) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','M');";
        $c->ejecutarConsulta($queryInsertar);
      }      
      if ($destintivo>=14) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','N');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=15) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Ñ');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=16) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','O');";
        $c->ejecutarConsulta($queryInsertar);
      } 
      if ($destintivo>=17) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','P');";
        $c->ejecutarConsulta($queryInsertar);
      }
      if ($destintivo>=18) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Q');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=19) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','R');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=20) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','S');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=21) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','T');";
        $c->ejecutarConsulta($queryInsertar);
      }      
      if ($destintivo>=22) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','U');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=23) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','V');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=24) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','W');";
        $c->ejecutarConsulta($queryInsertar);
      } 
      if ($destintivo>=25) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','X');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=26) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Y');";
        $c->ejecutarConsulta($queryInsertar);
      }  
      if ($destintivo>=27) {
        $queryInsertar = "INSERT INTO cursos(desc_curso, usu_cre, fec_cre, Est_curso, Id_esta, let_curso) VALUES ('".$curso."','".$COD_USU."',now(),'A','".$ID_ESTA."','Z');";
        $c->ejecutarConsulta($queryInsertar);
      } 
          
            }
         
                  

            $c->insertarLog($COD_USU,"cursos","desc_curso ","desc_curso ","UPDATE",$curso);
             echo "Registro Actualizado";
          
          
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
    $IdCurso = trim($_POST['IdCurso']);
    $query= "SELECT * FROM cursos WHERE id_curso='".$IdCurso."'";
    echo $c->retornarJSON($query);
    }
   /*FIN DEL TRAER PROVEEDOR*/
    
   /*INICIO DEL LISTADO Y BUSCAR*/
   if(isset($_POST['btn_listar'])){
     $buscar = trim($_POST['txtbuscar']);
     if ($IDTIP_USU==1){
      if ($buscar!="" AND $buscar!='undefined'){
         $query="SELECT id_curso,des_cd AS desc_curso,let_curso,c.descr_esta,a.Est_curso FROM cursos a INNER JOIN cursosdescripcion b ON b.id_cd = a.desc_curso inner join establecimiento c on a.Id_esta=c.id_esta   
         WHERE (des_cd LIKE '%".$buscar."%') 
         ORDER BY des_cd,id_curso ASC LIMIT 0 , 40";    
     }else{
         $query= "SELECT id_curso,des_cd AS desc_curso,let_curso,c.descr_esta,a.Est_curso FROM cursos a INNER JOIN cursosdescripcion b ON b.id_cd = a.desc_curso inner join establecimiento c on a.Id_esta=c.id_esta      ORDER BY des_cd,id_curso ASC LIMIT 0 , 40";
          }
     }else{
      if ($buscar!="" AND $buscar!='undefined'){
         $query="SELECT id_curso,des_cd AS desc_curso,let_curso,c.descr_esta,a.Est_curso FROM cursos a INNER JOIN cursosdescripcion b ON b.id_cd = a.desc_curso inner join establecimiento c on a.Id_esta=c.id_esta   
         WHERE (des_cd LIKE '%".$buscar."%') AND a.Id_esta=".$ID_ESTA." 
         ORDER BY des_cd,id_curso ASC LIMIT 0 , 40";    
     }else{
         $query= "SELECT id_curso,des_cd AS desc_curso,let_curso,c.descr_esta,a.Est_curso FROM cursos a INNER JOIN cursosdescripcion b ON b.id_cd = a.desc_curso inner join establecimiento c on a.Id_esta=c.id_esta    WHERE a.Id_esta=".$ID_ESTA."  ORDER BY des_cd,id_curso ASC LIMIT 0 , 40";
     }
     }
     
     echo $c->retornarJSON($query);
     }

   /*FIN DEL LISTADO Y BUSCAR*/

   /*INICIO DESACTIVAR TODOS LOS CURSOS*/
   if(isset($_POST['btn_destodo'])){
         $curso       = trim($_POST['cbocurso']);
    
         $queryInsertar = "UPDATE cursos SET Est_curso='I' WHERE desc_curso ='".$curso."' AND Id_esta='".$ID_ESTA."';";
        $c->ejecutarConsulta($queryInsertar);
        }
   /*FIN DESACTIVAR TODOS LOS CURSOS*/


   /*INICIO ELIMINAR CURSOS*/
   if(isset($_POST['btn_eli'])){
         $id       = trim($_POST['id']);
    
         $queryInsertar = "DELETE from cursos WHERE id_curso ='".$id."' AND Id_esta='".$ID_ESTA."';";
        $c->ejecutarConsulta($queryInsertar);
        $c->insertarLog($COD_USU,"cursos","id_curso","id_curso","DELETE","");
        }
   /*FIN ELIMINAR CURSOS*/

   /*INICIO DEL ELIMINAR TODOS*/
   if(isset($_POST['btn_elit'])){
    if($insertar!=""){
    //recibo datos
    $curso       = trim($_POST['cbocurso']);
    $destintivo    = trim($_POST['cbodestintivo']);
    $FechaActual =  date('d-m-Y');
 
    //DECLARO VARIABLES PARA ERRORES
        
     $ERROR ="Se encontraron los siguientes errores:\\\n";
     $CAN_ER = 0;

     $queryIdentificador = "SELECT id_curso FROM cursos WHERE desc_curso='".$curso."' AND Id_esta='".$ID_ESTA."' and Est_curso='A' limit 1";
     
     if($c->buscarRegistro($queryIdentificador)==true){
         $ERROR=$ERROR."Asegurece de tener los cursos que desea eliminar en estado Inactivo \\\n";
         $CAN_ER=$CAN_ER+1;
     }

     
     if ($CAN_ER=="0"){

          $queryInsertar = "DELETE from cursos WHERE desc_curso ='".$curso."' AND Id_esta='".$ID_ESTA."' and Est_curso='I';";
        $c->ejecutarConsulta($queryInsertar);
          
          $c->insertarLog($COD_USU,"cursos","id_curso","id_curso","DELETE Todos","");
          echo "Registros Eliminados Correctamente";
       
       
     }else{
          echo $ERROR;
     }
    }else{
      echo "No tiene privilegios para insertar Establecimientos";
    }
    }
   /*FIN DEL ELIMINAR TODOS*/   


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




