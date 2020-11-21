<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-serv">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmserv">
                            <h3>ID Servicio: <label id="id"></label></h3>
                            <input type="hidden" id="id_serv" name="id_serv" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información del Servicio</h5>
                                        <div class="form-group">
                                            <label for="nombre">Servicio:</label>
                                            <input type="text" class="form-control" id="nom_serv" name="nom_serv" value="" placeholder="Colombia" required>
                                            <small class="form-text text-muted">Ingrese nombre del servicio.</small>
                                        </div>
                                    </div>
                                </div>         
                                <button type="button" id="actualizar" class="btn btn-primary">Actualizar</button>
                                <input type="hidden" id="editar" value="editar" name="accion"/>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>