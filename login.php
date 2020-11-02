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