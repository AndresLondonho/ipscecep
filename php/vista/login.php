<?php
    session_start();
    if(isset($_SESSION["username"])){
        header("location:iniciolgejemplo.php");
    }
?>
<!--AQUI SOLO IRIA EL FORMULARIO DEL LOGIN-->
    <form method="post" class="form-box">
        <input type="text" name= "username" id="username" placeholder="Usuario" required autofocus>
        <input type="password" name= "password" id="password" placeholder="Contraseña" required>
        <button type="submit" name="login" id="login">Iniciar sesion </button>
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
                    $('#login').val("Iniciar sesion");
                    if(data=="1"){
                        $(location).attr('href', 'iniciolgejemplo.php')
                    }else{
                        $("#result").hmtl();    
                    }
                }
            });
        };
    });
});
</script>