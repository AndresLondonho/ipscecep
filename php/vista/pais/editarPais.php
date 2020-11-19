<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-pais">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmpais">
                            <h3>ID Pais: <label id="id"></label></h3>
                            <input type="hidden" id="id_pais" name="id_pais" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información del Pais</h5>
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
                                <button type="submit" id="registrar" class="btn btn-primary">Registrar</button>
                                <input type="hidden" id="editar" value="editar" name="accion"/>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>