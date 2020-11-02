<?php
    session_start();
    if(isset($_SESSION["username"])){
        header("location:iniciolgejemplo.php");
    }
?>
    <head>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

        <script src="js/jquery-3.5.1.min.js"></script>
    </head>
    
<!--AQUI SOLO IRIA EL FORMULARIO DEL LOGIN-->
    <form method="post" class="form-box">
        <input type="text" name= "username" id="username" placeholder="Usuario" required autofocus>
        <input type="password" name= "password" id="password" placeholder="Contraseña" required>
        <button type="submit" name="login" id="login" value="Login">Iniciar sesion </button>
        <div>
            <span id= "result"></span>
        </div>
    </form>
<!--Y PUES AQUI ABAJO LLAMARIAS EL ARCHIVO DONDE ESTAN LOS SCRIPITS-->

<script>
    $(document).ready(function(){
    $('#login').click(function(){
        var username=('#username').val();
        var password=('#password').val();
        if($.trim(username).length > 0 && $.trim(password).length > 0){
            $.ajax({
                url:"conexionDB.php",
                method:"POST",
                data:{username:username, password:password},
                cache:"false",
                beforeSend: function(){
                    $('#login').val("conectando...");
                },
                success:function(data){
                    $('#login').val("Login");
                    if(data=="1"){
                        $(location).attr('href', 'php/vista/iniciolgejemplo.php')
                    }else{
                        $("#result").hmtl();    
                    }
                }
            });
        };
    });
});
</script>