<div class="container">
    
<div class="main-body">
            <div class="page-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Editar información</h5>
                            </div>
                            <div class="card-body">
                                <form id="frmmedico">
                                    <h3>Cedula: <label id="ced"></label></h3>
                                    <input type="hidden" id="cc_user" name="cc_user" value="">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Información personal</h5>                                                        
                                            <div class="form-group">
                                                <label for="nombre">Nombres:</label>
                                                <input type="text" class="form-control" id="nom_user" name="nom_user" value="">
                                                <small class="form-text text-muted">Ingrese nombres para modificar.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellido">Apellidos:</label>
                                                <input type="text" class="form-control" id="ape_user" name="ape_user" value="">
                                                <small class="form-text text-muted">Ingrese apellidos para modificar.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono">Telefono:</label>
                                                <input type="text" class="form-control" id="tel_user" name="tel_user" value="">
                                                <small class="form-text text-muted">Ingrese telefono para modificar.</small>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Información laboral</h5>
                                            <div class="form-group">
                                                <label for="especialidad">Especialidad:</label>
                                                <select class="form-control" id="espec" disabled="disabled" value="Medico General">
                                                    <option>Medico General</option>
                                                    <option>Odontologo</option>
                                                </select>
                                                <small class="form-text text-muted">Especialidad no se puede modificar.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="sede">Sede:</label>
                                                <select class="form-control" id="sede"  value="Cali">
                                                    <option>Cali</option>
                                                    <option>Jamundi</option>
                                                    <option>Yumbo</option>
                                                    <option>Palmira</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="actualizar" class="btn btn-primary">Actualizar</button>

                                    <input type="hidden" id="editar" value="editar" name="accion"/>
                                </form>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>