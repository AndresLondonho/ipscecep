<div class="container">
    <div id="seccion-medico">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            <div class="panel-group"><div class="panel panel-primary">
                    <div class="panel-heading">Nuevo</div>
                        <div class="panel-body">
                            <form id="frmmedico" action="$" method="GET">
                                <h3>Cedula:</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Información personal</h5>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Cedula:</label>
                                            <input type="text" class="form-control" id="cc_user" name="cc_user" value="" placeholder="Ingrese cedula">
                                            
                                        </div>                                                        
                                        <div class="form-group">
                                            <label for="nombre">Nombres:</label>
                                            <input type="text" class="form-control" id="nom_user" name="nom_user" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="apellido">Apellidos:</label>
                                            <input type="text" class="form-control" id="ape_user" name="ape_user" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono:</label>
                                            <input type="text" class="form-control" id="tel_user" name="tel_user" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Email:</label>
                                            <input type="email" class="form-control" id=" email_user" name=" email_user" placeholder="Ingrese email">
                                        </div>    
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h5>Información laboral</h5>
                                            <input type="hidden" id="cargo" name="id_cargo" value="2">
                                            <input type="hidden" id="priv" name="id_priv" value="2">
                                            <input type="hidden" id="funcionario" name="id_func" value="5151">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad:</label>
                                            <select class="form-control" id="espec" name="id_espec" value="">
                                            <option>
                                                Cali
                                            </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sede">Sede:</label>
                                            <select class="form-control" id="sede" name="id_sede" value="">
                                            <option>
                                                Cali
                                            </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                   
                                <button type="submit" id="actualizar" class="btn btn-primary">Registrar</button>
                                <?php 
                                    $user = $_GET['nom_user'];
                                    $pass = $_GET['cc_user']; 
                                ?>
                                <input type="hidden" id="editar" value="editar" name="accion"/>
                                <input type="hidden" id="username" value="<?php echo $user ?>" name="username"/>                                
                                <input type="hidden" id="password" value="<?php echo $pass ?>" name="password"/>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
