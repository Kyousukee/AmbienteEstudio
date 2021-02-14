<?php
$inactividad=$_GET['inactividad'];
session_start();
session_unset(); //vacia contenido
session_destroy();//destruye la sesion
if($inactividad==1){
?>
<script>
             alert('La sesion a caducado');
             window.location.href='../login.php';
             </script>
<?php
}else{
             ?>
             <script>
            window.location.href='../Home.php';
             </script>
             <?php
}

            
?>