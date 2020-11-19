<div class="container">
    <div id="seccion-ciudad">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            <div class="panel-group"><div class="panel panel-success">
                    <div class="panel-heading">Editar</div>
                        <div class="panel-body">
                            <form id="frmciudad">
                                <h3>Numero Ciudad: <label id="num"></label></h3>
                                <input type="hidden" id="id_ciu" name="id_ciu" value="">

                                <div class="row">
                                    <div class="col-md-6">                                                       
                                        <div class="form-group">
                                            <label for="nombre">Ciudad:</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nom_ciu" name="nom_ciu" value="">
                                                    <small class="form-text text-muted">Ingrese nombre de la ciudad</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ciudad">Pais:</label>
                                            <select class="form-control" id="id_pais" name="id_pais" value=""></select>
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