<div class="container">
    <div id="seccion-medico">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            <div class="panel-group"><div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmfunc">
                                <h3>ID: <label id="id"></label></h3>
                                <input type="hidden" id="func" name="id_func" value="">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Información personal</h5>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Nombres:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom_user" name="nom_user" value="">
                                                    <small class="form-text text-muted">Ingrese primer nombre para modificar.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom2_user" name="nom2_user" value="">
                                                    <small class="form-text text-muted">Ingrese segundo nombre para modificar.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellido">Apellidos:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="ape_user" name="ape_user" value="">
                                                    <small class="form-text text-muted">Ingrese primer apellido para modificar.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="ape2_user" name="ape2_user" value="">
                                                    <small class="form-text text-muted">Ingrese segundo apellido para modificar.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="telefono">Telefono:</label>
                                                    <input type="text" class="form-control" id="tel_user" name="tel_user" value="" placeholder="3152614512" required>
                                                    <small class="form-text text-muted">Ingrese numero de telefono para modificar.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="telefono">Email:</label>
                                                    <input type="email" class="form-control" id="email_user" name="email_user" placeholder="andres@hotmail.com" required>
                                                    <small class="form-text text-muted">Ingrese corrreo electronico para modificar.</small>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h5>Información laboral</h5>
                                        <div class="form-group">
                                            <label for="sede">Cargo:</label>
                                            <select class="form-control" id="id_cargo" name="id_cargo" value="" disabled>
                                                <option>1</option>
                                            </select>
                                            <small class="form-text text-muted">Cargo no se puede modificar.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad:</label>
                                            <select class="form-control" id="id_espec" name="id_espec" value="" disabled="true">
                                            </select>
                                            <small class="form-text text-muted">Especialidad no se puede modificar.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="sede">Sede:</label>
                                            <select class="form-control" id="id_sede" name="id_sede" value="">
                                            </select>
                                            <small class="form-text text-muted">Seleccione la sede a cambiar.</small>
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