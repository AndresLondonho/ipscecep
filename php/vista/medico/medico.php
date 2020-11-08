<h1>
        Gestión de Medicos</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Medicos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header with-border">
              <button type="button" data-toggle="modal" data-target="#modal_editar" class="btn btn-success" id="nuevoM" title="Nuevo Medico" >Nuevo</button>
            </div>
           
            
            <!-- /.box-header -->
            <div class="box-body">
            <div id="editar"></div>
            <div id="listado">
              <table id="tabla" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Especialidad</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Sede</th>
                  <th>Username</th>
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

<script src="../../js/medico.js"></script>