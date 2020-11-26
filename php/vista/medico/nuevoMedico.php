
<div class="container">
    <div id="seccion-medico">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmmedico">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Información personal</h5>
                                        <input type="hidden" id="func" name="id_func" value="">                                                        
                                        <div class="form-group">
                                            <label for="nombre">Cedula:</label>
                                            <input type="text" class="form-control" id="cc_user" name="cc_user" value="" placeholder="1005124561" required>
                                            <small class="form-text text-muted">Ingrese numero de cedula.</small>
                                        </div>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Nombres:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom_user" name="nom_user" value="" placeholder="Rafael" required>
                                                    <small class="form-text text-muted">Ingrese primer nombre.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom2_user" name="nom2_user" value="" placeholder="Andres">
                                                    <small class="form-text text-muted">Ingrese segundo nombre.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellido">Apellidos:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="ape_user" name="ape_user" value="" placeholder="Londoño" required>
                                                    <small class="form-text text-muted">Ingrese primer apellido.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="ape2_user" name="ape2_user" value="" placeholder="Loaiza">
                                                    <small class="form-text text-muted">Ingrese segundo apellido.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="telefono">Telefono:</label>
                                                    <input type="text" class="form-control" id="tel_user" name="tel_user" value="" placeholder="3152614512" required>
                                                    <small class="form-text text-muted">Ingrese numero de telefono.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="telefono">Email:</label>
                                                    <input type="email" class="form-control" id="email_user" name="email_user" placeholder="andres@hotmail.com" required>
                                                    <small class="form-text text-muted">Ingrese corrreo electronico.</small>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Información laboral</h5>
                                            <input type="hidden" id="cargo" name="id_cargo" value="2">
                                            <input type="hidden" id="priv" name="id_priv" value="2">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad:</label>
                                            <select class="form-control" id="espec" name="id_espec" value="">
                                                <option>Seleccione especialidad...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sede">Sede:</label>
                                            <select class="form-control" id="sede" name="id_sede" value="">
                                                <option>Seleccione sede...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="username" value="" name="username">                                
                                <input type="hidden" id="password" value="" name="password"/>                   
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