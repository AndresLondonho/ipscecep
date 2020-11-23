<?php include_once ("../sesiones.php"); ?>


<li class="header">NAVEGACIÓN PRINCIPAL</li>
        <li class="treeview">
          <a href="home.php">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>

        <li class="treeview">
          <?php $usua_tipo = $_SESSION["tipo"];
          
            switch($usua_tipo)
            {
              case "1":
                ?>
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Gestion</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">

                    <li class="active"><a href="servicio/servicio.php"><i class="fa fa-circle-o"></i> Servicios</a></li>
                      <li class="active"><a href="funcionario/funcionario.php"><i class="fa fa-circle-o"></i> Funcionarios</a></li>
                      <li class="active"><a href="paciente/paciente.php"><i class="fa fa-circle-o"></i> Pacientes</a></li>
                      <li class="active"><a href="medico/medico.php"><i class="fa fa-circle-o"></i> Medicos</a></li>
                      <li class="treeview">
                        <a href="#">
                          <span>Citas</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li class="active"><a href="citas/nuevacita.php"><i class="fa fa-circle-o"></i>Asignar Cita</a></li>
                          <li class="active"><a href="citas/cita.php"><i class="fa fa-circle-o"></i>Historial Cita</a></li>
                        </ul>
                      </li>
                      
                      <li class="treeview">
                        <a href="#">
                          <span>Convenios</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li class="active"><a href="sede/sede.php"><i class="fa fa-circle-o"></i> Sedes</a></li>
                          <li class="active"><a href="ciudad/ciudad.php"><i class="fa fa-circle-o"></i> Ciudades</a></li>
                          <li class="active"><a href="pais/pais.php"><i class="fa fa-circle-o"></i> Paises</a></li>
                        </ul>
                      </li>
                  </ul>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-files-o"></i>
                      <span>Inventario</span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="medicamento/medicamento.php"><i class="fa fa-circle-o"></i> Medicamentos</a></li>
                    </ul>
                  </li>
                <?php
              break;

              case "2":
                ?>
                   <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Gestion</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">

                      <li class="active"><a href="paciente/paciente.php"><i class="fa fa-circle-o"></i> Pacientes</a></li>
                      <li class="treeview">
                        <a href="#">
                          <span>Citas</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li class="active"><a href="citas/cita.php"><i class="fa fa-circle-o"></i>Historial Cita</a></li>
                        </ul>
                      </li>
                  </ul>
                <?php
              break;

              case "3":
                ?>
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Gestion</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">

                    <li class="active"><a href="servicio/servicio.php"><i class="fa fa-circle-o"></i> Servicios</a></li>
                      <li class="treeview">
                        <a href="#">
                          <span>Citas</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li class="active"><a href="citas/nuevacita.php"><i class="fa fa-circle-o"></i>Asignar Cita</a></li>
                        </ul>
                      </li>
                  </ul>
                <?php
              break;

              case "4":
                ?>
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Gestion</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">

                      <li class="active"><a href="funcionario/funcionario.php"><i class="fa fa-circle-o"></i> Funcionarios</a></li>
                      <li class="active"><a href="medico/medico.php"><i class="fa fa-circle-o"></i> Medicos</a></li>

                      <li class="treeview">
                        <a href="#">
                          <span>Convenios</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li class="active"><a href="sede/sede.php"><i class="fa fa-circle-o"></i> Sedes</a></li>
                        </ul>
                      </li>
                  </ul>
                <?php
              break;

              case "5":
                ?>
    
                <?php
              break;
            }

          ?>

        </li>
        
        <!-- medicamentos aun no asignado por eso sale -->