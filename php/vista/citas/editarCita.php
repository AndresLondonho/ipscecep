<div class="container">
    <div class="box-header">
    </div>
    <div class="box-body">
        <div class="panel-group">
            <div class="panel panel-success">
                <div class="panel-heading">Historia Clinica</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Paciente:</h3>
                        </div>
                        <div class="col-md-2">
                            <h3>Cedula:</h3>
                        </div>
                        <div class="col-md-2">
                            <h3>Telefono:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4 id="nom_pac"></h4>
                        </div>
                        <div class="col-md-2">
                            <h4 id="id_pac"></h4>
                        </div>
                        <div class="col-md-2">
                            <h4 id="tel_pac"></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Medico:</h3>
                        </div>
                        <div class="col-md-2">
                            <h3>Especialidad:</h3>
                        </div>            
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4 id="nom_med"></h4>
                        </div>
                        <div class="col-md-2">
                            <h4 id="espec"></h4>
                        </div>
                    </div>
                    <form id="frmcita">
                        <div class="detalle" style="margin-top: 20px; border: 1px solid #00a65a; padding: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    <small class="form-text text-muted"><strong>Diagnostico</strong></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="detalle" name="detalle" rows="6" cols="40" 
                                    style="margin-top:10px; font-family:'Times New Roman', Times, serif; font-size: 20px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row" style="margin-top:10px">
                                <label class="form-text text-muted">Medicamento</label>
                                <input type="checkbox" name="med" id="med">
                            </div>
                            <div class="row hide" id="droga">
                                <div class="col-md-2">
                                    <label class="form-text text-muted">Nombre</label>
                                    <select class="form-control" id="id_medcto" name="id_medcto">
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-text text-muted">Cantidad</label>
                                    <input type="number" class="form-control" name="stock" id="stock">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-md-11">

                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-success" type="button" id="actualizar">Guardar</button>
                                <input type="hidden" name="nro_cita" id="nro_cita">
                                <input type="hidden" name="id_est" id="id_est" value="2">
                                <input type="hidden" name="accion" value="editar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>