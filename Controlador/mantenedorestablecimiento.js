
	angular.module('AngularJSEstablecimiento', [])
	.controller('AngularEstablecimientoController', ['$scope', '$http', function($scope, $http) {
		//ESTA VARIABLE PERMITIRA LUEGO LLAMAR FUNCIONES POR MEDIO DE ABREVIACIONES
		//DENTRO DE OTRAS FUNCIONES.
		var self = this;
		self.cboestado="0";
		self.cbokinder="2";
		self.cbobasica="2";
		self.cbomedia="2";
		$scope.actualizar_readonly=true;

		
		
		
        /*INICIO LISTADO DE PROVEEDORES*/
		 
		 self.ListadoEstablecimiento = function(){
		 var form_data ="btn_listar=0&txtbuscar="+self.txtbuscar+"";
		 $http({
		   method: 'POST',
		   url: '../Controlador/mantenedorestablecimiento.php',
		   data: form_data,
		   headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 })	  
		 .success(function(data) {
		 	console.log(data);
			 if(data[0][0].trim()!="s"){
				$scope.estaLst = data;
			 }		   
		 })
		 }

		 $scope.LstPro = self.ListadoEstablecimiento;

		 self.ListadoEstablecimiento();
		/*FIN LISTADO DE PROVEEDORES*/
		

        /*INICIO DE FUNCION DE INGRESAR PROVEEDOR*/
		self.estaFormIng = function() {
			var form_data = 'txtidentificador='+self.txtidentificador+'&txtdescripcion='+self.txtdescripcion+'&txttelefono='+self.txttelefono+'&txtemail='+self.txtemail+'&cboestado='+self.cboestado+
			'&cbobasica='+self.cbobasica+'&cbomedia='+self.cbomedia+'&cbokinder='+self.cbokinder+
			'&txtdireccion='+self.txtdireccion+'&btn_grabar=0';
	 
				$http({
						method: 'POST',
						url: '../Controlador/mantenedorestablecimiento.php',
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
					alert(messageOfData);
					$scope.LstPro();
				})
			}
		/*FIN DE FUNCION DE INGRESAR PROVEEDOR*/

		/*INICIO DE FUNCION QUE TRAE PROVEEDOR*/
		self.proveedorFormEdi = function(IdProveedor){
			var form_data ="btn_editar=0&IdProveedor="+IdProveedor+"";
			$http({
			  method: 'POST',
			  url: '../Controlador/proveedor.php',
			  data: form_data,
			  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				})	  
			.success(function(data) {
				$scope.angCtrl.txtidproveedor  =data[0].IdProveedor;
				$scope.angCtrl.txtidentificador=data[0].Identificador;
				$scope.angCtrl.txtdescripcion  =data[0].Descripcion;
		        $scope.angCtrl.txtcontacto     =data[0].Contacto;
		        $scope.angCtrl.txttelefono     =data[0].Telefono;
		        $scope.angCtrl.txtemail        =data[0].Email;
			    $scope.angCtrl.cboestado       =data[0].Estado;
			    $scope.angCtrl.txtdireccion    =data[0].Direccion;			    
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
			var form_data = 'txtidproveedor='+self.txtidproveedor+'&txtidentificador='+self.txtidentificador+'&txtdescripcion='+self.txtdescripcion+'&txtcontacto='+self.txtcontacto+'&txttelefono='+self.txttelefono+
			'&txtemail='+self.txtemail+'&cboestado='+self.cboestado+'&txtdireccion='+self.txtdireccion+'&btn_actualizar=0';
			$http({
					  method: 'POST',
					  url: '../Controlador/proveedor.php',
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
					alert(messageOfData);
					$scope.LstPro();
					console.log(messageOfData);
				})
				.error(function(data) {
				 console.log("Ocurrio un error al actualizar");
				})
			}
		/*FIN DE FUNCION DE ACTUALIZAR PROVEEDOR*/


		/*INICIO DE FUNCION QUE ACTIVA/DESACTIVA*/
		self.proveedorFormEli = function(IdProveedor) {
			var form_data ="btn_actdes=0&IdProveedor="+IdProveedor+"";
			$http({
					  method: 'POST',
					  url: '../Controlador/proveedor.php',
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
					console.log(messageOfData);
					$scope.LstPro();
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


	 