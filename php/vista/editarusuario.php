<div class=" col-md-4">
</div>
<div class="col-md-4">
    <div id="seccion-datos">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Actualizar datos</div>
                        <div class="panel-body">
                            <form id="frmdatos">
                            <input type="hidden" id="id_funcionario" name="id_func" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Información personal</h5>
                                        <div class="form-group">
                                            <label for="nombre">Nombres:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom_user" name="nom_user" value="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom2_user" name="nom2_user" value="">
                                                </div>
                                            </div>
                                        </div>                                                       
                                        <div class="form-group">
                                            <label for="apellido">Apellidos:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="ape_user" name="ape_user" value="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="ape2_user" name="ape2_user" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono:</label>
                                            <input type="text" class="form-control" id="tel_user" name="tel_user" value=""  required>              
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Email:</label>
                                            <input type="email" class="form-control" id="email_user" name="email_user"  required>                              
                                        </div>    
                                    </div>
                                </div>         
                                <button type="button" id="actualizar" class="btn btn-primary">Actualizar</button>
                                <input type="hidden" id="editar" value="editarD" name="accion"/>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>