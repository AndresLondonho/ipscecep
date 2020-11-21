<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-pais">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmpais">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información del Pais</h5>
                                        <input type="hidden" id="id_pais" name="id_pais" value="">                                                        
                                        <div class="form-group">
                                            <label for="nombre">Nombre Pais:</label>
                                            <input type="text" class="form-control" id="nom_pais" name="nom_pais" value="" placeholder="Colombia" required>
                                            <small class="form-text text-muted">Ingrese nombre del pais.</small>
                                        </div>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Capital:</label>
                                            <input type="text" class="form-control" id="cap_pais" name="cap_pais" value="" placeholder="Bogota D.C." required>
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