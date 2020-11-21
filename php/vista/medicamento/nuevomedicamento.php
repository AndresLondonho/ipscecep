<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-medcto">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmmedcto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información del Medicamento</h5>
                                        <input type="hidden" id="id_medcto" name="id_medcto" value="">                                                        
                                        <div class="form-group">
                                            <label for="nombre">Medicamento:</label>
                                            <input type="text" class="form-control" id="nom_medcto" name="nom_medcto" value="" placeholder="Acetaminofen" required>
                                            <small class="form-text text-muted">Ingrese nombre del pais.</small>
                                        </div>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Stock:</label>
                                            <input type="number" class="form-control" id="stock" name="stock" value="" placeholder="50" required>
                                            <small class="form-text text-muted">Ingrese nombre de la capital.</small>
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