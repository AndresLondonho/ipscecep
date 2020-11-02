<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("location:iniciolgejemplo.php");
    }
?>
<!--AQUI SOLO IRIA EL FORMULARIO DEL LOGIN-->
    <form method="post" class="form-box animated fadeInUp">
        <h1 class="form-title">IPS CECEP </h1>
        <input type="text" name= "user" id="user" placeholder="Usuario" required autofocus>
        <input type="password" name= "pass" id="pass" placeholder="Contraseña" required>
        <button type="submit" name="login" id="login">Iniciar sesion </button>
        <div>
            <span id= "result"></span>
        </div>
    </form>
<!--Y PUES AQUI ABAJO LLAMARIAS EL ARCHIVO DONDE ESTAN LOS SCRIPITS-->



<script></script>