<input type="hidden" id="modulo" value="Farmacia">
<div class="container">
    <div class="box-header">
    </div>
    <div class="box-body">
        <div class="panel-group">
            <div class="panel panel-success">
                <div class="panel-heading">Entrega de Medicamentos</div>
                <div class="panel-body">
                    <div class="row">
                        <form id="medcto">
                            <div class="col-md-2">
                                <h4 for="paciente" >Digite Nro. cedula:</h4>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="id_pac" id="id_pac" class="form-control" required placeholder="1112486446"
                                style="text-align: right; font-size: 20px;">
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="entrega" class="btn btn-success">Buscar</button>
                            </div>
                            <input type="hidden" name="accion" value="buscarmedcto">
                        </form>
                    </div>
                    
                    <div class="row hide" id="medicamentos" style="margin-top:30px; margin-left:30px; margin-right:30px; border: 1px solid #00a65a;
                        padding-top:10px; padding-bottom:10px;">
                        <form id="entregarM">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3" style="border: 1px solid #00a65a; text-align: center;">
                                    <h4><strong>Medicamento</strong></h4>
                                </div>
                                <div class="col-md-3" style="border: 1px solid #00a65a; text-align: center;">
                                    <h4><strong>Cantidad</strong></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" style=" height: 15px;">
                                </div>
                            </div>
                            <div id="cantidadmedctos">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3" style="font-size: 20px; border: 1px solid #00a65a;">
                                        <h4 id="nombre"></h4>
                                    </div>
                                    <div class="col-md-3" style="font-size: 20px; text-align: right; border: 1px solid #00a65a;">
                                        <h4 id="cantidad"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" style=" height: 15px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-1">
                                    <button type="button" id="reporte" name="reporte" class="btn btn-success">Entregar</button>
                                    <input type="hidden" name="id_medcto" id="id_medcto" value="">
                                    <input type="hidden" name="nro_cita" id="nro_cita" value="">
                                    <input type="hidden" name="accion" value="editarMedcto">
                                    <input type="hidden" name="stock" id="stock" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../js/medicamento.js"></script>