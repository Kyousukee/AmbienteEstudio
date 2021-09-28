<section class="wrapper" ng-app="AngularJSProfesorA" ng-controller="AngularProfesorAController as angCtrl">
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Profesor y Asignaturas</h3>
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
                                          <input type="text" class="form-control" id="txtbuscar" name="txtbuscar"  ng-model="angCtrl.txtbuscar" ng-change="angCtrl.ListadoDocA()">
                                      </div>
                                      <div class="col-sm-2">
                                       <select  class="form-control" ng-change="angCtrl.ListadoDocA()" ng-model="angCtrl.cbocursos2" ng-options="d.id_doce as d.nombre for d in cbocursoscar2" ng-disabled="readonly">        
                                      </select>
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="txtiddocA" name="txtiddocA" ng-model="angCtrl.txtiddocA">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                     
                                      
                                      <label class="col-sm-4 control-label">Seleccione Profesor</label>
                                      <div class="col-sm-4">
                                       <select  class="form-control" ng-model="angCtrl.cboprofesor" ng-change="angCtrl.cargarrut()" ng-options="d.id_doce as d.nombre for d in cboprofesorcar" ng-disabled="readonly">        
                                      </select>
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="text" class="form-control" id="txtrut" name="txtrut" ng-model="angCtrl.txtrut" disabled="disabled">
                                      </div>
                                      
                                  </div>

                                  <div class="form-group">
                                     
                                      
                                      <label class="col-sm-4 control-label">Seleccione Curso</label>
                                      <div class="col-sm-2">
                                       <select  class="form-control" ng-change="angCtrl.cargarasignatura()" ng-model="angCtrl.cbocursos" ng-options="d.id_cd as d.des_cd for d in cbocursoscar" ng-disabled="readonly">        
                                      </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                     
                                      
                                      <label class="col-sm-4 control-label">Seleccione Asignatura</label>
                                      <div class="col-sm-5">
                                       <select  class="form-control" ng-model="angCtrl.cboasignatura" ng-options="d.id_asig as d.desc_asig for d in cboasignaturacar" ng-disabled="readonly">        
                                      </select>
                                      </div>
                                  </div>

                                  <!--<div class="form-group">
                                     
                                      
                                      <label class="col-sm-4 control-label">Letra Curso</label>
                                      <div class="col-sm-2">
                                       <select  id="cboletra" class="form-control" ng-model="angCtrl.letracursos" ng-options="d.id_curso as d.let_curso for d in letracursoscar" ng-disabled="readonly">        
                                      </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                     
                                      <label class="col-sm-1 control-label">N° Unidad</label>
                                      <div class="col-sm-1">
                                          <input type="number" class="form-control" id="txtnunidad" name="txtnunidad" ng-model="angCtrl.txtnunidad">
                                      </div>
                                      <label class="col-sm-2 control-label">Descripcion Unidad</label>
                                      <div class="col-sm-4">
                                          <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion" ng-model="angCtrl.txtdescripcion">
                                      </div>
                                      <label class="col-sm-2 control-label">Estado</label>
                                      <div class="col-sm-2">
                                       <select id="cboestado" name="cboestado" class="form-control" ng-model="angCtrl.cboestado" style="height: 34px;">
                                         <option value="0">Seleccione</option>;
                                         <option value="A">Activado</option>";
                                         <option value="I">Inactivo</option>";           
                                      </select>
                                      </div>
                                  </div>-->

                                 

                                  <div class="form-group">
                                      <div class="col-sm-12">
                                      <input  type="submit" name="btn_grabar" id="btn_grabar" value="Grabar" title="Grabar" class="btn btn-primary" ng-click="angCtrl.ProfeFormIng()" ng-disabled="grabar_readonly">&nbsp;&nbsp;
                                      <a href="?mod=MantenedorProfesorA"   title="Limpiar" class="btn btn-primary">Limpiar</a>&nbsp;&nbsp;
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
                              Listado de Asignaciones Profesor y Asignatura
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Rut Profesor</th>
                                  <th>Nombre Profesor</th>
                                  <th>Asignatura</th>
                                  <th>Curso</th>
                                  <th>Establecimiento</th>                                 
                                  <th>Eliminar</th>                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr ng-repeat="s in DocALst track by $index">
                                  <td>{{s.id_docA}}</td>
                                  <td>{{s.rut_doce}}</td>
                                  <td>{{s.nombre}}</td>
                                  <td>{{s.desc_asig}}</td>
                                  <td>{{s.des_cd}}</td>
                                  <td>{{s.descr_esta}}</td>
                                  <td><button class="btn btn-danger" ng-click="angCtrl.proveedorFormEli(s.id_docA)"><i class='bx bxs-x-square'></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                      </section>
                  </div>
              </div>      
     <!-- page end-->
      <!-- Modal Email 
  <div class="container">
    <div class="modal fade" id="modal_email" role="document">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div  class="form-group">
              <h4 class="modal-title" class="col-sm-2 control-label">Agregar Email #RUT</h4>
              <input type="text" class="form-control" id="rutemail" name="rutemail" ng-model="angCtrl.rutemail" disabled>
            </div>
            
          </div>
          <div class="modal-body">
            <section class="panel">
              <div class="panel-body">
                <form class="form-horizontal" method="POST">
                  <input type="hidden" name="txtIDOC" id="txtIDOC" ng-model="angCtrl.txtIDOC">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email: </label>
                    <div class="col-sm-6">
                      <input type="email" placeholder="Es obligatorio..." class="form-control" ng-model="angCtrl.otroemail" id="otroemail" name="otroemail" >      
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <input  type="submit" name="btn_agregar_email" id="btn_agregar_email" value="Agregar Email" title="Agregar Email" class="btn btn-primary" ng-click="angCtrl.agregarEmailPro()">
                  </div>
                </form>
              </div>
            </section>

            <section class="panel">
              <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Proveedor</th>
                    <th>Email</th>
                    <th>Eliminar Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="em in LstEm track by (em.IdProEm)">
                    <td>{{em.IdProEm}}</td>
                    <td>{{em.ProRut}}</td>
                    <td>{{em.Email}}</td>
                    <td align="center">
                      <button class="btn btn-danger" style="width: 30px; height: 30px;" ng-click="angCtrl.eliminarEmail(em.IdProEm)">
                        <img src="" style="    width: 20px; height: 20px; margin-left: -8px; margin-top: -7px;">
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>

          <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  Modal Email -->

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
        
        

        </div>
      </div>
      
    </div>
  </div>

</div>

</section>

<script type="text/javascript" src="../Controlador/MantenedorProfesorA.js"></script>

