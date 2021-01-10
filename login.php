<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="Vista/js/angular1.3.14.min.js"></script>
<link href="Vista/css/bootstrap-theme.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    body {
  margin: 0;
  padding: 0;
  background-color: brown;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}

</style>
<title>Iniciar Sesion</title>
<body ng-app="AngularJSLogin" ng-controller="AngularLoginController as angCtrl">
    <div id="login">
        <h3 class="text-center text-white pt-5">AmbienteEstudio</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form class="login-form" ng-submit="angCtrl.loginForm()" method="POST">
                            <div class="form"><h3 class="text-center" style="color: brown;margin-top: 10px;">Inicio Sesion</h3></div>
                            
                            <div class="form-group">
                                <label for="username" class="" style="color: brown;">RUT:</label><br>
                                <input type="text" name="txtrut" id="txtrut" ng-model="angCtrl.txtrut" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="" style="color: brown;">Password:</label><br>
                                <input type="password" name="password" id="password" ng-model="angCtrl.password" required class="form-control">
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <input type="submit" name="submit" id="submit" class="btn btn-md" style="background-color: brown;
    color: white;" value="Iniciar Sesion">

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
    </div>
    <script>
    angular.module('AngularJSLogin', [])
  .controller('AngularLoginController', ['$scope', '$http', '$window', function($scope, $http, $window) {
   var self = this;
          

        self.loginForm = function() {
 			
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
</body>