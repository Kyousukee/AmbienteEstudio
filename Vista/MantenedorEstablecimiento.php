<section class="wrapper" ng-app="AngularJSEstablecimiento" ng-controller="AngularEstablecimientoController as angCtrl">
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Establecimientos</h3>
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
                                          <input type="text" class="form-control" id="txtbuscar" name="txtbuscar"  ng-model="angCtrl.txtbuscar" ng-change="angCtrl.ListadoEstablecimiento()">
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="txtidproveedor" name="txtidproveedor" ng-model="angCtrl.txtidproveedor">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Identificador</label>
                                      <div class="col-sm-3">
                                          <input type="text" maxlength="15" class="form-control" id="txtidentificador" name="txtidentificador"  ng-model="angCtrl.txtidentificador">
                                      </div>
                                      <label class="col-sm-2 control-label">Descripción</label>
                                      <div class="col-sm-3">
                                          <input type="text" maxlength="200" class="form-control" id="txtdescripcion" name="txtdescripcion" ng-model="angCtrl.txtdescripcion">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    
                                      <label class="col-sm-2 control-label">Telefono</label>
                                      <div class="col-sm-3">
                                          <input type="text" placeholder="Telefono o celular..." maxlength="10" class="form-control" id="txttelefono" name="txttelefono" ng-model="angCtrl.txttelefono">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Basica</label>
                                      <div class="col-sm-3">
                                       <select id="cbobasica" name="cbobasica" class="form-control" ng-model="angCtrl.cbobasica" style="height: 34px;">
                                         <option value="2">Seleccione</option>;
                                         <option value="1">SI</option>";
                                         <option value="0">NO</option>";            
                                      </select>
                                      </div>
                                     
                                      
                                      <label class="col-sm-2 control-label">Media</label>
                                      <div class="col-sm-3">
                                       <select id="cbomedia" name="cbomedia" class="form-control" ng-model="angCtrl.cbomedia" style="height: 34px;">
                                         <option value="2">Seleccione</option>;
                                         <option value="1">SI</option>";
                                         <option value="0">NO</option>";           
                                      </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Pre / Kinder</label>
                                      <div class="col-sm-3">
                                       <select id="cbokinder" name="cbokinder" class="form-control" ng-model="angCtrl.cbokinder" style="height: 34px;">
                                         <option value="2">Seleccione</option>;
                                         <option value="1">SI</option>";
                                         <option value="0">NO</option>";            
                                      </select>
                                      </div>
                                     
                                      
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
                                    <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-3">
                                          <input type="email" placeholder="Es obligatorio..." maxlength="200" class="form-control" id="txtemail" name="txtemail"  ng-model="angCtrl.txtemail">
                                          
                                      </div>
                                      <label class="col-sm-2 control-label">Dirección</label>
                                      <div class="col-sm-3">
                                          <input type="text" placeholder="Direccion completa." maxlength="200" class="form-control" id="txtdireccion" name="txtdireccion"  ng-model="angCtrl.txtdireccion">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-sm-12">
                                      <input  type="submit" name="btn_grabar" id="btn_grabar" value="Grabar" title="Grabar" class="btn btn-primary" ng-click="angCtrl.estaFormIng()" ng-disabled="grabar_readonly">&nbsp;&nbsp;
                                      <input  type="submit" name="btn_actualizar" id="btn_actualizar" value="Actualizar" title="Actualizar" class="btn btn-primary" ng-click="angCtrl.proveedorFormAct()" ng-disabled="actualizar_readonly">&nbsp;&nbsp;
                                      <a href="?mod=MantenedorEstablecimiento"   title="Limpiar" class="btn btn-primary">Limpiar</a>&nbsp;&nbsp;
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
                              Listado de Establecimientos
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Identificador</th>
                                  <th>Descripción</th>
                                  <th>Telefono</th>
                                  <th>Email</th>
                                  <th>Dirección</th>
                                  <th>Pre / Kinder</th>
                                  <th>Basica</th>
                                  <th>Media</th>
                                  <th>Estado</th>
                                  <th>Editar</th>                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr ng-repeat="s in estaLst track by $index">
                                  <td>{{s.id_esta}}</td>
                                  <td>{{s.rut_esta}}</td>
                                  <td>{{s.descr_esta}}</td>
                                  <td>{{s.fon_esta}}</td>
                                  <td>{{s.email_esta}}</td>
                                  <td>{{s.dire_esta}}</td>
                                  <td>{{s.Kinder}}</td>
                                  <td>{{s.Basica}}</td>
                                  <td>{{s.Media}}</td>
                                  <td>{{s.Est_esta}}</td>
                                  <td><button class="btn btn-primary" ng-click="angCtrl.proveedorFormEdi(s.IdProveedor)"><i class="icon_pencil"></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                      </section>
                  </div>
              </div>      
     <!-- page end-->
      <!-- Modal Email -->
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
                        <img src="img/eliminar0.png" style="    width: 20px; height: 20px; margin-left: -8px; margin-top: -7px;">
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
  <!-- Modal Email -->

</section>

<script type="text/javascript" src="../Controlador/mantenedorestablecimiento.js"></script>

