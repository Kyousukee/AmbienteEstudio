<?php session_start(); ?>
<?php 
/*Solo para el servidor redirecciona automaticamente a HTTPS*/
/*if(empty($_SERVER['HTTPS']))//si el acceso a https esta vacio
header("Location: https://www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);*/
ini_set("error_reporting", E_ALL & ~E_DEPRECATED);
ini_set('max_execution_time', 300); 
if(isset($_SESSION['Activo'])){
$NOM_USU  = $_SESSION["NOMBRE"];
$COD_USU  = $_SESSION["COD_USU"];      
$IDTIP_USU  = $_SESSION['IDTIP_USU'];
$TIP_USU  = $_SESSION['TIPO_Usu'];
$USU_USU  = $_SESSION['Usuario'];
$EST_USU  = $_SESSION['Establecimiento'];

require("../Modelo/conexion.php");
$c = new baseDatos();

//date_default_timezone_set("America/Santiago");
//Limpia la url de los módulos eliminando los caracteres inválidos
error_reporting(0);
    
    $ref    = $_GET['mod'];
    $modulo = $c->validarPermisos($ref,$IDTIP_USU);
 ?>
<!DOCTYPE html>
<html lang="en">
<title>AmbienteEsudio</title>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/estilos.css" rel="stylesheet" />
    
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script><!--Menu-->
    <script src="js/angular1.3.14.min.js"></script>
    
    <!--Ultimo estilo
    <link href="css/estilo.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>
  -->
    
    <link href="css/chk.css" rel="stylesheet" />
    <link href="css/boxicons.min.css" rel="stylesheet" />
     <link href="css/boxicons.css" rel="stylesheet" />


<body>


       <?php $c->cargarMenu($IDTIP_USU);?>


<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-xlarge w3-padding" style="background-color: brown; color: white;">
  <a href="javascript:void(0)" class="w3-button w3-margin-right" onclick="w3_open()">☰</a>
  <span>AmbienteEstudio</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
<section id="main-content">             
                       
      <?php 

      if(file_exists($modulo)){
              include $modulo;
        }else{
              if($IDTIP_USU == 1){
              include "homeadmin.php";
        }else if ($IDTIP_USU == 2) {
              include "homeestablecimiento.php";
        }else if ($IDTIP_USU == 3) {
              include "homedocente.php";
        }else{
              include "homeestudiante.php"; 
        }
        } 
             
         

      ?>
<div class="text-right">
          <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"> <p>Creado por <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">JOSE VERGARA ALVAREZ @2020</a></p></div>
        </div>
          
      </section>
 
</div>



<!-- W3.CSS Container -->


<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>
<?php 

}else{
            ?>
             <script>
             alert('Debe iniciar sesión para ingresar a esta página.');
             window.location.href='../Home.php';
             </script>
            <?php
  }
?>
<script src="js/expire.js"></script>
<script type="text/javascript">   // When the user clicks on <span> (x), close the modal
document.getElementById("botoncerrar").onclick = function() {
  document.getElementById("modal_error").style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == document.getElementById("modal_error") || event.target == document.getElementById("modal_correc")) {
    document.getElementById("modal_error").style.display = "none";
    document.getElementById("modal_correc").style.display = "none";
  }
}

  document.getElementById("botoncerrar2").onclick = function() {
  
  document.getElementById("modal_correc").style.display = "none";
}


</script>