<input type="hidden" id="modulo" value="Servicios">
    <!-- Main content -->
    <div class="container">
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#modal_editar" class="btn btn-success" id="nuevoServicio" title="Nuevo Servicio" >Nuevo</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div id="editar"></div>
                <div id="listado">
                <table id="tabla" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>Nro</th>
                    <th>Servicio</th>
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
</div>
<script src="../../js/servicio.js"></script>