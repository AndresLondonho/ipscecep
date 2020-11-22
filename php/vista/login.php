<?php
  session_start();

  if(isset($_GET["cerrar_session"]) and $_GET["cerrar_session"]==true){
    session_destroy();
  }
?>
<div class="container" style="margin-top: 20%">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <div class="panel-group">
      <div class="panel panel-success">
        <div class="panel-heading">Inicia Sesión</div>
        <div class="panel-body">
          <form action="" id="login-form" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" autofocus>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="form-group">
                <button type="submit" class="form-control btn-success">Iniciar</button>
              </div>
            </div>
            <input type="hidden" value="login" name="accion">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/funcionesUsuario.js"></script>