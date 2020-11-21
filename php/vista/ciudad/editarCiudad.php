<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-ciudad">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmciudad">
                            <h3>ID Ciudad: <label id="id"></label></h3>
                            <input type="hidden" id="id_ciu" name="id_ciu" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información de la ciudad</h5>
                                        <div class="form-group">
                                            <label for="nombre">Nombre Ciudad:</label>
                                            <input type="text" class="form-control" id="nom_ciu" name="nom_ciu" value="" required>
                                            <small class="form-text text-muted">Ingrese nombre de la ciudad para cambiar.</small>
                                        </div>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Pais:</label>
                                            <select  class="form-control" id="id_pais" name="id_pais">
                                                <option>Seleccione el pais...</option>
                                            </select>
                                            <small class="form-text text-muted">Seleccione pais para cambiar.</small>
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