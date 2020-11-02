<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("location:iniciolgejemplo.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPS Login</title>
    <link rel="shortcut icon" href="imgs/icono.ico">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="js/jquery-3.5.1.min.js" charset="utf-8"></script>
</head>

<body>
    <form method="post" class="form-box animated fadeInUp">
        <h1 class="form-title">IPS CECEP </h1>
        <input type="text" name= "user" id="user" placeholder="Usuario" required autofocus>
        <input type="password" name= "pass" id="pass" placeholder="Contraseña" required>
        <button type="submit" name="login" id="login">Iniciar sesion </button>
        <div>
            <span id= "result"></span>
        </div>
    </form>
</body>

</html>

<script>
    $(document).ready(function(){
        $('#login').click(function(){
            var user=('#user').val();
            var pass=('#pass').val();
            if($.trim(user).length > 0 && $.trim(pass).length > 0){
                $.ajax({
                    url:"conexionDB.php",
                    method:"POST",
                    data:{user:user, pass:pass},
                    cache:"false",
                    beforeSend: function(){
                        $('#login').val("conectando...");
                    },
                    success:function(data){
                        $('#login').val("Iniciar sesion");
                        if(data=="1"){
                            $(location).attr('href', 'iniciolgejemplo.php')
                        }else{
                            $("#result").hmtl("<div class='alert alert-dimissible alert-dange'><button type='button'
                            class='close' data-dimiss='alert'>&times;</button><strong>¡Error!</strong> las credenciales
                            son incorrectas.<div>");
                        }
                    }
                });
            };
        });
    });
</script>

<!-- </body background="https://i.pinimg.com/originals/eb/f2/b1/ebf2b1e0b9de6ed73c0612f19ac9235c.jpg"> -->