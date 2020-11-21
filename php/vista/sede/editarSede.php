<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-sede">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmsede">
                                <h3>ID Sede: <label id="id"></label></h3>
                                <input type="hidden" id="id_sede" name="id_sede" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información de la sede</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="nombre">Nombre:</label>
                                                    <input type="text" class="form-control" id="nom_sede" name="nom_sede" value="" placeholder="Champagnat" required>
                                                    <small class="form-text text-muted">Ingrese nombre para modificar.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="telefono">Telefono:</label>
                                                    <input type="text" class="form-control" id="tel_sede" name="tel_sede" value="" placeholder="3828282" required>
                                                    <small class="form-text text-muted">Ingrese telefono para modificar.</small>
                                                </div>
                                            </div>
                                        </div>                                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="direccion">Dirección:</label>
                                                    <input type="text" class="form-control" id="dir_sede" name="dir_sede" value="" placeholder="Cl. 9b #29a67" required>
                                                    <small class="form-text text-muted">Ingrese direccion para modificar.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="ciudad">Ciudad:</label>
                                                    <select class="form-control" name="id_ciu" id="id_ciu">
                                                        <option>1001</option>
                                                    </select>
                                                    <small class="form-text text-muted">Ingrese ciudad para modificar.</small>
                                                </div>
                                            </div>
                                        </div>                                                   
                                        <div class="form-group">
                                            <label for="director">Director de sede:</label>
                                            <select class="form-control" name="id_rol" id="id_rol" value="">
                                                <option>103</option>
                                            </select>
                                            <small class="form-text text-muted">Seleccione el director de la sede.</small>
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
</div>
