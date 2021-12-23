<section class="wrapper" ng-app="AngularJSUnidad" ng-controller="AngularUnidadController as angCtrl">
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Unidades</h3>
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
                                          <input type="text" class="form-control" id="txtbuscar" name="txtbuscar"  ng-model="angCtrl.txtbuscar" ng-change="angCtrl.ListadoUnidades()">
                                      </div>
                                      <div class="col-sm-2">
                                       <select  class="form-control" ng-change="angCtrl.ListadoUnidades()" ng-model="angCtrl.cbocursos2" ng-options="d.id_cd as d.des_cd for d in cbocursoscar2" ng-disabled="readonly">        
                                      </select>
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="txtidunidad" name="txtidunidad" ng-model="angCtrl.txtidunidad">
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
                                  </div>-->

                                  <div class="form-group">
                                     
                                      <label class="col-sm-1 control-label">N° Unidad</label>
                                      <div class="col-sm-1">
                                          <input type="number" class="form-control" id="txtnunidad" name="txtnunidad" min="1" ng-model="angCtrl.txtnunidad">
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
                                  </div>

                                 

                                  <div class="form-group">
                                      <div class="col-sm-12">
                                      <input  type="submit" name="btn_grabar" id="btn_grabar" value="Grabar" title="Grabar" class="btn btn-primary" ng-click="angCtrl.ProfeFormIng()" ng-disabled="grabar_readonly">&nbsp;&nbsp;
                                      <input  type="submit" name="btn_actualizar" id="btn_actualizar" value="Actualizar" title="Actualizar" class="btn btn-primary" ng-click="angCtrl.proveedorFormAct()" ng-disabled="actualizar_readonly">&nbsp;&nbsp;
                                      <a href="?mod=MantenedorUnidades"   title="Limpiar" class="btn btn-primary">Limpiar</a>&nbsp;&nbsp;
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
                              Listado de Unidades
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Numero de Unidad</th>
                                  <th>Descripcion</th>
                                  <th>Asignatura</th>
                                  <th>Curso</th>
                                  <th>Estado</th>
                                  <th>Establecimiento</th>
                                  <th>Editar</th>                                  
                                  <th>Eliminar</th>                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr ng-repeat="s in UniLst track by $index">
                                  <td>{{s.id_uni}}</td>
                                  <td>{{s.num_uni}}</td>
                                  <td>{{s.desc_uni}}</td>
                                  <td>{{s.desc_asig}}</td>
                                  <td>{{s.des_cd}}</td>
                                  <td>{{s.Est_uni}}</td>
                                  <td>{{s.descr_esta}}</td>
                                  <td><button class="btn btn-primary" ng-click="angCtrl.proveedorFormEdi(s.id_uni)"><i class='bx bx-edit-alt'></i></button></td>
                                  <td><button class="btn btn-danger" ng-click="angCtrl.proveedorFormEli(s.id_uni)"><i class='bx bxs-x-square'></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                      </section>
                  </div>
              </div>      
     <!-- page end-->
      <script type="text/javascript">
 

      function cerrarmodalcorrec() {
        
        document.getElementById("modal_correc").style.display = "none";
      }

      function cerramodalerror() {
        
        
        document.getElementById("modal_error").style.display = "none";
       
      }
      
      </script>

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

<script type="text/javascript" src="../Controlador/MantenedorUnidades.js"></script>

