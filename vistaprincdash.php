<!--SECCION DE NUESTROS MEDICOS-->
<div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Nuestros Medicos</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <li>
                        <img src="imgs/cristian.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Cristian</a>
                        <span class="users-list-date">Odontologo</span>
                      </li>
                      <li>
                        <img src="imgs/andres.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Rafael</a>
                        <span class="users-list-date">Nutricionista</span>
                      </li>
                      <li>
                        <img src="imgs/julian.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Julian</a>
                        <span class="users-list-date">Oftalmologo</span>
                      </li>
                      <li>
                        <img src="imgs/sebastian.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Sebastian</a>
                        <span class="users-list-date">Traumatologo</span>
                      </li>
                      <li>
                        <img src="imgs/esteban.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Esteban</a>
                        <span class="users-list-date">Ginecologo</span>
                      </li>
                      <li>
                        <img src="imgs/diego.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Diego</a>
                        <span class="users-list-date">Pediatra</span>
                      </li>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript::">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
<!-- FIN NUESTROS MEDICOS -->

<!-- BOTON PARA LA ACCION DE EDITAR-ELIMINAR-->
<div class="btn-group pull-right open">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>
    <ul class="dropdown-menu">
        <li><a href="#" data-toggle="modal" data-target="#modal_update" data-nombres="ALBERTO" data-apellidos="VERDEJO" data-telefono="9999" data-direccion="Av arequipa 301 Lima " data-email="unodostres@outlook.com" data-id_especialidad="58" data-id="60"><i class="fa fa-edit"></i> Editar</a></li>
        <li><a href="#" onclick="eliminar('60')"><i class="fa fa-trash"></i> Borrar</a></li>
    </ul>
</div>
<!-- FIN BOTON PARA LA ACCION DE EDITAR-ELIMINAR-->
