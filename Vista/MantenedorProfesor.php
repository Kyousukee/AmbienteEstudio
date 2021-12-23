<section class="wrapper" ng-app="AngularJSDocente" ng-controller="AngularDocenteController as angCtrl">
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Docentes</h3>
   </div>
  </div>
     <!-- page start-->

     <div class="row">
       <section class="panel" style="width: 100%">
                          <div class="panel-body">
                              <form class="form-horizontal"  method="POST">
                                  
                                  <div class="form-group alert alert-info">
                                      <label class="col-sm-2 control-label">Buscar</label>
                                      <div class="col-sm-6">
                                          <input type="text" class="form-control" id="txtbuscar" name="txtbuscar"  ng-model="angCtrl.txtbuscar" ng-change="angCtrl.ListadoDocentes()">
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="txtidprofe" name="txtidprofe" ng-model="angCtrl.txtidprofe">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Rut</label>
                                      <div class="col-sm-3">
                                          <input type="text" maxlength="12" onkeyup="formatCliente(this)" class="form-control" id="txtrut" name="txtrut"  ng-model="angCtrl.txtrut">
                                      </div>
                                      <label class="col-sm-2 control-label">Nombre</label>
                                      <div class="col-sm-3">
                                          <input type="text" maxlength="200" class="form-control" id="txtnom" name="txtnom" ng-model="angCtrl.txtnom">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    
                                      <label class="col-sm-2 control-label">Apellido Paterno</label>
                                      <div class="col-sm-3">
                                          <input type="text" class="form-control" id="txtape1" name="txtape1" ng-model="angCtrl.txtape1">
                                      </div>
                                      <label class="col-sm-2 control-label">Apellido Materno</label>
                                      <div class="col-sm-3">
                                          <input type="text"  class="form-control" id="txtape2" name="txtape2" ng-model="angCtrl.txtape2">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Telefono o Celular</label>
                                      <div class="col-sm-3">
                                          <input type="text" class="form-control" id="txtfono" name="txtfono" ng-model="angCtrl.txtfono">
                                      </div>
                                      <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-3">
                                          <input type="text"  class="form-control" id="txtemail" name="txtemail" ng-model="angCtrl.txtemail">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                     
                                      
                                      <label class="col-sm-2 control-label">Estado</label>
                                      <div class="col-sm-3">
                                       <select id="cboestado" name="cboestado" class="form-control" ng-model="angCtrl.cboestado" style="height: 34px;">
                                         <option value="0">Seleccione</option>;
                                         <option value="A">Activado</option>";
                                         <option value="I">Inactivo</option>";           
                                      </select>
                                      </div>
                                  </div>

                                 

                                  <div class="form-group">
                                      <div class="col-sm-12">
                                      <input  type="submit" name="btn_grabar" id="btn_grabar" value="Grabar" title="Grabar" class="btn btn-primary" ng-click="angCtrl.ProfeFormIng()" ng-disabled="grabar_readonly">&nbsp;&nbsp;
                                      <input  type="submit" name="btn_actualizar" id="btn_actualizar" value="Actualizar" title="Actualizar" class="btn btn-primary" ng-click="angCtrl.proveedorFormAct()" ng-disabled="actualizar_readonly">&nbsp;&nbsp;
                                      <a href="?mod=MantenedorProfesor"   title="Limpiar" class="btn btn-primary">Limpiar</a>&nbsp;&nbsp;
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
     </div>

     <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Listado de Docentes
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Rut</th>
                                  <th>Nombre</th>
                                  <th>Apellido Paterno</th>
                                  <th>Apellido Materno</th>
                                  <th>Fono</th>
                                  <th>Email</th>
                                  <th>Estado</th>
                                  <th>Establecimiento</th>
                                  <th>Profesor Jefe</th>
                                  <th>Editar</th>                                  
                                  <th>Eliminar</th>                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr ng-repeat="s in DocLst track by $index">
                                  <td>{{s.id_doce}}</td>
                                  <td>{{s.rut_doce}}</td>
                                  <td>{{s.nom_doce}}</td>
                                  <td>{{s.ape_doce}}</td>
                                  <td>{{s.ape2_doce}}</td>
                                  <td>{{s.fon_doce}}</td>
                                  <td>{{s.email_doce}}</td>
                                  <td>{{s.est_doce}}</td>
                                  <td>{{s.descr_esta}}</td>
                                  <td><button class="btn btn-primary" ng-click="angCtrl.ModalProfesorJefe(s.id_doce)"><i class='bx bxs-inbox'></i></button></td>
                                  <td><button class="btn btn-primary" ng-click="angCtrl.proveedorFormEdi(s.id_doce)"><i class='bx bx-edit-alt'></i></button></td>
                                  <td><button class="btn btn-danger" ng-click="angCtrl.proveedorFormEli(s.id_doce,s.rut_doce)"><i class='bx bxs-x-square'></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                      </section>
                  </div>
              </div>      
     <!-- page end-->

