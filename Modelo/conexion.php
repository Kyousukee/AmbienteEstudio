<?php 

date_default_timezone_set("Chile/Continental");
require "phpmailer/PHPMailerAutoload.php";

class baseDatos{
  // declaracion de atributos necesarios para la conexion.
  public $servidor;
  public $login;
  public $clave;
  public $base;
  public $con;

  


  // declarar el constructor y las funciones necesarias.
  function baseDatos(){
    //Conexión Local
    // $this->servidor = "192.168.1.90"; // servidor de base de datos prueba
    $this->servidor = "127.0.0.1"; // servidor de base de datos prueba
    $this->login = "root";         // usuario de base de datos
    // $this->clave = "victor";             // clave del usuario
    $this->clave = "";             // clave del usuario
    $this->base = "AmbienteEstudio";  // nombre de la Base de datos
    
    //$this->base = "bodegaprecisafrozenv2"; // nombre de la Base de datos antigua para traspaso

        //Conexion Hosting
    //$this->servidor = ""; // servidor de mysqli
    //$this->login = "precisaf_rsaa";  // usuario de mysqli
    //$this->clave = "precisa2016";   // clave del usuario root
    //$this->base = "precisaf_purchase"; // nombre de la Base de datos
  }
  
  //Se establece la conexion al servidor
  function conexion(){
    $this->id_con = mysqli_connect($this->servidor,$this->login,$this->clave) or die("Error en la Conexion al Motor de Base datos");
    mysqli_set_charset($this->id_con, "utf8");
    
    $this->id_bd= mysqli_select_db($this->id_con, $this->base);
    
    if(!$this->id_bd){
      die("ERROR en la seleccion de BD");
      }
      
  }

  function desconexion(){//Libera la conexion
    mysqli_close($this->id_con);
  }

  //FUNCION QUE VALIDA PERMISOS
  function validarPermisos($ref,$IdUsuario){

    $ref  = htmlentities($_GET['mod'], ENT_QUOTES);
    $ref  = preg_replace('([^A-Za-z0-9])', '', $ref);
    if(trim($ref)!=""){

     if ($ref!="miperfil"){
      $queryPermiso ="SELECT a.id_pd as permiso FROM pantallasdetalle a,pantallasdetalleusuarios b WHERE a.id_pd=b.id_pdet and b.id_usu='".$IdUsuario."' and a.ruta_pd='".$ref."' and a.est_pd='A';";
     
     $permiso = $this->retornarRegistro($queryPermiso,"permiso");
     if(trim($permiso)==""){
      
       
         $ref = "inicio";
        
      
     }
     }

    }
    
    $modulo = $ref.".php";

    return $modulo;
  }

 

  //FUNCION QUE CARGA EL MENU PRINCIPAL DINAMICAMENTE A PARTIR DEL CODIGO DEL USUARIO Y SUS RESPECTIVAS FUNCIONES HABILITADAS
function cargarMenu($IdUsuario){

    //IMPRIMIR EL INICIO
    echo "<aside>";
      echo "<nav class='w3-sidebar w3-collapse w3-top w3-large w3-padding' style='z-index:3;width:300px;font-weight:bold; background-color: brown;color: white;' id='mySidebar'><br>
  <a href='javascript:void(0)' onclick='w3_close()' class='w3-button w3-hide-large w3-display-topleft' style='width:100%;font-size:22px'>Close Menu</a>
  <div class='w3-container'>
    <h3 class='w3-padding-64'><b>AMBIENTE<br>ESTUDIO</b></h3>
  </div>";
           
    
          echo "<div class='w3-bar-block'>";
            echo "<a href='?mod=inicio.php' 
            onclick='w3_close()' class='w3-bar-item w3-button w3-hover-white'>INICIO</a>";

      $this->conexion();
      $this->consulta = "SELECT a.desc_pd As Descripcion, a.ruta_pd As Ruta FROM pantallasdetalle a
                INNER JOIN pantallasdetalleusuarios b ON b.id_pdet=a.id_pd
                INNER JOIN usuarios c ON c.id_tip=b.id_usu
                WHERE a.est_pd='A' AND c.est_usu='A' AND c.id_tip='".$IdUsuario."';";
      $ejecutar = mysqli_query($this->id_con,$this->consulta);

      while($rs = mysqli_fetch_array($ejecutar,MYSQLI_BOTH)) {
          echo "<a class='w3-bar-item w3-button w3-hover-white' href='?mod=".$rs['Ruta']."'>".$rs['Descripcion']."</a>";
      }

      $this->desconexion();
      echo "</div>";
  echo "</aside>";
    
  }

