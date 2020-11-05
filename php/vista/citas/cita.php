<div class="content-wrapper" style="min-height: 688px;">
        <!-- Content Header (Page header) -->
		        <section class="content-header">
				<div class="row">
                    <div class="col-md-3">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" value="01/11/2020 - 04/11/2020" id="range" readonly="" onchange="load(1)">
						</div><!-- /input-group -->
					</div>

					<div class="col-md-3">
						<select class="form-control select2 select2-hidden-accessible" name="q2" id="q2" onchange="load(1);" tabindex="-1" aria-hidden="true">
							<option value="">Selecciona Paciente</option>
					    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-q2-container"><span class="select2-selection__rendered" id="select2-q2-container" title="Selecciona Paciente">Selecciona Paciente</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						
					</div>
					
					<div class="col-md-3">
						<div class="input-group">
						  <select name="q3" id="q3" class="form-control" onchange="load();">
							<option value="0">Selecciona estado</option>
							<option value="1">Asignado</option>	
							<option value="2">Atendido</option>		
						 </select>
						  <span class="input-group-btn">
							<button class="btn btn-default" type="button" onclick="load(1);"><i class="fa fa-search"></i></button>
						  </span>
						</div><!-- /input-group -->
						
					</div>
					
					<div class="col-md-1">
						<div id="loader" class="text-center"></div>
						
					</div>
					<div class="col-md-2 ">
						<div class="btn-group pull-right">
														<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_register"><i class="fa fa-plus"></i> Nuevo</button>
														<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Mostrar
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right">
							  <li class="active" onclick="per_page(15);" id="15"><a href="#">15</a></li>
							  <li onclick="per_page(25);" id="25"><a href="#">25</a></li>
							  <li onclick="per_page(50);" id="50"><a href="#">50</a></li>
							  <li onclick="per_page(100);" id="100"><a href="#">100</a></li>
							  <li onclick="per_page(1000000);" id="1000000"><a href="#">Todos</a></li>
							</ul>
						</div>
                    </div>
					<input type="hidden" id="per_page" value="15">
			    </div>
		</section>
		<!-- Main content -->
        <section class="content">
			<div id="resultados_ajax">				
							</div>
			<div class="outer_div">	
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
				<h3 class="box-title">Listado de Citas</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table class="table table-condensed table-hover table-striped">
						<tbody><tr>
							<th># </th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Paciente</th>
							<th>Médico</th>
							<th>Consultorio</th>
							<th>Estado</th>
							<th></th>
						</tr>
							
						<tr>
							<td>1332</td>
							<td>04/11/2020</td>
							<td>16:30</td>
							<td>Alambrito Delgado</td>
							<td>andres mateo</td>
							<td>Ginecología</td>
							<td>
								<span class="label label-success">Atendido</span>
							</td>
							<td>
							<div class="btn-group pull-right">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
								<ul class="dropdown-menu">
																		<li><a href="#" data-toggle="modal" data-target="#modal_update" data-fecha="04/11/2020" data-hora="16:30" data-id_paciente="29" data-id_medico="71" data-id_consultorio="51" data-observaciones="pa chuparrrrrlaaaaa" data-estado="2" data-paciente="Alambrito Delgado" data-id="1332"><i class="fa fa-edit"></i> Editar</a></li>
																		<li><a href="#" onclick="eliminar('1332')"><i class="fa fa-trash"></i> Borrar</a></li>
																	</ul>
							</div><!-- /btn-group -->
                    		</td>
						</tr>
							
						<tr>
							<td>1330</td>
							<td>03/11/2020</td>
							<td>14:30</td>
							<td>Juliana Oxin</td>
							<td>Anaw Varela</td>
							<td>Consultorio 1</td>
							<td>
								<span class="label label-warning">Asignado</span>
							</td>
							<td>
							<div class="btn-group pull-right">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
								<ul class="dropdown-menu">
																		<li><a href="#" data-toggle="modal" data-target="#modal_update" data-fecha="03/11/2020" data-hora="14:30" data-id_paciente="4" data-id_medico="41" data-id_consultorio="53" data-observaciones="w4r4r" data-estado="1" data-paciente="Juliana Oxin" data-id="1330"><i class="fa fa-edit"></i> Editar</a></li>
																		<li><a href="#" onclick="eliminar('1330')"><i class="fa fa-trash"></i> Borrar</a></li>
																	</ul>
							</div><!-- /btn-group -->
                    		</td>
						</tr>
							
						<tr>
							<td>1329</td>
							<td>04/11/2020</td>
							<td>13:30</td>
							<td>Juliana Oxin</td>
							<td>Carlos  Aguirre Salcedo</td>
							<td>Consultorio 1</td>
							<td>
								<span class="label label-warning">Asignado</span>
							</td>
							<td>
							<div class="btn-group pull-right">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
								<ul class="dropdown-menu">
																		<li><a href="#" data-toggle="modal" data-target="#modal_update" data-fecha="04/11/2020" data-hora="13:30" data-id_paciente="4" data-id_medico="32" data-id_consultorio="53" data-observaciones="primera consulta" data-estado="1" data-paciente="Juliana Oxin" data-id="1329"><i class="fa fa-edit"></i> Editar</a></li>
																		<li><a href="#" onclick="eliminar('1329')"><i class="fa fa-trash"></i> Borrar</a></li>
																	</ul>
							</div><!-- /btn-group -->
                    		</td>
						</tr>
							
						<tr>
							<td>1328</td>
							<td>04/11/2020</td>
							<td>13:30</td>
							<td>Juliana Oxin</td>
							<td>Carlos  Aguirre Salcedo</td>
							<td>asdfsafa</td>
							<td>
								<span class="label label-warning">Asignado</span>
							</td>
							<td>
							<div class="btn-group pull-right">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
								<ul class="dropdown-menu">
																		<li><a href="#" data-toggle="modal" data-target="#modal_update" data-fecha="04/11/2020" data-hora="13:30" data-id_paciente="4" data-id_medico="32" data-id_consultorio="74" data-observaciones="primera consulta" data-estado="1" data-paciente="Juliana Oxin" data-id="1328"><i class="fa fa-edit"></i> Editar</a></li>
																		<li><a href="#" onclick="eliminar('1328')"><i class="fa fa-trash"></i> Borrar</a></li>
																	</ul>
							</div><!-- /btn-group -->
                    		</td>
						</tr>
							
						<tr>
							<td>1319</td>
							<td>04/11/2020</td>
							<td>14:00</td>
							<td>JUANITO HECTOR TAPIA JIMENEZ</td>
							<td>MI LOCAL TEMUCO</td>
							<td>Consultorio No. 3</td>
							<td>
								<span class="label label-success">Atendido</span>
							</td>
							<td>
							<div class="btn-group pull-right">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
								<ul class="dropdown-menu">
																		<li><a href="#" data-toggle="modal" data-target="#modal_update" data-fecha="04/11/2020" data-hora="14:00" data-id_paciente="211" data-id_medico="94" data-id_consultorio="16" data-observaciones="prueba vestido
- la proxima semana debe venir" data-estado="2" data-paciente="JUANITO HECTOR TAPIA JIMENEZ" data-id="1319"><i class="fa fa-edit"></i> Editar</a></li>
																		<li><a href="#" onclick="eliminar('1319')"><i class="fa fa-trash"></i> Borrar</a></li>
																	</ul>
							</div><!-- /btn-group -->
                    		</td>
						</tr>
								
					</tbody></table>
				</div><!-- /.box-body -->
				<div class="box-footer clearfix">
				
				Mostrando 1 al 5 de 5 registros<ul class="pagination pagination-sm no-margin pull-right"><li class="disabled"><span><a>‹ Anterior</a></span></li><li class="active"><a>1</a></li><li class="disabled"><span><a>Siguiente ›</a></span></li></ul>					
				</div>
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->	
	          
		  
</div><!-- Datos ajax Final -->         
        </section><!-- /.content -->
		      </div>