<section class="wrapper" ng-app="AngularJSCursos" ng-controller="AngularCursosController as angCtrl">
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Cursos</h3>
   </div>
  </div>
     <!-- page start-->

     <div class="row">
       <section class="panel" style="width: 100%">
                          <div class="panel-body">
                              <form class="form-horizontal"  method="POST" id="Formulario">
                                  
                                  <div class="form-group alert alert-info">
                                      <label class="col-sm-2 control-label">Buscar</label>
                                      <div class="col-sm-6">
                                          <input type="text" class="form-control" id="txtbuscar" name="txtbuscar"  ng-model="angCtrl.txtbuscar" ng-change="angCtrl.ListadoCursos()">
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="txtidcurso" name="txtidcurso" ng-model="angCtrl.txtidcurso">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      
                                      <label class="col-sm-2 control-label">Descripcion</label>
                                      <div class="col-sm-4">
                                       <select  class="form-control" ng-model="angCtrl.cbocursos" ng-options="d.id_cd as d.des_cd for d in cbocursoscar" ng-disabled="readonly">        
                                      </select>
                                      </div>
                                      <label class="col-sm-3 control-label">Maximo cursos</label>
                                      <div class="col-sm-3">
                                       <select id="cbodistintivo" name="cbodistintivo" class="form-control" ng-model="angCtrl.cbodistintivo" style="height: 34px;">
                                         <option value="0">Unico</option>;
                                         <option value="1">A</option>";
                                         <option value="2">B</option>"; 
                                         <option value="3">C</option>;
                                         <option value="4">D</option>";
                                         <option value="5">E</option>"; 
                                         <option value="6">F</option>;
                                         <option value="7">G</option>";
                                         <option value="8">H</option>";           
                                         <option value="9">I</option>;
                                         <option value="10">J</option>";
                                         <option value="11">K</option>"; 
                                         <option value="12">L</option>;
                                         <option value="13">M</option>";
                                         <option value="14">N</option>"; 
                                         <option value="15">Ñ</option>;
                                         <option value="16">O</option>";
                                         <option value="17">P</option>"; 
                                         <option value="18">Q</option>;
                                         <option value="19">R</option>";
                                         <option value="20">S</option>"; 
                                         <option value="21">T</option>;
                                         <option value="22">U</option>";
                                         <option value="23">V</option>"; 
                                         <option value="24">W</option>;
                                         <option value="25">X</option>";
                                         <option value="26">Y</option>"; 
                                         <option value="27">Z</option>"; 
                                      </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      
                                
                                      <label class="col-sm-2 control-label">Estado</label>
                                      <div class="col-sm-3">
                                       <select id="cboestado" name="cboestado" class="form-control" ng-model="angCtrl.cboestado" ng-disabled="actualizar_readonly" style="height: 34px;">
                                         <option value="0">Seleccione</option>;
                                         <option value="A">Activado</option>";
                                         <option value="I">Inactivo</option>";           
                                      </select>

                                      </div>
                                      <input  type="submit" name="btn_actualizar" id="btn_actualizar" value="Desactivar Todos" title="Desactivar Todos" class="btn btn-primary" ng-click="angCtrl.DesactivarTodos()" ng-disabled="actualizar_readonly">&nbsp;&nbsp;
                                  </div>
                                 
                                  

                                  <div class="form-group">
                                      <div class="col-sm-12">
                                      <input  type="submit" name="btn_grabar" id="btn_grabar" value="Grabar" title="Grabar" class="btn btn-primary" ng-click="angCtrl.estaFormIng()" ng-disabled="grabar_readonly">&nbsp;&nbsp;
                                      <input  type="submit" name="btn_actualizar" id="btn_actualizar" value="Actualizar" title="Actualizar" class="btn btn-primary" ng-click="angCtrl.proveedorFormAct()" ng-disabled="actualizar_readonly">&nbsp;&nbsp;
                                      <a href="?mod=MantenedorCursos"   title="Limpiar" class="btn btn-primary">Limpiar</a>&nbsp;&nbsp;
                                      <input  type="submit" name="btn_actualizar" id="btn_actualizar" value="Eliminar Todos" title="Eliminar Todos" class="btn btn-danger" ng-click="angCtrl.EliminarTodos()" ng-disabled="actualizar_readonly">&nbsp;&nbsp;
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
                              Listado de Cursos
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Descripción</th>
                                  <th>Destintivo</th>
                                  <th>Establecimiento</th>
                                  <th>Estado</th>
                                  <th>Editar</th>                                  
                                  <th>Eliminar</th>                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr ng-repeat="s in cursoLst track by $index">
                                  <td>{{s.id_curso}}</td>
                                  <td>{{s.desc_curso}}</td>
                                  <td>{{s.let_curso}}</td>
                                  <td>{{s.descr_esta}}</td>
                                  <td>{{s.Est_curso}}</td>
                                  <td><button class="btn btn-primary" ng-click="angCtrl.proveedorFormEdi(s.id_curso)"><i class='bx bx-edit-alt'></i></button></td>
                                  <td ng-if="s.Est_curso=='I'"><button class="btn btn-danger" ng-click="angCtrl.proveedorFormEli(s.id_curso)"><i class='bx bxs-x-square'></i></button></td>
                                  <td ng-if="s.Est_curso=='A'"><button class="btn btn-danger" ng-click="angCtrl.proveedorFormEli(s.id_curso)" disabled="disabled"><i class='bx bxs-x-square'></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                      </section>
                  </div>
              </div>      
     <!-- page end-->
      

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

<script type="text/javascript" src="../Controlador/mantenedorcursos.js"></script>

