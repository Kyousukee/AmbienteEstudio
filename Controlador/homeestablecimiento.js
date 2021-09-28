	angular.module('AngularJSHomeEs', [])
	.controller('AngularHomeEsController', ['$scope', '$http', function($scope, $http) {
		//ESTA VARIABLE PERMITIRA LUEGO LLAMAR FUNCIONES POR MEDIO DE ABREVIACIONES
		//DENTRO DE OTRAS FUNCIONES.
		var self = this;
		self.cboestado="0";
		self.cbokinder="2";
		self.cbobasica="2";
		self.cbomedia="2";
		$scope.actualizar_readonly=true;
		$scope.letracurso = false;
		$scope.curso = false;
		$scope.asignar = false;
		$scope.quitarasignar = false;

		
		
		
        /*INICIO LISTADO DE PROVEEDORES*/
		 
		 self.ListadoNoticias = function(){
		 	//console.log('Validaaa');
		 var form_data ="btn_listar=0&txtbuscar="+self.txtbuscar+"";
		 $http({
		   method: 'POST',
		   url: '../Controlador/homeestablecimiento.php',
		   data: form_data,
		   headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 })	  
		 .success(function(data) {
		 	//console.log(data);
			 		
			 if (!angular.isObject(data)){
					$scope.NotLst = "";
				}else{
			 		$scope.NotLst = data;
				}	   
		 })
		 }

		 $scope.LstNot = self.ListadoNoticias;

		 self.ListadoNoticias();
		/*FIN LISTADO DE PROVEEDORES*/
		

        /*INICIO DE FUNCION DE INGRESAR PROVEEDOR*/
		self.ProfeFormIng = function() {
			var inputFileImage1 = document.getElementById("archivo1");
        	var file1 = inputFileImage1.files[0];

        	var inputFileImage2 = document.getElementById("archivo2");
        	var file2 = inputFileImage2.files[0];


			var fd = new FormData();
        	fd.append('btn_grabar', '0');
        	fd.append('txtarchivo1', file1);
        	fd.append('txtarchivo2', file2);
        	fd.append('txttitulo', self.txttitulo);
        	fd.append('txtdescripcion', self.txtdescripcion);

      
        	$http.post("../Controlador/homeestablecimiento.php", fd, {
           	  transformRequest: angular.identity,
           	  headers: {'Content-Type': undefined}
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

					$scope.LstNot();
				})
			}
		/*FIN DE FUNCION DE INGRESAR PROVEEDOR*/



		/*INICIO DE FUNCION QUE TRAE PROVEEDOR*/
		self.proveedorFormEdi = function(IdEst){
			var form_data ="btn_editar=0&IdEst="+IdEst+"";
			$http({
			  method: 'POST',
			  url: '../Controlador/homeestablecimiento.php',
			  data: form_data,
			  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {

				$scope.angCtrl.txtidalumno  =data[0].id_est;
				$scope.angCtrl.txtrut=data[0].rut_est;
				document.getElementById("txtrut").disabled = true;
				$scope.angCtrl.txtnom  =data[0].nom_est;
		        $scope.angCtrl.txtape1     =data[0].ape_est;		        
		        $scope.angCtrl.txtape2        =data[0].ape2_est;

			    $scope.angCtrl.txtfono       =data[0].fon_est;
			    $scope.angCtrl.txtemail       =data[0].email_est;
			    $scope.angCtrl.cboestado       =data[0].est_est;
			    $scope.angCtrl.cbocursos       =data[0].desc_curso;
			    self.CargarLetra2();
			    $scope.angCtrl.letracursos       =data[0].id_curso;
		    
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
			var form_data = 'txtrut='+self.txtrut+'&txtnom='+self.txtnom+'&txtape1='+self.txtape1+'&txtape2='+self.txtape2+'&cboestado='+self.cboestado+
			'&txtfono='+self.txtfono+'&txtemail='+self.txtemail+'&cbodcurso='+self.cbocursos+'&cboletrcurso='+self.letracursos+'&txtidalumno='+self.txtidalumno+'&btn_actualizar=0';
			$http({
					  method: 'POST',
					  url: '../Controlador/homeestablecimiento.php',
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

					$scope.LstPEst();
				})
				.error(function(data) {
				 console.log("Ocurrio un error al actualizar");
				})
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/

		

		/*INICIO DE CARGAR COMBO CURSOS*/
        self.CargarCursoProfesor = function(IDDOC){
        	console.log(IDDOC);
			var AplicacionId = self.cboaplicacion;
			var form_data ="btn_cargCurpro=0&idprofe="+IDDOC+"";
			$http({
				method: 'POST',
				url: '../Controlador/homeestablecimiento.php',
				data: form_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				//console.log(data);
				if (data[0].desc_curso==undefined) {
					$scope.CrgLetr();
					$scope.CrgCur();
					$scope.letracurso = false;
		$scope.curso = false;
		$scope.asignar = false;
		$scope.quitarasignar = true;

				}else{
					self.cbocursos = data[0].desc_curso;
				self.letracursos = data[0].id_curso;
				$scope.letracurso = true;
				$scope.curso = true;
				$scope.asignar = true;
		$scope.quitarasignar = false;

				}
				
				

				   //$scope.letracursoscar= data;
				   //self.letracursos = $scope.letracursoscar[0].id_curso;
			})
			.error(function(data) {
				console.log("Error al cargar aplicacion detalle");
				})
			}
			$scope.CrgCursoProfe = self.CargarCursoProfesor;
		/*FIN DE CARGAR COMBO CURSOS

		/*INICIO DE FUNCION DE ACTUALIZAR PROVEEDOR*/
		self.ModalProfesorJefe = function(IDDOC) {			
			 			self.txtiddocente2 = IDDOC;
			 			$scope.CrgCursoProfe(IDDOC);
			 			document.getElementById("modal_profesorjefe").style.display = "block";
			 		
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/

		/*INICIO DE FUNCION DE ACTUALIZAR PROVEEDOR*/
		self.asignardocentejefe = function(IDDOC) {			
			 			var form_data ='btn_asigjefe=0&IdDoc='+self.txtiddocente2+'&idcurso='+self.letracursos+'&iddcurso='+self.cbocursos;
			$http({
					  method: 'POST',
					  url: '../Controlador/homeestablecimiento.php',
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

					$scope.LstPDoc();
					$scope.CrgCur();

				})
				.error(function(data) {
				 console.log("Ocurrio un error al cambiar estado");
				})
			 		
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/

		/*INICIO DE FUNCION DE ACTUALIZAR PROVEEDOR*/
		self.designardocentejefe = function(IDDOC) {			
			 			var form_data ='btn_Desasigjefe=0&IdDoc='+self.txtiddocente2+'&idcurso='+self.letracursos+'&iddcurso='+self.cbocursos;
			$http({
					  method: 'POST',
					  url: '../Controlador/homeestablecimiento.php',
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

					$scope.LstPDoc();
					$scope.CrgCur();

				})
				.error(function(data) {
				 console.log("Ocurrio un error al cambiar estado");
				})
			 		
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/




		/*INICIO DE FUNCION QUE ACTIVA/DESACTIVA*/
		self.proveedorFormEli = function(IdNot,ImgNot,ArchNot) {

			var form_data ='btn_actdes=0&IdNot='+IdNot+'&ImgNot='+ImgNot+'&ArchNot='+ArchNot;
			$http({
					  method: 'POST',
					  url: '../Controlador/homeestablecimiento.php',
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

					$scope.LstNot();
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


	 