<script type="text/javascript">
  function formatCliente(cliente){
  cliente.value=cliente.value.replace(/[.-]/g, '')
.replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')
}

function cerrarmodalprofesor() {
  
  document.getElementById("modal_profesorjefe").style.display = "none";
}

function cerrarmodalcorrec() {
  
  document.getElementById("modal_profesorjefe").style.display = "none";
  document.getElementById("modal_correc").style.display = "none";
}

function cerramodalerror() {
  
  
  document.getElementById("modal_error").style.display = "none";
 
}
</script>


  <div class="container">

    <!-- Modal -->
  <div class="modalerror" id="modal_profesorjefe" role="document">
    <div class="modalerror-dialog">
    
      <!-- Modal content-->
      <div class="modalerror-content" id="">
        
        <div class="modalerror-body">
       
        <div class="panel-body">
          <button type="button" class="close" id="botoncerrar3" onclick="cerrarmodalprofesor()" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title">Profesor Jefe</h3>
            <form class="form-horizontal" >
            
            <input type="hidden" name="txtiddocente2" id="txtiddocente2" ng-model="angCtrl.txtiddocente2">
             <div class="form-group">
                                     
                                      
                                      <label class="col-sm-2 control-label">Curso</label>
                                      <div class="col-sm-4">
                                       <select  class="form-control" ng-change="angCtrl.CargarLetra()" ng-model="angCtrl.cbocursos" ng-options="d.id_cd as d.des_cd for d in cbocursoscar" ng-disabled="curso">        
                                      </select>
                                      </div>
                                      
                                     
                                      
                                      <label class="col-sm-2 control-label">Letra Curso</label>
                                      <div class="col-sm-4">
                                       <select  id="cboletra" class="form-control" ng-model="angCtrl.letracursos" ng-options="d.id_curso as d.let_curso for d in letracursoscar" ng-disabled="letracurso" >        
                                      </select>
                                      </div>
                                      

                                  
                                  </div>
                                  <div style="text-align: right;">
                                       <button class="btn btn-primary" ng-click="angCtrl.asignardocentejefe()" ng-disabled="asignar"><i class='bx bxs-plus-circle'></i>ASIGNAR</button>
                                      
                                       <button class="btn btn-danger" ng-click="angCtrl.designardocentejefe()" ng-disabled="quitarasignar"><i class='bx bxs-plus-circle'></i>QUITAR ASIGNACION</button>
                                      
                                  </div>


             

            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="cerrarmodalprofesor()" data-dismiss="modal">Cerrar</button>
      </div>
        

        </div>
      </div>
      
    </div>
  </div>

</div>

   <div class="container">

    <!-- Modal -->
  <div class="modalerror" id="modal_error" role="document">
    <div class="modalerror-dialog">
    
      <!-- Modal content-->
      <div class="modalerror-content" id="">
        
        <div class="modalerror-body">
      <button type="button" class="close" id="botoncerrar" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="panel-body">
            <form class="form-horizontal" >
              <div style="text-align: center;"><img src="img/advertencia.png" width="80PX" height="80PX"></div>
            
             <div class="form-group" style="text-align: center;">
               
                
                &nbsp;&nbsp;{{errormensaje}}
            
               
             </div>


             

            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="cerramodalerror()" data-dismiss="modal">Cerrar</button>
      </div>
        

        </div>
      </div>
      
    </div>
  </div>

</div>

   <div class="container">

    <!-- Modal -->
  <div class="modalerror" id="modal_correc" role="document">
    <div class="modalerror-dialog">
    
      <!-- Modal content-->
      <div class="modalerror-content" id="">
        
        <div class="modalerror-body">
       <button type="button" class="close" id="botoncerrar2" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="panel-body">
            <form class="form-horizontal" >
              <div style="text-align: center;"><img src="img/correcto.png" width="80PX" height="80PX"></div>
            
             <div class="form-group" style="text-align: center;">
               
                
                &nbsp;&nbsp;{{correctmesage}}
            
               
             </div>


             

            </form>
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="cerrarmodalcorrec()" data-dismiss="modal">Cerrar</button>
      </div>

        </div>
      </div>
      
    </div>
  </div>

</div>

</section>

<script type="text/javascript" src="../Controlador/MantenedorProfesor.js"></script>

