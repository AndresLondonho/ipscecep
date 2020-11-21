<input type="hidden" id="modulo" value="Funcionarios">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header with-border">
              <button type="button" data-toggle="modal" data-target="#modal_editar" class="btn btn-success" id="nuevoF" title="Nuevo Funcionario" >Nuevo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div id="listado">
              <table id="tabla" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Cedula</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Cargo</th>
                  <th>Especialidad</th>
                  <th>Sede</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!--Div para editar los medicos-->
  <div class="modal fade" id="modal_editar" tabidex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
  </div>

<script src="../../js/funcionario.js"></script>