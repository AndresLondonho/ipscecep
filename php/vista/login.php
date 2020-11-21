<?php
  session_start();

  if(isset($_GET["cerrar_session"]) and $_GET["cerrar_session"]==true){
    session_destroy();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title> Inicia sesion IPS CECEP </title>
    <link rel="shortcut icon" href="../../imgs/icono.ico">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="../../recursos/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>


</head>

<body>
    <form action="" id="login-form" method="post" class="form-box animated fadeInUp">
        <h1 class="form-title">Inicia Sesión</h1>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario" autofocus>
        <input type="password" id="password" name="password" placeholder="Contraseña">
        <button type="submit">
            Iniciar
        </button>

        <input type="hidden" value="login" name="accion">
    </form>

    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="../../js/funcionesUsuario.js"></script>

  <script>
      $(document).ready(fusuario);
  </script>


</body>

</html>