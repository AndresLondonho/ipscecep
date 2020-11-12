
<div class="container">
    <div id="seccion-paciente">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmpaciente" enctype="multipart/form-data">
                                <h3>Cedula:</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Información personal</h5>
                                        <input type="hidden" id="id_func" name="id_func" value="">                                                        
                                        <div class="form-group">
                                            <label for="nombre">Cedula:</label>
                                            <input type="text" class="form-control" id="cc_pac" name="cc_pac" value="" placeholder="1005828611" required>
                                            <small class="form-text text-muted">Ingrese numero de cedula.</small>
                                        </div>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Nombres:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom_pac" name="nom_pac" value="" placeholder="Cristian" required>
                                                    <small class="form-text text-muted">Ingrese nombre del paciente.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellido">Apellidos:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
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
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad:</label>
                                            <select class="form-control" id="id_ciu" name="id_ciu" value="">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                                   
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