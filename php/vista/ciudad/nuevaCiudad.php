<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-ciudad">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmciudad">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información de la ciudad</h5>
                                        <input type="hidden" id="id_ciu" name="id_ciu" value="">                                                        
                                        <div class="form-group">
                                            <label for="nombre">Nombre Ciudad:</label>
                                            <input type="text" class="form-control" id="nom_ciu" name="nom_ciu" value="" placeholder="Bogota D.C." required>
                                            <small class="form-text text-muted">Ingrese nombre de la ciudad.</small>
                                        </div>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Pais:</label>
                                            <select class="form-control" id="id_pais" name="id_pais" required>
                                                <option>Seleccione el pais...</option>
                                            </select>
                                            <small class="form-text text-muted">Seleccione nombre del pais.</small>
                                        </div>
                                    </div>
                                </div>         
                                <button type="button" id="registrar" class="btn btn-primary">Registrar</button>
                                <input type="hidden" id="editar" value="nuevo" name="accion"/>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>