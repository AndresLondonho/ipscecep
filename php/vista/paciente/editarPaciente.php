<div class="container">
    <div id="seccion-paciente">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            <div class="panel-group"><div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmpaciente">
                                <h3>Cedula: <label id="ced"></label></h3>
                                <input type="hidden" id="cc_pac" name="cc_pac" value="">

                                <div class="row">
                                    <div class="col-md-6">
                                    <h5>Información personal</h5>
                                        <input type="hidden" id="id_pac" name="id_pac" value="">                                                        
                                                                                                
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="nombre">Nombres:</label>
                                                    <input type="text" class="form-control" id="nom_pac" name="nom_pac" value="" placeholder="Cristian" required>
                                                    <small class="form-text text-muted">Ingrese nombre del paciente.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="apellido">Apellidos:</label>
                                                    <input type="text" class="form-control" id="ape_pac" name="ape_pac" value="" placeholder="Loaiza" required>
                                                    <small class="form-text text-muted">Ingrese apellidos del paciente.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="telefono">Email:</label>
                                                    <input type="email" class="form-control" id="email_pac" name="email_pac" placeholder="cristian@hotmail.com" required>
                                                    <small class="form-text text-muted">Ingrese corrreo electronico.</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="telefono">Telefono:</label>
                                                    <input type="text" class="form-control" id="tel_pac" name="tel_pac" value="" placeholder="3017505543" required>
                                                    <small class="form-text text-muted">Ingrese numero de telefono.</small>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Información de residencia</h5>
                                        <div class="form-group">
                                            <label for="ciudad">Dirección:</label>
                                            <input type="text" class="form-control" id="dir_pac" name="dir_pac" value="">
                                            <small>Dirección de residencia</small>
                                        </div>                                                        
                                        <div class="form-group">
                                                <label for="ciudad">Ciudad:</label>
                                                <select class="form-control" id="id_ciu" name="id_ciu" value="">
                                                </select>
                                                <small>Ciudad de residencia</small>
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