  function cargarSubMenu($ref,$IdUsuario){

    $query="SELECT m_aplicacion_sub_detalle.Descripcion,
            m_aplicacion_sub_detalle.Ruta, 
            m_aplicacion_sub_detalle.Icono 
            FROM m_aplicacion_sub_usuario, m_aplicacion_sub_detalle, m_aplicacion_detalle
            WHERE m_aplicacion_sub_usuario.AplicacionIdSubDetalle = m_aplicacion_sub_detalle.AplicacionIdSubDetalle AND 
            m_aplicacion_sub_usuario.IdUsuario='".$IdUsuario."' AND 
            m_aplicacion_sub_detalle.AplicacionIdDetalle = m_aplicacion_detalle.AplicacionIdDetalle AND 
            m_aplicacion_detalle.Ruta='".$ref."' AND m_aplicacion_sub_detalle.Estado='A'";

            $this->conexion();
            $this->consulta = $query;
            $ejecutar = mysqli_query($this->id_con,$this->consulta);
            
            echo "<table class='table table-bordered'>";
            echo "<tbody>";
            $limite_registros="3";
            $tr="1";
            while($rs = mysqli_fetch_array($ejecutar,MYSQL_BOTH)){
              
              if($tr=="1"){
               echo "<tr>";
              }
              
              echo "<td><center><a href='?mod=".$rs['Ruta']."'><img src='img/sub_detalle/logo-big.png' with='100px' height='100px'></br>".$rs['Descripcion']."</a></center></td>";
                          
              if($tr=="3"){
               echo "</tr>";
               $tr="0";
              }

              $tr = $tr+1;

            }

            if ($tr!="1"){
              echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            
            $this->desconexion();

    

    

  }
  
   
  function ejecutarConsulta($query){ 
    $this->conexion();
    $this->consulta = $query;
      $ejecutar=mysqli_query($this->id_con,$this->consulta);
    if(!$ejecutar){
      return false;
    }else{
      return true;
    } 
         $this->desconexion();
  }
  
  function esPar($numero){ 
   $resto = $numero%2; 
   if (($resto==0) && ($numero!=0)) { 
        return true; //es par
   }else{ 
        return false; //no es par
   }  
   }


 function retornarRegistro($query,$registro){  
    $this->conexion();
    $this->consulta = $query;
      $ejecutar=mysqli_query($this->id_con,$this->consulta);
    if($rs=mysqli_fetch_array($ejecutar,MYSQLI_BOTH)){
      return $rs[$registro];
    }else{
      return "";
    } 
         $this->desconexion();
  }

    function contarRegistro($campo,$tabla,$donde){  
    $this->conexion();
    $this->consulta = "SELECT COUNT (".$campo.") As Cantidad FROM ".$tabla." ".$donde." ";
      $ejecutar=mysqli_query($this->id_con,$this->consulta);
    if($rs=mysqli_fetch_array($ejecutar,MYSQL_BOTH)){
      return $rs['Cantidad'];
    }else{
      return "0";
    } 
      $this->desconexion();
  }
  

  function buscarRegistro($query){  
    $this->conexion();
    $this->consulta = $query;
      $ejecutar=mysqli_query($this->id_con,$this->consulta);
    if($rs=mysqli_fetch_array($ejecutar,MYSQLI_BOTH)){
      return true;
    }else{
      return false;
    } 
         $this->desconexion();
    }


  function crearSelect($query,$id,$name,$clase,$defecto,$atributos,$encrit,$codigo,$campo,$select){  
    $this->conexion();
    $this->consulta = $query;
    $ejecutar=mysqli_query($this->id_con,$this->consulta);

     echo"<select id='".$id."' name='".$name."' class='".$clase."' ".$atributos.">";
     
     if($defecto=="ON"){
        echo"<option value='0'>Seleccione...</option>";
     }
      
      while($rs=mysqli_fetch_array($ejecutar,MYSQL_BOTH)){
        
        $datos          = explode("-",$campo);
        $cantidad_datos = count($datos);
        $i=0;

        while ($i<$cantidad_datos){
          $mostrar = $mostrar."  ".$rs[$datos[$i]];
          $i=$i+1;
        }

        if($encrit=="ON"){
          $value = base64_encode($rs[$codigo]);
        }else{
          $value = $rs[$codigo];
        }
      
       if(trim($rs[$codigo])==$select){
           echo"<option value='".$value."' selected>".$mostrar."</option>";
       }else{
           echo"<option value='".$value."'>".$mostrar."</option>";
       }
          
          $mostrar = "";
      }

    echo"</select>";
    $this->desconexion();
  }

  function horaActual($segundos){
        date_default_timezone_set("Chile/Continental");
        $h = date("G");
        $m = date("i");
        $s = date("s");
        $h = $h+1;
        //si la variable segundos es vacia muestro
        //hora larga de lo contrario corta
        if($segundos==""){
         $hora ="".$h.":".$m.":".$s."";
        }else{
         $hora ="".$h.":".$m."";
        }

        return $hora;
      }

  function formatoFecha($fecha){

     $fecha1=$fecha;
     $fecha2=date("d-m-Y",strtotime($fecha1));
     $fecha = str_replace("-", "/", $fecha2);
     return $fecha;
  }

  function formatoFechaGuion($fecha){

   $dia = substr($fecha,0,2);
   $mes = substr($fecha,3,2);
   $year = substr($fecha,6,5);
   $fecha = $year."-".$mes."-".$dia;
       
     return $fecha;
  }


  function formatoFechaJavaScript($fecha){
  //Fri Jan 05 2018 10:41:43 GMT-0200 (Hora de verano Sudamérica este)
   $dia = substr($fecha,8,2);
   $year = substr($fecha,11,4);
   $mesingles=substr($fecha,4,3);;
   
   if($mesingles=="Jan"){
     $mes="01";
   }

   if($mesingles=="Feb"){
     $mes="02";
   }

   if($mesingles=="Mar"){
     $mes="03";
   }

   if($mesingles=="Apr"){
     $mes="04";
   }

   if($mesingles=="May"){
     $mes="05";
   }

   if($mesingles=="Jun"){
     $mes="06";
   }

   if($mesingles=="Jul"){
     $mes="07";
   }

   if($mesingles=="Aug"){
     $mes="08";
   }

   if($mesingles=="Sep"){
     $mes="09";
   }

   if($mesingles=="Oct"){
     $mes="10";
   }

   if($mesingles=="Nov"){
     $mes="11";
   }

   if($mesingles=="Dec"){
     $mes="12";
   }


   $fecha = $year."-".$mes."-".$dia;
       
     return $fecha;
  }

  function formatoFechaGuion2($fecha){
   
   $fecha1=$fecha;
   $fecha2=date("Y-m-d",strtotime($fecha1));
   return $fecha2;
  }
  
  function crypt($action,$string) { //encrypt_decrypt

    $key1 = "bRuD5WY";
    $key2 = "LlM6wt2";
 
    if ($action=="e"){
      $data = base64_encode($string);
      $data = str_replace(array('+','/','='),array('-','_',''),$data);
      return $key2.$data.$key1;
    }
 
     if ($action=="d"){
      $string = str_replace($key1, "", $string);
      $string = str_replace($key2, "", $string);
      $data = str_replace(array('-','_'),array('+','/'),$string);
      $mod4 = strlen($data) % 4;
      if ($mod4) {
        $data .= substr('====', $mod4);
      }
      return base64_decode($data);
    }

  }

  function full_copy( $source, $target ) {
    if ( is_dir( $source ) ) {
        @mkdir( $target );
        $d = dir( $source );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $source . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );
        }
 
        $d->close();
    }else {
        copy( $source, $target );
    }
    }


    function limpiar_caracteres_especiales($s) {
       $s = preg_replace("[áàâãªä@]","a",$s);
       $s = preg_replace("[ÁÀÂÃÄ]","A",$s);
       $s = preg_replace("[éèêë]","e",$s);
       $s = preg_replace("[ÉÈÊË]","E",$s);
       $s = preg_replace("[íìîï]","i",$s);
       $s = preg_replace("[ÍÌÎÏ]","I",$s);
       $s = preg_replace("[óòôõºö]","o",$s);
       $s = preg_replace("[ÓÒÔÕÖ]","O",$s);
       $s = preg_replace("[úùûü]","u",$s);
       $s = preg_replace("[ÚÙÛÜ]","U",$s);
       $s = str_replace("[¿?\]","_",$s);
       $s = str_replace(" ","-",$s);
       $s = str_replace("ñ","n",$s);
       $s = str_replace("Ñ","N",$s);
       $s = str_replace("°","",$s);
       //para ampliar los caracteres a reemplazar agregar lineas de este tipo:
       //$s = str_replace("caracter-que-queremos-cambiar","caracter-por-el-cual-lo-vamos-a-cambiar",$s);
       return $s;
}


    function limpiar($url){
      $url = strtolower($url);
      //Reemplazamos caracteres especiales latinos
      $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
      $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
      $url = str_replace($find, $repl, $url);
      //Añadimos los guiones
      $find = array(' ', '&amp;', '\r\n', '\n','+');
      $url = str_replace($find, '-', $url);
      //Eliminamos y Reemplazamos los demas caracteres especiales
      $find = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;{^&gt;*&gt;/');
      $repl = array('', '-', '');
      $url = preg_replace($find, $repl, $url);
      $url = str_replace("-"," ",$url);
      $url = strtoupper($url);
      return $url;
     }

  function datosEmail(){

    $query="SELECT * FROM m_envio_mail WHERE Estado='A' ORDER BY IdEnvioMail DESC LIMIT 0,1;";
    $this->conexion();
    $this->consulta = $query;
    $ejecutar = mysqli_query($this->id_con,$this->consulta);
    
    if($rs = mysqli_fetch_array($ejecutar,MYSQL_BOTH)){
       return array($rs['ServidorIp'],$rs['Puerto'],$rs['Usuario'],$rs['Password']); 
    }else{
       return array("","","","");
    }
    
    $this->desconexion();
  }


  function enviar_correo($to,$to_name,$asunto,$mensaje,$ruta_archivos,$archivo1,$archivo2,$archivo3)  {
    //INSTANCIO CLASE MAIL AL INICIO DE LA CLASE CONEXION
      $mail = new PHPMailer;
      list($ServidorIp,$Puerto,$Usuario,$Password)=$this->datosEmail();

      //$mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = $ServidorIp;  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = $Usuario;                 // SMTP username
      $mail->Password = $Password;                           // SMTP password
      //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = $Puerto;                                    // TCP port to connect to

      $mail->setFrom($Usuario, 'Sistema de ordenes de compra');
      

      $destinatarios = explode(",", $to);
      foreach($destinatarios as $destinatario){
       if ($destinatario!=""){
        $mail->addAddress($destinatario, $destinatario);
       }
      }

      //$mail->addAddress($to, $to_name);     // Add a recipient
      //$mail->addAddress('ellen@example.com');               // Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      if($archivo1!=""){
      $mail->addAttachment($ruta_archivos.$archivo1,$archivo1);         // Add attachments
      }

      if($archivo2!=""){
      $mail->addAttachment($ruta_archivos.$archivo2,$archivo2);         // Add attachments
      }

      if($archivo3!=""){
      $mail->addAttachment($ruta_archivos.$archivo3,$archivo3);         // Add attachments
      }
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $asunto;
      $mail->Body    = $mensaje;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if(!$mail->send()) {
          //echo 'Message could not be sent.';
         echo 'Mailer Error: ' .$mail->ErrorInfo;
        return false;
      } else {
          //echo 'Message has been sent';
        return true;
      }
  }

  function formatoMail($asunto,$cuerpo){
 $mensaje="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Demystifying Email Design</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 0; padding: 0;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'> 
    <tr>
      <td style='padding: 10px 0 30px 0;'>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #cccccc; border-collapse: collapse;'>
          <tr>
            <td align='center' bgcolor='#D35400' style='padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;'>
              <b>".utf8_decode($asunto)."</b>
            </td>
          </tr>
          <tr>
            <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
              <table border='0' cellpadding='0' cellspacing='0' width='100%'>
           
           <tr>
           <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
            
           </td>
          
          </tr>
          <tr>
           <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
            ".utf8_decode($cuerpo)."
           </td>
          </tr>

              </table>
            </td>
          </tr>
          <tr>
            <td bgcolor='#323952' style='padding: 30px 30px 30px 30px;'>
              <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                  <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;' width='75%'>
                    &copy;Copyright - PrecisaCCGroup 2018.<br/>
                    
                  </td>
                  <td align='right' width='25%'>
                    
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>";

return $mensaje;
  }

  function cerosAnterior($string,$largo){

    $cantidad = strlen($string);

    if($cantidad<$largo){
     
     $cerosfaltan = $largo-$cantidad;
     
     $i=0;

     while($i<$cerosfaltan){
     $string = "0".$string;
     $i++;
     }


    }

    return $string;

  }




