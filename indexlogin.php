<?php session_start();?>
 <?php
require("Modelo/conexion.php");
$c = new baseDatos();

 if (isset($_POST['txtusuario']) AND isset($_POST['txtclave'])){
    $ERROR ="Se encontraron los siguientes errores:\\n";
    $CAN_ER = 0;

    /*Variables de inicio de sesion*/
    $LOG   = str_replace("'","",trim($_POST['txtusuario']));
    $CLAVE = str_replace("'","",trim($_POST['txtclave']));
    

    /*Validacion de variables*/
    if($LOG==""){
     $ERROR=$ERROR."Debe ingresar un usuario\\n";
     $CAN_ER=$CAN_ER+1;
    }

    if($CLAVE==""){
      $ERROR=$ERROR."Debe ingresar una clave\\n";
      $CAN_ER=$CAN_ER+1;
    }

    /*Si no existen errores se pasa a la consulta*/
     if ($CAN_ER==0){
    /*$CLAVE2 = md5($CLAVE);
    $CLAVE  = $c->crypt("e",$CLAVE);*/


    $c->conexion();
    $consulta = "SELECT a.id_usu as id,a.log_usu as login, a.id_tip as idtipo ,b.desc_tipu as tipo,case when EXISTS (SELECT * from docentes c where c.rut_doce=a.log_usu ) then (SELECT c.id_doce from docentes c where c.rut_doce=a.log_usu ) when EXISTS (SELECT * from estudiantes d where d.rut_est=a.log_usu ) then (SELECT d.id_est from estudiantes d where d.rut_est=a.log_usu ) when EXISTS (SELECT * from establecimiento e where e.rut_esta=a.log_usu )  then (SELECT e.id_esta from establecimiento e where e.rut_esta=a.log_usu )  else a.id_usu end as Usuario, case when EXISTS (SELECT * from docentes c where c.rut_doce=a.log_usu ) then (SELECT c.est_doce from docentes c where c.rut_doce=a.log_usu ) when EXISTS (SELECT * from estudiantes d where d.rut_est=a.log_usu ) then (SELECT d.est_est from estudiantes d where d.rut_est=a.log_usu ) when EXISTS (SELECT * from establecimiento e where e.rut_esta=a.log_usu )  then (SELECT e.id_esta from establecimiento e where e.rut_esta=a.log_usu )  else a.id_usu end as Estable,
case when EXISTS (SELECT * from docentes c where c.rut_doce=a.log_usu ) then (SELECT c.nom_doce+' '+c.ape_doce from docentes c where c.rut_doce=a.log_usu ) when EXISTS (SELECT * from estudiantes d where d.rut_est=a.log_usu ) then (SELECT d.nom_est+' '+d.ape_est from estudiantes d where d.rut_est=a.log_usu ) when EXISTS (SELECT * from establecimiento e where e.rut_esta=a.log_usu )  then (SELECT e.descr_esta from establecimiento e where e.rut_esta=a.log_usu )  else b.desc_tipu end as Nombre,ifnull((select g.id_esta from establecimiento g where g.usu_esta=a.log_usu),0) as id_esta from usuarios a INNER JOIN tipousuario b on a.id_tip=b.id_tipu where a.log_usu='".$LOG."' and a.pass_usu='".$CLAVE."';";
    $c->consulta = $consulta;
    $ejecutar=mysqli_query($c->id_con,$c->consulta);

    if ($rs=mysqli_fetch_array($ejecutar,MYSQLI_BOTH)){
                
          if($rs['id']!=""){
          $_SESSION['COD_USU']  = $rs['id'];       
          $_SESSION['IDTIP_USU']  = $rs['idtipo'];
          $_SESSION['TIPO_Usu']  = $rs['tipo'];
          $_SESSION['NOMBRE']  = $rs['Nombre'];
          $_SESSION['Usuario']  = $rs['Usuario'];
          $_SESSION['Establecimiento']  = $rs['Estable'];
          $_SESSION['ID_Esta']  = $rs['id_esta'];
          $_SESSION['CLA_USU']  = $CLAVE;
          $_SESSION['TIME']     = time();
          $_SESSION['ID']       = session_id();
          $_SESSION['Activo']   = true;
          echo "correct";
          }else{
           echo "wrong1";
          }
    }else{
      echo "wrong2";
    }

    $c->desconexion();  




   
  }else{
    echo "wrong3";
  }
 
 }else{
  echo "wrong4";
  }
?>
<?php session_write_close();?>