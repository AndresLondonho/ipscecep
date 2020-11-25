<div class="container">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmCita">
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Especialidad:</label>
                                                        <select class="form-control" name="id_espec" id="id_espec">
                                                            <option>Seleccione tipo de cita</option>
                                                        </select>
                                                        <small>Tipo de cita</small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Medicos:</label>
                                                        <select class="form-control" name="id_func" id="nom_med" disabled>
                                                            <option>
                                                                ------
                                                            </option>
                                                        </select>
                                                        <small>Nombre Medico</small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Sede:</label>
                                                        <input type="text" name="nom_sede" readonly id="nom_sede" class="form-control" placeholder="------" value="">
                                                        <input type="hidden" name="id_sede" id="sede">
                                                        <small>Sede</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Cedula:</label>
                                                        <input type="text" name="id_pac" class="form-control" id="id_pac" placeholder="Ingrese cedula" value="">
                                                        <small>Cedula del paciente</small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Paciente:</label>
                                                        <input type="text" name="nom_pac" readonly id="nom_pac" class="form-control" placeholder="Nombre paciente" value="">
                                                        <small>Nombre Paciente</small>
                                                    </div>
                                                </div>			    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="fecha">Fecha:</label>
                                                        <input type="date" name="fecha" id="fecha" class="form-control">
                                                        <small>Seleccione la fecha</small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="hora">Hora:</label>
                                                        <input type="time" class="form-control" list="horas" name="hora" id="hora">
                                                        <small>Seleccione la hora</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="nro_cita" value="" id="nro_cita">
                                    <input type="hidden" name="detalle" value="" id="detalle">
                                    <input type="hidden" name="id_est" id="id_est" value="1">
                                    <input type="hidden" name="accion" value="nuevo">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-success" id="nuevaCita" value="Enviar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<datalist id="horas">
    <option value="08:00">
    <option value="08:20">
    <option value="08:40">
    <option value="09:00">
    <option value="09:20">
    <option value="09:40">
    <option value="10:00">
    <option value="10:20">
    <option value="10:40">
    <option value="11:00">
    <option value="11:20">
    <option value="11:40">    
    <option value="14:00">
    <option value="14:20">
    <option value="14:40">
    <option value="15:00">
    <option value="15:20">
    <option value="15:40">
    <option value="16:00">
    <option value="16:20">
    <option value="16:40">
    <option value="17:00">
    <option value="17:20">
    <option value="17:40">
  </datalist>

  <script src="../../js/cita.js"></script>