/**
* Funcion encargada de encriptar una cadena utilizado llave y
* codificacion base64
*
* Recibe dos parámetros:
* @param type $string que es la cadena a encriptar
* @param type $key que es la llave para la encriptación
*
* Devuelve un string con la cadena encriptada
* 
* Ejemplo llamada a funcion: 
* 
* $key="lHk954di_-\\"
* $cadena_codificada=$this->encrypt($cadena_a_codificar, $key);
* 
* SGM 130216
*/
  function encrypt($string, $key) {
      $result = '';
      for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)+ord($keychar));
            $result.=$char;
      }
 
      $result=base64_encode($result);
      $result = str_replace(array('+','/','='),array('-','_','.'),$result);
      return $result;
  } 

/**
* Funcion encargada de desencriptar una cadena utilizado llave y
* codificacion base64
*
* Recibe dos parámetros:
* @param type $string que es la cadena a encriptar
* @param type $key que es la llave para la encriptación
*
* Devuelve un string con la cadena encriptada
* 
* 
* $key="lHk954di_-\\"
* $cadena_descodificada=$this->dencrypt($cadena_a_codificar, $key);
* 
* SGM 130216
*/
  function decrypt($string, $key) {
      $string = str_replace(array('-','_','.'),array('+','/','='),$string);
      $result = '';
      $string = base64_decode($string);
      for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
      }
      return $ressult;
    }

    function retornarJSON ($query){
      $this->conexion();
      $this->consulta = $query;
      $ejecutar=mysqli_query($this->id_con,$this->consulta);
      
      while($rs=mysqli_fetch_array($ejecutar,MYSQLI_BOTH)){
         $output[] = $rs;
       } 
      
       $this->desconexion();
      return json_encode($output);    
    }

    function getRealIP() {
      if (!empty($_SERVER["HTTP_CLIENT_IP"])){
        $IP = $_SERVER["HTTP_CLIENT_IP"];
      }else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
      }else{
        $IP = $_SERVER["REMOTE_ADDR"];
      }
       return $IP;         
    }

    function ultimoRegistro ($tabla,$campo,$id){
      $this->conexion();
      $this->consulta = "SELECT ".$campo." FROM ".$tabla." ORDER BY ".$id." DESC LIMIT 0,1";
      $Identificador="";
      $ejecutar=mysqli_query($this->id_con,$this->consulta);
      
      if($rs=mysqli_fetch_array($ejecutar,MYSQLI_BOTH)){
         $Identificador=$rs[$campo];
       } 
      
       $this->desconexion();
      return $Identificador;    
    }

    function insertarLog($idusuario,$tabla,$campo,$id,$movimiento,$afectado){
      $IP_EQUIPO = $this->getRealIP();
      if(trim($afectado)==""){
        $ID_AFECTADO = $this->ultimoRegistro ($tabla,$campo,$id);
      }else{
        $ID_AFECTADO=$afectado;
      }
      $queryLogSistema=" INSERT INTO log_sistema (IdAfectado, IdUsuario, FechaMovimiento, NombreEquipo, IpEquipo, NombreTabla, TipoMovimiento) 
                         VALUES ('".$ID_AFECTADO."','".$idusuario."', NOW(), '".$IP_EQUIPO."', '".$IP_EQUIPO."', '".$tabla."', '".$movimiento."');";
      $this->ejecutarConsulta($queryLogSistema);
     }

     function comprobar_email($email){
   $mail_correcto = 0;
   //compruebo unas cosas primeras
   if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
      if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
         //miro si tiene caracter .
         if (substr_count($email,".")>= 1){
            //obtengo la terminacion del dominio
            $term_dom = substr(strrchr ($email, '.'),1);
            //compruebo que la terminación del dominio sea correcta
            if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
               //compruebo que lo de antes del dominio sea correcto
               $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
               $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
               if ($caracter_ult != "@" && $caracter_ult != "."){
                  $mail_correcto = 1;
               }
            }
         }
      }
   }
   if ($mail_correcto)
      return 1;
   else
      return 0;
   }


 function formatearNumero($var){
   /*
   funcion que retorna como resultado un 
   numero con on sin decimal dependiendo de como venga
   */
   $numero = 0;
   $partes = explode(".",$var); 
   if ($partes[1] == 0) { 
    $numero = number_format($var, 0, ',', '.'); 
   }else{
    $numero = number_format($var, 2, ',', '.');
   } 

   return $numero;
 }

 }
?>
