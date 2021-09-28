<section class="wrapper" ng-app="AngularJSNoticias" ng-controller="AngularNoticiasController as angCtrl">
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Noticias</h3>
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
                                          <input type="text" class="form-control" id="txtbuscar" name="txtbuscar"  ng-model="angCtrl.txtbuscar" ng-change="angCtrl.ListadoNoticias()">
                                      </div>
                                      <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="txtidnoticia" name="txtidnoticia" ng-model="angCtrl.txtidnoticia ">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">Titulo de la Noticia</label>
                                      <div class="col-sm-4">
                                          <input type="text" class="form-control" id="txttitulo" name="txttitulo"  ng-model="angCtrl.txttitulo">
                                      </div>
                                      
                                  </div>

                                  <div class="form-group">
                                    
                                      <label class="col-sm-4 control-label">Descripcion de la Noticia</label>
                                      <div class="col-sm-4">
                                          
                                          <textarea maxlength="1000" rows="3" class="form-control" ck-editor id="txtdescripcion" name="txtdescripcion" ng-model="angCtrl.txtdescripcion" placeholder="Indique una pequeña descripcion de la noticia que esta ingresando." style="word-break: break-all;">
                                          </textarea>
                                      </div>

                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">Cargar Imagen de Portada</label>
                                      <div class="col-sm-4">
                                          <input type="file" class="form-control" id="archivo1" name="archivo1" ng-model="angCtrl.archivo1" 
                                          accept="image/png,.jpeg,.jpg,application/doc,.docx,application/xls,.xlsx,application/pdf">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">Cargar archivo con informacion de Noticia</label>
                                      <div class="col-sm-4">
                                          <input type="file" class="form-control" id="archivo2" name="archivo2" ng-model="angCtrl.archivo2" 
                                          accept="image/png,.jpeg,.jpg,application/doc,.docx,application/xls,.xlsx,application/pdf">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">&nbsp;</label>
                                      
                                      <div class="alert alert-block alert-danger fade in col-sm-6">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                        </button>
                                        <strong>Advertencia:</strong> Solo seran cargados archivos en formato Excel, Pdf, Word, Jpg, Png.  MAX(3MB)
                                       </div>
                                  </div>

                                  

                                 

                                  <div class="form-group" style="text-align: center;">
                                      <div class="col-sm-12">
                                      <input  type="submit" name="btn_grabar" id="btn_grabar" value="Grabar" title="Grabar" class="btn btn-primary" ng-click="angCtrl.ProfeFormIng()" ng-disabled="grabar_readonly">&nbsp;&nbsp;
                                      <a href="?mod=SubirNoticia"   title="Limpiar" class="btn btn-primary">Limpiar</a>&nbsp;&nbsp;
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
                              Listado de Noticias
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Titulo Noticia</th>
                                  <th>Descripcion Noticia</th>
                                  <th>Imagen Noticia</th>
                                  <th>Archivo Noticia</th>
                                  <th>Establecimiento</th>
                                  <th>Eliminar</th>                                
                                </tr>
                              </thead>
                              <tbody>
                                <tr ng-repeat="s in NotLst track by $index">
                                  <td>{{s.id_ne}}</td>
                                  <td>{{s.tit_ne}}</td>
                                  <td>{{s.desc_ne}}</td>
                                  <td><a href="../Vista/Noticias/Img/{{s.img_not}}" target="_blank">Ver Imagen</a></td>
                                  <td><a href="../Vista/Noticias/PDF/{{s.arch_not}}" target="_blank">Ver Archivo</a></td>
                                  <td>{{s.descr_esta}}</td>
                                  <td><button class="btn btn-danger" ng-click="angCtrl.proveedorFormEli(s.id_ne,s.img_not,s.arch_not)"><i class='bx bxs-x-square'></i></button></td>
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

<script type="text/javascript" src="../Controlador/SubirNoticia.js"></script>

