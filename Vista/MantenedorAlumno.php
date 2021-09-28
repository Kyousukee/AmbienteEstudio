<section class="wrapper" ng-app="AngularJSAlumno" ng-controller="AngularAlumnoController as angCtrl">
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Alumnos</h3>
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
                                          <input type="text" class="form-control" id="txtbuscar" name="txtbuscar"  ng-model="angCtrl.txtbuscar" ng-change="angCtrl.ListadoAlumnos()">
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="txtidalumno" name="txtidalumno" ng-model="angCtrl.txtidalumno ">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Rut</label>
                                      <div class="col-sm-3">
                                          <input type="text" maxlength="15" class="form-control" id="txtrut" name="txtrut"  ng-model="angCtrl.txtrut">
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
                                     
                                      
                                      <label class="col-sm-2 control-label">Curso</label>
                                      <div class="col-sm-3">
                                       <select  class="form-control" ng-change="angCtrl.CargarLetra()" ng-model="angCtrl.cbocursos" ng-options="d.id_cd as d.des_cd for d in cbocursoscar" ng-disabled="curso">        
                                      </select>
                                      </div>
                                      
                                     
                                      
                                      <label class="col-sm-2 control-label">Letra Curso</label>
                                      <div class="col-sm-3">
                                       <select  id="cboletra" class="form-control" ng-model="angCtrl.letracursos" ng-options="d.id_curso as d.let_curso for d in letracursoscar" ng-disabled="letracurso" >        
                                      </select>
                                      </div>
                                      

                                  
                                  </div>

                                 

                                  <div class="form-group">
                                      <div class="col-sm-12">
                                      <input  type="submit" name="btn_grabar" id="btn_grabar" value="Grabar" title="Grabar" class="btn btn-primary" ng-click="angCtrl.ProfeFormIng()" ng-disabled="grabar_readonly">&nbsp;&nbsp;
                                      <input  type="submit" name="btn_actualizar" id="btn_actualizar" value="Actualizar" title="Actualizar" class="btn btn-primary" ng-click="angCtrl.proveedorFormAct()" ng-disabled="actualizar_readonly">&nbsp;&nbsp;
                                      <a href="?mod=MantenedorAlumno"   title="Limpiar" class="btn btn-primary">Limpiar</a>&nbsp;&nbsp;
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
                              Listado de Alumnos
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Rut</th>
                                  <th>Nombre</th>
                                  <th>Apellido Paterno</th>
                                  <th>Apellido Materno</th>
                                  <th>Fono</th>
                                  <th>Email</th>
                                  <th>Estado</th>
                                  <th>Establecimiento</th>
                                  <th>Curso</th>
                                  <th>Editar</th>                                  
                                  <th>Eliminar</th>                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr ng-repeat="s in EstLst track by $index">
                                  <td>{{s.rut_est}}</td>
                                  <td>{{s.nom_est}}</td>
                                  <td>{{s.ape_est}}</td>
                                  <td>{{s.ape2_est}}</td>
                                  <td>{{s.fon_est}}</td>
                                  <td>{{s.email_est}}</td>
                                  <td>{{s.est_est}}</td>
                                  <td>{{s.descr_esta}}</td>
                                  <td>{{s.curso}}</td>
                                  <td><button class="btn btn-primary" ng-click="angCtrl.proveedorFormEdi(s.id_est)"><i class='bx bx-edit-alt'></i></button></td>
                                  <td><button class="btn btn-danger" ng-click="angCtrl.proveedorFormEli(s.id_est,s.rut_est)"><i class='bx bxs-x-square'></i></button></td>
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
  <div class="modalerror" id="modal_profesorjefe" role="document">
    <div class="modalerror-dialog">
    
      <!-- Modal content-->
      <div class="modalerror-content" id="">
        
        <div class="modalerror-body">
       
        <div class="panel-body">
          <button type="button" class="close" id="botoncerrar3" data-dismiss="modal" aria-hidden="true">&times;</button>
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

<script type="text/javascript" src="../Controlador/MantenedorAlumno.js"></script>

