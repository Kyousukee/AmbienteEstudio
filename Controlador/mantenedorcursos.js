
	angular.module('AngularJSCursos', [])
	.controller('AngularCursosController', ['$scope', '$http', function($scope, $http) {
		//ESTA VARIABLE PERMITIRA LUEGO LLAMAR FUNCIONES POR MEDIO DE ABREVIACIONES
		//DENTRO DE OTRAS FUNCIONES.
		var self = this;
		self.cboestado="A";
		self.cbodistintivo="0";
		
		$scope.actualizar_readonly=true;

		
		
		
        /*INICIO LISTADO DE PROVEEDORES*/
		 
		 self.ListadoCursos = function(){
		 var form_data ="btn_listar=0&txtbuscar="+self.txtbuscar+"";
		 $http({
		   method: 'POST',
		   url: '../Controlador/mantenedorcrusos.php',
		   data: form_data,
		   headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 })	  
		 .success(function(data) {
		 	//console.log(data);
			 		
			 if (!angular.isObject(data)){
					$scope.cursoLst = "";
				}else{
			 		$scope.cursoLst = data;
				}	   
		 })
		 }

		 $scope.LstCurs = self.ListadoCursos;

		 self.ListadoCursos();
		/*FIN LISTADO DE PROVEEDORES*/

		/*INICIO DE CARGAR COMBO CURSOS*/
        self.cargarCursos = function(){
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_crgcur=0";
			$http({
				method: 'POST',
				url: '../Controlador/mantenedorcrusos.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				   $scope.cbocursoscar= data;
				   self.cbocursos = $scope.cbocursoscar[0].id_cd;
			})
			.error(function(data) {
				console.log("Error al cargar aplicacion detalle");
				})
			}
			$scope.CrgCur = self.cargarCursos;
			$scope.CrgCur();
		/*FIN DE CARGAR COMBO CURSOS*/

        /*INICIO DE FUNCION DE INGRESAR PROVEEDOR*/
		self.estaFormIng = function() {
			var form_data = 'cbocurso='+self.cbocursos+'&cbodestintivo='+self.cbodistintivo+'&btn_grabar=0';
	 
				$http({
						method: 'POST',
						url: '../Controlador/mantenedorcrusos.php',
						data: form_data,
						 headers: {'Content-Type': 'application/x-www-form-urlencoded'}
						 })
				
							.success(function(data) {
					var messageOfData="";
					var i=0;
					messageOfData = data.trim().replace("\\", "");
					while (i<10){
					messageOfData = messageOfData.trim().replace("\\", "");
					i++;
					}			  
					var respuesta;
			 		var cadena = data;

			 		var palabra0="errores";
			 		let posicion0 = cadena.indexOf(palabra0);

			 		if (posicion0 !== -1){
			 			//$("#modal_error").modal("show");
			 			//self.txtfechacod= "Este pedido no es para hoy.";
			 			
			 			document.getElementById("modal_error").style.display = "block";
			 			$scope.errormensaje = messageOfData;
			 		}else{
			 			document.getElementById("modal_correc").style.display = "block";
			 			$scope.correctmesage = messageOfData;
			 		}
					$scope.LstCurs();
					self.cboestado="0";
					self.cbodistintivo="0";
					self.cbocursos="1";
				})
			}
		/*FIN DE FUNCION DE INGRESAR PROVEEDOR*/

		/*INICIO DE FUNCION QUE TRAE PROVEEDOR*/
		self.proveedorFormEdi = function(idcurso){
			var form_data ="btn_editar=0&IdCurso="+idcurso+"";
			$http({
			  method: 'POST',
			  url: '../Controlador/mantenedorcrusos.php',
			  data: form_data,
			  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {

				$scope.angCtrl.txtidcurso  =data[0].id_curso;
				

			    $scope.angCtrl.cbocursos       =data[0].desc_curso;
			    var letra;
			    if (data[0].let_curso=="Unico") {
			    	letra =0;
			    }
			    if (data[0].let_curso=="A") {
			    	letra =1;
			    }
			    if (data[0].let_curso=="B") {
			    	letra =2;
			    }
			    if (data[0].let_curso=="C") {
			    	letra =3;
			    }
			    if (data[0].let_curso=="D") {
			    	letra =4;
			    }
			    if (data[0].let_curso=="E") {
			    	letra =5;
			    }
			    if (data[0].let_curso=="F") {
			    	letra =6;
			    }
			    if (data[0].let_curso=="G") {
			    	letra =7;
			    }
			    if (data[0].let_curso=="H") {
			    	letra =8;
			    }
			    if (data[0].let_curso=="I") {
			    	letra =9;
			    }
			    if (data[0].let_curso=="J") {
			    	letra =10;
			    }
			    if (data[0].let_curso=="K") {
			    	letra =11;
			    }
			    if (data[0].let_curso=="L") {
			    	letra =12;
			    }
			    if (data[0].let_curso=="M") {
			    	letra =13;
			    }
			    if (data[0].let_curso=="N") {
			    	letra =14;
			    }
			    if (data[0].let_curso=="Ñ") {
			    	letra =15;
			    }
			    if (data[0].let_curso=="O") {
			    	letra =16;
			    }
			    if (data[0].let_curso=="P") {
			    	letra =17;
			    }
			    if (data[0].let_curso=="Q") {
			    	letra =18;
			    }
			    if (data[0].let_curso=="R") {
			    	letra =19;
			    }
			    if (data[0].let_curso=="S") {
			    	letra =20;
			    }
			    if (data[0].let_curso=="T") {
			    	letra =21;
			    }
			    if (data[0].let_curso=="U") {
			    	letra =22;
			    }
			    if (data[0].let_curso=="V") {
			    	letra =23;
			    }
			    if (data[0].let_curso=="W") {
			    	letra =24;
			    }
			    if (data[0].let_curso=="X") {
			    	letra =25;
			    }
			    if (data[0].let_curso=="Y") {
			    	letra =26;
			    }
			    if (data[0].let_curso=="Z") {
			    	letra =27;
			    }
			    $scope.angCtrl.cbodistintivo       =letra;
			    $scope.angCtrl.cboestado       =data[0].Est_curso;
		    
				$scope.readonly                =true;
				$scope.actualizar_readonly     =false;
				$scope.grabar_readonly         =true;

				$('html, body').animate({

            scrollTop: $("#Formulario").offset().top

        }, 1000);

			})
			.error(function(data) {
				console.log("Error al obtener información");
			  })
			}
		/*FIN DE FUNCION QUE TRAE PROVEEDOR*/


		/*INICIO DE DESACTIVAR TODOS LOS CURSOS*/
        self.DesactivarTodos = function(){
			
			var form_data ='cbocurso='+self.cbocursos+'&cbodestintivo='+self.cbodistintivo+'&btn_destodo=0';
			$http({
				method: 'POST',
				url: '../Controlador/mantenedorcrusos.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				   //alert("Se Desactivaron todos los cursos seleccionados correctamente.");
				   document.getElementById("modal_correc").style.display = "block";
			 	$scope.correctmesage = "Se Desactivaron todos los cursos seleccionados correctamente.";
				   $scope.LstCurs();
				   
			})
			.error(function(data) {
				document.getElementById("modal_error").style.display = "block";
			 			$scope.errormensaje = "Error al obtener información";
				})
			}
		/*FIN DE  DESACTIVAR TODOS LOS CURSOS*/

		/*INICIO DE FUNCION DE ACTUALIZAR PROVEEDOR*/
		self.ModalAlumnos = function(IDCURSO) {			
			 			self.txtidcurso2 = IDCURSO;
			 			//$scope.CrgCursoProfe(IDCURSO);
			 			document.getElementById("modal_alumnos").style.display = "block";
			 		
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/



document.getElementById("botoncerrar4").onclick = function() {
  
  document.getElementById("modal_alumnos").style.display = "none";
}


		/*INICIO DE ELIMINAR CURSO*/
		self.proveedorFormEli = function(idcurso){
			if(confirm("Confirmaci\u00f3n: \n\277Esta seguro que desea eliminar este curso?")){
             var form_data ="btn_eli=0&id="+idcurso+"";
			$http({
			  method: 'POST',
			  url: '../Controlador/mantenedorcrusos.php',
			  data: form_data,
			  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				document.getElementById("modal_correc").style.display = "block";
			 	$scope.correctmesage = "Curso Eliminado Correctamente.";
				$scope.LstCurs();
					self.cboestado="0";
					self.cbodistintivo="0";
					self.cbocursos="1";
					$scope.actualizar_readonly=true;
					$scope.grabar_readonly=false;
					$scope.readonly                =false;
			
				
			})
			.error(function(data) {
				document.getElementById("modal_error").style.display = "block";
			 			$scope.errormensaje = "Error al obtener información";
			  })
			}
			
			}
		/*FIN DE ELIMINAR CURSO*/

		/*INICIO DE ELIMINAR TODOS LOS CURSOS*/
		self.EliminarTodos = function() {
			console.log(self.cbocursos);
			if(confirm("Confirmaci\u00f3n: \n\277Esta seguro que desea eliminar todos los cursos de la seleccion?")){
             var form_data = 'cbocurso='+self.cbocursos+'&cbodestintivo='+self.cbodistintivo+'&btn_elit=0';
	 
				$http({
						method: 'POST',
						url: '../Controlador/mantenedorcrusos.php',
						data: form_data,
						 headers: {'Content-Type': 'application/x-www-form-urlencoded'}
						 })
				
							.success(function(data) {
					var messageOfData="";
					var i=0;
					messageOfData = data.trim().replace("\\", "");
					while (i<10){
					messageOfData = messageOfData.trim().replace("\\", "");
					i++;
					}			  
					var respuesta;
			 		var cadena = data;

			 		var palabra0="errores";
			 		let posicion0 = cadena.indexOf(palabra0);

			 		if (posicion0 !== -1){
			 			//$("#modal_error").modal("show");
			 			//self.txtfechacod= "Este pedido no es para hoy.";
			 			
			 			document.getElementById("modal_error").style.display = "block";
			 			$scope.errormensaje = messageOfData;
			 		}else{
			 			document.getElementById("modal_correc").style.display = "block";
			 			$scope.correctmesage = messageOfData;
			 		}
					$scope.LstCurs();
					self.cboestado="0";
					self.cbodistintivo="0";
					self.cbocursos="1";
					$scope.actualizar_readonly=true;
					$scope.grabar_readonly=false;
					$scope.readonly                =false;
				})
			}
			
			}
		/*FIN DE ELIMINAR TODOS LOS CURSOS*/

		/*INICIO DE FUNCION DE ACTUALIZAR PROVEEDOR*/
		self.proveedorFormAct = function() {
			console.log(self.cbocursos);
			var form_data = 'cbocurso='+self.cbocursos+'&cbodestintivo='+self.cbodistintivo+'&cboestado='+self.cboestado+'&txtidcurso='+self.txtidcurso+'&btn_actualizar=0';
			$http({
					  method: 'POST',
					  url: '../Controlador/mantenedorcrusos.php',
					  data: form_data,
					   headers: {'Content-Type': 'application/x-www-form-urlencoded'}
					 })
				
				.success(function(data) {
				  var messageOfData="";
				  var i=0;
				  messageOfData = data.trim().replace("\\", "");
				  while (i<10){
					messageOfData = messageOfData.trim().replace("\\", "");
					i++;
					}	
					var respuesta;
			 		var cadena = data;

			 		var palabra0="errores";
			 		let posicion0 = cadena.indexOf(palabra0);

			 		if (posicion0 !== -1){
			 			//$("#modal_error").modal("show");
			 			//self.txtfechacod= "Este pedido no es para hoy.";
			 			
			 			document.getElementById("modal_error").style.display = "block";
			 			$scope.errormensaje = messageOfData;
			 		}else{
			 			document.getElementById("modal_correc").style.display = "block";
			 			$scope.correctmesage = messageOfData;
			 		}
					$scope.LstCurs();
					self.cboestado="0";
					self.cbodistintivo="0";
					self.cbocursos="1";
					$scope.actualizar_readonly=true;
					$scope.grabar_readonly=false;
					$scope.readonly                =false;
				})
				.error(function(data) {
				 console.log("Ocurrio un error al actualizar");
				})
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/



		 

	}]);


	 