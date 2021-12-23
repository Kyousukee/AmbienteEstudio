	angular.module('AngularJSProfesorA', [])
	.controller('AngularProfesorAController', ['$scope', '$http', function($scope, $http) {
		//ESTA VARIABLE PERMITIRA LUEGO LLAMAR FUNCIONES POR MEDIO DE ABREVIACIONES
		//DENTRO DE OTRAS FUNCIONES.
		var self = this;
		self.cboestado="0";

		$scope.actualizar_readonly=true;

		/*INICIO DE CARGAR COMBO PROFESOR*/
        self.cargarProfesor = function(){
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_crgPRO=0";
			$http({
				method: 'POST',
				url: '../Controlador/MantenedorProfesorA.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				   $scope.cboprofesorcar= data;
				   self.cboprofesor = $scope.cboprofesorcar[0].id_doce;
				   self.txtrut = $scope.cboprofesorcar[0].rut_doce;

				   
			})
			.error(function(data) {
				console.log("Error al cargar aplicacion detalle");
				})
			}
			$scope.CrgPro = self.cargarProfesor;
			$scope.CrgPro();
		/*FIN DE CARGAR COMBO PROFESOR*/

		/*INICIO DE CARGAR RUT*/
        self.cargarrut = function(){
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_crgPRORUT=0&profesor="+self.cboprofesor+"";
			$http({
				method: 'POST',
				url: '../Controlador/MantenedorProfesorA.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				   self.txtrut = data[0].rut_doce;
				   
				   
			})
			.error(function(data) {
				console.log("Error al cargar aplicacion detalle");
				})
			}
		/*FIN DE CARGAR RUT*/

		/*INICIO DE CARGAR COMBO CURSOS*/
        self.cargarCursos = function(){
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_crgcur=0";
			$http({
				method: 'POST',
				url: '../Controlador/MantenedorProfesorA.php',
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

		self.limpiar = function(){
 			//console.log('Hola');
 			self.txtiddocA = "";
 			$scope.CrgCur();
 			$scope.CrgPro();
 			$scope.cboasignaturacar= "";
 			$scope.readonly                =false;
			$scope.actualizar_readonly     =true;
			$scope.grabar_readonly         =false;
	    }


		/*INICIO DE CARGAR COMBO CURSOS*/
        self.cargarCursos2 = function(){
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_crgcur2=0";
			$http({
				method: 'POST',
				url: '../Controlador/MantenedorProfesorA.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				   $scope.cbocursoscar2= data;
				   self.cbocursos2 = $scope.cbocursoscar2[0].id_doce;
			})
			.error(function(data) {
				console.log("Error al cargar aplicacion detalle");
				})
			}
			$scope.CrgCur2 = self.cargarCursos2;
			$scope.CrgCur2();
		/*FIN DE CARGAR COMBO CURSOS*/

		/*INICIO DE CARGAR COMBO CURSOS*/
        self.cargarasignatura = function(){
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_crgasig=0&txtcurso="+self.cbocursos+"";
			$http({
				method: 'POST',
				url: '../Controlador/MantenedorProfesorA.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				   $scope.cboasignaturacar= data;
				   self.cboasignatura = $scope.cboasignaturacar[0].id_asig;
			})
			.error(function(data) {
				console.log("Error al cargar aplicacion detalle");
				})
			}
		/*FIN DE CARGAR COMBO CURSOS*/

		/*INICIO DE CARGAR COMBO CURSOS*/
        self.cargarasignatura2 = function(){
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_crgasig=0&txtcurso="+self.cbocursos+"";
			$http({
				method: 'POST',
				url: '../Controlador/MantenedorProfesorA.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				   $scope.cboasignaturacar= data;
				   //self.cboasignatura = $scope.cboasignaturacar[0].id_asig;
			})
			.error(function(data) {
				console.log("Error al cargar aplicacion detalle");
				})
			}
		/*FIN DE CARGAR COMBO CURSOS*/
		
		
        /*INICIO LISTADO DE PROVEEDORES*/
		 
		 self.ListadoDocA = function(){
		 var form_data ="btn_listar=0&txtbuscar="+self.txtbuscar+"&cboprofesor2="+self.cbocursos2+"";
		 $http({
		   method: 'POST',
		   url: '../Controlador/MantenedorProfesorA.php',
		   data: form_data,
		   headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 })	  
		 .success(function(data) {
		 	console.log(data);
			 		
			 if (!angular.isObject(data)){
					$scope.DocALst = "";
				}else{
			 		$scope.DocALst = data;
				}	   
		 })
		 }

		 $scope.LstDocA = self.ListadoDocA;

		 self.ListadoDocA();
		/*FIN LISTADO DE PROVEEDORES*/
		

        /*INICIO DE FUNCION DE INGRESAR PROVEEDOR*/
		self.ProfeFormIng = function() {
			
			/*var form_data = 'cbocurso='+self.cbocursos+'&cboletra='+self.letracursos+'&txtdescripcion='+self.txtdescripcion+'&cboestado='+self.cboestado+
			'&btn_grabar=0';*/
			var form_data = 'cbocurso='+self.cbocursos+'&cboasignatura='+self.cboasignatura+'&cboprofesor='+self.cboprofesor+
			'&btn_grabar=0';
	 
				$http({
						method: 'POST',
						url: '../Controlador/MantenedorProfesorA.php',
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
			 			self.limpiar();
			 		}

					$scope.LstDocA();
				})
			}
		/*FIN DE FUNCION DE INGRESAR PROVEEDOR*/



		/*INICIO DE FUNCION QUE TRAE PROVEEDOR*/
		self.proveedorFormEdi = function(IdDocA){
			var form_data ="btn_editar=0&IdDocA="+IdDocA+"";
			$http({
			  method: 'POST',
			  url: '../Controlador/MantenedorProfesorA.php',
			  data: form_data,
			  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				console.log(data);
				$scope.angCtrl.cboprofesor  =data[0].id_doce;
				self.cargarrut()
				$scope.angCtrl.cbocursos=data[0].id_dcurso;
				self.cargarasignatura2();

				$scope.angCtrl.cboasignatura=data[0].id_asig;
		    
				$scope.readonly                =true;
				$scope.actualizar_readonly     =false;
				$scope.grabar_readonly         =true;

			})
			.error(function(data) {
				console.log("Error al obtener información");
			  })
			}
		/*FIN DE FUNCION QUE TRAE PROVEEDOR*/

		/*INICIO DE FUNCION DE ACTUALIZAR PROVEEDOR*/
		self.proveedorFormAct = function() {
			var form_data = 'txtidunidad='+self.txtidunidad+'&cbocurso='+self.cbocursos+'&txtdescripcion='+self.txtdescripcion+'&cboestado='+self.cboestado+'&txtasig='+self.cboasignatura+'&txtnumero='+self.txtnunidad+
			'&btn_actualizar=0';

			$http({
					  method: 'POST',
					  url: '../Controlador/MantenedorProfesorA.php',
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

					$scope.LstDocA();
				})
				.error(function(data) {
				 console.log("Ocurrio un error al actualizar");
				})
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/


		/*INICIO DE FUNCION QUE ACTIVA/DESACTIVA*/
		self.proveedorFormEli = function(IdDocA) {

			var form_data ='btn_actdes=0&IdDocA='+IdDocA;
			$http({
					  method: 'POST',
					  url: '../Controlador/MantenedorProfesorA.php',
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
			 			self.limpiar();
			 		}

					$scope.LstDocA();
				})
				.error(function(data) {
				 console.log("Ocurrio un error al cambiar estado");
				})
		 }
		/*FIN DE FUNCION QUE ACTIVA/DESACTIVA*/

		/*INICIO mostrar y ocultar emails*/
		self.validarEmails = function(){

	    
	     

	    }
	    /*FIN DE mostrar y ocultar emails */


 		/*TRAER RUT A MODAL CON BOOTSTRAP*/
 		self.mostrarrut = function(){
 			var rut = self.txtidentificador;
 			//console.log(rut);
	    	$scope.angCtrl.rutemail       =rut;
	     	$scope.LstEma();

	    }	


	    /*INICIO MODAL EMAIL*/
    	self.listaremail=function(){
    		$scope.LstEm=undefined;

    		$rut = self.rutemail;

    		//console.log($rut);

    		var form_data ="btn_lst_em=1&Rut="+$rut;
    		//console.log(form_data);
			
			$http({
				method: 'POST',
				url: '../Controlador/proveedor.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(data){
				//console.log(data);
				
				if(data=='-1'){
					alert('Ocurrió un error al listar los Email.');
				}else{
					$scope.LstEm=data;

				}
			})
			.error(function(data) {
				alert('Ocurrió un error al listar los Email.');
			})
    	}

    	$scope.LstEma = self.listaremail;

        /*FIN MODAL EMAIL*/

		/*AGREGAR EMAILS A PROVEEDORES*/
		self.agregarEmailPro=function(){
			if(confirm('¿Está seguro de agregar este Email al Proveedor?')){
        		var form_data ="btn_agr_email=1&Identificador="+self.rutemail+"&SegundoEmail="+self.otroemail;
	        	//console.log(form_data);
				
				$http({
					method: 'POST',
					url: '../Controlador/proveedor.php',
					data: form_data,
					headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})
				.success(function(data){
					//console.log(data);

					if(data=='-1'){
						alert('Ocurrió un error al agregar la Email.');
					}else if(data=='-2'){
						alert('Se requiere tener un RUT asignado para poder Agregar EMAIL.');
					}else if(data=='-3'){
						alert('Verifique bien el Email antes de agregar a Proveedor.');
					}else if(data=='1'){
						alert('Se registro correctamente.');
						$scope.LstEma();
					}
					self.otroemail= "";
				})
				.error(function(data) {
					alert('Ocurrió un error al agregar el Email.');
					self.otroemail= "";
					$scope.LstEma();
				})
        	}
		}

		/*INICIO ELIMINAR Email */
        self.eliminarEmail=function(IdEmail){
        	if(confirm('¿Está seguro de Eliminar este EMAIL?')){
        		//console.log(IdEmail);
        		var form_data ="IDEMA="+IdEmail;
	        	//console.log(form_data);
				
				$http({
					method: 'POST',
					url: '../Controlador/proveedor.php',
					data: form_data,
					headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})
				.success(function(data){
					//console.log(data);

					if(data=='-1'){
						alert('Ocurrió un error al eliminar la Solicitud.');
					}else if(data=='-3'){
						alert('Ocurrió un error al eliminar la Solicitud.');
					}else if(data=='1'){
						alert('Se Elimino correctamente.');
						$scope.LstEma();
					}
				})
				.error(function(data) {
					alert('Ocurrió un error al eliminar el Email.');
				})
        	}
        }
        /*FIN ELIMINAR EmailC*/

		 

	}]);


	 