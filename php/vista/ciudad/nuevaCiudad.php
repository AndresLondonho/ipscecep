
<div class="container">
    <div id="seccion-ciudad">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmciudad">
                                <div class="row">
                                    <div class="col-md-6">                                                     
                                        <div class="form-group">
                                            <label for="numero">Numero ciudad:</label>
                                            <input type="text" class="form-control" id="id_ciu" name="id_ciu" value="" placeholder="1006" required>
                                            <small class="form-text text-muted">Ingrese id de la ciudad.</small>
                                        </div>                                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="nombre">Nombre:</label>
                                                    <input type="text" class="form-control" id="nom_ciu" name="nom_ciu" value="" placeholder="Pereira" required>
                                                    <small class="form-text text-muted">Ingrese nombre de la ciudad.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="pais">Pais:</label>
                                                    <select class="form-control" id="id_pais" name="id_pais" value=""></select>
                                                </div>
                                            </div>
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