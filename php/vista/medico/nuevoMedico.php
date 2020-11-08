<div class="container">
    <div id="seccion-medico">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            <div class="panel-group"><div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmmedico" method="GET" action="../../controlador/medico.php?accion=nuevo">
                                <h3>Cedula:</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Información personal</h5>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Cedula:</label>
                                            <input type="text" class="form-control" id="cc_user" name="cc_user" value="" placeholder="Ingrese cedula">
                                            
                                        </div>                                                        
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
                                            <label for="telefono">Telefono:</label>
                                            <input type="text" class="form-control" id="tel_user" name="tel_user" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Email:</label>
                                            <input type="email" class="form-control" id=" email_user" name=" email_user" placeholder="Ingrese email">
                                        </div>    
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h5>Información laboral</h5>
                                            <input type="hidden" id="cargo" name="id_cargo" value="2">
                                            <input type="hidden" id="priv" name="id_priv" value="2">
                                            <input type="hidden" id="funcionario" name="id_func" value="5151">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad:</label>
                                            <select class="form-control" id="espec" name="id_espec" value="1">
                                            <option>
                                                1
                                            </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sede">Sede:</label>
                                            <select class="form-control" id="sede" name="id_sede" value="1">
                                            <option>
                                            1011
                                            </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="username" value="andres" name="username"/>                                
                                <input type="hidden" id="password" value="123456" name="password"/>                   
                                <button type="submit" id="registrar" class="btn btn-primary">Registrar</button>
                                
                                <input type="hidden" id="editar" value="nuevo" name="accion"/>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


