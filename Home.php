<!DOCTYPE html>
<html>
<title>AmbienteEstudio</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="Vista/js/angular1.3.14.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
<style>

.modal-login {
  width: 350px;
}
.modal-login .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
}
.modal-login .modal-header {
  border-bottom: none;
  position: relative;
  justify-content: center;
}
.modal-login .close {
  position: absolute;
  top: -10px;
  right: -10px;
}
.modal-login h4 {
  color: #636363;
  text-align: center;
  font-size: 26px;
  margin-top: 0;
}
.modal-login .modal-content {
  color: #999;
  border-radius: 1px;
  margin-bottom: 15px;
  background: #fff;
  border: 1px solid #f3f3f3;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  padding: 25px;
}
.modal-login .form-group {
  margin-bottom: 20px;
}
.modal-login label {
  font-weight: normal;
  font-size: 13px;
}
.modal-login .form-control {
  min-height: 38px;
  padding-left: 5px;
  box-shadow: none !important;
  border-width: 0 0 1px 0;
  border-radius: 0;
}
.modal-login .form-control:focus {
  border-color: #ccc;
}
.modal-login .input-group-addon {
  max-width: 42px;
  text-align: center;
  background: none;
  border-bottom: 1px solid #ced4da;
  padding-right: 5px;
  border-radius: 0;
}
.modal-login .btn, .modal-login .btn:active {        
  font-size: 16px;
  font-weight: bold;
  background: #19aa8d !important;
  border-radius: 3px;
  border: none;
  min-width: 140px;
}
.modal-login .btn:hover, .modal-login .btn:focus {
  background: #179b81 !important;
}
.modal-login .hint-text {
  text-align: center;
  padding-top: 5px;
  font-size: 13px;
}
.modal-login .modal-footer {
  color: #999;
  border-color: #dee4e7;
  text-align: center;
  margin: 0 -25px -25px;
  font-size: 13px;
  justify-content: center;
}
.modal-login a {
  color: #fff;
  text-decoration: underline;
}
.modal-login a:hover {
  text-decoration: none;
}
.modal-login a {
  color: #19aa8d;
  text-decoration: none;
} 
.modal-login a:hover {
  text-decoration: underline;
}
.modal-login .fa {
  font-size: 21px;
  position: relative;
  top: 6px;
}
.trigger-btn {
  display: inline-block;
  margin: 100px auto;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-padding w3-card" style="letter-spacing:4px;background-color: brown;">
    <a href="#home" class="w3-bar-item w3-button" style="font-family: Arial;
    color: aliceblue;">AmbienteEstudio</a>
    
      <a href="#about" class="w3-bar-item w3-button" style="font-family: Arial;
    color: aliceblue;">Acerca de</a>
      <a href="#menu" class="w3-bar-item w3-button" style="font-family: Arial;
    color: aliceblue;">Galeria de imagenes</a>
      <a href="#contact" class="w3-bar-item w3-button" style="font-family: Arial;
    color: aliceblue;">Contacto</a>

      <a href="#myModal" data-toggle="modal" class="w3-bar-item w3-button w3-right" style="font-family: Arial;
    color: aliceblue;    background-color: black;"><img src="Vista/Img/login.png" style="width: 25px;
    height: 25px;
    margin-right: 3px;">Inicio de Sesion</a>

    
  </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-login" ng-app="AngularJSLogin" ng-controller="AngularLoginController as angCtrl">
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title">INICIO SESION</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body" >
        <form ng-submit="angCtrl.loginForm()"  method="post">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" name="username" placeholder="RUT (Sin guion o puntos)" ng-model="angCtrl.txtrut" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" name="password" ng-model="angCtrl.password"  placeholder="Contraseña" required="required">
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg">INGRESAR</button>
          </div>
          <div class="alert alert-danger" ng-show="errorMsg">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"  ng-click="angCtrl.Ocultar()">×</button>
                <span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;{{errorMsg}}
            </div>

        </form>
      </div>
      
    </div>
  </div>
</div> 

<script>
    angular.module('AngularJSLogin', [])
  .controller('AngularLoginController', ['$scope', '$http', '$window', function($scope, $http, $window) {
   var self = this;
          

        self.loginForm = function() {
            console.log('Hola');
            var user_data='txtusuario='+this.txtrut+'&txtclave='+this.password;
      console.log(user_data);
            $http({
                method: 'POST',
                url: 'indexlogin.php',
                data: user_data,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .success(function(data) {
        console.log(data);
                if ( data.trim() === 'correct') {
                    window.location.href = 'Vista/principal.php';
                } else {
                    $scope.errorMsg = "Rut o Clave invalidos";
                }
            })
        }

        self.Ocultar = function() {
            $scope.errorMsg = false;
        }

    }]);
    </script>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="Vista/Img/AmbienteEstudio.jpg" alt="Hamburger Catering" width="1600" height="800">
  
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="/w3images/tablesetting2.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About Catering</h1><br>
      <h5 class="w3-center">Tradition since 1889</h5>
      <p class="w3-large">The Catering was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.We only use <span class="w3-tag w3-light-grey">seasonal</span> ingredients.</p>
      <p class="w3-large w3-text-grey w3-hide-medium">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <!-- Automatic Slideshow Images -->
  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Summer House</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Brick House</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Renovated</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Barn House</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:100%">
      </div>
    </div>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Summer House</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Brick House</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Renovated</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Barn House</div>
        <img src="Vista/img/imagen1.jpg" alt="House" style="width:99%">
      </div>
    </div>
  </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Rancagua, CHILE<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +569 32507495<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: jjosemiguel.jv@gmail.com<br>
      </div>
      <div class="w3-col m6">
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Nombre" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Mensaje" required name="Message">
          <button class="w3-button w3-black w3-section w3-right" type="submit">ENVIAR</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Creado por <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">JOSE VERGARA ALVAREZ @2020</a></p>
</footer>

</body>
</html>