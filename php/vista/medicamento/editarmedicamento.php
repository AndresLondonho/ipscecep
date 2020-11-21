<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-medcto">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmmedcto">
                            <h3>ID Medicamento: <label id="id"></label></h3>
                            <input type="hidden" id="id_medcto" name="id_medcto" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información del Medicamento</h5>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="nombre">Medicamento:</label>
                                                <label for="nommedcto" id="nombre" class="form-control"></label>
                                                <small class="form-text text-muted">Medicamento.</small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nombre">Stock actual:</label>
                                                <label for="stock" id="stockA" class="form-control"></label>
                                                <small class="form-text text-muted">Stock actual.</small>
                                            </div>
                                        </div>                                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nombre">Stock:</label>
                                                <input type="text" class="form-control" id="stocknuevo" name="stocknuevo" value="" placeholder="50" required>
                                                <small class="form-text text-muted">Stock que ingresa al inventario.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>         
                                <div class="col-md-12">
                                    <input type="hidden" id="stock" name="stock" values="">
                                    <button type="button" id="actualizar" class="btn btn-primary">Actualizar</button>
                                </div>
                                <input type="hidden" id="editar" value="editar" name="accion"/>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>